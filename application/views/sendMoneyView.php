<!-- <?php 
	if(isset($this->form_validation)){
		$err = $this->form_validation->error_array();
	}
	
	// print_r($err);die;
 ?> -->
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Send Money Page</title>
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
					<span class="text-uppercase font-weight-bold font-italic">Send Money To Your Friends Wallet</span>
				</div>
				<div class="container">
					
					<div class="alert alert-danger">
						<strong id="msg"></strong>
					</div>

					<div class="alert alert-success">
						<strong id="msg1"></strong>
					</div>
				
					<div class="row justify-content-center">
						<div class="col-md-6">

							<!-- Check Phone No Form Start-->
							<form method="post" class="shadow-lg p-5" id="sendAmt">
								<h4 class="text-center text-dark">Send Money</h4>
								
								<div class="form-group mnoHide">
									<label>Enter Phone No </label>
									<input type="text" name="u_phone" data-validation="number" class="form-control" id="amt" placeholder="Enter Phone No">
									
								</div>
								<div class="form-group">
									
									<input type="submit" name="" class="btn  btn-block btn-success">
								</div>
							</form>	
							<!-- Check Phone No Form End-->

							<!-- Check Amount Form Start -->
							<form method="post" class="shadow-lg p-5" id="userdetail">
								<h4 class="text-center text-dark">Send Money</h4>
								<div class="form-group ">
									<label>Enter Amount</label>
										<div class="input-group mt-3">
											<input type="text" name="t_amount" data-validation="number" class="form-control" placeholder="Enter Amount">
											<div class="input-group-prepend">
												<span class="input-group-text">&#8377;</span>
											</div>
										</div>
										<!-- <span class="text-danger"><?php echo isset($err['t_amount'])?$err['t_amount']:""; ?></span>	 -->
								</div>
								<div class="form-group ">
									<label>Description</label>
									<textarea class="form-control" name="t_description"></textarea>
								</div>
								
								<div class="form-group">
									<input type="hidden" name="u_id" id="u_id" value="">
									<input type="submit" name="" class="btn  btn-block btn-success">
								</div>
							</form>
							<!-- Check Amount Form End -->
						</div>
					</div>
				</div>
			</div>

			
		</div>
	</header>

	<div class="bg-ligh" style="width: 100%;height: 650px;background-color: #F7F0E4 ;"></div>

	

	<?php $this->load->view("script"); ?>
	<script>
		$(document).ready(function(){
			
			$("#userdetail").hide();
			$(".alert-danger").hide();
			$(".alert-success").hide();

			$(function(){
				$.validate();
			});

			function getAllData(){
				$.ajax({
					url : "<?php echo site_url("addMoneyCont/getAllData") ?>",
					success : function(r){
						var data = $.parseJSON(r);
						console.log(data);
						$(".rs").text(data.data[0].u_balance);
					}
				});
			}
			getAllData();

			// check Phone No Start
			$("#sendAmt").submit(function(e){
				e.preventDefault();
				// console.log(e);

				$.ajax({
					url : "<?php echo site_url("sendMoneyCont/checkMno") ?>",
					type : "post",
					data : $("#sendAmt").serialize(),
					success : function(r){
						// console.log(r);
						var data = $.parseJSON(r);
						console.log(data);
						if(data.status==404){
							$("#userdetail").hide();
							$(".alert-danger").show();
							$("#msg").text(data.msg);
							$("#sendAmt").show();
						}else{
							$(".alert-danger").hide();
							$("#u_id").val(data.data.u_id);
							$("#sendAmt").hide();
							$("#userdetail").show();

						}
					}
				});
			});
			// check Phone No End



			// check Amount Start

				$("#userdetail").submit(function(e){
					e.preventDefault();
					$.ajax({
						url : "<?php echo site_url("sendMoneyCont/checkAmt") ?>",
						type : "post",
						data : $("#userdetail").serialize(),
						success : function(r){
							// console.log(r);
							var data = $.parseJSON(r);
							console.log(data);
							if(data.status == 404){
								$(".alert-danger").show();
								$("#msg").text(data.msg);
							}else{
								$(".alert-success").show();
								$("#msg1").text("Money Is Send Successfully....");
								getAllData();
							}
						}
					});
				})
			// check Amount End
						
		});
	</script>
</body>
</html>
