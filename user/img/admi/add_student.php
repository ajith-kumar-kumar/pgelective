<?php
require 'header.php';
require '../db_config.php';
  ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

    <!-- Content Header (Page header) -->
   
       <div class="card" style="height:60px; width: 1375px;"> 
        <section class="content-header">
      <h1>
        Dashboard
        <small>Subject Based</small>
      </h1>
      
     </section></div>
     <form id="userdata" method="post">
     <div class="box box-warning" style="  width:1000px;margin-top:30px;margin-left: 50px;">
            <div class="box-header with-border">
              <h3 class="box-title">Add User</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              
                <!-- text input -->
                <div class="row">
                  <div class="col-lg-12">
                    
                   <div class="col-md-6">
                     <div class="form-group">
                  <h3> <small>email</small></h3>
                  <input type="email" class="form-control" name="email" id="email" placeholder="Enter a email" required>
                   </div>
                    <div class="form-group"   id="demo">

                  <h3> <small>Class</small></h3>
                  <input type="text" class="form-control" name="classs" id="classs" placeholder="Enter a Class"  required>
                   </div>
                     
                   <div class="form-group">
                  <h3> <small>User Name</small></h3>
                  <input type="text" class="form-control" name="uname" id="uname" placeholder="Enter a User Name" required>
                   </div>
                   <div class="form-group">
                  <h3> <small>Department</small></h3>
                  <input type="text" class="form-control"  name="dept" id="dept" placeholder="Enter a Department" required>
                   </div>
                  
                </div>
                  <div class="col-md-6">
                <div class="form-group">
                
                  <h3> <small>Roll Number</small></h3>
                  <input type="text" class="form-control" id="roll_no" name="roll_no" placeholder="Enter a Roll Number" required >
                </div>
                <div class="form-group">
                
                  <h3> <small>Password</small></h3>
                  <input type="password" class="form-control" name="pass" id="pass" required placeholder="Enter a Password">
                </div>
              
              <div class="form-group">
                  <label for="exampleInputFile"><h3><small>User Photo</small></h3></label>
                  <input type="file" id="fileToUpload" accept="image/jpg,image/png,image/gif" required  name="fileToUpload">
                  <input type="hidden" id=""   name="operation" value="add">
                  
                  
                </div>
                
                 <div class="box-footer">
                <button type="submit"  id="but1"  name="submit1" class="btn bg-purple margin">Submit</button>

                <input type="hidden" name="lid" id="lid">


                 <button type="submit" onclick="update();"  id="but2"  name="submit1" class="btn btn-primary">update</button>

               
                 

              </div>
            </div>
               </form> 
               <script type="text/javascript">

              $(document).ready(function (e) {
$("#userdata").on('submit',(function(e) {
e.preventDefault();


$.ajax({
url: "add_student_main.php", // Url to which the request is send
type: "POST",             // Type of request to be send, called as method
data: new FormData(userdata), // Data sent to server, a set of key/value pairs (i.e. form fields and values)
contentType: false,       // The content type used when sending data to the server.
cache: false,             // To unable request pages to be cached
processData:false,        // To send DOMDocument or non processed data file it is set to false
success: function(data)   // A function to be called if request succeeds
{
  //alert(data);
          var priority = 'success';
        var title    = 'Success';
        var message  = 'It worked!';

        $.toaster({ priority : priority, title : title, message : message });
         setTimeout(function () {
      window.location.reload();
    }, 2500)
}
});
}));
});
               </script>
            </div>
           </div>
           
            </div>
            </div>
            <div class="row">
        <div class="col-xs-12">
          <div class="box" style="width:1100px; margin-left: 10px;">
            <div class="box-header">
              <h3 class="box-title">Data Table With Full Features</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-stripped ">
                <thead>
                  <tr>
                  <th>S_id</th>
                  <th>Class</th>
                  <th>Email</th>

                  <th>Roll Number</th>
                  <th>User Name</th>
                  <th>Password</th>
                  <th>Department</th>
                  <th>Photo</th> 
                  <th>Action</th>
                  <th>Status</th>
                  </tr>
                </thead>
                
 <tbody>
                  
                <?php

                  $sql1="SELECT * FROM login";
                  $query1=mysqli_query($con,$sql1);
                  if (mysqli_num_rows($query1) > 0 ) {
                    
                  while($fetch=mysqli_fetch_array($query1)){

                 static $sid =1;


                 ?>
                  <tr>
                  <td><?php echo $sid; ?></td>
                  <td><?php echo $fetch['class']; ?>
                  </td>
                  <td><?php echo $fetch['email']; ?>
                  </td>
                  <td><?php echo $fetch['roll_no']; ?></td>
                  <td><?php echo $fetch['uname']; ?></td>
                  <td><?php echo $fetch['password'] ?></td>
                  <td><?php echo $fetch['department']; ?>
                    </td>
                <td><img src="<?php echo $fetch['photo']; ?>" style="width:100px;"></td>
          <td>
          <button type="submit" class="btn bg-purple margin" onclick='edit("<?php echo $fetch['id'];?>","<?php echo $fetch['email']; ?>", "<?php echo $fetch['uname'];?>","<?php echo $fetch['password']; ?>","<?php echo $fetch['roll_no']; ?>","<?php echo $fetch['class']; ?>","<?php echo $fetch['department'] ?>","<?php echo $fetch['photo']; ?>" )' style="margin-top: -2px;">Edit</button>
                    
          <button type="submit" class="btn bg-purple margin" onclick="dele(<?php echo $fetch['id']; ?>);" style="margin-top: -2px;">Delete</button>
          </td>


<?php 
if ($fetch['status']==1) {
   ?>
   <td> 
  <label class="switch">

  <input type="checkbox" name="status" id="status" checked onclick="status(<?php echo  $fetch['id'] ?>,0)">

  <span class="slider round"></span> 
  </label>
</td>
 <?php }else{

?>
<td> 
  <label class="switch">

  <input type="checkbox" id="status"
   onclick="status(<?php echo $fetch['id'] ?>,1)">

  <span class="slider round"></span> 
  </label>
</td><?php }?>

                </tr>
                 <?php $sid++; }}?>
              
               
                


                </tfoot>
              </table>
            </div>
          
        </div>
      </div>
           
          </div>
        
            
  </div>
    
  <div class="control-sidebar-bg"></div>
