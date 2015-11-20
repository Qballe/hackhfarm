<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 20/11/15
 * Time: 12.25
 */

class Users_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function create($name, $lastname, $email, $description, $contacts, $role){
        if (!isset($name) || !isset($lastname) || !isset($email)) {
            return false;
        }

        $data1=array(
            'first_name' => $name,
            'last_name' => $lastname,
            'email' => $email
        );
        $data2=array();
        if (isset($description)) {
            $data2['description']=$description;
        }
        if (isset($contacts)) {
            $data2['contacts']=$contacts;
        }
        if (isset($role)) {
            $data2['role']=$role;
        }
        $this->db->insert('users', $data1);
        $query1 = $this->db->get_where('users', array('first_name' => $name, 'last_name' => $lastname, 'email' => $email));
        $result1=$query1->row_array();
        $id=$result1['id'];

        $data2['user']=$id;

        $this->db->insert('users_details', $data2);
        return true;
    }

    public function read() {
        $query1 = $this->db->get('users');
        $result1=$query1->result();
        $result=array();
        foreach ($result1 as $row)
        {
            $id=$row->id;
            $query2=$this->db->get_where('users_details', array('user_id' => $id));
            $result2=$query2->row_array();
            array_push($result, array_merge((array)$row, $result2) );
        }
        return $result;
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
        $query1 = $this->db->get_where('users', array('first_name' => $name, 'last_name' => $lastname, 'email' => $email));
        $result1=$query1->row_array();
        $id=$result1['id'];

        $this->db->where('user_id', $id);
        $this->db->update('users_details', $data);
        return true;
    }

    public function delete($name, $lastname, $email) {
        if (!isset($name) || !isset($lastname) || !isset($email)) {
            return false;
        }
        $query1 = $this->db->get_where('users', array('first_name' => $name, 'last_name' => $lastname, 'email' => $email));
        $result1=$query1->row_array();
        $id=$result1['id'];

        $this->db->delete('users_details', array('user_id' => $id));
        $this->db->delete('users', array('first_name' => $name, 'last_name' => $lastname, 'email' => $email));
        return true;
    }

    public function getById($id) {
        if (!isset($id)) {
            return false;
        }
        $query1 = $this->db->get_where('users', array('id' => $id));
        $result1=$query1->row_array();

        $query2=$this->db->get_where('users_details', array('user_id' => $id));
        $result2=$query2->row_array();

        return array_merge($result1, $result2);
    }
}