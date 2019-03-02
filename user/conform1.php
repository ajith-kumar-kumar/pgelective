<?php 
session_start();
require 'header.php';

if ($_SESSION['id']=="") {
  echo "<script>window.location.replace('login.php')</script>";
}

  $id=$_GET['id'];
$sem_query=mysqli_query($db,"SELECT * FROM session");
$sem_array=mysqli_fetch_array($sem_query);



$query1=mysqli_query($db,"SELECT title FROM subject_based WHERE code='".$_GET['title1']."'");
$res1=mysqli_fetch_array($query1);

// $query2=mysqli_query($db,"SELECT title FROM interdisciplinary WHERE code='".$_GET['title2']."' ");
// $res2=mysqli_fetch_array($query2);

// $query3=mysqli_query($db,"SELECT title FROM subject_based WHERE code='".$_GET['title3']."'");
// $res3=mysqli_fetch_array($query3);

// $profile_query=mysqli_query($db,"SELECT department FROM login WHERE id='$id'");
// $profile_array=mysqli_fetch_array($profile_query);

// $sem_query=mysqli_query($db,"SELECT * FROM session");
// $sem_array=mysqli_fetch_array($sem_query);
?>
<head>
  <style type="text/css">
    label{
      color: red;
    }
  </style>
</head>

<center>
  <form method="POST">

   <div class="container">
     <div class="col-md-4 ">
        <div class="card mt-5 " style="margin-top:130px !important;">

           <div class="view overlay">
             <!-- <img class="card-img-top img-fluid"     alt="Card image cap"> -->
              <div class="mask rgba-white-slight"></div>
            </div>
              <div class="card-body">
                <h6 class="card-title">
                  <p class="text-capitalize">Please view your Selected papers and click confirm</p>
                  <label>Your Subject Based Paper  :</label> <?php 
                        // echo $id;
                        echo $title1=$res1['title']; 
                 ?>
               </h6>
               
    <button type="submit" name="submit" id="dollar"  class="btn btn-primary">confirm</button>

            </div>
       </div>
      </div>
    </div>
  </form>

</center>

<?php 
      if (isset($_POST['submit'])) {
        $date=date('F d, Y, h:i A',time());

         

         $query_res=mysqli_query($db,"INSERT INTO result (subject_based,sem,cur_date,id) VALUES ('$title1','".$sem_array['sem']."','$date','".$_GET['id']."' )");



          $query_sub=mysqli_query($db,"UPDATE subject_based SET count = count - 1 WHERE title = '$title1'");
          
        
       
        

         if($query_res==1){

         

          // $query_sub=mysqli_query($db,"UPDATE subject_based SET count = count - 1 WHERE title = '$title1'");
          // $query_inter=mysqli_query($db,"UPDATE interdisciplinary SET count = count - 1 WHERE title = '$title2'");

        //   if($query_sub==1 && $query_inter==1){
        //     echo "<script>console.log(\"sucess\")</script>";

          
        


          echo "<script type='text/javascript'> window.location.replace('end.php'); </script>";
        // }
      }else{
          echo "oops...!".mysqli_error($db);
        }
         }          

 ?>
<script type="text/javascript">
 $('#dollar').click(function (e) {
        if (!confirm('do you want to confirm , continue?')) {
            e.stopImmediatePropagation();
            e.preventDefault();

        }
    });


</script>
<!-- <script type="text/javascript">
  function clicked(){
    document.getElementById("dollar").disabled = true;

  }
</script> -->


<?php 
require 'footer.php';
 ?>