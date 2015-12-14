<?php
/**
 * Description of Workers_model
 *
 * @author User
 */
class Worker_model extends CI_Model{
  function login_worker(){
    
    $where=array(
      'worker_email'=>$this->input->post('email'),
      'worker_pass'=>md5(trim($this->input->post('pass')))
    );
    $query=$this->db->get_where('workers',$where);
    if ($query->num_rows()) {
      $_SESSION['worker_id']=$query->row()->worker_id;
      $_SESSION['first_name']=$query->row()->first_name;
      $_SESSION['role']=$query->row()->role;
      return true;
    }
    return false;
  }
  function newPass(){
    $where=array(
      'worker_id'=>$_SESSION['worker_id'],
      'worker_pass'=>md5(trim($this->input->post('old_pass')))
    );
    $query=$this->db->get_where('workers',$where);
    if ($query->num_rows()) {
      $this->db->where('worker_id',$_SESSION['worker_id'])->update('workers',array('worker_pass'=>md5($this->input->post('pass'))));
      return true;
    }
    return false;
  }
  function get_all_nannies()
  {
    $q = $this->db->get('workers');
    return $q->result_array();
  }

  function get_all_addresses_by_nanny($nanny_id)
  {
    $this->db->select('address1, address2');
    $this->db->where('student_id', $nanny_id);
    $q = $this->db->get('worker_details');
    return $q->row_array();
  }
}