</div>
<script type="text/javascript">
  $('#but2').hide();
  function dele(a){
    var add="del";
     var classs=$('#classs').val();
      var email=$('#email').val();
  var uname= $('#uname').val();
    var dept=$('#dept').val();
    var roll_no=$('#roll_no').val();
    var pass=$('#pass').val();
   var photo= $('#fileToUpload').val();
   var a=a;
   

      
          $.ajax({



             url: "add_student_main.php",
                  data : { classs: classs, uname :uname,dept : dept, email:email, roll_no: roll_no, pass: pass, photo: photo, a: a,  add : add },

                   method: "POST",
      cache: false,
      success : function(msg){
        if (msg==1){
           var priority = 'success';
        var title    = 'Success';
        var message  = 'It worked!';

        $.toaster({ priority : priority, title : title, message : message });
         setTimeout(function () {
      window.location.reload();//will redirect to your blog page (an ex: blog.html)
    }, 2500)
        }
        else{
          alert("failed ");
        }
      }
});
} 
 function  status(a,b){

var add="status";
var a = a;
var b = b;

$.ajax({
   
  url:"add_student_main.php",
  method:"POST",
  data : {add : add, a : a, b: b},
  cache: false,
  success: function(data){
    
//alert(data);
if (data == 2) {
 

 

        
       
        var priority = 'success';
        var title    = 'Success';
        var message  = 'It worked!';

        $.toaster({ priority : priority, title : title, message : message });
         setTimeout(function () {
      window.location.reload();//will redirect to your blog page (an ex: blog.html)
    }, 2500)
 
}
else{ 
   var priority = 'danger';
        var title    = 'failed';
        var message  = 'error!';

  $.toaster({ priority : priority, title : title, message : message });
}
}

});

}

function edit(l_id,email,uname,pass,roll_no,classs,dept,photo){

var add="edit";
$('#but1').hide();
$('#but2').show();
var samplee=l_id;
 
   //console.log(uname);
  
$.ajax({


url:"add_student_main.php",
data: {samplee:samplee, email:email,add:add,classs:classs,uname:uname,dept,roll_no:roll_no,pass:pass,photo:photo},
method:"POST",
cache:false,
success:function(data){
  //alert(data);
if (data==3) {
//console.log(samplee);
//console.log(<?php $r; ?>);
//console.log(classs);
$('#classs').focus();
//$('#demo').show( $("#class").val());
$('#uname').val(uname);
$('#lid').val(samplee);
$('#email').val(email);
$('#pass').val(pass);
$('#roll_no').val(roll_no);
$('#classs').val(classs);
$('#dept').val(dept);
 $('#fileToUpload').val(photo);
}
//$('#exampleInputFile').val(photo);
//console.log(photo);

}
});
//return samplee;
//update(samplee);
}
 
//console.log(samplee);
 function update(){
  //$(document).on("submit","#editdata",function(){
  $("form#userdata").prop('id','editdata');
var uid=$('#lid').val();
  
  //console.log(uid);
//console.log(uid);
  var classs=$('#classs').val();
  var uname= $('#uname').val();
    var dept=$('#dept').val();
     var email=$('#email').val();
    var roll_no=$('#roll_no').val();
    var pass=$('#pass').val();
   var photo= $('#fileToUpload').val();
   var add="update";

$.ajax({
  url:"add_student_main.php",
  method:"POST",
data : { classs: classs, email:email, uname :uname,dept : dept, roll_no: roll_no, pass: pass, photo: photo,  add : add,uid:uid },
cache:false,
success: function(data){
  alert(data);
if(data==4)
{
   var priority = 'success';
        var title    = 'Success';
        var message  = 'updated!';

        $.toaster({ priority : priority, title : title, message : message });
         setTimeout(function () {
      window.location.reload();//will redirect to your blog page (an ex: blog.html)
    }, 2500)
}
else{
   var priority = 'danger';
        var title    = 'Success';
        var message  = 'OOPS! error';

        $.toaster({ priority : priority, title : title, message : message });
}


}

});
}




</script>
<script>
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>

      
  
</body>
<?php
require 'footer.php';
?>