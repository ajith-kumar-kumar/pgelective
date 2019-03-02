<?php
session_start();
require 'header.php';


if($_SESSION['id']==""){
	echo "<script>window.location.replace('login.php')</script>";
}

?>
<div class="container-fluid">
 <div class="mt-5" style="margin-top: 150px !important;">
  <div class="jumbotron text-center" style="background-color: #eceeef;" >

  <h1 class="display-4">Thank You! <?php echo $_SESSION['name']; ?>  </h1>
  <p class="lead"><strong>Please contact your respective faculties</strong> for further instructions.</p>
  <hr>
 
  <p class="lead mt-3">
    <a class="btn btn-primary btn-sm" href="login.php" role="button">Continue to homepage</a>
  </p>
</div>
<?php session_destroy();
session_unset($_SESSION['id']);
 ?>
</div>

</div>
  