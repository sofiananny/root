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
}