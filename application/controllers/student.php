<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 class Student extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model('student_model');
    }
     public function index()
     {
          $this->load->model('student_model'); 
          $data['all_students'] = $this->student_model->get_student_list();
          $this->load->view('admin_panel', $data);
     }
     public function view_student()
     {
        $this->load->helper('file');
     	$this->load->model('student_model'); 
        $data['one_student'] = $this->student_model->get_one_student();
        $this->load->view('view_student', $data);
     }
     public function edit_student()
     {
        $this->load->helper('file');
        $this->load->helper('form');
     	$this->load->model('student_model'); 
        $data['one_student'] = $this->student_model->get_one_student();
        $this->load->view('edit_student', $data);
     }
     public function update_student()
     {  
        $this->load->helper('file');
        $this->load->helper('form');
        /*$this->load->library('form_validation');
        $this->form_validation->set_rules('first_name', 'First Name', 'trim|required');
        $this->form_validation->set_rules('last_name', 'Last Name', 'trim|required');
        $this->form_validation->set_rules('worker_email', 'E-Mail', 'trim|required');
        $this->form_validation->set_rules('worker_pass', 'Password', 'trim|required');
        $this->form_validation->set_rules('role', 'Worker Role', 'trim|required');
        $this->form_validation->set_rules('sex', 'Sex', 'trim|required');
        $this->form_validation->set_rules('phone', 'Phone', 'trim|required|is_natural');
        $this->form_validation->set_rules('university', 'University', 'trim|required');
        $this->form_validation->set_rules('speciality', 'Speciality', 'trim|required');
        $this->form_validation->set_rules('smoker', 'Smoker', 'trim|required');
        $this->form_validation->set_rules('about', 'About', 'trim|required');
        $this->form_validation->set_rules('interests1', 'Interest 1', 'required');
        $this->form_validation->set_rules('interests2', 'Interest 2', 'required');
        $this->form_validation->set_rules('interests3', 'Interest 3', 'required');
        $this->form_validation->set_rules('interests4', 'Interest 4', 'required');
        $this->form_validation->set_rules('address1', 'Address for pickup 1', 'required');
        $this->form_validation->set_rules('address2', 'Address for pickup 2', 'required');
        if ($this->form_validation->run() == FALSE)
                {
                        $this->load->view('edit_student');
                }
                else
                {*/
                    $this->load->model('student_model');
                    $this->student_model->update_student();
                    $this->do_upload();
                    $this->output->enable_profiler(TRUE);
                    //redirect('student'); 
               /* }*/
       
     }
    public function add_student()
    {
        $this->load->helper('file');
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->view('add_student');
    }
    public function insert_student()
    {
        $this->load->helper('file');
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->form_validation->set_rules('first_name', 'First Name', 'trim|required');
        $this->form_validation->set_rules('last_name', 'Last Name', 'trim|required');
        $this->form_validation->set_rules('worker_email', 'E-Mail', 'trim|required');
        $this->form_validation->set_rules('worker_pass', 'Password', 'trim|required');
        $this->form_validation->set_rules('role', 'Worker Role', 'trim|required');
        $this->form_validation->set_rules('sex', 'Sex', 'trim|required');
        $this->form_validation->set_rules('phone', 'Phone', 'trim|required|is_natural');
        $this->form_validation->set_rules('university', 'University', 'trim|required');
        $this->form_validation->set_rules('speciality', 'Speciality', 'trim|required');
        $this->form_validation->set_rules('smoker', 'Smoker', 'trim|required');
        $this->form_validation->set_rules('about', 'About', 'trim|required');
        $this->form_validation->set_rules('interests1', 'Interest 1', 'required');
        $this->form_validation->set_rules('interests2', 'Interest 2', 'required');
        $this->form_validation->set_rules('interests3', 'Interest 3', 'required');
        $this->form_validation->set_rules('interests4', 'Interest 4', 'required');
        $this->form_validation->set_rules('address1', 'Address for pickup 1', 'required');
        $this->form_validation->set_rules('address2', 'Address for pickup 2', 'required');
        if ($this->form_validation->run() == FALSE)
                {
                        $this->load->view('add_student');
                }
                else
                {
                    $this->load->model('student_model');
                    $this->student_model->insert_student(); 
                }
    }
    public function delete_student()
    {  
        $this->load->model('student_model');
        $this->student_model->delete_student();
        redirect('student');
    }
    public function do_upload()
        {
                $config['upload_path']          = './uploads/';
                $config['allowed_types']        = 'gif|jpg|jpeg|png';
                //$config['max_size']             = 500;
                //$config['max_width']            = 1024;
                //$config['max_height']           = 768;

                $this->load->library('upload', $config);

                if ( ! $this->upload->do_upload('upload'))
                {
                        $error = array('error' => $this->upload->display_errors());
                        print_r($error);
                        //$this->load->view('edit_student', $error);
                }
                else
                {
                        $data = array('upload_data' => $this->upload->data());
                        $upload_data = $this->upload->data();
                        $file_name = $upload_data['file_name'];
                        $this->load->model('student_model');
                        $this->student_model->update_student($file_name);
                        $this->student_model->insert_student($file_name);
                }
        }
}
?>
