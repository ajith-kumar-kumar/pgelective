<?php 
session_start();
require 'header.php';

if ($_SESSION['id']=="") {
  echo "<script>window.location.replace('login.php')</script>";
}

  $id=$_GET['id'];




$query1=mysqli_query($db,"SELECT title FROM subject_based WHERE code='".$_GET['title1']."'");
$res1=mysqli_fetch_array($query1);

$query2=mysqli_query($db,"SELECT title FROM interdisciplinary WHERE code='".$_GET['title2']."' ");
$res2=mysqli_fetch_array($query2);

$query3=mysqli_query($db,"SELECT title FROM subject_based WHERE code='".$_GET['title3']."'");
$res3=mysqli_fetch_array($query3);

$profile_query=mysqli_query($db,"SELECT department FROM login WHERE id='$id'");
$profile_array=mysqli_fetch_array($profile_query);

$sem_query=mysqli_query($db,"SELECT * FROM session");
$sem_array=mysqli_fetch_array($sem_query);
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
                  <label>Your Subject Based Paper I :</label> <?php 
                       // echo $id;
                        echo $title1=$res1['title']; 
                 ?></h6>







                 <?php 
                                             


                  if($profile_array['department'] == 'Tamil' || $profile_array['department'] =='English')
                  {
                  ?>
                <h6 class="card-title">
                  <label> Your Subject Based Paper II: </label><?php 
                        echo $title3=$res3['title']; 
                ?></h6>
                <?php  }elseif($profile_array['department'] == 'Computer Applications'){ 

                  if($sem_array['sem'] == 'I' || $sem_array['sem'] == 'IV' ){

                  ?>
                  <h6 class="card-title">
                  <label> Your Subject Based Paper II: </label><?php 
                        echo $title3=$res3['title']; 
                ?></h6>
                <?php }elseif($sem_array['sem'] == 'III' || $sem_array['sem'] == 'V'  ){
                       

               ?>
                <h6 class="card-title">
                  <label> Your Interdisciplinary Paper: </label><?php 
                        echo $title2=$res2['title']; 
                ?></h6>

                <?php  } }else{ ?>
                  <h6 class="card-title">
                  <label> Your Interdisciplinary: </label><?php 
                        echo $title2=$res2['title']; 
                ?></h6>
                <?php  }?>
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

         if($profile_array['department'] == 'Tamil' || $profile_array['department'] =='English'  ){
                  $query_res=mysqli_query($db,"INSERT INTO result (subject_based,subject_based2,sem,cur_date,id) VALUES ('$title1' ,'$title3','".$sem_array['sem']."' ,'$date','".$_GET['id']."' )");


                  $query_sub=mysqli_query($db,"UPDATE subject_based SET count = count - 1 WHERE title = '$title1'");
                    $query_sub1=mysqli_query($db,"UPDATE subject_based SET count = count - 1 WHERE title = '$title3'");



         }elseif($profile_array['department'] == 'Computer Applications')
         {
         if($sem_array['sem'] == 'I' || $sem_array['sem'] == 'IV') 
                        {
                          $query_res=mysqli_query($db,"INSERT INTO result (subject_based,subject_based2,sem,cur_date,id) VALUES ('$title1' ,'$title3','".$sem_array['sem']."' ,'$date', '".$_GET['id']."' )");

                          $query_sub=mysqli_query($db,"UPDATE subject_based SET count = count - 1 WHERE title = '$title1'");

                          $query_sub1=mysqli_query($db,"UPDATE subject_based SET count = count - 1 WHERE title = '$title3'");

                        }else{

                            $query_res=mysqli_query($db,"INSERT INTO result (subject_based,interdisciplinary,sem,cur_date,id) VALUES ('$title1' ,'$title2' ,'".$sem_array['sem']."','$date','".$_GET['id']."' )");

                            $query_sub=mysqli_query($db,"UPDATE subject_based SET count = count - 1 WHERE title = '$title1'");

                            $query_inter=mysqli_query($db,"UPDATE interdisciplinary SET count = count - 1 WHERE title = '$title2'");
                      }
                  
                  }else{

         $query_res=mysqli_query($db,"INSERT INTO result (subject_based,interdisciplinary,sem,cur_date,id) VALUES ('$title1' ,'$title2' ,'".$sem_array['sem']."','$date','".$_GET['id']."' )");



          $query_sub=mysqli_query($db,"UPDATE subject_based SET count = count - 1 WHERE title = '$title1'");
          $query_inter=mysqli_query($db,"UPDATE interdisciplinary SET count = count - 1 WHERE title = '$title2'");
        
       }
        

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
           }else{
             // echo "oops...!11111111".mysqli_error($db);
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