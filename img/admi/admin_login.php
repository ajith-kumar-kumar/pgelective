<?php require '../db_config.php'; 

$uname=$_POST['uname'];
$pass=$_POST['pass'];
	
$sql=mysqli_query($con,"SELECT * FROM admin_login WHERE uname='$uname' and pass='$pass'");



 if(mysqli_num_rows($sql) > 0) {

echo 1;
}
 
 else{


 	echo 0;
 }







?>