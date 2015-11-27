<?php
/**
 * Description of Order
 *
 * @author User
 */
class Order extends CI_Controller {
  function index(){
//    unset($_SESSION['order']);
    if (!isset($_SESSION['order'])){
      $_SESSION['order']=array(
        'city'=>1,'district'=>0,'street'=>'','number'=>'','building'=>'','gate'=>'','floor'=>'','apartment'=>'',
        'note'=>'','date'=>'','time'=>'','duration'=>0,'payment'=>1,'price'=>0,'taxi'=>0,'worker_id'=>0,'valid'=>false,
        'kids_count' => 0, 'kid_name[1]'=>'', 'kid_age[1]'=>0, 'kid_gender[1]'=>'',
        'nanny_id1'=>0, 'nanny1_price'=>0, 'taxi1_price'=>0, 'nanny_id2'=>0, 'nanny2_price'=>0, 'taxi2_price'=>0
      );
    }
    $this->load->model('order_model');
    $this->load->model('worker_model');
    $data['districts']=$this->order_model->read_districts(array('city_id'=>1),$_SESSION['order']['district']);
    $data['all_nanies_list'] = $this->worker_model->get_all_nannies();
    $this->load->view('order_view',$data);
  }
  function validate(){
    unset($_SESSION['order']['err']);
    $response['success']=$_SESSION['order']['valid']=false;
    $response['order_prop']=$response['pay_prop']='';
    $errors=array();
    $uppercase=array('number'=>'','building'=>'','gate'=>'','floor'=>'','apartment'=>'','dds'=>'');
    if (empty($_POST)) { $response['step']=4; }
    else {
      $response['step']=$_POST['step'];
      foreach ($_POST as $key=>$val) { 
        if (isset($uppercase[$key])) { $_SESSION['order'][$key]=mb_strtoupper(trim($val),"utf-8"); }
        else $_SESSION['order'][$key]=trim($val);
      }
      
      if (isset($_POST['invoice'])) { $_SESSION['order']['invoice']=1; } 
      else { $_SESSION['order']['invoice']=0; }
    }
    // Валидация стъпка 1 адрес ************************************************
    if (!$_SESSION['order']['district']) { $errors[]='district'; }
    if (!($_SESSION['order']['street'].$_SESSION['order']['building'])) {
      $errors[]='street';
      $errors[]='building';
    }
    if ($_SESSION['order']['street'] && !$_SESSION['order']['number']) { $errors[]='number'; }
    if ($_SESSION['order']['building']) {
      if (!$_SESSION['order']['gate']) { $errors[]='gate'; }
      if (!$_SESSION['order']['apartment']) { $errors[]='apartment'; }
    }
    if (!empty($errors)) { $response['step']=1; }
    // *************************************************************************
    if ($response['step']>2) { // Валидация стъпка 2 дата,час,продължителност **
      $dt=$_SESSION['order']['date'];
      $tm=$_SESSION['order']['time'];
      if (!(strlen($dt)==10 && checkdate(substr($dt,3,2),substr($dt,0,2),substr($dt,6,4)))){ 
        $errors[]='date';
      }
      if (!preg_match("/(2[0-3]|[01][0-9]):([0-5][0-9])/",$tm)){
        $errors[]='time';
      }
      if (!$_SESSION['order']['duration']) { 
        $errors[]='duration'; 
      }
    
      if(!$_SESSION['order']['kids_count']){
        $errors[]='kids_count';

      }
      /*else
      {
        for($i = 0; $i < $_SESSION['order']['kids_count']; $i++)
        {
          if(!$_SESSION['order']['kid_name[$i]']) 
          {
            $errors[]='kid_name[$i]';
          } 
          if(!$_SESSION['order']['kid_age[$i]']) 
          {
            $errors[]='kid_age[$i]';
          }       
        }
      }
    */
    

      if (!empty($errors)) { 
        $response['step']=2; 
      } else { 
        $this->calc_price(); 
      }
    } // ***********************************************************************
    $total=$_SESSION['order']['price']+$_SESSION['order']['taxi'];
    $response['price']=(int)$total;

    $response['supprice']=STR_PAD(round($total*100-$response['price']*100),2,"0",STR_PAD_LEFT);
    if ($response['step']>3) { // Валидация стъпка 3 ***************************
      // if (!$_SESSION['order']['first_nanny_id']) { 
      //   $errors[]='select_first_nanny'; 
      // }
      // if (!$_SESSION['order']['second_nanny_id']) { 
      //   $errors[]='select_second_nanny'; 
      // }

      if (!empty($errors)) { 
        $response['step']=3;
      }
      else { // Генериране на данни за стъпка 4 ********************************
        $_SESSION['order']['valid']=true;
        $adr="<label class='data-label'>гр.София</label><br/>кв. <label class='data-label'>";
        $query=$this->db->get_where('districts',array('dist_id'=>$_SESSION['order']['district']));
        $adr.=$query->row('dist_name')."</label><br/>";
        foreach ($_SESSION['order'] as $key => $v){
          if (trim($v)) {
            $s="";
            switch ($key){
              case 'street': $l="бул./ул."; break;
              case 'number': $l="No."; break;
              case 'building': $l="бл."; break;
              case 'gate': $l="вх."; break;
              case 'floor': $l="ет."; break;
              case 'apartment': $l="ап."; break;
              default: $l="";
            }
            if ($l) { $adr.=$l." <label class='data-label'>".$_SESSION['order'][$key]." &nbsp;</label>".$s; }
          }
        }
        $response['order_prop']="<center><h4>Адрес</h4></center><div class='order_prop'>".$adr;
        if ($_SESSION['order']['note']) {
          $response['order_prop'].="</br></br><label class='control-label'>Допълнително описание</label><br/>
            <textarea class='form-control data-label' style='resize: none;' readonly>".$_SESSION['order']['note']."</textarea>";
        }
        $response['order_prop'].="</div><center><h4>Дата и час</h4></center><div class='prder_prop'>Дата
          <label class='data-label'>".$_SESSION['order']['date']."</label> г. &nbsp; - от &nbsp;<label class='data-label'>".
          $_SESSION['order']['time']."</label> &nbsp; - до &nbsp;<label class='data-label'>".
          date('H:i',strtotime($_SESSION['order']['time']."+".$_SESSION['order']['duration']."hours"))."</label>&nbsp; часа</div>";
        $response['pay_prop']="<center style='margin-bottom: 20px; background-color: #F8F8F8; padding: 5px;'><h2>
          Цена &nbsp; <label id='cprice'>{$response['price']}</label> <sup><sup id='csupprice'>{$response['supprice']}</sup></sup>
          лв.</h2></center>";
      } // *********************************************************************
    }
    $cyrillic=$i=0;
    $exceptions=array('date'=>'','time'=>'','invoice'=>'','dds'=>'');
    foreach ($_SESSION['order'] as $key=>$val) {
      $i++;
      if (!isset($exceptions[$key]) && !preg_match("/(*UTF8)^[А-Яа-я0-9 &.,\"\r\n-]*$/",$val)) {
        if ($i<10 || $_SESSION['order']['invoice'] && $response['step']>2) {
          $errors[]=$key;
          if (!$cyrillic) { $cyrillic=$i; }
        }
      }
    }
    if ($cyrillic) {
      $errors[]='cyrillic';
      if ($cyrillic<10 && $response['step']>1) { $response['step']=1; }
      if ($cyrillic>10 && $response['step']>3) { $response['step']=3; }
    }
    if (empty($errors)) { $response['success']=true; }
    else { $response['errors']=$errors; }
    if (empty($errors)) { $response['success']=true; }
    else { $response['errors']=$errors; }
    header('Content-Type: application/json');
    echo json_encode($response);
  }
  private function calc_price(){
    $nannies_count = 1;
    $_SESSION['order']['nanny1_price']=$_SESSION['order']['duration']*15.02;
    if($_SESSION['order']['kids_count'] > 2)
    {
      $nannies_count = 2;
      $_SESSION['order']['nanny2_price']=$_SESSION['order']['duration']*15.02;
    }
    $_SESSION['order']['price']=$_SESSION['order']['duration']*15.02*$nannies_count;
    $_SESSION['order']['taxi']=7.24;
  }
}
