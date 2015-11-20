<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 20/11/15
 * Time: 12.25
 */

class Companies_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function create($name, $email, $description, $contacts){
        if (!isset($name) || !isset($email)) {
            return false;
        }
        else {
            $data=array(
                'name' => $name,
                'email' => $email
            );
            if (isset($description)) {
                $data['description']=$description;
            }
            if (isset($contacts)) {
                $data['contacts']=$contacts;
            }
        }
        $this->db->insert('companies', $data);
        return true;
    }

    public function read($name) {
        if (!isset($name) ) {
            return false;
        }
        $query = $this->db->get_where('companies', array('name' => $name));
        return $query->row_array();
    }

    public function update($name, $newEmail, $newDescription, $newContacts){
        if (!isset($name)) {
            return false;
        }
        $data=array();
        if (isset($newEmail)) {
            $data['email']=$newEmail;
        }
        if (isset($newDescription)) {
            $data['description']=$newDescription;
        }
        if (isset($newContacts)) {
            $data['contacts']=$newContacts;
        }
        $this->db->where('name', $name);
        $this->db->update('companies', $data);
        return true;
    }

    public function delete($name) {
        if (!isset($name)) {
            return false;
        }
        $this->db->delete('companies', array('name' => $name));
        return true;
    }
}