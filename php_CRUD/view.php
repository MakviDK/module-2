<?php
	require_once ("user.php");

if (empty($_GET['id'])) {
	echo "We don't take kindly to strangers around here.";
} else {
$id = (int) $_GET['id'];
$data = User::retrieve($id);

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
	<a href="index.php">Home</a>
	<div class="row">
		<p>Username: <?php echo(htmlspecialchars($data['username'])); ?></p>
		<p>First name: <?php echo(htmlspecialchars($data['firstname'])); ?></p>
		<p>Last name: <?php echo(htmlspecialchars($data['lastname'])); ?></p>
		<p>Email: <?php echo(htmlspecialchars($data['email'])); ?></p>
		<p>Date Created: <?php echo(htmlspecialchars($data['date_created'])); ?></p>
	</div>
</div>
</body>
</html>
<?php
}
?>