<?php 
	
	class sendMoneyCont extends CI_Controller
	{
		
		function __construct()
		{
			parent ::__construct();
			$this->load->model("sendMoneyModel","sm");
		}

		public function index()
		{
			$this->load->view("sendMoneyView");
		}

		public function checkMno()
		{
			$data = array("u_phone"=>$this->input->post("u_phone"));

			$getDetails = $this->sm->getPhoneNo($data);
			
		
			if(count($getDetails)>0){
				if($getDetails[0]->u_id == $this->session->userdata("user_id")){
					$ar=array("status"=>404,"msg"=>"Tu Tuze Hi Paise Nahi Bhej Sakta");
				}else{
					$ar=array("status"=>200,"data"=>$getDetails[0]);
				}
				
			}else{
				$ar=array("status"=>404,"msg"=>"Phone no not Found..  Please enter right no");
			}
			echo json_encode($ar);
		}
		
		public function checkAmt()
		{
			
			$data = array("u_id"=>$this->session->userdata("user_id"));

			$getUserDetails = $this->sm->getPhoneNo($data);
			
			$id = $this->input->post("u_id");


			if($this->input->post("t_amount") <= $getUserDetails[0]->u_balance){
				
				$phone_data = array("u_id"=>$id);
				
				$phoneData = $this->sm->getPhoneNo($phone_data);
				
				$upd_bln = $phoneData[0]->u_balance+$this->input->post("t_amount");

				
				$u_balance = array("u_balance"=>$upd_bln);

				$update = $this->sm->updateBalance($id,$u_balance);

				$upd_frombln = $getUserDetails[0]->u_balance-$this->input->post("t_amount");

				$uFrom_bln = array("u_balance"=>$upd_frombln);

				$updateFrom_bln = $this->sm->updateBalance($this->session->userdata("user_id"),$uFrom_bln);

				$ar = array("status"=>200,"data"=>$getUserDetails);

				$add_transfer = array(
					"t_amount"=>$this->input->post("t_amount"),
					"t_description"=>$this->input->post("t_description"),
					"t_date"=>date("y-m-d"),
					"u_from"=>$this->session->userdata("user_id"),
					"u_to"=>$id
				);

				$insert = $this->sm->addTransferData($add_transfer);
			}else{
			 	 $ar = array("status"=>404,"msg"=>"Please Enter Valid Amt");

			 }

			echo json_encode($ar);
		}
	}
 ?>


