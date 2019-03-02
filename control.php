<?php

require 'header.php';
require 'db_config.php';
?>
  <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container">


                        <div class="row">
							<div class="col-xs-12">
								<div class="page-title-box">
                                    <h4 class="page-title">CONTROL </h4>
                                    <!-- <ol class="breadcrumb p-0 m-0">
                                        <li>
                                            <a href="#">Zircos</a>
                                        </li>
                                        <li>
                                            <a href="#">Forms </a>
                                        </li>
                                        <li class="active">
                                           Control
                                        </li>
                                    </ol> -->
                                    <div class="clearfix"></div>
                                </div>
							</div>
						</div>
                        <!-- end row -->


                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card-box">
                                    <h4 class="m-t-0 header-title"><b>SELECT SEMESTER</b></h4>
                        			
                        			<div class="row">
                        				
                        				<div class="col-md-6">
                        					         
	                                            <div class="form-group">
	                                               <label class="col-sm-2 control-label m-t-10  text-muted m-b-25 m-t-30 font-13">SEMESTER</label>
	                                                <div class="col-sm-8  m-t-10">
                                                      <select  id="sem" name="sem"  class="selectpicker"  data-selected-text-format="count" data-style="btn-default">
                                                             <?php 
                     $sql1="SELECT * FROM control";
                     $query1=mysqli_query($db,$sql1);
                     if (mysqli_num_rows($query1) > 0) {
                        while ($res=mysqli_fetch_array($query1)) {
                          
                      
                   ?>
	                                                        
 <option   value="<?php  echo $res['sem'];?>"><?php  echo $res['sem'];  ?></option> 
	                                                       <?php   }}?>
	                                                    </select>  
	                                                </div>
	                                            </div>
	                                            <div class="col-md-8 col-md-offset-10 m-t-50">
                                                   
	 <button type="submit" onclick="datasem(this)"  name="submit" id="but1" class="btn btn-custom waves-light waves-effect w-md">Submit</button>
	                                       
                        				</div>

	                                      
                        				</div>
                        			</div>
                           </div>
                       </div>
                   </div>


                                </div>
                            </div>
                        </div>
<script type="text/javascript">
  
function datasem(obj){

  // var multi_data = new array();





  var sem = document.getElementById('sem').value;
  
//var sem=$('#sel').val();
console.log(sem);
var sem1="sem1";


$.ajax({
  url:"control_db.php",
  method:"POST",
  cache:false,
  data:{sem:sem,sem1:sem1},
  success: function (data){

if(data){


  alert(data);

}
}
});



}






</script>

<?php

require 'footer.php';

?>