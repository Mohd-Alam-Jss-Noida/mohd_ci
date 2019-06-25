<?php
	include ('admin_header.php');
?>
<div class="container">
	<?php echo form_open('admin/store_article', 'class="email alam" id="myform"'); ?>
	<?php echo form_hidden('username', $this->session->userdata('username')); ?>
		<fieldset>
			<legend>Add Article</legend>
			<div class="form-group">
				<label for="inputEmail" class="col-lg-2 control-label">Article Title:</label>
				<div class="col-lg-10">
					<?php echo form_input(['name'=>'title', 'id'=>'title', 'value'=>set_value('title'), 'class'=>'form-control', 'placeholder'=>'Enter Article Title', 'tabindex'=>'1', 'autocomplete'=>'on', 'oncopy'=>'return false', 'onpaste'=>'return false', 'ondrag'=>'return false', 'ondrop'=>'return false']); ?>
					<span class="error_color"><?php echo form_error('title'); ?></span>
				</div>
			</div>
			<div class="form-group">
				<label for="inputPassword" class="col-lg-2 control-label">Article Body:</label>
				<div class="col-lg-10">
					<?php echo form_input(['name'=>'body', 'id'=>'body', 'value'=>set_value('body'), 'class'=>'form-control', 'placeholder'=>'Enter Article Body', 'tabindex'=>'2', 'autocomplete'=>'Off', 'oncopy'=>'return false', 'onpaste'=>'return false', 'ondrag'=>'return false', 'ondrop'=>'return false',]); ?>
					<span class="error_color"><?php echo form_error('body'); ?></span>
				</div>
			</div>
			<div class="form-group">
				<label for="inputPassword" class="col-lg-2 control-label">Article Description:</label>
				<div class="col-lg-10">
					<?php echo form_textarea(['name'=>'description', 'id'=>'description', 'value'=>set_value('description'), 'class'=>'form-control', 'placeholder'=>'Enter Article Description', 'tabindex'=>'3', 'autocomplete'=>'Off', 'oncopy'=>'return false', 'onpaste'=>'return false', 'ondrag'=>'return false', 'ondrop'=>'return false', 'rows'=>'3', 'cols'=>'5']); ?>
					<span class="error_color"><?php echo form_error('description'); ?></span>
				</div>
			</div>
			<div class="form-group">
				<div class="col-lg-10 col-lg-offset-2">
					<?php echo form_reset(['name'=>'reset', 'value'=>'Cancel', 'class'=>'btn btn-warning', 'id'=>'cancel', 'tabindex'=>'4']); ?>
					<?php echo form_submit(['name'=>'submit', 'value'=>'Submit', 'class'=>'btn btn-primary', 'id'=>'login', 'tabindex'=>'5']); ?>
				</div>
			</div>
		</fieldset>
	<?php echo form_close(); ?>
</div>
<?php
	include ('admin_footer.php');
?>
