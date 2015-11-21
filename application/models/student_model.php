<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Student_model extends CI_Model{
     public function get_student_list()
     {
          $q = $this->db->get('workers');
          return $q->result_array();
     }
}