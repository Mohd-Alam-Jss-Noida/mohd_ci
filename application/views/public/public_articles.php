<?php
include ('public_header.php');
?>
<br>
<div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
			<h2>Public Articles Listing</h2>
		</div>
	</div>
	<table class="table table-hover">
		<thead>
			<tr class="text-center">
				<th>Sr No</th>
				<th>Title</th>
				<th>Body</th>
				<th>Description</th>
				<th>Created Date</th>
				<th>Updated Date</th>
			</tr>
		</thead>
		<tbody>
			<?php
			if ($article) {
				$sr_no = $this->uri->segment(3);
				foreach ($article as $key => $value) {
					?>
					<tr class="text-center">
						<td><?php echo ++$sr_no; ?></td>
						<td><?php echo $value->title; ?></td>
						<td><?php echo $value->body; ?></td>
						<td><?php echo $value->description; ?></td>
						<td><?php echo $value->created_date; ?></td>
						<td><?php echo $value->updated_date; ?></td>
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
include ('public_footer.php');
?>