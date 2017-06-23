<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pages extends CI_Controller {


public function __construct(){
	parent:: __construct();
	$this->load->Model('Crud_model');
 }

	public function crud()
	{
		  $this->load->view('pages/crud');

	}

  public function postdata(){
		 print_r("Success");
	 	 $postdata=file_get_contents('php://input');
	   $_POST = json_decode($postdata);
		 $abc['abc']= $_POST;
     print_r($abc);
     $result = $this->Crud_model->postnames($abc);
		 return $result;

}

	public function getdata(){
		$result = $this->Crud_model->getnames();
    $data['info'] = $result;
		echo json_encode($data);
		return $data;


	}

	public function updatedata(){

		print_r("Success");
		$postdata=file_get_contents('php://input');
	  $_POST = json_decode($postdata);
		$abc['abc']= $_POST;
		print_r($abc);
	  $result = $this->Crud_model->updatenames($abc);
		return $result;
}

public function deletedata(){

	 print_r("Success");
	 $postdata=file_get_contents('php://input');
	 $_POST = json_decode($postdata);
	 $abc['abc']= $_POST;
   print_r($abc);
   $result = $this->Crud_model->deletenames($abc);
	 return $result;

 }

}
