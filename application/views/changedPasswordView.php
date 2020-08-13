<?php 
	if(isset($this->form_validation)){
		$err = $this->form_validation->error_array();
	}

	if(isset($old_pass)){
		$err['o_pass'] = $old_pass;
	}
	
	// print_r($err);die;
 ?> 
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Changed Password Page</title>
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
									<label>Old Password</label>
									<input type="Password" name="o_pass" class="form-control" >
									<span class="text-danger"><?php echo isset($err['o_pass'])?$err['o_pass']:""; ?></span>	
								</div>
								<div class="form-group mnoHide">
									<label>New Password</label>
									<input type="Password" name="n_pass" class="form-control" >
									<span class="text-danger"><?php echo isset($err['n_pass'])?$err['n_pass']:""; ?></span>	
								</div>
								<div class="form-group mnoHide">
									<label>Re-Enter New Password</label>
									<input type="Password" name="rn_pass" class="form-control" >
									<span class="text-danger"><?php echo isset($err['rn_pass'])?$err['rn_pass']:""; ?></span>	
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
