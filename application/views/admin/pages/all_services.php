<?php if($memberships) { ?>
    <h1 class="prod-header">MEMBERSHIP</h1><table style="width: 98%">
	<table class="table table-bordered table-membership">
	<thead>
	<th>Membership</th>
	<th>Price</th>
	</thead>
	<tbody>
	<?php foreach($memberships as $membership) { ?>
		<tr>
		<td><?php echo str_replace('_', ' ',$membership->type); ?></td>
		<td><?php echo $membership->price; ?></td>
		<td><a href="<?php echo base_url('subscription/create_product/'.$membership->id);?>">create</a></td>
		</tr>
	<?php } ?>
	</tbody>
	</table>
<?php } ?>