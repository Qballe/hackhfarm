<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		//$this->load->view('home_page');
                //$data['title'] = ucfirst($page); // Capitalize the first letter
                $data['first_button_text'] = "Companies";
                $data['second_button_text'] = "People";
                $data['title'] = "Home Page";
                $this->load->view('templates/topbar');
                $this->load->view('templates/header',$data);
                $this->load->view('home_page');
                $this->load->view('templates/footer',$data);
                
                
	}
}
