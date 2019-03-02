<?php

require 'header.php';

?>
   <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <body >
            <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container">


                        <div class="row">
							<div class="col-xs-12">
								<div class="page-title-box">
                                    <h4 class="page-title">SUBJECT BASED</h4>
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
                                    <h4 class="m-t-0 header-title"><b> Add Subject Based Details</b></h4>
                        			
                        			<div class="row">
                        				<div class="col-md-6">
                        						<input type="hidden" name="sid" id="sid">
	                                             <div class="form-group">
	                                                <label class="col-md-2 control-label">SEM</label>
	                                                <div class="col-md-10">
	                                                   <select name="sem" id="sem" class="form-control">
                                                        <?php 
                                                       $query=mysqli_query($db,"SELECT * FROM control");
                                                       while ($res=mysqli_fetch_array($query)) {
                                            
                                                         ?>   
                                                         <option><?php echo $res['sem']; ?></option>
                                                         <?php } ?>
                                                       </select>
	                                                </div>
	                                            </div>
	                                           <div class="form-group">
	                                                <label class="col-md-2 control-label">title</label>
	                                                <div class="col-md-10">
	                                                    <input required type="text" name="title" id="title" class="form-control" placeholder ="Enter a title...">
	                                                </div>
	                                            </div>
	                                            <div class="form-group">
	                                                <label class="col-sm-2 control-label">DEPARTMENT</label>
	                                                <div class="col-sm-10">
	                                                    <select   name="dept" id="dept" class="form-control">
	                                                        <?php 
                                                            
                                                    $query=mysqli_query($db ,"SELECT * FROM department WHERE status =b'1' ORDER BY department " );
                                                    while ($res=mysqli_fetch_array($query)) {
                                                    
                                                    
                                                             ?>
                                                <option> <?php echo $res['department']; ?></option>
                                                <?php } ?>
	                                                    </select>  
	                                                </div>
	                                            </div>
                        						
	                                            
	                                            

	                                           
	                                    
                        				</div>


                        				<div class="col-md-6">
                                             <div class="form-group">
                                                    <label class="col-md-2 control-label">code</label>
                                                    <div class="col-md-10">
                                                        <input required type="text" name="code" id="code" class="form-control" placeholder ="Enter a code...">
                                                    </div>
                                                </div>
                        					
                        						<div class="form-group">
                                                    <label class="col-md-2 control-label">limit</label>
                                                    <div class="col-md-10">
                                                        <input required type="number" name="limit" id="limit" class="form-control" placeholder ="Enter a limit...">
                                                    </div>
                                                </div>

	                                           
	                                           
	                                            <div class="form-group">
                                                                <label class="col-md-6 control-label">Click Me to upload a Photo</label>
                                            <input required type="file" accept="application/pdf" name="pdf" id="pdf" class="filestyle" data-input="false" >
                                            <input type="text" id="file" name="file">
                                                            </div>
                                                             <div class="col-md-8 col-md-offset-6 m-t-50">
	                                            <button type="submit" name="action" class="btn btn-purple waves-effect waves-light" id="action" onclick="addSubject()">Submit</button>
                                                <button type="submit" name="action" class="btn btn-purple waves-effect waves-light" id="update" onclick="updateSubject()">Update</button>
	                                       
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

                                    <h4 class="m-t-0 header-title"><b>Subject DETAILS</b></h4>
                                  

                                    <table id="datatable-responsive"
                                           class="table table-striped  table-colored table-info dt-responsive nowrap">
                                        <thead>
                                        <tr>
                                            <th>S.NO</th>
                                            
                                           
                                            <th>Department</th>
                                            <th>Title</th>
                                            <th>Semester</th>
                                            <th>Code</th>

                                            <th>limit</th>

                                            <th>Action</th>
                                            <th>Status</th>
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
    function addSubject() {
        
        if ($('#sem').val() == '') {
          alert("sem is required");        
      }else if ($('#title').val() == '') {
          
     
          alert("title must be required");                
      }else if ($('#dept').val() == 0) {
          alert("dept must be Required");        
      }else if ($('#dept').val() == '') {
          alert("dept  must be Required");        
      }else if ($('#limit').val() == '') {
          alert("limit is required"); }
          else if ($('#limit').val() == '') {
          alert("limit is required"); }
          else if ($('#pdf').val() == '') {
          alert("pdf is required"); } 
          else if($('#code').val()==''){
            alert('code is required');
          }              
      else{
          var formData = new FormData();
          formData.append("op","addSubject");
          formData.append("sem",$('#sem').val());
          formData.append("title",$('#title').val());
          formData.append("dept",$('#dept').val());
          formData.append("limit",$('#limit').val());
         formData.append("code",$('#code').val());

       formData.append("pdf",document.getElementById("pdf").files[0]);
                $.ajax({
                    url:'handler/addSubject.php',
                    type:'POST',
                    processData:false,
                    contentType:false,
                    async:false,
                    data:formData,
                    success:function(result){
                        alert(result);
                        obj=JSON.parse(result);
                        if(obj.err==0){
                            $('#sem').val('');
                            $('#title').val('');
                            $('#dept').val('');
                            $('#limit').val('');
                            $('#file').val('');
                            $('#code').val('');

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
      formData.append("op","fetchSubject");
      $.ajax({
          url : 'handler/addSubject.php',
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
                                 '<td>'+obj.data[n].title+'</td>'+
                            '<td>'+obj.data[n].sem+'</td>'+
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
                  alert(obj.result, 4000);
              }
              $('#dataTablesBody').empty();
              $('#dataTablesBody').html(code);
          }
      });
    }
    loadDataIntoTab();
    function editTabEle(obj){
      var formData = new FormData();
      formData.append("op","editSubject");
      formData.append("id",$(obj).attr('data-id'));
      $.ajax({
          url : 'handler/addSubject.php',
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
                $('#sem').val(obj.sem);
                $('#title').val(obj.title);
                $('#dept').val(obj.dept);
                $('#code').val(obj.code);

                $('#limit').val(obj.limit);
                $('#sid').val(obj.id);
                 $('#file').val(obj.pdf); 

                $('#name').focus();
                $('#update').show();
                $('#action').hide();
               
//                $('#imgpreview').attr('src',getBase64Image(document.getElementById("imgpreview"),obj.logo.substr((obj.logo.indexOf('.')+1),obj.logo.length)));
              }
          }
      });      
    }
    function deleteTabEle(obj){
      var formData = new FormData();
      formData.append("op","deleteSubject");
      formData.append("id",$(obj).attr('data-id'));
      $.ajax({
          url : 'handler/addSubject.php',
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

function updateSubject(obj){
      if ($('#sem').val() == '') {
         alert("sem is required");        
      }else if ($('#title').val() == '') {
         alert("title is required");        
      }else if ($('#dept').val() == 0) {
         alert("department be Required");        
      }else if ($('#limit').val() == '') {
         alert("limit must be Required");        
       } else if ($('#code').val() == '') {
         alert("code must be Required");        
       } else if(document.getElementById('pdf').files.length ==0){
       alert("browse a logo");}              
      else{
          var formData = new FormData();
          formData.append("op","updateSubject");
          formData.append("sem",$('#sem').val());
          formData.append("title",$('#title').val());
          formData.append("dept",$('#dept').val());
          formData.append("limit",$('#limit').val());
                    formData.append("code",$('#code').val());

       formData.append("pdf",document.getElementById("pdf").files[0]);
          formData.append("id",$('#sid').val());
          
              $.ajax({
                  url : 'handler/addSubject.php',
                  type : 'POST',
                  processData: false,
                  contentType: false,
                  async : false,
                  data :formData,
                  success:function(result)
                  {
                    alert(result);
                      obj = JSON.parse(result);
                      if(obj.err==0)
                      {
                          
                         alert(obj.result);
                          $('#sem').val('');
                          $('#title').val('');
                          $('#dept').val('');
                          $('#limit').val('');
                            $('#code').val('');

                            $('#sem').focus();
                            $('#title').focus();


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
          url : 'handler/addSubject.php',
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