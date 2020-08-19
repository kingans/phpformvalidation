<?php 
 require_once 'controller.php';



?>

<!DOCTYPE html>
<html>
<head>
	<title>login to homepage</title>
	<link rel="stylesheet" href="bootstrap.css">
</head>
<body>
	<div class="container">

      <?php if(count($error) >0): ?>
 <div class="alert alert-danger">
  <?php foreach($error as $err): ?>
  <li><?php echo $err; ?></li>
<?php endforeach; ?>
</div> 
<?php endif; ?>

 <h1>login in details</h1>
 <form method="POST" action="<?php $_SERVER['PHP_SELF']; ?>">
 	<div class="form-group">
 		<label>NAME</label>
 		<input type="text" name="name" class="form-control">
 	</div>
    	<div class="form-group">
 		<label>PASSWORD</label>
 		<input type="password" name="pass" class="form-control">
 	</div>
 	
   <button name="login" class="btn btn-primary">login</button>
   <p>register here if you are not a user <a href="index.php">register</a></p>
 </form>
 </div>
</body> 
</html>