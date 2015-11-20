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
        $this->load->model('Users_model');
    }

    public function index() {
        $companies=$this->Company_model->read();
                /*$companies= array();

                for ($i =0;$i<30; $i++ ){
                $company['name']="Company_{$i}";
                $company['email']="a{$i}@a{$i}.a";
                $company['description']="Company_{$i}_description Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce tellus nibh, aliquam lobortis ligula sed, eleifend sodales est. Quisque accumsan nisi quis massa fermentum, quis finibus magna porttitor. Aliquam egestas justo vel lectus scelerisque volutpat. Nunc aliquet neque at elit faucibus, in pellentesque metus scelerisque. Sed tincidunt sagittis blandit. ";
                $company['contacts']="Company_{$i}_contacts";
                $companies[]=$company;
                }*/
		//$this->load->view('home_page');
                //$data['title'] = ucfirst($page); // Capitalize the first letter
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
        $company=$this->Company_model->getById($id);
        $this->load->view('companies_details', $company);
    }
    
    
    
}
