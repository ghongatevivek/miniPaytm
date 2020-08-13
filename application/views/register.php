<?php 
	if(isset($this->form_validation)){
		$err = $this->form_validation->error_array();
		// print_r($err);
	}
 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Register Page</title>
	<?php $this->load->view("head.php");?>
	<style>
		body{
			background-image: linear-gradient(rgba(0,0,0,0.4),rgba(0,0,0,0.4)),url("<?php echo base_url()?>paytm_template/img/b.jpg");
			background-size: cover;
			background-position: center;
			background-repeat: no-repeat;
			height: 100vh;		
		}
		#frm{
			border-bottom-left-radius: 100px;
			
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

	<header class="jumbotro">
		<div class="container mt-5">
			
		<div class="row justify-content-center">
			<div class="col-md-6 col-sm-4">
				<?php if($this->session->flashdata("msg")){ ?>
					<div class="alert alert-success">
						<strong>Success !!</strong><?php echo $this->session->flashdata("msg"); ?>
					</div>
				<?php } ?>
				<form method="post" class="shadow-lg p-3 mt-5" id="frm" action="<?php echo site_url("userRegisterCont/validation") ?>">
					<h2 class="text-light text-center">User Register</h2>
					<div class="form-group mt-3">
						<label class="text-light" for="uname">Username</label>
						<input type="text" id="uname" name="u_name" class="form-control" placeholder="Enter User Name">
						<span class="text-danger"><?php echo isset($err['u_name'])?$err['u_name']:""; ?></span>
					</div>

					<div class="form-group">
						<label class="text-light" for="mno">Phone No</label>
						<input type="text" id="mno" name="u_phone" class="form-control" placeholder="Enter Phone No">
						<span class="text-danger"><?php echo isset($err['u_phone'])?$err['u_phone']:""; ?></span>
					</div>

					<div class="form-group">
						<label class="text-light" for="email">Email Id</label>
						<input type="text" id="email" name="u_email" class="form-control" placeholder="Enter Email Id">
						<span class="text-danger"><?php echo isset($err['u_email'])?$err['u_email']:""; ?></span>
					</div>

					<div class="form-group">
						<label class="text-light" for="pass">Password</label>
						<input type="text" id="pass" name="u_password" class="form-control" placeholder="Enter Password">
						<span class="text-danger"><?php echo isset($err['u_password'])?$err['u_password']:""; ?></span>
					</div>

					<div class="form-group">
						<input type="submit" name="btn" class="btn btn-block btn-info">
					</div>

					<div class="form-group">
						<p class="text-light text-center">I have an account.. <a href="<?php echo site_url()?>/welcome/">Login</a></p>
					</div>
				</form>
			</div>
		</div>
	</div>

	</header>

	

	<?php $this->load->view("script"); ?>
</body>
</html>