<?php
/**
 * Description of Schedule
 *
 * @author User
 */
class Schedule extends CI_Controller {
  function index(){
    $_SESSION['menu']=2;
    if (!isset($_SESSION['worker_id']))
    { 
      $this->load->view('worker_login_view'); 
    }
    else {
      $this->load->model('schedule_model');
      $this->load->model('worker_model');
      $data['periods']=$this->schedule_model->read_periods();
      $data['addresses'] = $this->worker_model->get_all_addresses_by_nanny($_SESSION['worker_id']);
      $data['ym'] = date('Y-m');
      $this->load->view('worker_schedule_view', $data);
    }
  }

  function save(){
    function prep_month($ym,$periods,&$l,&$db_data){
      foreach ($periods as $key=>$value){
        if ("$ym".str_pad($key,2,"0",STR_PAD_LEFT)>$l){
          foreach ($value as $period){
            $hour=explode(' ',$period);
            //form the address
            $address = '';
            for($i = 3; $i<=count($hour); $i++)
            {
              $address .= $hour[$i] . ' ';
            }

            $db_data[]=array('worker_id'=>$_SESSION['worker_id'],
                             'schedule_date'=>"$ym".str_pad($key,2,"0",STR_PAD_LEFT),
                             'begin_hour'=>$hour[0],
                             'end_hour'=>$hour[2],
                             'address'=> $address);
          }
        }
      }
    }

    print_r($_POST['current_month']);
    $db_data=array();
    $l=date('Y-m-d',strtotime(date('Y-m-d')." +1 day"));
    if (isset($_POST['current_month'])){ // Периоди за текущ месец -------------
      prep_month(date('Y-m').'-',$_POST['current_month'],$l,$db_data);
    }
    if (isset($_POST['next_month'])){ // Периоди за следващ месец --------------
      prep_month(date('Y-m',strtotime(date('Y-m')."-01 +1 month")).'-',$_POST['next_month'],$l,$db_data);
    }
    $this->load->model('schedule_model');
    if (count($db_data)) {
      $this->schedule_model->remove_periods(array('worker_id'=>$_SESSION['worker_id'],'schedule_date >'=>$l));
      $this->schedule_model->save_periods($db_data);
    }
//    header('Content-Type: application/json');
//    echo json_encode($response);
  }
}

