<?php 
	
	class userRegisterCont extends CI_Controller
	{
		
		function __construct()
		{
			parent :: __construct();
			$this->load->model("userRegisterModel","um");
		}

		public function index()
		{
			$this->load->view("register.php");
		}

		public function validation()
		{
			$this->load->library("form_validation");

			$this->form_validation->set_rules("u_name","User Name","required");
			$this->form_validation->set_rules("u_phone","User Phone No","required|numeric|is_unique[tbl_user.u_phone]|min_length[10]|max_length[10]");
			$this->form_validation->set_rules("u_email","User Email","required");
			$this->form_validation->set_rules("u_password","User Password","required");
			
			if(!$this->form_validation->run()){
				$this->load->view("register.php");
			}else{
				$insert = array(
					"u_name"=>$this->input->post("u_name"),
					"u_phone"=>$this->input->post("u_phone"),
					"u_email"=>$this->input->post("u_email"),
					"u_balance"=>0,
					"u_password"=>md5($this->input->post("u_password"))
				);

				$addData = $this->um->addData($insert);

				$this->session->set_flashdata("msg","Registration Done... Now You Can Login");
				redirect("userRegisterCont/");
			}
		}
	}
 ?>