<?php
 require '../db_config.php';
  $delete=$_POST['obj'];

 $query=mysqli_query($db,"DELETE FROM result WHERE id=$delete");
 if(mysqli_affected_rows($db)){
 	echo '1';
 }else{
 	echo '2';
 }







?>