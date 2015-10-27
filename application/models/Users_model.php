<?php
/**
 * Description of users_model
 *
 * @author User
 */
class Users_model extends CI_Model {
  function isExsistUser(){
    $where=array(
      'email'=>$this->input->post('email'),
      'password'=>md5(trim($this->input->post('pass')))
    );
    $query=$this->db->get_where('users',$where);
    if ($query->num_rows()) {
      $_SESSION['userid']=$query->row()->userid;
      $_SESSION['username']=$query->row()->username;
      return true;
    }
    return false;
  }
  function isExsistEmail(){
    $query=$this->db->get_where('users',array('email'=>$this->input->post('email')));
    if ($query->num_rows()) { return $query->row()->userid; }
    return false;
  }
  function getUserData(){
    $query=$this->db->get_where('users',array('userid'=>$_SESSION['userid']));
    return $query->row();
  }
  function insertUser(){
    $bd_data=array(
      'username'=>$this->input->post('username'),
      'phone'=>$this->input->post('phone'),
      'email'=>$this->input->post('email'),
      'password'=>md5($this->input->post('pass')),
      'insertdate'=>date('Y-m-d')
    );
    $this->db->insert('users',$bd_data);
    $_SESSION['userid']=$this->db->insert_id();
    $_SESSION['username']=$this->input->post('username');
  }
  function updateUser(){
    $bd_data=array(
      'username'=>$this->input->post('username'),
      'phone'=>$this->input->post('phone'),
      'email'=>$this->input->post('email')
    );
    $this->db->where('userid',$_SESSION['userid'])->update('users',$bd_data);
    $_SESSION['username']=trim($this->input->post('username'));
  }
  function newPass(){
    $where=array(
      'userid'=>$_SESSION['userid'],
      'password'=>md5(trim($this->input->post('old_pass')))
    );
    $query=$this->db->get_where('users',$where);
    if ($query->num_rows()) {
      $this->db->where('userid',$_SESSION['userid'])->update('users',array('password'=>md5($this->input->post('pass'))));
      return true;
    }
    return false;
  }
  function generatePassword(){
    $pass=substr(str_shuffle('abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789'),0,10);
    $this->db->where('email',$this->input->post('email'))->update('users',array('password'=>md5($pass)));
    $email=trim($this->input->post('email'));
    $subject='Нова парола';
    $message='Здравейте '.$email.',<br/>Вашата нова парола е: '.$pass.'<br/><br/>';
    $message.='Искрено Ваш,<br/>Екипът на SofiaNanny';
    $headers="MIME-Version: 1.0\r\n";
    $headers.="Content-type: text/html\r\n";
    $headers.="From: SofiaNanny <system@sofiananny.com>\r\n";
    $headers.="Reply-To: system@sofiananny.com\r\nX-Mailer: PHP/".phpversion();
    mail($email, $subject, $message, $headers);
  }
}

