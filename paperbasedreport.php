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
                                    <h4 class="page-title">PAPER BASED REPORT</h4>
                                   <!--  <ol class="breadcrumb p-0 m-0">
                                        <li>
                                            <a href="#">Zircos</a>
                                        </li>
                                        <li>
                                            <a href="#">Forms </a>
                                        </li>
                                        <li class="active">
                                            Form elements
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
                                    <h4 class="m-t-0 header-title"><b> </b></h4>
                        			
                        			<div class="row">
                        				<div class="col-md-6">
                        						
	                                             <div class="form-group">
	                                                <div class="col-md-6">
	                                                 <select name="type" id="type"onchange="myFunction(this.value)" class="form-control">
                                                        
                                                         <option data-value="Subject Based">Subject Based </option>
                                                         <option data-value="interdisciplinary">Interdisciplinary </option>
                                                         <script type="text/javascript">
                                                             
                                                         </script>
                                                       </select>
                                  <select name="SubjectBased" id="SubjectBased" class="form-control" style="display: none;">
                                            <?php
                                                         $query=mysqli_query($db,"SELECT * FROM subject_based WHERE status='1'");
                                                         while ($res=mysqli_fetch_array($query)) {
                                                                


                                                          
                                                         ?>
                                                         <option value='<?php echo $res['title'] ?>'><?php echo $res['title']; ?> </option>
                                                         <?php 
                                                         }
                                                         ?>
                                                       </select>
                                                       <select name="Interdisciplinary" id="Interdisciplinary" class="form-control" style="display: none;">
                                                         <?php
                                                         $query=mysqli_query($db,"SELECT * FROM interdisciplinary WHERE status='1'");
                                                         while ($res=mysqli_fetch_array($query)) {
                                                                


                                                          
                                                         ?>
                                                         <option value='<?php echo $res['title'] ?>'><?php echo $res['title']; ?> </option>
                                                         <?php 
                                                         }
                                                         ?>
                                                       </select>
	                                                </div>
	                                            </div>
	                                          
                        						 <div class="col-md-8 col-md-offset-6 m-t-50">
                                                <button type="submit" onclick="fetch_type()" class="btn btn-purple waves-effect waves-light">Submit</button>
                                           
                                        </div>
	                                            <script type="text/javascript">
                                                     $('#SubjectBased').show();  
                                                    function myFunction(element) {
                                                    var type = element;

                                                 if(type == 'Subject Based'){
                                                   $('#Interdisciplinary').hide();

                                                    $('#SubjectBased').show();
                                                }else{
                                                     $('#SubjectBased').hide();

                                                    $('#Interdisciplinary').show();
                                                }
                                                }
                                                    
                                        </script>
	                                            

	                                           
                        				</div>

                        				</div>
                        			</div>
                                </div>
                            </div>
                        </div>
                        <!-- end row -->
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card-box table-responsive">
                                    <h4 class="m-t-0 header-title"><b>Buttons example</b></h4>
                                    
                                    <table id="datatable-buttons" class="table table-striped  table-colored table-info">
                                        <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Roll Number</th>
                                            <th>Class</th>
                                            <th>Department</th>
                                           
                                        </tr>
                                        </thead>


                                        <tbody>
                                        <tr>
                                            <td>Tiger Nixon</td>
                                            <td>System Architect</td>
                                            <td>Edinburgh</td>
                                            <td>61</td>
                                            
                                        </tr>
                                        
                                      
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>



                    </div> <!-- container -->

                </div> <!-- content -->




<?php

require 'footer.php';

?>