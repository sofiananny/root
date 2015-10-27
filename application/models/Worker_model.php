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
      $_SESSION['worker_name']=$query->row()->worker_name;
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
}

