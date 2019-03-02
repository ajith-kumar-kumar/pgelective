<?php 
// session_start();
require 'db_config.php';

// $_SESSION['data']=$_POST['sem'];
// print_r($_SESSION['data']);

if ($_POST['sem1']=="sem1") {
	# code...
// $_SESSION['data']=$_POST['sem'];

$sql="UPDATE subject_based,interdisciplinary SET  subject_based.status='1', interdisciplinary.status='1'    WHERE subject_based.semester='".$_POST['sem']."' AND interdisciplinary.semester='".$_POST['sem']."'";

   //UPDATE subject_based,interdisciplinary SET subject_based.status='1',interdisciplinary.status='1' WHERE subject_based.semester='V' AND interdisciplinary.semester='V' 
$query=mysqli_query($db,$sql);


if ($query) {
	// $_SESSION['data']=$_POST['sem'];

$sql3="UPDATE subject_based,interdisciplinary SET  subject_based.status='0', interdisciplinary.status= '0'  WHERE NOT subject_based.semester='".$_POST['sem']."' AND NOT interdisciplinary.semester='".$_POST['sem']."'";

$query3=mysqli_query($db,$sql3);

if($query3)
{
	mysqli_query($db,"UPDATE session SET sem='".$_POST['sem']."' WHERE id='1' ");
	echo 1;

}


}}


// if ($_POST['sem2']=="sem2") {
	

// $sqll="UPDATE subject_based SET status='1' WHERE semester='II'";
//  $qur=mysqli_query($db,$sqll);
// if ($qur){

// $sql2="UPDATE subject_based,interdisciplinary SET  subject_based.status='0' , interdisciplinary.status='0'  WHERE NOT interdisciplinary.semester='".$_POST['sem']."' AND  NOT subject_based.semester='".$_POST['sem']."' ";

// mysqli_query($db,$sql2);	

// echo 6;

// }}

//echo 1;
//UPDATE subject_based,interdisciplinary SET subject_based.status='1',interdisciplinary.status='1' WHERE subject_based.semester='".$_POST['sem']."' AND interdisciplinary.semester='".$_POST['sem']."'";
 ?>
 

