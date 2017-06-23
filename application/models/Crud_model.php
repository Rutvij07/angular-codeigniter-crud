<?php

class Crud_model extends CI_Model
{

  public function __construct(){

  }

  public function postnames($abc)
  {

    $firstname = $abc['abc']->firstname;
    $lastname = $abc['abc']->lastname;
    $email = $abc['abc']->email;

    $data = [
      'firstname' => $firstname,
      'lastname' => $lastname,
      'email' => $email
  ];

    $this->db->insert('info', $data);
  }

  public function getnames(){
    $this->db->select('id,firstname,lastname,email');
    $this->db->from('info');
    $query = $this->db->get();
    $result = $query->result();
    return ($result);
  }

   public function updatenames($abc)
   {

     $id = $abc['abc']->id;
     $firstname = $abc['abc']->firstname;
     $lastname = $abc['abc']->lastname;
     $email = $abc['abc']->email;

     $data = [
       'id'=> $id,
       'firstname' => $firstname,
       'lastname' => $lastname,
       'email' => $email
     ];
     $this->db->where('id',$id);
     $this->db->update('info',$data);
}
  public function deletenames($abc){

    $id = $abc['abc']->id;

    $data = [
       'id'=> $id
    ];
    $this->db->where('id',$id);
    $this->db->delete('info',$data);
  }
}
