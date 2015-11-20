<?php
class Coffees_model extends CI_Model {
    public function __construct() {
      parent::__construct();
      $this->load->database();
    }

    public function register($user1, $user2){
      $data = array(
        'user_1' => $user1,
        'user_2' => $user2
      );

      return $this->db->insert('coffees', $data);
    }
}