<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 20/11/15
 * Time: 14.32
 */

class Users extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('Users_model');
    }

    public function index() {
        $users=$this->Users_model->read();
        $data['users']=$users;
        $data['first_button_text'] = "List view";
        $data['second_button_text'] = "Map view";
        $data['title']="Users";

        $this->load->view('templates/topbar',$data);
        $this->load->view('templates/header');
        $this->load->view('users', $users);
        $this->load->view('templates/footer',$data);

    }

    public function details($id) {
        $user=$this->Users_model->getById($id);
        $this->load->view('users_details', $user);
    }
}