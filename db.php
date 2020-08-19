 <?php

$conn = mysqli_connect('localhost', 'root' , '', 'register') or die("could not coneect");

if(!$conn){
  echo "failed to connect to mysql " . mysqli_connect_errno();
}



?>