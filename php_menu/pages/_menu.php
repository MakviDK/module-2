<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>PHP menu</title>
	<link rel="stylesheet" href="style.css">
	<link href="https://fonts.googleapis.com/css?family=Chewy" rel="stylesheet">
</head>
<body>
<?php $activetext = 'class="activepage"';
?>
<header>
	<ul>
		<li>
			<a href="index.php" <?php if($current=="such") {echo($activetext);}?>>Such</a></li>
			<a href="doge.php" <?php if($current=="doge") {echo($activetext);}?>>Doge</a></li>
			<a href="much.php" <?php if($current=="much") {echo($activetext);}?>>Much</a></li>
			<a href="wow.php" <?php if($current=="wow") {echo($activetext);}?>>Wow</a></li>
	</ul>
</header>
