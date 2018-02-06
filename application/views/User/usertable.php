<!DOCTYPE html>
<html>


<header>
	
</header>
<body>
	<div>
		<a href = '<?php echo base_url('index.php/home/register'); ?>'>Create User</a>
		<table width = 700px class = "table" border=1px cellspacing=0 cellpadding=0>
			<thead align = "center" bgcolor = "grey">
				<tr>
					<th>User ID</th>
					<th>Username</th>
					<th>Email</th>
					<th>Password</th>
					<th>Confirm Password</th>
					<th>Birthday</th>
					<th>Gender</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>

				<?php foreach($usertab as $row):?>
					<tr>
						<td><?php echo $row->userid ?></td>
						<td><?php echo $row->username ?></td>
						<td><?php echo $row->email ?></td>
						<td><?php echo $row->password ?></td>
						<td><?php echo $row->password2 ?></td>
						<td><?php echo $row->birthday ?></td>
						<td><?php echo $row->gender ?></td>
						<td>
							<a onclick = "return confirm('Do you wish to delete selected user?')" href = "<?php echo base_url('index.php/home/delete_user/'.$row->userid);?>">DELETE</a>
							<a onclick = "return confirm('Do you wish to update selected user?')" href = "<?php echo base_url('index.php/home/register/'.$row->userid);?>">UPDATE</a></td>
					</tr>
			<?php endforeach;?>
			</tbody>
		</table>
		<a href="<?php echo base_url('index.php/home/logout') ?>">Logout</a>
	</div>
</body>
</html>