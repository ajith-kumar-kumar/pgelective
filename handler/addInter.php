<?php
	$res = array('tag' => 'null', 'err'=> 500, 'result'=>'Contact Technical Team',"query"=>"nill");
	if (isset($_POST['op']) && $_POST['op'] != '') {
		require '../db_config.php';
		$op = $_POST['op'];
		$res['tag'] = $op;
		if ($op == 'addInter') {
			$sem = mysqli_real_escape_string($db, $_POST['sem']);
			$title = mysqli_real_escape_string($db, $_POST['title']);
			$dept = mysqli_real_escape_string($db, $_POST['dept']);
			$limit = mysqli_real_escape_string($db, $_POST['limit']);
			$code = mysqli_real_escape_string($db, $_POST['code']);

			$cdept = mysqli_real_escape_string($db, $_POST['cdept']);
			$pdept = mysqli_real_escape_string($db, $_POST['pdept']);

			
			if (mysqli_num_rows(mysqli_query($db, "SELECT * FROM interdisciplinary WHERE title = '$title' OR code ='$code' ")) == 0) {
					mysqli_query($db,"SET AUTOCOMMIT = 0");
					mysqli_query($db,"COMMIT");
					$sql = "INSERT INTO `interdisciplinary`(`semester`, `code`, `department`,  `count`, `title`,`cdept`,`pdept`) VALUES ('$sem', '$code','$dept','$limit','$title','$cdept','$pdept')";
					
					$insert = mysqli_query($db, $sql);
					if ($insert == 1) {

						$id = mysqli_insert_id($db);
						
						$allowedext=array("pdf");
						$temp=explode(".", $_FILES['pdf']['name']);
						$extension=end($temp);
					 if ($_FILES['pdf']['name'] != '' && 
					($_FILES['pdf']['type'] == 'application/pdf' || $_FILES['pdf']['size'] < 4000000000 || in_array($extension, $allowedext) )) {
							$path = '../uploads/inter/';
							if(!is_dir($path)) {
							    mkdir($path);
							}
							$path = $path.$code.'.'.substr($_FILES['pdf']['type'], 12);
							$filename = $code.'.'.substr($_FILES['pdf']['type'], 12);
							if (move_uploaded_file($_FILES['pdf']['tmp_name'], $path)) {
								mysqli_query($db,"COMMIT");
								mysqli_query($db,"SET AUTOCOMMIT = 1");
								$update = mysqli_query($db, "UPDATE `interdisciplinary` SET `pdf`= '$filename' WHERE i_id = '$id'");
								if ($update == 1) {
									$res['err'] = 0;
									$res['result'] = 'subject was added';
									echo json_encode($res);																					
								}else{
									$res['err'] = 5;
									$res['result'] = 'Try once again...';
									echo json_encode($res);												
								}
							}else{
								mysqli_query($db,"ROLLBACK");
								mysqli_query($db,"COMMIT");
								mysqli_query($db,"SET AUTOCOMMIT = 1");
								$res['err'] = 2;
								$res['result'] = 'pdf upload was failed';
								echo json_encode($res);														
							}
						}else{
							mysqli_query($db,"ROLLBACK");
							mysqli_query($db,"COMMIT");
							mysqli_query($db,"SET AUTOCOMMIT = 1");
							$res['err'] = 1;
							$res['result'] = 'this must be a pdf File';
							echo json_encode($res);									
						}
					}else{
						mysqli_query($db,"COMMIT");
						mysqli_query($db,"SET AUTOCOMMIT = 1");
						$res['err'] = 3;
						$res['result'] = 'pdf was not added';
						echo json_encode($res);																				
					}
			}else{
				$res['err'] = 4;
				$res['result'] = 'title Already Exist';
				echo json_encode($res);													
			}

		}elseif ($op =='fetchInter') {
			$fetch = mysqli_query($db, "SELECT * FROM interdisciplinary");
			if (mysqli_num_rows($fetch) > 0) {
				$data = array();
				$res['data'] = array();
				while ($ele = mysqli_fetch_array($fetch)) {
					$data['id'] = $ele['i_id'];
					$data['dept'] = $ele['department'];
					$data['code'] = $ele['code'];
					$data['cdept'] = $ele['cdept'];
					$data['pdept'] = $ele['pdept'];

					$data['sem'] = $ele['semester'];
					$data['title'] = $ele['title'];
					$data['limit'] = $ele['count'];

					
					$data['status'] = $ele['status'];
					
					array_push($res['data'], $data); 
				}
				$res['err'] = 0;
				$res['result'] = 'data was loaded';
				echo json_encode($res);
			}else{
				$res['err'] = 1;
				$res['result'] = 'data was not found';
				echo json_encode($res);				
			}
		}elseif ($op == 'updateStatus') {
			mysqli_query($db,"COMMIT");
			mysqli_query($db,"SET AUTOCOMMIT = 1");
			$id = mysqli_real_escape_string($db, $_POST['id']);
			$status = mysqli_real_escape_string($db, $_POST['status']);
			$update = mysqli_query($db , "UPDATE `interdisciplinary` SET `status`= b'$status' WHERE i_id = '$id'");
			if ($update == 1) {
				$res['err'] = 0;
				$res['result'] = $status == 1?'Activated':'Deactivated';
				$res['q'] = "UPDATE `interdisciplinary` SET `status`= b'$status' WHERE i_id = '$id'";
				echo json_encode($res);
			}else{
				$res['err'] = 1;
				$res['result'] = 'Try once again';
				echo json_encode($res);				
			}
		
		}elseif ($op =='deleteInter') {
			$id = mysqli_real_escape_string($db, $_POST['id']);
$logo = mysqli_fetch_array(mysqli_query($db, "SELECT `pdf` FROM `interdisciplinary` WHERE i_id = '$id'"))['pdf'];
			mysqli_query($db,"SET AUTOCOMMIT = 0");
			mysqli_query($db,"COMMIT");
			$delete = mysqli_query($db , "DELETE FROM `interdisciplinary` WHERE i_id = '$id' ");
			if ($delete == 1) {
				if (unlink('../uploads/inter/'.$logo)) {
					mysqli_query($db,"COMMIT");
					mysqli_query($db,"SET AUTOCOMMIT = 1");
					$res['err'] = 0;
					$res['result'] = 'Event was Deleted';
					echo json_encode($res);
				}else{
					mysqli_query($db,"ROLLBACK");
					mysqli_query($db,"COMMIT");
					mysqli_query($db,"SET AUTOCOMMIT = 1");
					$res['err'] = 2;
					$res['result'] = 'Oops!!! Something went wrong...';
					echo json_encode($res);				
				}
			}else{
				$res['err'] = 1;
				$res['result'] = 'Some other data use this Event...';
				echo json_encode($res);				
			}
		}elseif ($op =='editInter') {
			$id = mysqli_real_escape_string($db , $_POST['id']);
			$ele = mysqli_fetch_array(mysqli_query($db, "SELECT * FROM `interdisciplinary` WHERE i_id ='$id';"));
			$res['id'] = $ele['i_id'];
			$res['dept'] = $ele['department'];
			$res['cdept'] = $ele['cdept'];
			$res['pdept'] = $ele['pdept'];

			$res['code'] = $ele['code'];
			$res['title'] = $ele['title'];
			$res['limit'] = $ele['count'];
			$res['sem'] = $ele['semester'];
			$res['pdf'] = $ele['pdf'];
			
			$res['result'] = 'Data Fetched';
			$res['err'] = 0;
			echo json_encode($res);
		}elseif ($op =='updateInter') {
				$sem = mysqli_real_escape_string($db, $_POST['sem']);
			$title = mysqli_real_escape_string($db, $_POST['title']);
			$dept = mysqli_real_escape_string($db, $_POST['dept']);
			$limit = mysqli_real_escape_string($db, $_POST['limit']);
			$code = mysqli_real_escape_string($db, $_POST['code']);

			$cdept = mysqli_real_escape_string($db, $_POST['cdept']);
			$pdept = mysqli_real_escape_string($db, $_POST['pdept']);
			$id = mysqli_real_escape_string($db, $_POST['id']);

	// if (mysqli_num_rows(mysqli_query($db, "SELECT `i_id` FROM `interdisciplinary` WHERE code = '$code' OR title = '$title' AND  i_id <> '$id'")) == 0) {
				
				
					
						if ($_FILES['pdf']['name'] != '' && 
					($_FILES['pdf']['type'] == 'application/pdf' || $_FILES['pdf']['size'] < 4000000000 || in_array($extension, $allowedext) )) {
						$path = '../uploads/inter/';
						if(!is_dir($path)) {
						    mkdir($path);
						}
						$path = $path.$id.'.'.substr($_FILES['pdf']['type'], 12);
						$filename = $id.'.'.substr($_FILES['pdf']['type'], 12);
						$res['extension'] = substr($_FILES['pdf']['type'], 12);
						$res['filepath'] = $path;
						$imgpath = mysqli_fetch_array(mysqli_query($db, "SELECT `pdf` FROM `interdisciplinary` WHERE i_id = '$id'"))['pdf'];
						if (explode('.', $imgpath)[1] != $_FILES['pdf']['type']) {
							mysqli_query($db,"SET AUTOCOMMIT = 0");
							mysqli_query($db,"COMMIT");
							if (unlink('../uploads/inter/'.$imgpath)){
								mysqli_query($db,"COMMIT");
								mysqli_query($db,"SET AUTOCOMMIT = 1");
								if (move_uploaded_file($_FILES['pdf']['tmp_name'], $path)) {
									$update = mysqli_query($db, "UPDATE `interdisciplinary` SET `department`='$dept',`pdf`='$imgpath',`code`='$code',`title`='$title',`count`='$limit', `cdept`='$cdept',`pdept`='$pdept',`sem`='$sem' WHERE i_id = '$id'");
									if ($update == 1) {
										$res['err'] = 0;
										$res['result'] = 'User was updated';
										echo json_encode($res);																				
									}else{
										$res['err'] = 3;
										$res['result'] = 'User was not updated';
										echo json_encode($res);																				
									}
								}else{
									$res['err'] = 2;
									$res['result'] = 'Logo upload was failed';
									echo json_encode($res);														
								}
							}else{
								mysqli_query($db,"ROLLBACK");
								mysqli_query($db,"COMMIT");
								mysqli_query($db,"SET AUTOCOMMIT = 1");
								$res['err'] = 5;
								$res['result'] = 'Oops!!! Something went wrong...';
								echo json_encode($res);				
							}
						}else{
							if (move_uploaded_file($_FILES['pdf']['tmp_name'], $path)) {
								$update = mysqli_query($db, "UPDATE `interdisciplinary` SET `department`='$dept',`pdf`='$filename',`code`='$code',`title`='$title',`count`='$count', `cdept`='$cdept',`pdept`='$pdept',`sem`='$sem' WHERE i_id = '$id'");
								if ($update == 1) {
									$res['err'] = 0;
									$res['result'] = 'User was updated';
									echo json_encode($res);																				
								}else{
									$res['err'] = 3;
									$res['result'] = 'User was not updated';
									echo json_encode($res);																				
								}
							}else{
								$res['err'] = 2;
								$res['result'] = 'Photo upload was failed';
								echo json_encode($res);														
							}							
						}
					}else{
						$res['err'] = 1;
						$res['result'] = 'A file must be a pdf File';
						echo json_encode($res);									
					}

				
			// }else{
			// 		$res['err'] = 4;
			// 		$res['result'] = 'subject already Exist';
			// 		echo json_encode($res);													
			// 	}
			
		}else{
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
