<?php 
	if(isset($this->form_validation)){
		$err = $this->form_validation->error_array();
	}
 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Login Page</title>
	<?php $this->load->view("head"); ?>
	<style>
		body{
			background-image: linear-gradient(rgba(0,0,0,0.4),rgba(0,0,0,0.4)),url("<?php echo base_url() ?>/paytm_template/img/b.jpg");
			background-size: cover;	
			background-position: center;
			background-repeat: no-repeat;
			height: 100vh;
			
		}
		#frm{
			border-bottom-left-radius: 100px;
			/*box-shadow: 5px 6px 5px #fff;*/
    		border-top-right-radius: 100px;
			background: transparent;
   			background-color: #fff;
    		background: transparent;
    		border: 2px solid #fff;
		}
		
	</style>
</head>
<body>
	<!-- start Navigation -->
	
	<!-- End Navigation -->

	
		<div class="container back-img">
			<div class="row justify-content-center">
				<div class="col-md-6 col-sm-4 ">
					<?php if($this->session->flashdata("msg")){ ?>
						<div class="alert alert-danger">
							<strong><?php echo $this->session->flashdata("msg"); ?></strong>
						</div>
					<?php } ?>

					<?php if($this->session->flashdata("msg1")){ ?>
						<div class="alert alert-danger">
							<strong><?php echo $this->session->flashdata("msg1"); ?></strong>
						</div>
					<?php } ?>
					<form method="post" class="shadow-lg p-4 mt-5 bg-secoudary" id="frm" action="<?php echo site_url("welcome/validation") ?>">
						<h3 class="text-light text-center">User Login </h3>
						<div class="form-group mt-3">
							<label class="text-light" for="mno">Phone No</label>
							<input type="text" name="u_phone" id="mno" class="form-control" placeholder="Enter User Email id" value="<?php if(isset($err)){ echo $this->input->post("u_phone") ; } ?>">

							<span class="text-danger"><?php echo isset($err['u_phone'])?$err['u_phone']:""; ?></span>
						</div>

						<div class="form-group">
							<label class="text-light" for="upass">Password</label>
							<input type="password" id="upass" name="u_password" class="form-control" placeholder="Enter User Password">
							<span class="text-danger"><?php echo isset($err['u_password'])?$err['u_password']:""; ?></span>
						</div>

						<div class="form-group">
							<input type="submit" value="Login" name="btn" class="btn btn-block btn-info">
						</div>

						<div class="form-group">
							<p class="text-light text-center">Don't have an account ? <a href="<?php echo site_url() ?>/userRegisterCont/">Register</a></p>
						</div>
					</form>
				</div>
			</div>
		</div>
	
	

	<?php $this->load->view("script"); ?>
</body>
</html>