<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 class Student extends CI_Controller {
     public function index()
     {
          $this->load->model('student_model'); 
          $data['all_students'] = $this->student_model->get_student_list();
          $this->load->view('admin_panel', $data);
     }
     public function view_student()
     {
     	$this->load->model('one_student_model'); 
        $data['one_student'] = $this->one_student_model->get_one_student();
        $this->load->view('view_student', $data);
     }
     public function edit_student()
     {
     	$this->load->model('one_student_model'); 
        $data['one_student'] = $this->one_student_model->get_one_student();
        $this->load->view('edit_student', $data);
     }
}