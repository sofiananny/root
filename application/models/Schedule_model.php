<?php
/**
 * Description of Schedule_model
 *
 * @author User
 */
class Schedule_model extends CI_Model {
  function remove_periods($db_data){ // Премахва периодите на текущя потребител за текущия и следващи месеци
    $this->db->delete('schedules',$db_data);
  }

  function save_periods($db_data){
    $this->db->insert_batch('schedules',$db_data);
  }

  function read_periods(){
    $this->db->where('schedule_date >=', date('Y-m').'-01');
    $this->db->where('worker_id', $_SESSION['worker_id']);
    $query=$this->db->get('schedules');

    $periods=array();
    $arr = $query->result_array();
    foreach ($arr as $row){
      $periods['address_'.$row['schedule_date']] = $row['address'];
      $periods["begin_".$row['schedule_date']."_".substr($row['begin_hour'],0,5)]=
               ((strtotime($row['end_hour'])-strtotime($row['begin_hour']))/1800)."_".
               substr($row['begin_hour'],0,5).' ÷ '.substr($row['end_hour'],0,5);
      $periods["end_".$row['schedule_date']."_".substr($row['end_hour'],0,5)]='';
    }
    return $periods;
  }
}
