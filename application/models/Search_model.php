<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Search_model extends CI_Model {
	public function __construct() {
		parent::__construct();
		$this->load->database();
	}

	public function by_company($terms){
    $this->db->select('companies.*');
    //$this->db->select('people.name AS person_name, people.id AS person_id');
    $this->db->from('companies');
    //$this->db->join('roles', 'roles.company_id = companies.id', 'left');
    //$this->db->join('people', 'people.id = roles.person_id', 'left');
    $this->db->like('name', $terms);
    $this->db->or_like('description', $terms);
    $this->db->or_like('email', $terms);
    $this->db->or_like('contacts', $terms);

    $query = $this->db->get();
    return $query->result();
	}

	public function by_user($terms){
    $this->db->select('users.*');
    //$this->db->select('companies.name AS company_name, companies.id AS company_id');
    $this->db->from('users');
    //$this->db->join('roles', 'roles.person_id = users.id', 'left');
    //$this->db->join('companies', 'companies.id = roles.company_id', 'left');
    $this->db->like('first_name', $terms);
    $this->db->or_like('last_name', $terms);
    $this->db->or_like('email', $terms);

    $query = $this->db->get();

	  $result1 = $query->result();
	  $result = array();

	  foreach ($result1 as $row) {
	      $id = $row->id;
	      $query2=$this->db->get_where('users_details', array('user_id' => $id));
	      $result2=$query2->row_array();

	      array_push($result, array_merge((array)$row, $result2) );
	  }

	  return (object)$result;
	}

	public function by_skill($terms){
    $this->db->select('*');
    $this->db->from('skills');
    $this->db->like('name', $terms);
    $this->db->or_like('description', $terms);

    $query = $this->db->get();
    return $query->result();
	}

	public function all($terms){
		return array(
			'companies' => $this->by_company($terms),
			'people' => $this->by_user($terms),
			'skills' => $this->by_skill($terms),
		);
	}
}
