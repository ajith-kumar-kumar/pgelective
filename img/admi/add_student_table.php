 
<?php require '../db_config.php'; ?>
 <table id="example1" class="table table-bordered table-stripped ">
                <thead>
                  <tr>
                  <th>S_id</th>
                  <th>Class</th>
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
                  <td  class="aj"><?php echo $sid; ?></td>
                  <td><?php echo $fetch['class']; ?>
                  </td>
                  <td><?php echo $fetch['roll_no']; ?></td>
                  <td><?php echo $fetch['uname']; ?></td>
                  <td><?php echo $fetch['password'] ?></td>
                  <td><?php echo $fetch['department']; ?>
                    </td>
                <td><?php echo $fetch['photo']; ?></td>
          <td>
          <button type="submit" class="btn bg-purple margin" onclick='edit("<?php echo $fetch['id'];?>", "<?php echo $fetch['uname'];?>","<?php echo $fetch['password']; ?>","<?php echo $fetch['roll_no']; ?>","<?php echo $fetch['class']; ?>","<?php echo $fetch['department'] ?>","<?php echo $fetch['photo']; ?>" )' style="margin-top: -2px;">Edit</button>
                    
          <button type="submit" class="btn bg-purple margin" onclick="dele(<?php echo $fetch['id']; ?>);" style="margin-top: -2px;">Delete</button>
          </td>

<?php 
if ($fetch['status']==1) {
   ?>
   <td> 
  <label class="switch">

  <input type="checkbox" id="status" checked onclick="status(<?php echo  $fetch['id'] ?>,0)">

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