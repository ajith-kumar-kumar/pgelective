


<?php 
require '../db_config.php';
$fdate=$_POST['fdate'];
$tdate=$_POST['tdate'];
$query=mysqli_query($db,"UPDATE  session SET fromdate='$fdate', todate='$tdate' WHERE id='1'");
if(mysqli_affected_rows($db)){ 

echo "true";

}else{
	echo "you cant update the same date";

}



?>