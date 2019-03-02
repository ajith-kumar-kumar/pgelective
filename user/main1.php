<?php
session_start();
require 'header.php';

if($_SESSION['id']==''){
  echo "<script>window.location.replace('index.php')</script>";
}
$id=$_SESSION['id'];

?>
<form>
  <div class="text-center">
    <img src="img/header.png" class="img-fluid" height="10%" width="auto">
</div>	

<!-- <object width="500" height="600" id="sample" data="uploads/b2a02.pdf"></object>
 --><div class="container text-center my-5">
    <h5 class="text-uppercase"><b>SELECT YOUR SUBJECT BASED PAPER I</b></h5>



      	 
  	 <select id="tokens" name="title1" class="browser-default custom-select col-md-5">

  	 	<?php 
          $query_sub=mysqli_query($db,"SELECT distinct department FROM subject_based WHERE status=1 AND count !='0'");
          if (mysqli_num_rows($query_sub) > 0) {
          	 while ($res_sub=mysqli_fetch_array($query_sub)) {
  	 	 ?>
  	 	<optgroup label="<?php echo strtoupper($res_sub['department']); ?>">

		<?php 
		$dept_sub=$res_sub['department'];
		$query_sub1=mysqli_query($db,"SELECT * FROM subject_based WHERE  department ='$dept_sub' AND status ='1' AND count !='0'");	
		 if (mysqli_num_rows($query_sub1) > 0 ) {
		 	while ($result_sub=mysqli_fetch_array($query_sub1)) {
		 	

 		?>
 		          <option  value="<?php  echo $result_sub['code']; ?>" name="subject_based">	<?php 
 		           echo ucfirst($result_sub['title']);  ?> (<?php echo $result_sub['code'];  ?>) (<?php echo $result_sub['count'];
 		             ?>)</option>
<?php  
              }}
  			?>
  			        </optgroup>

  			<?php }} ?>
 			
  			
	</select>

<div class="col-md-12 offset-md-3">
   <button type="button"   name="but"  onclick="showajaxmodal('tokens')"><img src="img/pdf.png" height="40" width="auto" />
</button>
</div>



	<div class="my-5">
	<h5 class="text-uppercase" ><b>SELECT YOUR SUBJECT BASED PAPER II</b></h5>
   <select class="browser-default custom-select col-md-5" name="title2" id="tokens1">
  				<?php 
          $query_inter=mysqli_query($db,"SELECT distinct department FROM subject_based WHERE status='1' AND count!='0'");
          if (mysqli_num_rows($query_inter) > 0) {
          	 while ($result_inter=mysqli_fetch_array($query_inter)) {  
  	 	 ?>
  	 	<optgroup label="<?php echo strtoupper($result_inter['department']); ?>">

		<?php 
		$dept_inter=$result_inter['department'];
		$query_inter1=mysqli_query($db,"SELECT * FROM subject_based WHERE  department ='$dept_inter'  AND status ='1' AND count !='0'");	
		 if (mysqli_num_rows($query_inter1) > 0 ) {
		 	while ($res_inter=mysqli_fetch_array($query_inter1)) {
		 	
 		?>
 		   <option  value="<?php  echo $res_inter['code']; ?> " name="subject_based1">	<?php 
 		   echo ucfirst($res_inter['title']);  ?> (<?php echo $res_inter['code'];  ?>) (<?php echo $res_inter['count'];
 		             ?>)</option>
            <?php  
              }}
  			?>
  			        </optgroup>

  			<?php }} 


           
  if (isset($_GET['submit'])) {
                   
                   


       $subject_based=$_GET['title1'];

      $subject_based1=$_GET['title2'];



       header("Location: conform.php?title1=$subject_based&title3=$subject_based1&id=$id");
     }
  
 

?>


	</select>

	<div class="col-md-12 offset-md-3">
   <button type="button"   name="but"  onclick="showajaxmodal('tokens1')"><img src="img/pdf.png" height="40" width="auto" />
</button>
</div>
	</div>
	<input type="hidden"  id="demoed">


<button type="submit" name="submit" class="btn btn-primary"> confirm </button>

</div>

</form>






<script type="text/javascript">
function showajaxmodal(typ)   
  {
 
var code=$('#'+typ).val();

$('#demoed').val(code);

$('#modal-body').html('<object class="p1" width="450" height="600" id="sample" data="uploads/'+code+'.pdf"></object>');

$('#exampleModalCenter').modal('show',{backdrop:true});
return code;
  }


</script>


<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
  aria-hidden="true">

  <div class="modal-dialog modal-dialog-centered" role="document">


    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Syllabus</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="modal-body">
              </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
       <a  id="sample" download>   <button type="button"   class="btn btn-primary" onclick="down()" id="down">Download</button></a>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
       function down(code){
        var aj=code;
        console.log(aj);
    
    
       var pdf = $('#demoed').val();

      // console.log(pdf);

      $('a').attr("href", 'uploads/'+pdf+'.pdf');
       // console.log('uploads/' +pdf+ '.pdf');
        }

       </script>
 <?php 
require 'footer.php';
 ?>
