<?php
 require_once 'controller.php';

?>
<!DOCTYPE html>
<html>
<head>
	<title>user registration</title>
	<link rel="stylesheet" href="bootstrap.css">
</head>
<body>
	<div class="container">
 <h1>User Registration</h1>

 <?php if(count($error) >0): ?>
 <div class="alert alert-danger">
  <?php foreach($error as $err): ?>
  <li><?php echo $err; ?></li>
<?php endforeach; ?>
</div> 
<?php endif; ?>

 <form method="POST" action="<?php $_SERVER['PHP_SELF']; ?>">
 	<div class="form-group">
 		<label>NAME</label>
 		<input type="text" name="name" class="form-control" >
 	</div>
 	<div class="form-group">
 		<label>EMAIL</label>
 		<input type="email" name="email" class="form-control" >
 	</div>
 	<div class="form-group">
 		<label>PASSWORD</label>
 		<input type="password" name="pass" class="form-control" >
 	</div>

 	<div class="form-group">
 		<label>CONFRIM PASSWORD</label>
 		<input type="password" name="pass_2" class="form-control" >
 	</div>
 
   <input type="submit" name="submit" class="btn btn-primary">
   <p>are you a user?<a href="login.php" style="margin-left: 10px;">login</a>
</p>
 <div class="info"> Contact me if you have and issue <a href="oluougochukwu.com">oluougochukwu.com</a></div>


 </form>
 </div>



 <style type="text/css">
 .info{
  margin-top: 15px;
  font-family: 'arial', sans-serif;
}

.info a{
  text-decoration: none;
  font-weight: 600;
  font-size: 14px;
}	
 </style>

</body> 
</html>

