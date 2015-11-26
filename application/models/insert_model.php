<?php
class insert_model extends CI_Model{
function __construct() {
parent::__construct();
}
function form_insert($data, $data2){
// Inserting in Table(students) of Database(college)
$this->db->insert('workers', $data);
$this->db->insert('worker_details', $data2);
}
}
?>