<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	function __construct(){
		parent :: __construct();
		$this->load->model("userRegisterModel","um");
		$this->load->model("addMoneyModel","am");
	}
	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		// echo base_url();
		$this->load->view('login.php');
	}

	public function validation()
	{
		$this->load->library("form_validation");
		$this->form_validation->set_rules("u_phone","User Phone No","required");
		$this->form_validation->set_rules("u_password","User Password","required");

		if(!$this->form_validation->run()){
			$this->load->view('login.php');
		}else{
			$login = array(
				"u_phone"=>$this->input->post("u_phone"),
				"u_password"=>md5($this->input->post("u_password"))
			);

			$l_data = $this->um->loginData($login);
			// print_r($l_data);die();
			if($l_data->num_rows() == 1){

				$loginData = $l_data->result();
				// echo "Done";
				$this->session->set_userdata("user_id",$loginData[0]->u_id);
				$this->session->set_userdata("user_name",$loginData[0]->u_name);
				redirect("welcome/home");
			}else{
				$this->session->set_flashdata("msg","Invalid Phone No Or Password");
				redirect("welcome/");
			}
		}
	}

	public function home()
	{
		$this->load->view("home.php");
	}

	public function logout()
	{
		$this->session->unset_userdata("user_id",$loginData[0]->u_id);
		$this->session->unset_userdata("user_name",$loginData[0]->u_name);
		redirect("welcome/");
	}
	public function pgRedirect(){
		$this->load->view("pgRedirect");
	}
	public function pgResponse(){
			if ($_POST["STATUS"] == "TXN_SUCCESS") {
				$data=array(
					"t_orderid"=>$this->input->post("ORDERID"),
					"t_amount"=>$this->input->post("TXNAMOUNT"),
					"t_date"=>date("y-m-d"),
					"u_to"=>$this->session->userdata("user_id")
				);
				
				$insert = $this->am->addRupees($data);


				$u_bln = array("u_id"=>$this->session->userdata("user_id"));
				
				$update_bln = $this->um->loginData($u_bln);
				
				$Data = $update_bln->result();
				
				$balance = $Data[0]->u_balance+$_POST['TXNAMOUNT'];

				$balance_data=array(
					"u_balance"=>$balance
				);
				
				$update = $this->am->updateBalance($this->session->userdata("user_id"),$balance_data);
				
				$this->session->set_flashdata("msg","Money Is Added To Your Wallet Successfully...");
				redirect("addMoneyCont/");
			}
		
		$this->load->view("pgResponse");
	}

	public function editProfile($id)
	{
		$select['title'] = "Edit Profile";
		$select['url'] = "welcome/updateProfile/$id";
		$select['editData'] = $this->um->editProfile($this->session->userdata("user_id"));
		$this->load->view("editProfileView",$select);
	}

	public function updateProfile($id)
	{
		$this->load->library("form_validation");
		$this->form_validation->set_rules("u_name","User Name","required");
		$this->form_validation->set_rules("u_email","User Email","required|valid_email");
		$this->form_validation->set_rules("u_phone","User Phone No","required|numeric");

		if(!$this->form_validation->run()){
			$select['title'] = "Edit Profile";
			$select['url'] = "welcome/updateProfile/$id";
			$select['editData'] = $this->um->editProfile($this->session->userdata("user_id"));
			$this->load->view("editProfileView",$select);
		}
	}

	public function changedPass()
	{
		$select['title'] = "Changed Password";
		$select['url'] = "welcome/changedPassword";
		$this->load->view("changedPasswordView",$select);
	}

	public function changedPassword()
	{
		$this->load->library("form_validation");
		$this->form_validation->set_rules("o_pass","Old Password","required");
		$this->form_validation->set_rules("n_pass","New Password","required");
		$this->form_validation->set_rules("rn_pass","Re-Enter New Password","required|matches[n_pass]");

		if(!$this->form_validation->run()){
			$select['title'] = "Changed Password";
			$select['url'] = "welcome/changedPassword";
			$this->load->view("changedPasswordView",$select);
		}else{
			$data = array("u_id"=>$this->session->userdata("user_id"));

			$getData = $this->um->getPassword($data);

			if(md5($this->input->post("o_pass"))!=$getData[0]->u_password){
				$select['title'] = "Changed Password";
				$select['url'] = "welcome/changedPassword";
				$select['old_pass'] = "Old Password Cannot Match...";
				$this->load->view("changedPasswordView",$select);
			}else{
				$updPass = array("u_password"=>md5($this->input->post("n_pass")));
				$this->um->updatePassword($data,$updPass);
				$this->session->set_flashdata("msg1","User Password Reset Successfully...");
				redirect("welcome/");
			}
		}
	}
}
