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
                                    <h4 class="page-title">INTERDISCIPLINARY</h4>
                                    <!-- <ol class="breadcrumb p-0 m-0">
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
                                    <h4 class="m-t-0 header-title"><b> Add Interdisciplinary Details</b></h4>
                        			
                        			<div class="row">
                        				<div class="col-md-6">
                        			
                        						<input id="iid" name="iid" type="hidden" required="true">
	                                             <div class="form-group">
                                     <label class="col-md-2 control-label">Department </label>

	                                                 <select name="dept" id="dept" class="form-control">
                                                        <?php 

                                                          $query=mysqli_query($db,"SELECT * FROM department WHERE status=b'1'");
                                                          while($res=mysqli_fetch_array($query))
                                                          {
                                                        ?>
                                                            <option><?php echo $res['department']; ?></option>
                                                           <?php } ?> 
                                                        </select> 
	                                            </div>
	                                           
	                                            <div class="form-group">
	                                                <label class="col-sm-2 control-label">SEMESTER</label>
	                                                <div class="col-sm-10">
	                                                    <select name="sem" id="sem" class="form-control">
                                                            <?php
                                                               $query=mysqli_query($db,"SELECT * FROM control");
                                                               while($res=mysqli_fetch_array($query)){



                                                             ?>
	                                                        <option><?php echo $res['sem']; ?></option>
	                                                        
                                                            <?php } ?>
	                                                    </select>  
	                                                </div>
	                                            </div>
                                                 <div class="form-group">
                                                    <label class="col-md-2 control-label">limit</label>
                                                    <div class="col-md-10">
                                                        <input type="number" name="limit" id="limit" min="1" max="40" class="form-control" placeholder ="Enter a limit...">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-2 control-label">title</label>
                                                    <div class="col-md-10">
                                                        <input type="text" name="title" id="title"  class="form-control" placeholder ="Enter a title...">
                                                    </div>
                                                </div>
                        						
	                                            
	                                            

	                                           
                        				</div>

                        				<div class="col-md-6">
                        						<div class="form-group">
                                                    <label class="col-md-2 control-label">code</label>
                                                    <div class="col-md-10">
                                                        <input type="text" name="code" id="code"  class="form-control" placeholder ="Enter a code...">
                                                    </div>
                                                </div>
                                                

	                                           <div class="form-group">
                                                    <label class="col-md-2 control-label">Parent Department</label>
                                                    <select id="pdept" name="pdept" class="form-control">
                                                        <?php 

                                                          $query=mysqli_query($db,"SELECT * FROM department WHERE status=b'1'");
                                                          while($res=mysqli_fetch_array($query))
                                                          {
                                                        ?>
                                                            <option><?php echo $res['department']; ?></option>
                                                           <?php } ?> 
                                                        </select>
                                                </div>
                                               <div class="form-group">
                                                    <label class="col-md-2 control-label">Collabrative Department</label>
                                                    <div class="col-md-10">
                                                        <select id="cdept" name="cdept" class="form-control">
                                                        <?php 

                                                          $query=mysqli_query($db,"SELECT * FROM department WHERE status=b'1'");
                                                          while($res=mysqli_fetch_array($query))
                                                          {
                                                        ?>
                                                            <option><?php echo $res['department']; ?></option>
                                                           <?php } ?> 
                                                        </select>
                                                    </div>
                                                </div>
	                                           
	                                            <div class="form-group">
                                                                <label class="col-md-6 control-label">Click Me to upload a pdf</label>
                                         <input required type="file" accept="application/pdf" name="pdf" id="pdf" class="filestyle">
                                                               
                                                            </div>
                                                             <div class="col-md-8 col-md-offset-6 m-t-50">
	                                            <button type="submit" name="action" id="action" class="btn btn-purple waves-effect waves-light" onclick="addInter()">Submit</button>
                                                <button type="submit" name="action" id="update" class="btn btn-purple waves-effect waves-light" onclick="updateInter()">update</button>
	                                       
                        				</div>
	                                           
	                                           


	                                          
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

                                    <h4 class="m-t-0 header-title"><b>STUDENT DETAILS</b></h4>
                                  

                                    <table id="datatable-responsive"
                                           class="table table-striped  table-colored table-info dt-responsive nowrap">
                                        <thead>
                                        <tr>
                                            <th>S.NO</th>
                                            
                                           
                                            <th>Department</th>
                                            <th>Title</th>
                                            <th>Semester</th>
                                            <th>Parent</th>
                                            <th>Collabrative</th>
                                            <th>Code</th>
                                            <th>limit</th>
                                            <th>Action</th>
                                            <th>Status</th>
                                        </tr>
                                        </thead>
                                        <tbody id="dataTableBody">
                                       
                                        
                                       
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>



                    </div> <!-- container -->

                </div> <!-- content -->


