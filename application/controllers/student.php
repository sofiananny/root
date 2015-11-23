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
     	$this->load->model('student_model'); 
        $data['one_student'] = $this->student_model->get_one_student();
        $this->load->view('view_student', $data);
     }
     public function edit_student()
     {
     	$this->load->model('student_model'); 
        $data['one_student'] = $this->student_model->get_one_student();
        $this->load->view('edit_student', $data);
     }
     public function update_student()
     {
        $id=$this->input->post('id');
        $data = array(
        'worker_name' => $this->input->post('worker_name'),
        'worker_email' => $this->input->post('worker_email'),
        'role' => $this->input->post('role'));
        $data2 = array(
        'phone' => $this->input->post('phone'),
        'date_of_birth' => $this->input->post('date_of_birth'),
        'sex' => $this->input->post('sex'),
        'university' => $this->input->post('university'),
        'speciality' => $this->input->post('speciality'),
        'smoker' => $this->input->post('smoker'),
        'alergies' => $this->input->post('alergies'),
        'alergies_specific' => $this->input->post('alergies_specific'),
        'about' => $this->input->post('about'),
        'interests1' => $this->input->post('interests1'),
        'interests2' => $this->input->post('interests2'),
        'interests3' => $this->input->post('interests3'),
        'interests4' => $this->input->post('interests4'),
        'idcard_address' => $this->input->post('idcard_address'),
        'current_address' => $this->input->post('current_address'),
        'address1' => $this->input->post('address1'),
        'address2' => $this->input->post('address2'),
        'em_contact_name' => $this->input->post('em_contact_name'),
        'em_telephone' => $this->input->post('em_telephone'),
        'em_email' => $this->input->post('em_email'),
        'em_connection' => $this->input->post('em_connection'),
        'em_address' => $this->input->post('em_address'),
        'avg_score' => $this->input->post('avg_score'),
        'recommended_by' => $this->input->post('recommended_by'),
        'recruitment_score' => $this->input->post('recruitment_score')
        );
        $this->student_model->update_student($id, $data);
        $this->student_model->update_student2($id, $data2);
     }
     public function add_student()
     {
        $this->load->view('add_student');
     }
}
