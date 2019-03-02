<?php require '../db_config.php';



 
if (isset($_POST['operation']) &&  $_POST['operation'] =='add') {
  $roll=$_POST['roll_no'];
 if(isset($_FILES["fileToUpload"]["name"]))
{
$temporary=explode(".", $_FILES["fileToUpload"]["name"]);
$file_extension = end($temporary);
$sourcePath = $_FILES['fileToUpload']['tmp_name']; // Storing source path of the file in a variable
$targetPath = "uploads/".$roll.'.'.$file_extension;


 // Target path where file is to be stored
move_uploaded_file($sourcePath,$targetPath) ; // Moving Uploaded file
echo $targetPath;
}
else
{
  $file_extension = '';
  echo 'no file choosen';
}
$sql = "INSERT INTO login (email,uname,password,roll_no,class,department,photo)
VALUES ('".$_POST['email']."','".$_POST['uname']."','".$_POST['pass']."','".$_POST['roll_no']."','".$_POST['classs']."','".ucfirst($_POST['dept'])."','".$targetPath."')";

if (mysqli_query($con, $sql)) {
    //echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($con);
}
} 

 if ($_POST['add'] =='del') {
      
   //$data= unlink($file_extension);
$sql_d="DELETE  FROM login WHERE id='".$_POST['a']."'";
$query_d=mysqli_query($con,$sql_d);
echo  1;

}

 if ($_POST['add'] == 'status') {
	     
   
   $a=$_POST['a'];
   $b= $_POST['b'];
 
 // echo  'the value of a'.$a;
 // echo  'b'.$b;
 // echo 'value of b is'.$b;	
 //$demo="UPDATE `login` SET `status`='$b'  WHERE `id`='$a'";
  // $query_st=mysqli_query($con,$sql_s);
   mysqli_query($con,"UPDATE `login` SET `status`='$b'  WHERE `id`='$a'");
   	//echo 1;

 
 	echo 2;
 }
  if ($_POST['add']=='edit') 

    { 	
    	//global $e=$_POST['samplee'];
    	//$classs=$_POST['classs'];
     //$e=$_POST['samplee'];
    	//$_SESSION['demoid']=$e;

    	//$_SESSION['uid']=$e;

         //$ed="SELECT * FROM login WHERE id='$e'";
        // $query_e=mysqli_query($con,$ed);
          //$result=mysqli_fetch_array($query_e);
          //$classs=$result['class'];
         //echo $r;
         echo 3;
    }
    if ($_POST['add']=='update') {

          //$_SESSION['demoid']=$e;
 
      
    //unlink($targetPath);


        
       	

       
            
    $up="UPDATE login SET email='".$_POST['email']."', uname='".$_POST['uname']."', password='".$_POST['pass']."',roll_no='".$_POST['roll_no']."',class='".$_POST['classs']."',
         department='".$_POST['dept']."',photo='".$_POST['photo']."' WHERE id='".$_POST['uid']."' ";
         mysqli_query($con,$up);
         echo 4;



    }

    
 ?>
