<?php
require 'controller.php';

if(!isset($_SESSION['id'])) {
	header('Location: login.php');
}

?> 
<!DOCTYPE html>
<html>
<head>
	<title>homepage</title>
	<link rel="stylesheet"  href="bootstrap.css">
</head>
<body>
    
<div class="container">

	<?php if(isset($_SESSION['msg'])): ?>
	<div class="alert <?php echo $_SESSION['alert-class'] ?>">
	<?php 
	echo $_SESSION['msg']; 
	unset($_SESSION['msg']);
	unset($_SESSION['alert-class']);
	?>
	</div>
<?php endif; ?>


 <h3>welcome, <?php echo $_SESSION['name']; ?></h3>
 <a href="index.php?logout=1" btn btn-danger> logout</a>

<h3>this is your dashboard</h3>

</body>
</html>