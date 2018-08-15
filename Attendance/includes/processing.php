<?php
	if (isset($_GET['me'])) {
		$me = $_GET['me'];
		// echo(decrypt($me));
		$from = $_GET['from'];
		$to   = $_GET['to'];

		hit1(($me),$from,$to);
	}
	if (isset($_POST['s_rep'])) {
		$from = $_POST['r_d_from'];
		$to   = $_POST['r_d_to'];
		$name = $_POST['r_d_name'];
		hit($name,$from,$to);
	}else{
		if ($_SESSION['page'] == 'a_logs') {
			echo($_SERVER['HTTP_HOST']);
		hit();
		}
	}



	function hit($names='',$from='',$to='')
	{
		global $database;
		$i = 1;
		$results = getAllAtt($names,$from,$to);

		while ($row = $database->fetch_array($results)) {
			
			echo'<tr>
					<td class="text-center">'.$i.'</td>
					<td>'.$row["names"].'</td>
					<td>'.$row["idnumber"].'</td>
					<td>'.WPositions('get',$row["position"]).'</td>
					<td>'.WSites('get',$row["site"]).'</td>
					<td>'.$row["phone"].'</td>
					<td>'.$row["atDT"].'</td>
					<td><input type="hidden" value="'.$row["idnumber"].'" id="ok1" />
						<input type="hidden" value="'.$from.'" id="ok2" />
						<input type="hidden" value="'.$to.'" id="ok3" />
						<a target="_blank" href="'.ROOT.'/user_logs.php?me='.($row["idnumber"]).'&from='.$from.'&to='.$to.'">
						<span class="label label-success " id="ok" >Show Logs </span>
						</a>
					</td>
				</tr>';
				$i++;
		}
	}

	function hit1($names='',$from='',$to='')
	{
		global $database;
		$i = 1;
		$results = GetSpecificLogs($names,$from,$to);

		while ($row = $database->fetch_array($results)) {
			
			echo'<tr>
					<td class="text-center">'.$i.'</td>
					<td>'.$row["names"].'</td>
					<td>'.$row["idnumber"].'</td>
					<td>'.WSites('get',$row["site"]).'</td>
					<td>'.WPositions('get',$row["position"]).'</td>';
					if ($row['parms'] == 'c_in') {
							
						echo '<td>'.$row["atDT"].'</td>';
					}else{
						echo '<td></td>';
					}
					if ($row['parms'] == 'c_out') {
							
						echo '<td>'.$row["atDT"].'</td>';
					}else{
						echo '<td></td>';
					}

			echo '</tr>';
					// <td>'.$row["phone"].'</td>
					// <td><input type="hidden" value="'.$row["idnumber"].'" id="ok1" />
					// 	<input type="hidden" value="'.$from.'" id="ok2" />
					// 	<input type="hidden" value="'.$to.'" id="ok3" />
					// </td>
						// <span class="label label-success" id="ok" >Show Logs </span>
				$i++;
		}
	}