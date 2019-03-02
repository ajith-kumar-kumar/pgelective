<?php

require 'header.php';


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
                                    <h4 class="page-title">CSV UPLOAD </h4>
                                   <!--  <ol class="breadcrumb p-0 m-0">
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
                                    <h4 class="m-t-0 header-title"><b>SELECT CSV FILE</b></h4>



                        <div class="row m-t-50">
                                        <div class="col-sm-12">
                                           
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="demo-box">
                                                     <form id="upload_csv" method="POST" enctype="multipart/form-data">
                                                             <div id="wait" style="display:none; width:69px;height:89px;border:1px solid black;position:absolute;top:50%;  left:100%;padding:2px;"><img src='assets/images/loading.gif' width="64" height="64" /><br>Loading..</div>
                                                            <div class="form-group">
                                                                <label class="control-label">Click Me to upload a CSV file</label>
                                                                 <input type="file" accept=".xlsx, .xls, .csv"  required  name="employee_file" class="filestyle" >
                                                                <!-- <input type="file" class="filestyle" data-input="false"> -->
                                                            </div>
                                                             <div class="col-md-8 col-md-offset-6 m-t-50">
	                            <button type="submit" name="upload" id="upload" value="upload csv" class="btn btn-custom waves-light waves-effect w-md">Submit</button>
	                                       
                        				</div>
                                                            
                                                           

                                                        </form>
                                                    </div>
                                                </div>

                                                

                                            </div> <!-- end row -->
                                        </div> <!-- end col -->
                                    </div>

                                </div>
                            </div>
                        </div>

                                 <div class="row">
                            <div class="col-sm-12">
                                <div class="card-box table-responsive">

                                    <h4 class="m-t-0 header-title"><b>STUDENT DETAILS</b></h4>
                                  

                                    <table id="datatable-responsive"
                                           class="table table-striped  table-colored table-info dt-responsive nowrap">
                                        <thead>
                                        <tr>
                                         
            
                                            <th>S.NO</th>
                                             <th>Name</th>
                                             <th>Email</th>
                                            <th>Class</th>
                                            <th>Department</th>

                                            <th>Roll Number</th>
                                           <th>Password</th>
                                             
                                            
                                        </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
          $query=mysqli_query($db,"Select * From  login");
          while($res=mysqli_fetch_array($query))
          {

            ?>
                                        <tr>
                                            <td><?php echo $res['id'] ?></td>
          <td><?php echo $res['uname'] ?></td>
          <td><?php echo $res['email'] ?></td>
          <td><?php echo $res['class'] ?></td>
          <td><?php echo $res['department'] ?></td>
          <td><?php echo $res['roll_no'] ?></td>
          <td><?php echo $res['password'] ?></td>
                                            
                                        </tr>
                                        <?php } ?>
                                    
                                       
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>




                                </div>
                            </div>
                        </div>
<script>
$(document).ready(function(){
    $('#upload_csv').on('submit',function(e){
        e.preventDefault();

      $(document).ajaxStart(function(){
    $("#wait").css("display", "block");
  });
  $(document).ajaxComplete(function(){
    $("#wait").css("display", "none");
  });
  
        $.ajax({
            url:"csvmain.php",
            method:"POST",
            data: new FormData(this),
            contentType:false,
            cache:false,
            processData:false,
            success:function(data){
                console.log(data);
                if(data=="error1"){
                    alert('invalid file');


                }else if(data=='error')
                {
                    alert("please selct a box to ");
                }
                else{
                    $('#datatable-responsive').html(data);
                }                
            } 
        })

    });
}); 
</script>

<?php

require 'footer1.php';

?>