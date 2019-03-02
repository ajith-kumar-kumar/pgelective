<?php

$db= new mysqli("localhost","root","","pg");
if (!$db) {
     die("connection failed".mysqli_error());

}
else{
	//echo "connected";
}



?>