<?php
include ('admin_header.php');
?>
<br>
<div class="container-fluid">
	<div class="row">
		<div class="col-md-6">
			<h2>Blog Listing</h2>
		</div>
		<div class="col-md-6">
			<!-- <a href="add_article" class="float-right"><button type="button" class="btn btn-primary">Add Article</button></a> -->
			<?php echo anchor('admin/add_article', 'Add Article', ['class'=>'btn btn-primary float-right']) ;?>
		</div>
	</div>
	<?php
	if ($error = $this->session->flashdata('insert_data')) {
		$color = $this->session->flashdata('alert_color');
		?>
		<div class="alert alert-dismissible alert-<?php echo $color ;?>">
			<h5 class="alert-heading">Alert!</h5>
			<button type="button" class="close" data-dismiss="alert">&times;</button>
			<strong>Wow!!</strong> <span><?php echo $error ;?></span>
		</div>
	<?php } ?>
	<table class="table table-hover">
		<thead>
			<tr class="text-center">
				<th>Sr No</th>
				<th>Title</th>
				<th>Body</th>
				<th>Description</th>
				<th>Created Date</th>
				<th>Updated Date</th>
				<th colspan="2">ACTION</th>
			</tr>
		</thead>
		<tbody>
			<?php
			if ($data) {
				$sr_no = $this->uri->segment(3);
				foreach ($data as $key => $value) {
					?>
					<tr class="text-center">
						<td><?php echo ++$sr_no; ?></td>
						<td><?php echo $value->title; ?></td>
						<td><?php echo $value->body; ?></td>
						<td><?php echo $value->description; ?></td>
						<td><?php echo $value->created_date; ?></td>
						<td><?php echo $value->updated_date; ?></td>
						<td>
							<?php echo anchor("admin/edit_article/{$value->id}", 'Edit', ['class'=>'btn btn-warning']) ;?>
						</td>
						<td>
							<?php echo 
							form_open('admin/delete_article', 'class="form_id" id="form_id" onsubmit="return deletechecked()"'),
							form_hidden('article_id', $value->id),
							form_submit(['name' => 'Submit', 'value' => 'Delete', 'id' => 'delete', 'class' => 'btn btn-danger']),
							form_close();
							?>
						</td>
					</tr>
				<?php } }
				else {
					?>
					<tr class="table-danger text-center">
						<td colspan="9">Record Not Found</td>
					</tr>
				<?php } ?>     
		</tbody>
	</table>
	<?php echo $this->pagination->create_links(); ?>
</div>
<?php
include ('admin_footer.php');
?>
<script type="text/javascript">
	function deletechecked() {
		var res = confirm('Are You Sour Want To Delete');
		if (res){
			return true;
		}
		return false;
	}
</script>