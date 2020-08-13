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
	<title>Add Money Page</title>
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
		<div class="bg-light jumbotron" style="transform: translate(0%,10%);position: unset;width: 80%;top: 42%;left: 42%;margin: auto;margin-top: 125px;height: 550px;">
			
			<div class="container">
				<?php if($this->session->flashdata("msg")){ ?>
					<div class="alert alert-success">
						<strong>Success !! </strong> <?php echo $this->session->flashdata("msg"); ?>	
					</div>
				<?php } ?>
				<div class="row">
					<div class="col-md-2">
						<small class="">PAYTM WALLET</small>
						<table>
							<tr>
								
								<td ><h6 class="rs"></h6></td>
								<td><h6 style="font-weight: 450;">&#8377;</h6></td>
							</tr>
						</table>
					</div>
					<div class="col-md-2 offset-md-8">
						<span class="font-weight-bold">TOTAL BALANCE</span>
						<table>
							<tr>
								
								<td ><h3 class="rs"></h3></td>
								<td><h3 style="font-weight: 450;">&#8377;</h3></td>
							</tr>
						</table>
							
						
						
					</div>
				</div>
				<div class="row">
					<hr style="border:-8px solid blue;height: 1px;width: 100%;">
				</div>
				<div class="row">
					<span class="text-uppercase font-weight-bold">Add Money To Paytm Wallet</span>
				</div>
				<form method="post" id="addRsFrm" action="<?php echo site_url("addMoneyCont/addMoney") ?>">
					<div class="row">
						
							<div class="col-md-4">
								<div class="input-group mt-3">
									
									<input type="text" name="t_amount" class="form-control" placeholder="Enter Amount">
									<div class="input-group-prepend">
										<span class="input-group-text">&#8377;</span>
									</div>
								</div>
								<span class="text-danger"><?php echo isset($err['t_amount'])?$err['t_amount']:""; ?></span>	
							</div>
							<div class="col-md-3 mt-3">
								<input type="submit" value="Add Money" class="btn btn-block btn-info">
							</div>
						
					</div>
				</form>
			</div>

			
		</div>
	</header>

	<div class="bg-ligh" style="width: 100%;height: 450px;background-color: #F7F0E4 ;"></div>

	

	<?php $this->load->view("script"); ?>
	<script>
		$(document).ready(function(){

			function getAllData(){
				$.ajax({
					url : "<?php echo site_url("addMoneyCont/getAllData") ?>",
					success : function(r){
						var data = $.parseJSON(r);
						console.log(data);
						$(".rs").html(data.data[0].u_balance);
					}
				});
			}

			getAllData();

			
		});
	</script>
</body>
</html>
