<?php
class Notifications_model extends CI_Model {
  public function __construct() {
    parent::__construct();
    $this->load->database();
  }

  public function all($user_id){
    $this->db->select('*');

    $query = $this->db->get_where('notifications', array('user_id' => $user_id));

    return $query->row_array();
  }

  public function check($user_id){
    return count($this->to_read($user_id)) > 0;
  }

  public function to_read($user_id){
    $query = $this->db->get_where('notifications', array('user_id' => $user_id, 'readed' => 0));

    return $query->row_array();
  }

  public function push($user_id, $type, $message = ''){
    $data = array(
      'user_id' => $user_id,
      'type' => $type,
      'message' => $message
    );

    return $this->db->insert('coffees', $data);
  }

  public function read($notification_id){
    $data = array('readed' => 1);
    $this->db->where('id', $notification_id);
    return $this->db->update('notifications', $data);
  }
}