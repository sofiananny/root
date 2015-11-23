<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Student_model extends CI_Model{
    public function get_student_list()
     {
     	$this->db->select('*');
		$this->db->from('workers');
		$this->db->join('worker_details', 'worker_details.student_id = workers.worker_id');
        $q = $this->db->get();
          return $q->result_array();
     }
    public function get_one_student()
     {
     	$this->db->select('*');
		$this->db->from('workers');
		$this->db->join('worker_details', 'worker_details.student_id = workers.worker_id');
		$this->db->where('worker_id', $_GET['id']);
        $q = $this->db->get();
          return $q->result_array();
     }
    public function update_student($id, $data)
     {
        $this->db->where('worker_id', $id);
        $this->db->update('workers', $data);
     }
    public function update_student2($id, $data2)
    {
        $this->db->where('student_id', $id);
        $this->db->update('worker_details', $data2);
    }
}