<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class student_model extends CI_Model{

    public function get_student_list()
     {
		$this->db->from('workers');
		$this->db->join('worker_details', 'worker_details.student_id = workers.worker_id');
        $this->db->order_by('first_name', 'asc');
        $this->db->where('role','worker');
        $this->db->where('date_deleted', NULL);
        $q = $this->db->get();
          return $q->result_array();
     }
    public function get_one_student()
     {
		$this->db->from('workers');
		$this->db->join('worker_details', 'worker_details.student_id = workers.worker_id');
		$this->db->where('worker_id', $_GET['id']);
        $q = $this->db->get();
          return $q->row_array();
     }
     public function edit_student()
     {
        $this->load->helper('form');
        $this->load->model('student_model');
        $data['one_student']= $this->load->student_model->get_one_student();
        $this->load->view('edit_student', $data);
     }
    public function update_student()
     {
        $id = $this->input->post('worker_id');
        $data = array(
        'first_name' => $this->input->post('first_name'),
        'last_name' => $this->input->post('last_name'),
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
        $this->db->where('worker_id', $id);
        $this->db->update('workers', $data);
        $this->db->where('student_id', $id);
        $this->db->update('worker_details', $data2);
          
     }
     public function insert_student()
     {
        $data = array(
            'first_name' => $this->input->post('first_name'),
            'last_name' => $this->input->post('last_name'),
            'worker_email' => $this->input->post('worker_email'),
            'worker_pass' => $this->input->post('worker_pass'),
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
        $this->db->insert('workers', $data);
        $this->db->insert('worker_details', $data2);
        return redirect('student');   
     }
     public function delete_student()
     {
        $student_id=$this->input->get('id');
        $now = date('Y-m-d');
        $data=array('date_deleted' => $now);
        $this->db->where('worker_id', $student_id);
        return $this->db->update('workers', $data);
     }
}