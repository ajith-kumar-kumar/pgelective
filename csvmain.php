<?php 
ini_set('max_execution_time', 600);

require 'db_config.php';
if(!empty($_FILES['employee_file']['name'])){

    $output="";
        $allowed_ext = array("csv","xlsx");
        $extension = end(explode(".",$_FILES['employee_file']['name']));
        if(in_array($extension,$allowed_ext)){
            $file_data = fopen($_FILES['employee_file']['tmp_name'], "r");
            fgetcsv($file_data);

            while($row = fgetcsv($file_data))
            {


                $uname = mysqli_real_escape_string($db,$row[0]);
                $email = mysqli_real_escape_string($db,$row[1]);
                $password = mysqli_real_escape_string($db,$row[2]);
                $class = mysqli_real_escape_string($db,$row[3]);
                $department = mysqli_real_escape_string($db,$row[4]);
                $roll_no = mysqli_real_escape_string($db,$row[5]);
                // $photo= mysqli_real_escape_string($db,$row[6]);
                

                 $query = "INSERT INTO login (email,uname,password,roll_no,class,department)
                 VALUES ('$email','$uname','$password','$roll_no','$class','$department')";
                    mysqli_query($db,$query);

            
            
        }
            $select= "SELECT * FROM login";
            $result=mysqli_query($db,$select);
            $output .= '    
            <table class="table table-bordered table-stripped">
            <tr>
            
            <th>Name</th>
            <th>Email</th>
            <th>Class</th>  
            <th>Department</th>                     
            <th>Roll Number</th>
            <th>Password</th>
            
            

            <th>Action</th>
             <th>Status</th>
             </tr> '    ;

             while($row=mysqli_fetch_array($result)){
                $output .= '  
                <tr>
                <
                <td>'.$row["uname"].'</td>
                <td>'.$row["email"].'</td>
                <td>'.$row["class"].'</td>
                <td>'.$row["department"].'</td>
                <td>'.$row["roll_no"].'</td>
                <td>'.$row["password"].'</td>

                
                 
                 </tr> ';
             }

             $output .="</table>";
             echo $output;
        }else{
            echo "error1";
        }
     
}else{
    echo  "error";
}


?>