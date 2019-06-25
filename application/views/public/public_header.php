<!DOCTYPE html>
<html lang="en">
<head>
	<title>Articles List</title>
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
		<a class="navbar-brand" href="<?php echo base_url('index.php/user/index'); ?>">Articles</a>
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
			<?php echo form_open('user/search', ['class' => 'form-inline my-2 my-lg-0']);?>
			<input class="form-control mr-sm-2" placeholder="Search" type="text" name="query" id="query" tabindex="1" autocomplete="Off" oncopy="return false" onpaste="return false" ondrag="return false" ondrop="return false">
			<input type="submit" name="search" value="Search" id="search" class="btn btn-secondary my-2 my-sm-0" tabindex="2">
			<?php echo form_close();?>
		</div>
	</nav>
	<div class="float-right" style="margin-right: 115px;">
		<?php echo form_error('query', "<p class='text-danger'>", '</p>');?>
	</div>
	<div>
		<?php if (isset($result)? $result : "") { ?>
			<h2 class="text-danger text-center" style="margin: 200px 0 0 0;"><?php echo $result; ?></h2>
		<?php } ?>
		
	</div>