<?php
	
require_once('database.php');

$db = Database::connect();


$data = [];

if($result = $db->query("SELECT id, username, email FROM users"))
{
	while($row = $result->fetch_assoc())
		$data[] = $row;
	$result->close();
}

?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<!-- Bootstrap -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	<!-- Bootstrap End -->

	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

<div class="container" style="padding-top: 50px;">
	<h1>Such CRUD many wow</h1>
	<!--<div class="jumbotron">
		<h1>Theme example</h1>
		<p><a href="#" data-toggle="modal" data-target="#login-modal">Login</a> This is a template showcasing the optional theme stylesheet included in Bootstrap. Use it as a starting point to create something more unique by building on or modifying it.</p>
	</div>-->


	<div class="row">
	<a href="create.php" class="btn btn-success">Create</a>
	<table class="table table-striped">
	<thead>
		<tr>
			<th>#</th>
			<th>Username</th>
			<th>E-mail</th>
			<th>Actions</th>
		</tr>
	</thead>
	<tbody>
		<?php
			foreach ($data as $val) {
				?>
				<tr>
					<td><?php echo(htmlspecialchars($val['id'])); ?></td>
					<td><?php echo(htmlspecialchars($val['username'])); ?></td>
					<td><?php echo(htmlspecialchars($val['email'])); ?></td>
					<td>
						<a href="view.php?id=<?php echo $val['id']; ?>" class="btn btn-xs btn-info">View</a>
						<a href="edit.php?id=<?php echo $val['id']; ?>" class="btn btn-xs btn-warning">Edit</a>
						<a href="delete.php?id=<?php echo $val['id']; ?>" class="btn btn-xs btn-danger">Delete</a>
					</td>
				</tr>
				<?php
			}
		?>
	</tbody>
	</table>
	</div>

</div>
</body>
</html>