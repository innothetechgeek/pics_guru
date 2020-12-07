<?php if($memberships) { ?>
    <h1 class="prod-header">MEMBERSHIP</h1><table style="width: 98%">
	<table class="table table-bordered table-membership">
	<thead>
	<th>Username</th>
	<th>Membership</th>
	<th>Price</th>
	</thead>
	<tbody>
	<?php foreach($memberships as $membership) { ?>
		<tr>
		<td><?php echo $membership->username; ?></td>
		<td><?php echo str_replace('_', ' ',$membership->type); ?></td>
		<td><?php echo $membership->price; ?></td>
		</tr>
	<?php } ?>
	</tbody>
	</table>
<?php } ?>