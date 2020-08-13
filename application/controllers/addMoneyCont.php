<?php 
	
	class addMoneyCont extends CI_Controller
	{
		
		function __construct()
		{
			parent :: __construct();
			$this->load->model("addMoneyModel","am");
		}

		public function index()
		{
			$this->load->view("addMoneyView");
		}

		public function getAllData()
		{
			$select = $this->am->getAllData($this->session->userdata("user_id"));
			echo json_encode(array("data"=>$select));
		}

		public function addMoney()
		{
			$this->load->library("form_validation");
			$this->form_validation->set_rules("t_amount","Amount","required");
			if(!$this->form_validation->run()){
				$this->load->view("addMoneyView");
			}else{
				$select['_p']=$_POST;
				$this->load->view("txntest",$select);
			}
			
		}

		public function addRupees()
		{
			$data=array(
				"t_orderid"=>$this->input->post("ORDERID"),
				"t_amount"=>$this->input->post("TXNAMOUNT"),
				"t_date"=>date("y-m-d"),
				"u_to"=>$this->session->userdata("user_id")
			);
		
			 $this->am->addRupees($data);

			$this->session->set_flashdata("msg","Money Is Added To Your Wallet Successfully...");
			redirect("addMoneyCont/");
		}
	}
 ?>