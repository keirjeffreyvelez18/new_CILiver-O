<?php include_once('Lib/layout/header.php');?>
	<div>
		<table class = "table" border=1px >
			<thead align = "center" bgcolor = "grey">
				<tr>
					<th>User ID</th>
					<th>Username</th>
					<th>Email</th>
					<th>Birthday</th>
					<th>Gender</th>
					<th>Date Join</th>
					<th>Last Login</th>
				</tr>
			</thead>
			<tbody>

				<?php foreach($usertab as $row):?>
					<tr>
						<td><?php echo $row->userid ?></td>
						<td><?php echo $row->username ?></td>
						<td><?php echo $row->email ?></td>
						<td><?php echo $row->birthday ?></td>
						<td><?php echo $row->gender ?></td>
						<td><?php echo $row->dateJoin ?></td>
						<td><?php echo $row->lastDateLogin ?></td>

					</tr>
			<?php endforeach;?>
			</tbody>
		</table>
	</div>
<?php include_once('Lib/layout/footer.php');?>