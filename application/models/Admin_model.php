<?php
class Admin_model extends CI_Model{
  function login_admin(){
    $where=array(
      'admin_email'=>$this->input->post('email'),
      'password'=>trim($this->input->post('password'))
    );
    $query=$this->db->get_where('worker',$where);
    if ($query->num_rows()) {
      $_SESSION['admin_id']=$query->row()->admin_id;
      $_SESSION['username']=$query->row()->username;
      return true;
    }
    return false;
  }
}
