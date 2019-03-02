<?php
	$res = array('tag' => 'null', 'err'=> 500, 'result'=>'aj dev',"query"=>"nill");
	
	if (isset($_POST['op']) && $_POST['op'] != '') {
		require '../db_config.php';
			$op = $_POST['op'];
		$res['tag'] = $op;
		if ($op == 'addDepartment') {
			
			$dept = mysqli_real_escape_string($db, ucwords($_POST['dept']));
			
			
			if (mysqli_num_rows(mysqli_query($db, "SELECT * FROM department  WHERE  department ='$dept' ")) == 0) {
					// mysqli_query($db,"SET AUTOCOMMIT = 0");
					// mysqli_query($db,"COMMIT");
					$sql = "INSERT INTO `department`( `department`) VALUES ('$dept')";
 					$insert = mysqli_query($db, $sql);
					if ($insert == 1) {
						
									$res['err'] = 0;
									$res['result'] = 'department was added';
									echo json_encode($res);																				
																
								}else{
						// mysqli_query($db,"COMMIT");
						// mysqli_query($db,"SET AUTOCOMMIT = 1");
						$res['err'] = 3;
						$res['result'] = 'department was not added';
						echo json_encode($res);																				
					}
			}else{
				$res['err'] = 4;
				$res['result'] = 'department Already Exist';
				echo json_encode($res);													
			}

		}elseif ($op =='fetchDepartment') {
			$fetch = mysqli_query($db, "SELECT  * FROM department");
			if (mysqli_num_rows($fetch) > 0) {
				$data = array();
				$res['data'] = array();
				while ($ele = mysqli_fetch_array($fetch)) {
					$data['id'] = $ele['id'];
					
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
			$update = mysqli_query($db , "UPDATE `department` SET `status`= b'$status' WHERE id = '$id'");
			if ($update == 1) {
				$res['err'] = 0;
				$res['result'] = $status == 1?'Activated':'Deactivated';
				
				echo json_encode($res);
			}else{
				$res['err'] = 1;
				$res['result'] = 'Try once again';
				echo json_encode($res);				
			}
		}elseif ($op =='deleteDepartment') {
			$id = mysqli_real_escape_string($db, $_POST['id']);
			
			$delete = mysqli_query($db , "DELETE FROM `department` WHERE id = '$id' ");
			if ($delete == 1) {
				
					$res['err'] = 0;
					$res['result'] = 'department was Deleted';
					echo json_encode($res);
				}else{
					
					$res['err'] = 2;
					$res['result'] = 'department was not Deleted';
					echo json_encode($res);				
				}
			
		}elseif ($op =='editDepartment') {
			$id = mysqli_real_escape_string($db , $_POST['id']);
			$ele = mysqli_fetch_array(mysqli_query($db, "SELECT * FROM `department` WHERE id ='$id';"));
			$res['id'] = $ele['id'];
			
			$res['dept'] = $ele['department'];
		
			
			$res['result'] = 'Data Fetched';
			$res['err'] = 0;
			echo json_encode($res);
		}elseif ($op =='updateDepartment') {
			
			$dept = mysqli_real_escape_string($db, ucwords($_POST['dept']));
			
			$id = mysqli_real_escape_string($db, $_POST['id']);
			// $res['query'] = "SELECT * FROM login Where   roll_no = '$rollno' OR email='$email'  AND id <> '$id'";
			if (mysqli_num_rows(mysqli_query($db, "SELECT id FROM department WHERE   (department='$dept') AND id <> '$id' ")) == 0) {
					
					$sql="UPDATE department SET  department='$dept' WHERE id='$id'";
						
									$update = mysqli_query($db, $sql);
									if ($update == 1) {
										$res['err'] = 0;
										$res['result'] = 'department was updated';
										echo json_encode($res);																				
									}else{
										;
										$res['err'] = 3;
										$res['result'] = 'department was not updated';
										echo json_encode($res);																				
									}
															
							
				}else{
					$res['err'] = 4;
					$res['result'] = 'department Already Exist';
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
