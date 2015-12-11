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

  function get_all_unapproved_by_nanny($nanny_id)
  {
    $q = "SELECT orders.*, districts.*, w.worker_name as worker1, w2.worker_name as worker2 FROM `orders` 
          JOIN  districts ON orders.district_id = districts.dist_id
          JOIN workers as w ON orders.nanny_id1 = w.worker_id
          LEFT JOIN workers as w2 ON orders.nanny_id2 = w2.worker_id
          WHERE (nanny_id1 = '$nanny_id' AND nanny1_approve like '0000-00-00%') OR (nanny_id2 = '$nanny_id' AND nanny2_approve like '0000-00-00%')";
    $query = $this->db->query($q);
    
    return $query->result_array();
  }

  function approve_order()
  {
    $now = date('Y-m-d H:i:s');
    if($_SESSION['worker_id'] == $this->input->post('nanny_id1'))
    {
      $which_nanny = 'nanny1_approve';
    }else
    {
      $which_nanny = 'nanny2_approve';
    }
    
    $approved_order = array(
      $which_nanny => $now
      ,'date_updated' => $now
      ,'updated_by' => $_SESSION['worker_id']
    );
    $this->db->where('order_id', $this->input->post('order_id'));
    return $this->db->update('orders', $approved_order);
  }

  function get_all_approved_by_nanny($nanny_id)
  {
    $q = "SELECT orders.*, districts.*, w.worker_name as worker1, w2.worker_name as worker2 FROM `orders` 
          JOIN  districts ON orders.district_id = districts.dist_id
          JOIN workers as w ON orders.nanny_id1 = w.worker_id
          LEFT JOIN workers as w2 ON orders.nanny_id2 = w2.worker_id
          WHERE (nanny_id1 = '$nanny_id' AND nanny1_approve > '0000-00-00') OR (nanny_id2 = '$nanny_id' AND nanny2_approve > '0000-00-00')";
    $query = $this->db->query($q);
    
    return $query->result_array();
  }

  function get_current_order_by_nanny($nanny_id)
  {
    $current_date = date('Y-m-d');
    $current_time = date('H:i:s');
    $this->db->join('users', ' orders.parent_id = users.userid');
    $this->db->join('districts', ' orders.district_id = districts.dist_id');
    $this->db->where('order_date', $current_date);
    $this->db->where('order_time < ', $current_time);
    $this->db->where('parent_approve', NULL);
    $this->db->group_start();
      $this->db->where('nanny_id1', $nanny_id);
      $this->db->or_where('nanny_id2', $nanny_id);
    $this->db->group_end();
    $this->db->order_by('order_time', 'ASC');
    
    $q = $this->db->get('orders');
    return $q->result_array();
  }

  function parent_approve()
  {
    $now = date('Y-m-d H:i:s');
    $data_update = array(
      'date_updated' => $now
      ,'parent_approve' => $now
      ,'updated_by' => $_SESSION['worker_id']
    );
    $this->db->where('order_id', $this->input->post('order_id'));

    return $this->db->update('orders', $data_update);
  }
}
