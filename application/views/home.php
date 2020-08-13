<?php	
	if(!$this->session->userdata("user_id")){
		redirect("welcome/");
	}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Home Page</title>
	<?php $this->load->view("head"); ?>
	<style>
		#photo{
			background-image:url("<?php echo base_url() ?>/paytm_template/img/home3.jpg");
			background-size: cover;
			background-position: center;
			background-repeat: no-repeat;
			height: 100vh;
			
		}
		
	</style>
</head>
<body>
	<!-- start Navigation -->
		<?php $this->load->view("topbar"); ?>
	<!-- End Navigation -->

	<!-- start Header Jumbotron -->
	<header class="jumbotron back-img" id="photo">
		<h1 class="text-info">Send Money Anytime Anywhere</h1>
	</header>

	<footer class="container-fluid bg-dark text-info">
		<div class="container">
			<div class="row py-3">
				<div class="col-md-6">
					<div>
						<span>Follw Us:</span>
						<a href=""><i class="fa fa-facebook" aria-hidden="true"></i></a>
						<a href="">Facebook</a>
						<a href="">Facebook</a>
						<a href="">Facebook</a>
						<a href="">Facebook</a>
						
					</div>
				</div>
				<div class="col-md-6">
					<span style="margin-left: 220px;">Designed By <a href="">Paytm</a> &copy; 2020</span>
				</div>
			</div>
		</div>
	</footer>
	<!-- End Header Jumbotron -->


<?php $this->load->view("script"); ?>
</body>
</html>