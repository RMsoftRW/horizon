<?php
	// print_r($_SESSION);
		// $_SESSION['editable_u'] = '';
	if (isset($_POST['editable_u']) && !empty($_POST['editable_u'])) {
		$_SESSION['editable_u'] = $_POST['editable_u'];
	}else{
		// unset($_SESSION['editable']);
	}
	if (isset($_SESSION['page']) && $_SESSION['page'] == 'edit') {
			$page = 'edit';
		}elseif(isset($_SESSION['page']) && $_SESSION['page'] == 'scan'){
			$page = 'scan';
		}
	getData();

	function getData()
	{
		global $database;
		global $page;
		$data = GetUserInfo();
		$x =1;

		while ($row = $database->fetch_array($data)) {

			if ($page == 'edit') {
				
				$action = '<span><button class="label label-sm label-info" data-toggle="modal" data-target="#myModal" onclick=\'setsession('.$row["idnumber"].')\'>Edit user</button></span>';
			}elseif ($page == 'scan') {
				
				$action = '<span>
								<form method="POST" action="'.htmlspecialchars($_SERVER["PHP_SELF"]).'">
									<input type="hidden" value="'.$row["idnumber"].'" name="scodes" >
									<input type="hidden" value="" name="c_in[]" id="status" >
									<button class="label label-sm label-success">Approve Attendance</button>
								</form>
								</span>';
			}
			
			if ($row['data']) {
				$img = '<img width="80" style = " height : 53px !important" class="img img-responsive" src="data:'.$row['mime'].';base64,' . base64_encode( $row['data'] ) . '"  alt="picture" />';
			}else{

				$img = '<img  width="80" style = " height : 53px !important" class="img img-responsive" src="assets/images/user_attendance.jpg" alt="picture" />';
			}
			echo '
				<tr class="odd gradeX">
										<td>
											<input type="checkbox" class="checkboxes" value="'.$row['id'].'"/>
										</td>
										<td>
											<figure class="margin-bottom-10"><!-- image -->
												'.$img.'
											</figure>
											 
										</td>
										<td style="padding: 20px ">
											'.$row['lname'].' '.$row['mname'].' '.$row['fname'].'
										</td>
										<td style="padding: 20px ">
											 '.$row['phone'].'
										</td>
										<td style="padding: 20px ">
											'.GetPosition($row['position']).'
										</td>
										<td style="padding: 20px ">
											'.$action.'
										</td>
									</tr>';

			$x++;
		}
		// echo json_encode($output);
	}