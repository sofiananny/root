<?php
/**
 * Description of Invite
 *
 * @author User
 */
class Invite extends CI_Controller {
  function index(){
    if (filter_var($this->input->post('email'),FILTER_VALIDATE_EMAIL)) {
      $bd_data=array('invitation_email'=>$this->input->post('email'),'insert_date'=>date('Y-m-d H:i:s'));
      $this->db->query(str_replace('INSERT INTO','INSERT IGNORE INTO',
                            $this->db->insert_string('invitations',$bd_data)));
      if ($this->db->affected_rows()) {
        $email='stefanova.magdalena@gmail.com, dimitrova.bibi@gmail.com';
        $subject='Добавен нов e-mail';
        $message=$this->input->post('email').' - '.date('d-m-Y H:i:s');
        $headers="MIME-Version: 1.0\r\n";
        $headers.="Content-type: text/html\r\n";
        $headers.="From: SofiaNanny <system@sofiananny.com>\r\n";
        $headers.="Reply-To: system@sofiananny.com\r\nX-Mailer: PHP/".phpversion();
        mail($email, $subject, $message, $headers);
      }
      $response['success']=true;
    }
    else {
      $response['success']=false;
      $response['errors'][]='invite';
    }
    header('Content-Type: application/json');
    echo json_encode($response);
  }
}
