<?php
defined('BASEPATH') OR exit('No direct script access allowed');


/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Companies
 *
 * @author fabioros
 */
class Companies extends CI_Controller{
    public function __construct() {
        parent::__construct();
        $this->load->model('Companies_model');
    }

    public function index() {
        $companies=$this->Companies_model->read();

        $data['first_button_text'] = "List view";
        $data['second_button_text'] = "Map view";
        $data['companies'] = $companies;
        $data['title']="Companies";

        $this->load->view('templates/topbar',$data);
        $this->load->view('templates/header');
        $this->load->view('companies', $companies);
                #//$this->load->view('home_page');
        $this->load->view('templates/footer',$data);
	}

    public function details($id) {
        $company=$this->Companies_model->getById($id);
        $this->load->view('companies_details', $company);
    }



}
