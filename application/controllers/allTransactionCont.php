<?php 

	class allTransactionCont extends CI_Controller
	{
		
		function __construct()
		{
			parent ::__construct();
			$this->load->model("allTransactionModel","atm");
		}

		public function index()
		{
			$select['select']=$this->atm->getData($this->session->userdata("user_id"));
			// print_r($select['select']);die;
			$this->load->view("allTransactionView",$select);
		}
	}
 ?>