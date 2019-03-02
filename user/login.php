<?php   
session_start();
require 'header.php';



 ?>

<div class="text-center">
    <img src="img/header.png" class="img-fluid" height="10%" width="auto">
    </div>

<section class="row justify-content-center mt-5"style="margin-left:7vh;margin-right: 6vh;">

<div class="container">
<div class="alert alert-danger alert-dismissible ml-5 fade show" id="error" role="alert" style="display: none; width: 50vh;">

  </div>
  </div>
<div class="card extern  col-lg-3 offset-sm-0  hoverable">

  <!-- Material form login -->


  <h5 class="card-header  info-color white-text demo   text-center py-4 " >
    <strong>Sign in</strong>
  </h5>

  <!--Card content-->
  <div class="card-body px-lg-6 pt-0 ">

    <!-- Form -->
    <form class="text" method="POST" style="color: #757575;">

      <!-- Email --><br>
      <div class="md-form">
                <i class="fa fa-user-circle prefix" ></i>
        <input type="email" id="email" name="email" required class="form-control">
        <label for="email">email</label>
<br>
      </div>


      <!-- Password -->
      <div class="md-form col-sm4-lg-12">
        <i class="fa fa-lock prefix "></i>
        <input type="password" id="pass" name="pass" required class="form-control">
        <label for="pass">Password</label>
      </div><br>
    
<button class="btn btn-info my-4 btn-block" type="submit" onclick="login()" name="submit">Submit</button>


  </div>
</form>
</section>

</div></div>


<script type="text/javascript">
  function login(){


if($('#email').val()==''){
  alert('email connot be empty');
}else if($('#pass').val()==''){
  alert("passowrd cannot be empty");
}else{
  console.log("sucess");
}
}


</script>


<?php 

if (isset($_POST['submit'])) {
  
$email=$_POST['email'];
$pass=$_POST['pass'];

$query=mysqli_query($db,"SELECT * FROM `login` WHERE email='$email' AND password='$pass'  ");
$res=mysqli_fetch_array($query);

if($res['email']==$email && $res['password']==$pass && $res['status'] == '0')
{
echo "<script>window.location.replace('details.php');</script>";
$_SESSION['id']=$res['id'];
$_SESSION['name']=$res['uname'];

}else if($res['status']=='1'){
  echo "<script>
$('#error').show();

  $('#error').html('you are already login');   </script>";
}else{
  echo "<script>
$('#error').show();

$('#error').html('Invalid Email or  Password');</script>";
}


}


?>



 <?php


 require 'footer.php';
  ?>