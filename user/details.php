<?php 
session_start();

require 'header.php';

if($_SESSION['id']==''){
  echo "<script>window.location.replace('login.php')</script>";
}


?>	
<body >
<section style="background: #bcdee7;">

<div class="container">
	
<?php 

$id=$_SESSION['id'];
// echo $id;
$query=mysqli_query($db,"SELECT * FROM login WHERE id='$id'");
$res=mysqli_fetch_array($query);


?>
<div class="card mx-auto" style="width:26rem; top: 100px;">
		


		<?php  
          if($_SESSION['id']==$res['id']){
		?>
		<div class="card-body text-center">
			<img src="img/profile.png" class="img-fluid" style="width: 200px; height:200px;" >
			<h4 class="card-title"><?php echo  $res['uname'] ?></h4>
			<h4 class="card-title"><?php echo  $res['roll_no'] ?></h4>
			<h4 class="card-title"><?php echo  $res['class'] ?></h4>
			<h4 class="card-title"><?php echo  $res['department'] ?></h4>
			<form >
    <button type="submit" name="submit" id="submit"  class="btn btn-primary ">continue</button>
    </form>
<?php  }?>
		</div>
	</div>
</div>	
<?php 

 if (isset($_GET['submit'])) {
 	       
 	       $query=mysqli_query($db,"SELECT * FROM session WHERE id = '1' ");
 	       $result=mysqli_fetch_array($query);
 	       	// header('Location: main1.php');


 	    if($res['department'] == 'English' || $res['department'] == 'Tamil' ){

 	       if($result['sem'] == 'I'){

 	       	header('Location: main1.php');
 	       }elseif($result['sem']== 'II'){
 	       	header('Location: sem2.php');
 	       }elseif($result['sem']=='III'){
 	       	header('Location: main1.php');
 	       }
 	    }elseif ($res['department'] == 'Computer Applications') {
 	   	    if($result['sem'] == 'I'){
 	       	header('Location: main1.php');
 	       }elseif($result['sem']== 'II'){
 	       	header('Location: sem2.php');
 	       }elseif($result['sem']== 'III'){
 	       	header('Location: main.php');
 	       }elseif ($result['sem']== 'IV') {
 	       	 header('Location: main1.php');
 	       }elseif($result['sem'] == 'V'){
 	       	header('Location: main.php');
 	       }
 	   }else{
			if($result['sem'] == 'I'){
 	       	header('Location: main.php');
 	       }elseif($result['sem']== 'II'){
 	       	header('Location: sem2.php');
 	       }elseif($result['sem']=='III'){
 	       	header('Location: main.php');
 	       }


 	   }

 }

?>

</section>
</body>
<?php 

require 'footer.php';
?>