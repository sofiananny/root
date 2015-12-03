<?php
/**
 * Description of Order_model
 *
 * @author User
 */
class Order_model extends CI_Model {
  function read_districts($db_data,$d){
    $this->db->order_by("dist_name","asc");
    $query=$this->db->get_where('districts',$db_data);
    $districts="                    <option value='0' style='display: none'></option>\n";
    foreach ($query->result() as $row){
      if ($row->dist_id==$d) { $sel=' selected'; } else { $sel=''; }
      $districts .= "                    <option value='".$row->dist_id."'$sel>".$row->dist_name."</option>\n";
    }
    return $districts;
  }

  function add_order()
  {
    $now = date('Y-m-d H:i:s');
    //switch format from m/d/y to d/m/y
    $date_arr = explode('/', $_SESSION['order']['date']);
    $tmp = $date_arr[0];
    $date_arr[0] = $date_arr[1];
    $date_arr[1] = $tmp;
    $date2 = implode('/', $date_arr);

    $date = date_create($date2);
    $order_date = date_format($date, 'Y-m-d');

    $data = array(
      'parent_id' => 1//TODO
      ,'city' => $_SESSION['order']['city']
      ,'district_id' => $_SESSION['order']['district']
      ,'street' => $_SESSION['order']['street']
      ,'street_number' => $_SESSION['order']['number']
      ,'building' => $_SESSION['order']['building']
      ,'gate' => $_SESSION['order']['gate']
      ,'floor' => $_SESSION['order']['floor']
      ,'apartment' => $_SESSION['order']['apartment']
      ,'floor' => $_SESSION['order']['floor']
      ,'notes' => $_SESSION['order']['note']
      ,'order_date' => $order_date
      ,'order_time' => $_SESSION['order']['time']
      ,'duration' => $_SESSION['order']['duration']
      ,'kids_count' => $_SESSION['order']['kids_count']
      ,'nanny_id1' => $_SESSION['order']['nanny_id1']
      ,'nanny_id2' => $_SESSION['order']['nanny_id2']
      ,'nanny1_price' => $_SESSION['order']['nanny1_price']
      ,'nanny2_price' => $_SESSION['order']['nanny2_price']
      ,'taxi1_price' => $_SESSION['order']['taxi']
      ,'taxi2_price' => $_SESSION['order']['taxi']
      ,'date_created' => $now
    );

    return $this->db->insert('orders', $data);
  }
}

