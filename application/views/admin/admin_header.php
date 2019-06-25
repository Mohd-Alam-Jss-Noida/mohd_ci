<!DOCTYPE html>
<html lang="en">
<head>
	<title>Admin Dashboard</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/master.css'); ?>">
	<?php echo link_tag('assets/css/master.css'); ?>
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-dark bg-success">
		<a class="navbar-brand" href="<?php echo base_url('index.php/admin/dashboard'); ?>">Admin Dashboard</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>

		<div class="collapse navbar-collapse" id="navbarColor01">
			<ul class="navbar-nav mr-auto">
				<li class="nav-item active">
					<a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="#">Features</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="#">Pricing</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="#">About</a>
				</li>
			</ul>
			<ul class="navbar-nav float-right">
				<li class="nav-item">
					<a class="nav-link" href="#">Welcome
					<?php
						if ($this->session->has_userdata('username')) {
							echo ucfirst($this->session->userdata('username'));
						}
						else {
							echo "Admin";
						}
					?>
					</a>
				</li>
			</ul>
			<ul class="navbar-nav float-right">
				<li class="nav-item">
				<!-- <a class="nav-link" href="<?php echo base_url('login/logout') ; ?>">Log out</a> -->
					<?php echo anchor('login/logout', 'Log out', ['class'=>'nav-link']) ;?>
				</li>
			</ul>
		</div>
	</nav>