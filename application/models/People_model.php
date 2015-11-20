<?php
class People_model extends CI_Model {
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function create($name, $lastname, $email, $description, $contacts, $role){
        if (!isset($name) || !isset($lastname) || !isset($email)) {
            return false;
        }

        $data=array(
            'name' => $name,
            'lastname' => $lastname,
            'email' => $email
        );
        if (isset($description)) {
            $data['description']=$description;
        }
        if (isset($contacts)) {
            $data['contacts']=$contacts;
        }
        if (isset($role)) {
            $data['role']=$role;
        }
        $this->db->insert('people', $data);
        return true;
    }

    public function read($name, $lastname, $email) {
        if (!isset($name) || !isset($lastname) || !isset($email)) {
            return false;
        }
        $query = $this->db->get_where('people', array('name' => $name, 'lastname' => $lastname, 'email' => $email));
        return $query->row_array();
    }

    public function update($name, $lastname, $email, $newEmail, $newDescription, $newContacts, $newRole){
        if (!isset($name) || !isset($lastname) || !isset($email)) {
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
        if (isset($newRole)) {
            $data['role']=$newRole;
        }
        $this->db->where('name', $name);
        $this->db->where('lastname', $lastname);
        $this->db->where('email', $email);
        $this->db->update('people', $data);
        return true;
    }

    public function delete($name, $lastname, $email) {
        if (!isset($name) || !isset($lastname) || !isset($email)) {
            return false;
        }
        $this->db->delete('people', array('name' => $name, 'lastname' => $lastname, 'email' => $email));
        return true;
    }
}