<script type="text/javascript">
    $('#update').hide();
    function addInter(obj){
      if ($('#dept').val() == '') {
         alert("dept is required");        
      }else if ( $('#sem').val() == '') {
         alert(" sem is required");  
     }else if ( $('#title').val() == '') {
         alert(" title is required"); 
     }
         else if ( $('#limit').val() == '') {
         alert(" limit is required"); 
     } else if ( $('#code').val() == '') {
         alert(" code is required"); 
     }
          else if ( $('#pdept').val() == '') {
         alert(" parent department is required");  
         }
          else if ( $('#cdept').val() == '') {
         alert(" Collabrative department is required");               
                   
      }else if (document.getElementById("pdf").files.length == 0) {
         alert("Browse a User pdf");                
      }else{
          var formData = new FormData();
          formData.append("op","addInter");
          formData.append("dept",$('#dept').val());
          
          formData.append("sem",$('#sem').val());
                    formData.append("code",$('#code').val());
          formData.append("title",$('#title').val());

          formData.append("limit",$('#limit').val());
          formData.append("pdept",$('#pdept').val());
          formData.append("cdept",$('#cdept').val());
          formData.append("pdf",document.getElementById("pdf").files[0]); // ithula tan img ah key:image la set pannuren..
             
              $.ajax({
                  url : 'handler/addInter.php',
                  type : 'POST',
                  processData: false,
                  contentType: false,
                  async : false,
                  data :formData,
                  success:function(result)
                  {
                      console.log(result);
                      obj = JSON.parse(result);
                      if(obj.err==0)
                      {
                          
                         alert(obj.result);
                          $('#dept').val('');
                          $('#sem').val('');
                          $('#code').val('');
                          $('#title').val('');

                          $('#limit').val('');
                          $('#cdpet').val('');
                          $('#pdept').val('');
                          $('#pdf').val('');
                          loadDataIntoTab();
                      }else{
                         alert(obj.result);
                      }
                  }
              });
                 //setTimeout(function(){        }, 2000); 
           }
    
      }
    

    function updateInter(obj){
     if ($('#dept').val() == '') {
         alert("dept is required");        
      }else if ( $('#sem').val() == '') {
         alert(" sem is required");  
     }else if ( $('#code').val() == '') {
         alert(" code is required");  
     }
         else if ( $('#limit').val() == '') {
         alert(" limit is required"); 
     }else if ( $('#title').val() == '') {
         alert(" title is required");    
     }
          else if ( $('#pdept').val() == '') {
         alert(" parent department is required");  
         }
          else if ( $('#cdept').val() == '') {
         alert(" Collabrative department is required");               
                   
      }else if (document.getElementById("pdf").files.length == 0) {
         alert("Browse a User pdf");                
      }else{
         var formData = new FormData();
          formData.append("op","updateInter");
          formData.append("dept",$('#dept').val());
          formData.append("sem",$('#sem').val());
                    formData.append("code",$('#code').val());
                    formData.append("title",$('#title').val());
          formData.append("id",$('#iid').val());

          formData.append("limit",$('#limit').val());
          formData.append("pdept",$('#pdept').val());
          formData.append("cdept",$('#cdept').val());

          formData.append("pdf",document.getElementById("pdf").files[0]); // ithula tan img ah key:image la set pannuren..
              // ithula tan img ah key:image la set pannuren..
          }
          
              $.ajax({
                  url : 'handler/addInter.php',
                  type : 'POST',
                  processData: false,
                  contentType: false,
                  async : false,
                  data :formData,
                  success:function(result)
                  {
                      console.log(result);
                      obj = JSON.parse(result);
                      if(obj.err==0)
                      {
                          loadDataIntoTab();
                         alert(obj.result);
                         $('#dept').val('');
                          $('#sem').val('');
                                                    $('#title').val('');

                                                    $('#code').val('');


                          $('#limit').val('');
                          $('#cdpet').val('');
                          $('#pdept').val('');
                          $('#pdf').val('');
                      }else{
                         alert(obj.result);
                      }
                  }
              });
                 //setTimeout(function(){        }, 2000); 
           }
    
      
    


    function loadDataIntoTab(){
      var formData = new FormData();
      formData.append("op","fetchInter");
      $.ajax({
          url : 'handler/addInter.php',
          type : 'POST',
          processData: false,
          contentType: false,
          async : false,
          data :formData,
          success:function(result)
          {
              obj = JSON.parse(result);
              var code;
              if(obj.err==0)
              {
            
                var n;
                for(n in obj.data){
                  code = code + '<tr>'+
                              '<td>'+(parseInt(n)+1)+'</td>'+
                              '<td>'+obj.data[n].dept+'</td>'+

                              '<td>'+obj.data[n].title+'</td>'+
                              '<td>'+obj.data[n].sem+'</td>'+

                              '<td>'+obj.data[n].pdept+'</td>'+
                            '<td>'+obj.data[n].cdept+'</td>'+
                                                        '<td>'+obj.data[n].code+'</td>'+

                              '<td>'+obj.data[n].limit+'</td>'+

                              

                              '<td>';
                                  if (obj.data[n].status == 0) {
                                    code = code + '<button class="btn waves-effect waves-light green" id="updateStatusTabEle" onclick="updateStatusTabEle(this);" data-id="'+obj.data[n].id+'" data-val="1" type="submit">Activate</button>';
                                  }else{
                                    code = code + '<button class="btn waves-effect waves-light red" id="updateStatusTabEle" onclick="updateStatusTabEle(this);" data-id="'+obj.data[n].id+'" data-val="0" type="submit">Deactivate</button>';                                    
                                  }
                                  
                              code = code + '</td>'+
                              '<td>'+
                                  '<button class="btn waves-effect waves-light yellow darken-4" id="editTabEle" onclick="editTabEle(this);" data-id="'+obj.data[n].id+'" type="submit">Edit</button>&nbsp;&nbsp;'+
                                  '<button class="btn waves-effect waves-light red" id="deleteTabEle" onclick="deleteTabEle(this);" data-id="'+obj.data[n].id+'" type="submit">Delete</button>'+
                              '</td>'+
                              '</tr>';
                }
              }else{
               alert(obj.result);
              }
              $('#dataTableBody').empty();
              $('#dataTableBody').html(code);
          }
      });
    }
    loadDataIntoTab();
    function editTabEle(obj){
      var formData = new FormData();
      formData.append("op","editInter");
      formData.append("id",$(obj).attr('data-id'));
      $.ajax({
          url : 'handler/addInter.php',
          type : 'POST',
          processData: false,
          contentType: false,
          async : false,
          data :formData,
          success:function(result)
          {
              console.log(result);
              obj = JSON.parse(result);
             // alert(obj.result); 
              if (obj.err == 0) {
                $('#dept').val(obj.dept);
                $('#sem').val(obj.sem);
                          $('#title').val(obj.title);
                          $('#code').val(obj.code);
                          $('#limit').val(obj.limit);
                          $('#cdept').val(obj.cdept);
                          $('#pdept').val(obj.pdept);
                $('#iid').val(obj.id);
                $('#dept').focus();
                 $('#action').hide();

                $('#update').show();
                                $('#pdf').val(obj.pdf);


              }
          }
      });      
    }
    function deleteTabEle(obj){
      var formData = new FormData();
      formData.append("op","deleteInter");
      formData.append("id",$(obj).attr('data-id'));
      $.ajax({
          url : 'handler/addInter.php',
          type : 'POST',
          processData: false,
          contentType: false,
          async : false,
          data :formData,
          success:function(result)
          {
              obj = JSON.parse(result);
             alert(obj.result);                
              loadDataIntoTab();
          }
      });
    }
    function updateStatusTabEle(obj) {
      var formData = new FormData();
      formData.append("op","updateStatus");
      formData.append("id",$(obj).attr('data-id'));
      formData.append("status",$(obj).attr('data-val'));
      $.ajax({
          url : 'handler/addInter.php',
          type : 'POST',
          processData: false,
          contentType: false,
          async : false,
          data :formData,
          success:function(result)
          {
              obj = JSON.parse(result);
             alert(obj.result);                
              loadDataIntoTab();
          }
      });
    }
</script>


<?php

require 'footer.php';

?>