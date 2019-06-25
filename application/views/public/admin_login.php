<?php
include 'public_header.php';
?>
<div class="container">
	<?php echo form_open('login/post_login', 'class="email alam" id="myform"'); ?>
		<fieldset>
			<legend>Admin Login</legend>
			<?php
			if ($error = $this->session->flashdata('invalid_login')) {
			?>
			<div class="alert alert-dismissible alert-danger">
				<h5 class="alert-heading">Warning!</h5>
				<button type="button" class="close" data-dismiss="alert">&times;</button>
				<strong>Oh snap!</strong> <span><?php echo $error ;?></span>
			</div>
			<?php } ?>
			<div class="form-group">
				<label for="inputEmail" class="col-lg-2 control-label">User Name:</label>
				<div class="col-lg-10">
					<?php echo form_input(['name'=>'username', 'id'=>'username', 'class'=>'form-control', 'placeholder'=>'Enter User Name', 'tabindex'=>'1', 'autocomplete'=>'on', 'oncopy'=>'return false', 'onpaste'=>'return false', 'ondrag'=>'return false', 'ondrop'=>'return false', 'value'=>set_value('username')]); ?>
					<span class="error_color"><?php echo form_error('username'); ?></span>
				</div>
			</div>
			<div class="form-group">
				<label for="inputPassword" class="col-lg-2 control-label">Password:</label>
				<div class="col-lg-10">
					<?php echo form_password(['name'=>'password', 'id'=>'password', 'class'=>'form-control', 'placeholder'=>'Enter Password', 'tabindex'=>'2', 'autocomplete'=>'Off', 'oncopy'=>'return false', 'onpaste'=>'return false', 'ondrag'=>'return false', 'ondrop'=>'return false', 'value'=>set_value('password')]); ?>
					<span class="error_color"><?php echo form_error('password'); ?></span>
				</div>
			</div>
			<div class="form-group">
				<div class="col-lg-10 col-lg-offset-2">
					<?php echo form_reset(['name'=>'reset', 'value'=>'Cancel', 'class'=>'btn btn-warning', 'id'=>'cancel', 'tabindex'=>'3']); ?>
					<?php echo form_submit(['name'=>'submit', 'value'=>'Login', 'class'=>'btn btn-primary', 'id'=>'login', 'tabindex'=>'4']); ?>
				</div>
			</div>
		</fieldset>
	<?php echo form_close(); ?>
</div>
<?php
include 'public_footer.php';
?>
