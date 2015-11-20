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

    $query = $this->db->get();
    return $query->result_array();
	}

	public function by_person($terms){
    $this->db->select('people.*');
    //$this->db->select('companies.name AS company_name, companies.id AS company_id');
    $this->db->from('people');
    //$this->db->join('roles', 'roles.person_id = people.id', 'left');
    //$this->db->join('companies', 'companies.id = roles.company_id', 'left');
    $this->db->like('name', $terms);
    $this->db->or_like('description', $terms);

    $query = $this->db->get();
    return $query->result_array();
	}

	public function by_skill($terms){
    $this->db->select('*');
    $this->db->from('skills');
    $this->db->like('name', $terms);
    $this->db->or_like('description', $terms);

    $query = $this->db->get();
    return $query->result_array();
	}

	public function all($terms){
		return [
			'companies' => $this->by_company($terms),
			'people' => $this->by_person($terms),
			'skills' => $this->by_skill($terms),
		];
	}
}
