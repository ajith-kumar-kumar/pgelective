<?php
	$res = array('tag' => 'null', 'err'=> 500, 'result'=>'aj dev',"query"=>"nill");
	
	if (isset($_POST['op']) && $_POST['op'] != '') {
		require '../db_config.php';
			$op = $_POST['op'];
		$res['tag'] = $op;
		if ($op == 'addStudent') {
			$name = mysqli_real_escape_string($db, $_POST['name']);
			$rollno = mysqli_real_escape_string($db, $_POST['rollno']);
			$email = mysqli_real_escape_string($db, $_POST['email']);

			$classs = mysqli_real_escape_string($db, $_POST['classs']);
			$dept = mysqli_real_escape_string($db, $_POST['dept']);
			$pass = mysqli_real_escape_string($db, $_POST['pass']);
			
			if (mysqli_num_rows(mysqli_query($db, "SELECT * FROM login  WHERE  roll_no = '$rollno' OR email='$email' ")) == 0) {
					// mysqli_query($db,"SET AUTOCOMMIT = 0");
					// mysqli_query($db,"COMMIT");
					$sql = "INSERT INTO `login`( `email`, `uname`, `password`, `roll_no`, `class`, `department`) VALUES ('$email','$name','$pass','$rollno','$classs','$dept')";
 					$insert = mysqli_query($db, $sql);
					if ($insert == 1) {
						
									$res['err'] = 0;
									$res['result'] = 'Student was added';
									echo json_encode($res);																				
																
								}else{
						// mysqli_query($db,"COMMIT");
						// mysqli_query($db,"SET AUTOCOMMIT = 1");
						$res['err'] = 3;
						$res['result'] = 'Student was not added';
						echo json_encode($res);																				
					}
			}else{
				$res['err'] = 4;
				$res['result'] = 'Student Already Exist';
				echo json_encode($res);													
			}

		}elseif ($op =='fetchStudent') {
			$fetch = mysqli_query($db, "SELECT  * FROM login");
			if (mysqli_num_rows($fetch) > 0) {
				$data = array();
				$res['data'] = array();
				while ($ele = mysqli_fetch_array($fetch)) {
					$data['id'] = $ele['id'];
					$data['name'] = $ele['uname'];
					$data['email'] = $ele['email'];
					$data['pass'] = $ele['password'];
					$data['roll_no'] = $ele['roll_no'];
					$data['classs'] = $ele['class'];
					$data['dept'] = $ele['department'];
					$data['status'] = $ele['status'];

					
				
					array_push($res['data'], $data); 
				}
				$res['err'] = 0;
				$res['result'] = 'Data was loaded';
				echo json_encode($res);
			}else{
				$res['err'] = 1;
				$res['result'] = 'Data was not found';
				echo json_encode($res);				
			}
		}elseif ($op == 'updateStatus') {
			
			$id = mysqli_real_escape_string($db, $_POST['id']);
			$status = mysqli_real_escape_string($db, $_POST['status']);
			$update = mysqli_query($db , "UPDATE `login` SET `status`= '$status' WHERE id = '$id'");
			if ($update == 1) {
				$res['err'] = 0;
				$res['result'] = $status == 1?'Activated':'Deactivated';
				
				echo json_encode($res);
			}else{
				$res['err'] = 1;
				$res['result'] = 'Try once again';
				echo json_encode($res);				
			}
		}elseif ($op =='deleteStudent') {
			$id = mysqli_real_escape_string($db, $_POST['id']);
			
			$delete = mysqli_query($db , "DELETE FROM `login` WHERE id = '$id' ");
			if ($delete == 1) {
				
					$res['err'] = 0;
					$res['result'] = 'Student was Deleted';
					echo json_encode($res);
				}else{
					
					$res['err'] = 2;
					$res['result'] = 'Student was not Deleted';
					echo json_encode($res);				
				}
			
		}elseif ($op =='editStudent') {
			$id = mysqli_real_escape_string($db , $_POST['id']);
			$ele = mysqli_fetch_array(mysqli_query($db, "SELECT * FROM `login` WHERE id ='$id';"));
			$res['id'] = $ele['id'];
			$res['name'] = $ele['uname'];
			$res['email'] = $ele['email'];
			$res['rollno'] = $ele['roll_no'];
			$res['dept'] = $ele['department'];
			$res['pass'] = $ele['password'];
			$res['classs'] = $ele['class'];
			
			$res['result'] = 'Data Fetched';
			$res['err'] = 0;
			echo json_encode($res);
		}elseif ($op =='updateStudent') {
			$name = mysqli_real_escape_string($db, $_POST['name']);
			$email = mysqli_real_escape_string($db, $_POST['email']);
			$rollno = mysqli_real_escape_string($db, $_POST['rollno']);
			$classs = mysqli_real_escape_string($db, $_POST['classs']);
			
			$pass = mysqli_real_escape_string($db, $_POST['pass']);
			$dept = mysqli_real_escape_string($db, $_POST['dept']);
			
			$id = mysqli_real_escape_string($db, $_POST['id']);
			// $res['query'] = "SELECT * FROM login Where   roll_no = '$rollno' OR email='$email'  AND id <> '$id'";
			if (mysqli_num_rows(mysqli_query($db, "SELECT id FROM login WHERE   (roll_no = '$rollno' OR email='$email') AND id <> '$id' ")) == 0) {
					
					$sql="UPDATE login SET uname='$name', email='$email', roll_no='$rollno', class='$classs', password='$pass' , department='$dept' WHERE id='$id'";
						
									$update = mysqli_query($db, $sql);
									if ($update == 1) {
										$res['err'] = 0;
										$res['result'] = 'Student was updated';
										echo json_encode($res);																				
									}else{
										;
										$res['err'] = 3;
										$res['result'] = 'Student was not updated';
										echo json_encode($res);																				
									}
															
							
				}else{
					$res['err'] = 4;
					$res['result'] = 'Student Already Exist';
					echo json_encode($res);													
				}
			
		}


		else{
			$res['err'] = 404;
			$res['result'] = 'Invalid operation';
			echo json_encode($res);
		}
	}else{
			$res['err'] = 500;
			$res['result'] = 'Invalid Request';
			echo json_encode($res);		
	}



?>
