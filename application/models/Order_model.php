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
}

