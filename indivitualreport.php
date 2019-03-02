<?php
require 'header.php';
?>
  
            <div class="content-page">
                <div class="content">
                    <div class="container">
                         <div class="row">
							               <div class="col-xs-12">
								                <div class="page-title-box">
                                    <h4 class="page-title">CONTROL</h4>
                                    <div class="clearfix"></div>
                                </div>
							               </div>
						            </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card-box">
                                    <h4 class="m-t-0 header-title"><b>SELECT DEPARTMENT</b></h4>
                                    <div class="row">
                                        <div class="col-md-6">
                                          <form  method="POST">
                                                <div class="form-group">
                                                    <label class="col-sm-2 control-label">DEPARTMENT</label>
                                                    <div class="col-sm-10">
                                                        <select id="dept" name="dept" class="form-control">
                                                             <?php 
                     $sql1="SELECT * FROM department WHERE status='1'";
                     $query1=mysqli_query($db,$sql1);
                     if (mysqli_num_rows($query1) > 0) {
                        while ($res=mysqli_fetch_array($query1)) {      
                      ?>
                                                            
                            <option   value="<?php echo $res['department'];?>">
                              <?php  echo $res['department'];  ?></option> 
                                                           <?php   }}?>
                                                        </select>  
                                             <label class="col-sm-2 control-label">semester</label>

                                                        <select id="sem" name="sem" class="form-control">
                                                             <?php 
                     $sql2="SELECT * FROM control";
                     $query2=mysqli_query($db,$sql2);
                     if (mysqli_num_rows($query2) > 0) {
                        while ($res1=mysqli_fetch_array($query2)) {      
                      ?>
                                                            
                            <option   value="<?php echo $res1['sem'];?>">
                              <?php  echo $res1['sem'];  ?></option> 
                                                           <?php   }}?>
                                                        </select>  
                                                        <input type="hidden" name="value" id="value">
                                                    </div>
                                                </div>
                                          <div class="col-md-8 col-md-offset-10 m-t-50">
                                                   
                                                <button type="submit" name="submit" onclick="selection()"  id="but1" class="btn btn-purple waves-effect waves-light">Submit</button>
                                                </form>
                                          
                                        </div>

                                          
                                        </div>
                                    </div>
                           </div>
                       </div>
                   </div>


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
                                            <th>Subject Based</th>
                                            <th>interdisciplinary</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>


                                        <tbody id="body">
                                            <?php 
                                            if (isset($_POST['submit'])) {
                                             
                                                   $value=$_POST['value'];
                                                   
                                            }       
                            $sql="SELECT login.id,login.uname,login.roll_no,login.class,login.department,result.subject_based,result.interdisciplinary,result.r_id FROM login INNER JOIN result ON login.id=result.id WHERE login.department='$value' AND result.sem='".$_POST['sem']."' ";

                                        $query=mysqli_query($db,$sql);
                                        if(mysqli_num_rows($query)){
                                        while ($res=mysqli_fetch_array($query)) {
                                            
                                            ?>
                                        <tr>
                                            <td><?php echo $res['uname'] ?></td>
                                            <td><?php echo $res['roll_no'] ?></td>
                                            <td><?php echo $res['class'] ?></td>
                                            <td><?php echo $res['department'] ?></td>
                                            <td><?php echo $res['subject_based'] ?></td>
                                            <td><?php  echo $res['interdisciplinary'] ?></td>
                                            <td><button type="submit" id="delete"  name="delete"  onclick="action(<?php echo $res['id'] ?>)" class="btn btn-purple waves-effect waves-light">Delete</button></td>
                                        </tr>
                                        
                                      <?php }}?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>



                                </div>
                            </div>
                        </div>

<script type="text/javascript">
    function action(obj){
      console.log(obj);
     $.ajax({
        url:'handler/report_main.php',
        type:'POST',
        data:{obj:obj},

        async:false,
        success:function(result){
          // alert(result);
         if(result==1){
                 $('#body').load('indivitualreport.php #body');
         }
        }

     })
    }

    function selection(){
                                               var dept= $('#dept').val();
                                              var value=$('#value').val(dept);
                                              console.log(value);


                                              
                                               }
</script>

<?php

require 'footer.php';

?>