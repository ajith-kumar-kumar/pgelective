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
                                    <h4 class="page-title">STUDENT INFORMATION </h4>
                                    
                                    <div class="clearfix"></div>
                                </div>
							</div>
						</div>
                        <!-- end row -->


                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card-box">
                                    <h4 class="m-t-0 header-title"><b>Add User</b></h4>
                              
                              <div class="row">
                                <div class="col-md-6">
                                  <div class="form-horizontal">
                                    <div class="form-group">
                                                  <label class="col-md-2 control-label">User Name</label>
                                                  <div class="col-md-10">
                                                      <input type="text" required="" class="form-control" id="name" name="name" placeholder ="Enter a Name....">
                                                  </div>
                                              </div>
                                               <div class="form-group">
                                                  <label class="col-md-2  control-label">Roll Number</label>
                                                  <div class="col-md-10">
                                                      <input type="text" required="" class="form-control" id="rollno" name="rollno" placeholder ="Enter a Rolnumber...">
                                                  </div>
                                              </div>
                                             
                                              <div class="form-group">
                                                  <label class="col-md-2 control-label">Class</label>
                                                  <div class="col-md-10">
                                                      <input type="text" id="classs" required="" class="form-control" name="classs" placeholder="Enter a Class...">
                                                  </div>
                                              </div>
                                    <div class="form-group">
                                                  <label class="col-sm-2 control-label">Department</label>
                                                  <div class="col-sm-10">
                                                      <select id="dept"  name="dept" class="selectpicker" data-live-search="true" data-style="btn-default">
                                                        <?php  
                                                        $query=mysqli_query($db,"SELECT * FROM department");
                                                          
                                                             while ($res=mysqli_fetch_array($query)) {
                                                         ?>
                                                  <option><?php echo $res['department']; ?></option>
                                                         
                                                          <?php   }
                                                           ?>
                                                      </select>  
                                                  </div>
                                              </div>
                                              <!-- <div class="form-group">
                                                  <label class="col-md-2 control-label">Department</label>
                                                  <div class="col-md-10">
                                                      <input type="text" id="dept" required="" name="dept" class="form-control" placeholder ="Enter a Dept...">
                                                  </div>
                                              </div>
                                               -->

                                             </div>
                                </div>

                                <div class="col-md-6">
                                  <div class="form-horizontal">
                                     <div class="form-group">
                                                  <label class="col-md-2 control-label" for="example-email">Email</label>
                                                  <div class="col-md-10">
                                                      <input type="email"  required="" id="email" name="email" class="form-control" placeholder="Enter a Email...">
                                                  </div>
                                              </div>

                                             
                                              <div class="form-group">
                                                  <label class="col-md-2 control-label">PassWord</label>
                                                  <div class="col-md-10">
                                                      <input type="Password" required="" class="form-control" id="pass" name="pass" placeholder ="Enter a PassWord...">
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
                                            <th>Name</th>
                                            <th>Roll Number</th>
                                            <th>Email</th>
                                            <th>Class</th>
                                            <th>Department</th>
                                            <th>password</th>
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
        
        if ($('#name').val() == '') {
          alert("Name is required");        
      }else if ($('#rollno').val() == '') {
          
     
          alert("Browse a logo please");                
      }else if ($('#classs').val() == 0) {
          alert("class must be Required");        
      }else if ($('#dept').val() == '') {
          alert("dept  must be Required");        
      }else if ($('#email').val() == '') {
          alert("Email is required");                
      }else if ($('#pass').val() == '') {
          alert("Password is required");                
                      
      }else{
          var formData = new FormData();
          formData.append("op","addStudent");
          formData.append("name",$('#name').val());
          formData.append("rollno",$('#rollno').val());
          formData.append("classs",$('#classs').val());
          formData.append("dept",$('#dept').val());
          formData.append("email",$('#email').val())
          ;
          formData.append("pass",$('#pass').val());
                
                $.ajax({
                    url:'handler/addStudent.php',
                    type:'POST',
                    processData:false,
                    contentType:false,
                    async:false,
                    data:formData,
                    success:function(result){
                        alert(result);
                        obj=JSON.parse(result);
                        if(obj.err==0){
                            $('#name').val('');
                            $('#rollno').val('');
                            $('#classs').val('');
                            $('#dept').val('');
                            $('#email').val('');
                            $('#pass').val('');
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
      formData.append("op","fetchStudent");
      $.ajax({
          url : 'handler/addStudent.php',
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
                              
                              
                              
                              '<td>'+obj.data[n].name+'</td>'+
                              '<td>'+obj.data[n].roll_no+'</td>'+
                              '<td>'+obj.data[n].email+'</td>'+
                              '<td>'+obj.data[n].classs+'</td>'+
                              '<td>'+obj.data[n].dept+'</td>'+
                              '<td>'+obj.data[n].pass+'</td>'+
                              
                              '<td>';
                                  if (obj.data[n].status == 0) {
                                    code = code + '<button class="btn btn-success waves-effect w-md waves-light" id="updateStatusTabEle" onclick="updateStatusTabEle(this);" data-id="'+obj.data[n].id+'" data-val="1" type="submit">Activate</button>';
                                                                      }else{
                                    code = code + '<button  class="btn btn-inverse btn-bordered waves-effect w-md waves-light" id="updateStatusTabEle" onclick="updateStatusTabEle(this);" data-id="'+obj.data[n].id+'" data-val="0" type="submit">Deactivate</button>';
                                                                       
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
      formData.append("op","editStudent");
      formData.append("id",$(obj).attr('data-id'));
      $.ajax({
          url : 'handler/addStudent.php',
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
                $('#name').val(obj.name);
                $('#email').val(obj.email);
                $('#classs').val(obj.classs);
                
                $('#rollno').val(obj.rollno);
                $('#dept').val(obj.dept);
                $('#pass').val(obj.pass);
                $('#sid').val(obj.id);
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
      formData.append("op","deleteStudent");
      formData.append("id",$(obj).attr('data-id'));
      $.ajax({
          url : 'handler/addStudent.php',
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
      if ($('#name').val() == '') {
         alert("Name is required");        
      }else if ($('#email').val() == '') {
         alert("email is required");        
      }else if ($('#rollno').val() == 0) {
         alert("rollno be Required");        
      }else if ($('#classs').val() == '') {
         alert("class must be Required");        
      }else if ($('#dept').val() == '') {
         alert("Department is required");                
      }else if ($('#pass').val() == '') {
         alert(" password is required"); }               
      else{
          var formData = new FormData();
          formData.append("op","updateStudent");
          formData.append("name",$('#name').val());
          formData.append("email",$('#email').val());
          formData.append("rollno",$('#rollno').val());
          formData.append("classs",$('#classs').val());
          formData.append("dept",$('#dept').val());
          formData.append("pass",$('#pass').val());
          formData.append("id",$('#sid').val());
          
              $.ajax({
                  url : 'handler/addStudent.php',
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
                          $('#name').val('');
                          $('#email').val('');
                          $('#classs').val('');
                          $('#dept').val('');
                          $('#pass').val('');
                           $('#rollno').val('');
                         
                          
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
          url : 'handler/addStudent.php',
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