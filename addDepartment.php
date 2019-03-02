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
                                    <h4 class="page-title">DEPARTMENTS </h4>
                                    
                                    <div class="clearfix"></div>
                                </div>
							</div>
						</div>
                        <!-- end row -->


                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card-box">
                                    <h4 class="m-t-0 header-title"><b>Add Department</b></h4>
                        			
                        			<div class="row">
                        				<div class="col-md-6">
                        						
	                                             
	                                          
                        						
	                                            <div class="form-group">
	                                                <label class="col-md-2 control-label m-t-10">Department</label>
	                                                <div class="col-md-10">
	                                                    <input type="text" id="dept" required="" name="dept" class="form-control" placeholder ="Enter a Dept...">
	                                                </div>
	                                            </div>
	                                            

	                                           
                        				</div>

                        				
                                              <input id="sid" name=sid" type="hidden" required="true">

	                                            <!-- <div class="form-group">
                                                                <label class="col-md-2 control-label">Click Me to upload a Photo</label>
                                                                <input type="file" class="filestyle" data-input="false">
                                                            </div> -->
                                                             <div class="col-md-8 col-md-offset-6 m-t-50">
	                                            <button type="submit" name="action" class="btn btn-custom waves-light waves-effect w-md" id="action" onclick="addStudent()">Submit</button>
                                                <button type="submit" name="action" class="btn btn-custom waves-light waves-effect w-md" id="update" onclick="updateStudent()">Update</button>
	                                       
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
                                            
                                            <th>Status</th>
                                            <th>Action</th>
                                            

                                            
                                            
                                                                                  
                                        </tr>
                                         
                                        </thead>
                                        <tbody id="dataTablesBody">

                                       
                                       
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>




                    </div> <!-- container -->

                </div> <!-- content -->


<script type="text/javascript">
   $('#update').hide();
    function addStudent() {
        
       if ($('#dept').val() == '') {
          alert("dept  must be Required");        
                    
                      
      }else{
          var formData = new FormData();
          formData.append("op","addDepartment");
          
          formData.append("dept",$('#dept').val());
     
                
                $.ajax({
                    url:'handler/addDepartment.php',
                    type:'POST',
                    processData:false,
                    contentType:false,
                    async:false,
                    data:formData,
                    success:function(result){
                        alert(result);
                        obj=JSON.parse(result);
                        if(obj.err==0){
                           
                            $('#dept').val('');
                            
                            $('#action').show();
                            $('#update').hide();
                            loadDataIntoTab();
                        }else{
                            alert(obj.result);
                        }
                    }
                });       

    }
}
     function loadDataIntoTab(){
      var formData = new FormData();
      formData.append("op","fetchDepartment");
      $.ajax({
          url : 'handler/addDepartment.php',
          type : 'POST',
          processData: false,
          contentType: false,
          async : false,
          data :formData,
          success:function(result)
          {
          console.log(result);
          obj = JSON.parse(result);
              var code = '';
              if(obj.err==0)
              {
                var n;
                for(n in obj.data){
                  code = code + '<tr>'+
                              '<td>'+(parseInt(n)+1)+'</td>'+
                              
                              
                              
                             
                              '<td>'+obj.data[n].dept+'</td>'+
                            
                              
                              '<td>';
                                  if (obj.data[n].status == 0) {
                                    code = code + '<button class="btn btn-success waves-effect w-md waves-light" id="updateStatusTabEle" onclick="updateStatusTabEle(this);" data-id="'+obj.data[n].id+'" data-val="1" type="submit">Activate</button>';
                                                                      }else{
                                    code = code + '<button class="btn btn-inverse btn-bordered waves-effect w-md waves-light" id="updateStatusTabEle" onclick="updateStatusTabEle(this);" data-id="'+obj.data[n].id+'" data-val="0" type="submit">Deactivate</button>';
                                                                       
                                  }

                              
                                  
                              code = code + '</td>'+
                              '<td>'+
                                  '<button class="btn btn-warning waves-effect w-md waves-light" id="editTabEle" onclick="editTabEle(this);" data-id="'+obj.data[n].id+'" type="submit">Edit</button>&nbsp;&nbsp;'+
                                  '<button class="btn btn-danger waves-effect w-md waves-light" id="deleteTabEle" onclick="deleteTabEle(this);" data-id="'+obj.data[n].id+'" type="submit">Delete</button>'+
                              '</td>'+
                              '</tr>';
                }
              }else{
                  alert(obj.result);
              }
              $('#dataTablesBody').empty();
              $('#dataTablesBody').html(code);
          }
      });
    }

    loadDataIntoTab();
    function editTabEle(obj){
      var formData = new FormData();
      formData.append("op","editDepartment");
      formData.append("id",$(obj).attr('data-id'));
      $.ajax({
          url : 'handler/addDepartment.php',
          type : 'POST',
          processData: false,
          contentType: false,
          async : false,
          data :formData,
          success:function(result)
          {
            console.log(result);
              obj = JSON.parse(result);
              if (obj.err == 0) {
                
                $('#dept').val(obj.dept);
               
                $('#sid').val(obj.id);
                $('#dept').focus();
                $('#update').show();
                $('#action').hide();
               
//                $('#imgpreview').attr('src',getBase64Image(document.getElementById("imgpreview"),obj.logo.substr((obj.logo.indexOf('.')+1),obj.logo.length)));
              }
          }
      });      
    }
    function deleteTabEle(obj){
      var formData = new FormData();
      formData.append("op","deleteDepartment");
      formData.append("id",$(obj).attr('data-id'));
      $.ajax({
          url : 'handler/addDepartment.php',
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

function updateStudent(obj){
      if ($('#dept').val() == '') {
         alert("Department is required");                
     }               
      else{
          var formData = new FormData();
          formData.append("op","updateDepartment");
          
          formData.append("dept",$('#dept').val());
         
          formData.append("id",$('#sid').val());
          
              $.ajax({
                  url : 'handler/addDepartment.php',
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
                         
                         
                          
                          $('#action').show();
                         
                          $('#update').hide();
                          loadDataIntoTab();
                      }else{
                          alert(obj.result);
                      }
                  }
              });
                 //setTimeout(function(){        }, 2000); 
         }
      }
    

    function updateStatusTabEle(obj) {
      var formData = new FormData();
      formData.append("op","updateStatus");
      formData.append("id",$(obj).attr('data-id'));
      formData.append("status",$(obj).attr('data-val'));
      $.ajax({
          url : 'handler/addDepartment.php',
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

require 'footer1.php';

?>