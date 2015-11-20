<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Search extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->database();
		$this->load->model('Search_model');
		$this->load->model('Companies_model');
		$this->load->model('Users_model');
	}

	public function by_company() {
		$terms = $this->input->get('terms', TRUE);

		$companies = array();

		if ($terms)
			$companies = $this->Search_model->by_company($terms);
		else
			$companies = $this->Companies_model->read();

    $data['companies'] = $companies;
    $data['title'] = "Companies";
    $data['first_button_text'] = "List view";
    $data['second_button_text'] = "Map view";

    $this->load->view('templates/topbar', $data);
    $this->load->view('templates/header');
    $this->load->view('companies', $companies);
    $this->load->view('templates/footer', $data);
	}

	public function by_person() {
		$terms = $this->input->get('terms', TRUE);

		$users = array();

		if ($terms)
			$users = $this->Search_model->by_company($terms);
		else
			$users = $this->Companies_model->read();

		$users = $this->Search_model->by_user($terms);
    $data['users'] = $users;
    $data['title'] = "Users";
    $data['first_button_text'] = "List view";
    $data['second_button_text'] = "Map view";

    $this->load->view('templates/topbar', $data);
    $this->load->view('templates/header');
    $this->load->view('users', $users);
    $this->load->view('templates/footer', $data);
	}

	public function by_skill() {
		$terms = $this->input->get('terms', TRUE);

		$skills = array();

		if ($terms)
			$skills = $this->Search_model->by_company($terms);
		else
			$skills = $this->Companies_model->read();

		$skills = $this->Search_model->by_skill($terms);
    $data['skills'] = $skills;
    $data['title'] = "Skills";
    $data['first_button_text'] = "List view";
    $data['second_button_text'] = "Map view";

    $this->load->view('templates/topbar', $data);
    $this->load->view('templates/header');
    $this->load->view('skills', $skills);
    $this->load->view('templates/footer', $data);
	}
}
