<?php 
	if(isset($this->form_validation)){
		$err = $this->form_validation->error_array();
	}
	
	// print_r($err);die;
 ?> 
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Edit Profile Page</title>
	<?php $this->load->view("head"); ?>
	<style>
		
	</style>
</head>
<body>
	<!-- start Navigation -->
	<?php $this->load->view("topbar"); ?>
	<!-- End Navigation -->

	<header  style="margin: auto;
	background-color: #012b72;
    width: 100%;
    margin-top: -53px;
    height: 200px;">
		<div class="bg-light jumbotron" style="transform: translate(0%,10%);position: unset;width: 80%;top: 42%;left: 42%;margin: auto;margin-top: 125px;height: 750px;">
			
			<div class="container">
				
				
				
				
				<div class="container">
					
					
					<div class="row justify-content-center">
						<div class="col-md-6">
							<form method="post" class="shadow-lg p-5 " action="<?php echo site_url($url); ?>">
								<h4 class="text-center text-dark h3"><?php echo $title; ?></h4>
								
								<div class="form-group mnoHide">
									<label>User Name</label>
									<input type="text" name="u_name" class="form-control" value="<?php if(isset($err)){echo $this->input->post("u_name");}elseif(isset($editData)){ echo $editData[0]->u_name ;} ?>">
									<span class="text-danger"><?php echo isset($err['u_name'])?$err['u_name']:""; ?></span>	
								</div>
								<div class="form-group mnoHide">
									<label>User Email</label>
									<input type="text" name="u_email" class="form-control" value="<?php if(isset($err)){echo $this->input->post("u_email");}elseif(isset($editData)){ echo $editData[0]->u_email ;} ?>">
									<span class="text-danger"><?php echo isset($err['u_email'])?$err['u_email']:""; ?></span>	
								</div>
								<div class="form-group mnoHide">
									<label>User Phone No</label>
									<input type="text" name="u_phone" class="form-control" value="<?php if(isset($err)){echo $this->input->post("u_phone");}elseif(isset($editData)){ echo $editData[0]->u_phone ;} ?>">
									<span class="text-danger"><?php echo isset($err['u_phone'])?$err['u_phone']:""; ?></span>	
								</div>
								<div class="form-group">
									<input type="submit" name="" class="btn  btn-block btn-success">
								</div>
							</form>	
							
						</div>
					</div>
				</div>
			</div>

			
		</div>
	</header>

	<div class="bg-ligh" style="width: 100%;height: 650px;background-color: #F7F0E4 ;"></div>

	

	<?php $this->load->view("script"); ?>
	
</body>
</html>
