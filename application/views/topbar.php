	<!-- start Navigation -->
	<nav class="navbar navbar-expand-sm navbar-dark bg-ligth ">
		<a href="index.html" class="navbar-brand text-info">Paytm</a>
		
		<button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#myMenu">
			<span class="navbar-toggler-icon"></span>
		</button>

		<div class="collapse navbar-collapse " id="myMenu">
			<ul class="navbar-nav pl-5 custom-nav">
				<li class="nav-item"><a href="<?php echo site_url("welcome/home") ?>" class="nav-link ">Home</a></li>
				
				<li class="nav-item"><a href="<?php echo site_url("addMoneyCont/") ?>" class="nav-link ">Add Money</a></li>
				<li class="nav-item"><a href="<?php echo site_url("sendMoneyCont/") ?>" class="nav-link ">Send Money</a></li>	
				<li class="nav-item"><a href="<?php echo site_url("allTransactionCont/") ?>" class="nav-link ">All Transaction</a></li>	
				<li class="nav-item dropdown welcome">
					<a href="transaction.html" class="nav-link dropdown-toggle " data-toggle="dropdown">Welcome <?php if($this->session->userdata("user_name")){ echo $this->session->userdata("user_name"); } ?></a>
					<div class="dropdown-menu">
						<a href="<?php echo site_url("welcome/editProfile") ?>/<?php echo $this->session->userdata('user_id') ?>" class="dropdown-item">Edit Profile</a>
						<a href="<?php echo site_url("welcome/changedPass") ?>" class="dropdown-item">Changed Password</a>
						<a href="<?php echo site_url("welcome/logout") ?>" class="dropdown-item">Logout</a>
					</div>
				</li>	
			</ul>

			
		</div>
		
	</nav>

	<!-- End Navigation -->
	

