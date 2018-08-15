<?php
	
	function u($string="") {
	  return urlencode($string);
	}

	function redirect_to($location) {
	  header("Location: " . $location);
	  exit;
	}

    function login($username, $password){
    	global $database;

        $get = $database->query("SELECT user,username,password FROM users WHERE username ='".$database->escape_value($username)."' AND status=1 LIMIT 1;");
        $result = $database->fetch_array($get);

        if ($database->num_rows($get)>0) {

        	if (password_verify($password,$result['password'])) {
        		log_in_user($result);
        		return true;
        	}else{
        		$_SESSION['msg1'] = 'Unable to Log in';
        		return false;
        	}
        }else{
        	$_SESSION['msg1'] = 'Unable to Log in';
        	return false;
        }
    }

    function require_login() {
	    if(!is_logged_in()) {
	      redirect_to(ROOT);
	    } else {
	      // Do nothing, let the rest of the page proceed
	    }
	}

	function log_in_user($user) {
		// Renerating the ID protects the admin from session fixation.
	    session_regenerate_id();
	    $_SESSION['authId'] = $user['user'];
	    $_SESSION['user'] = $user['username'];
	    $_SESSION['last_login'] = time();
	    $tmp = GetUserInfo($user['user']);
	    $_SESSION['site'] = $tmp['site'];
	    return true;
	}
	 
	function is_logged_in() {
	    return isset($_SESSION['authId']);
	} 


    //prevent injection
    function qry($query) {
      $args  = func_get_args();
      $query = array_shift($args);
      $query = str_replace("?", "%s", $query);
      $args  = array_map('mysql_real_escape_string', $args);
      array_unshift($args,$query);
      $query = call_user_func_array('sprintf',$args);
      return $query;
    }
 

	function Attend($site='',$attandee,$user)
	{
		global $database;
		$date = date('Y-m-d');
		$time = date('H:i:s');
		$param = GetLastStatus($attandee);

		$results =$database->query("INSERT INTO attendance(attandee, att, date, parms, site) VALUES('{$attandee}','".$time."','{$date}','".$database->escape_value($param)."','{$site}')");
		$id = $database->inset_id();
		return GetAttInfo($attandee);
	}

	function GetAttInfo($value='')
	{
		global $database;
		$results = $database->fetch_array($database->query("SELECT m.fname, m.lname, m.idnumber, m.phone, m.address, f.data, f.mime, s.value FROM members AS m, files AS f, settings AS s WHERE f.id=m.img AND m.position=s.extra AND s.name='pos' AND m.id = '".$database->escape_value($value)."' LIMIT 1"));
		return $results;
	}

	function isLogedin($id)
	{

	}

	function Getid($code){
		global $database;

		$results = $database->fetch_array($database->query("SELECT id FROM members WHERE idnumber = '".$database->escape_value($code)."' LIMIT 1"));
		$id = $results['id'];
		return $id;
	}

	function GetLastStatus($id){
		global $database;
		$results = $database->fetch_array($database->query("SELECT parms FROM attendance WHERE attandee = '".$database->escape_value($id)."' AND DATE(date) ='".date('Y-m-d')."' ORDER BY id DESC LIMIT 1"));
		
		$status = $results['parms'];
		if ($status == 'c_in') {
			return 'c_out';
		}elseif ($status == 'c_out') {
			return 'c_in';
		}else{
			return 'c_in';
		}
	}

	function GetUserInfo($code=''){
		global $database;
		
		if ($code == '') {
			$qry = "SELECT m.*,f.data FROM members AS m, files AS f WHERE m.img=f.id ";
			$results = $database->query($qry);
			return $results;
		}elseif ($code == 'prof') {
			$code = $_SESSION['authId'];
			$qry = "SELECT m.*,f.data FROM members AS m,users AS u,files AS f WHERE f.id=m.img AND u.user=m.id AND u.user= ".$database->escape_value($code)." LIMIT 1";
			$results = $database->fetch_array($database->query($qry));
			return $results;
			
		}else{
			$qry = "SELECT m.* FROM members AS m,users AS u WHERE u.user=m.id AND u.user= ".$database->escape_value($code)." LIMIT 1";
			$results = $database->fetch_array($database->query($qry));
			return $results;
		}
	}

	function GetPosition($value='')
	{
		global $database;
		
		if ($value == '') {
			$qry = "SELECT * FROM settings WHERE name='pos'";
			$results = $database->query($qry);
			return $results;
		}else{
			$qry = "SELECT value FROM settings WHERE name='pos' AND extra= '".$database->escape_value($value)."' LIMIT 1";
			$results = $database->fetch_array($database->query($qry));
			return $results['value'];
		}
		
	}

	function WSite($params,$value='')
	{
		global $database;
		$a = '';
		if ($params = 'get') {
			
			if ($value == '') {
				$qry = "SELECT * FROM settings WHERE name='sites'";
				$results = $database->query($qry);
				$a = $results;
			}else{
				$qry = "SELECT value FROM settings WHERE name='sites' AND extra= '".$database->escape_value($value)."' LIMIT 1";
				$results = $database->fetch_array($database->query($qry));
				$a = $results['value'];
			}
		}elseif ($params = 'set') {
			# Set New Site
		}elseif ($parms = 'update') {
			# Update Existing Site
		}
	}

	function Upload(){

		$target_dir = "data/profiles/";
		$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
		$uploadOk = 1;
		$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
		// Check if image file is a actual image or fake image
		if(isset($_POST["submit"])) {
		    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
		    if($check !== false) {
		        echo "File is an image - " . $check["mime"] . ".";
		        $uploadOk = 1;
		    } else {
		        echo "File is not an image.";
		        $uploadOk = 0;
		    }
		}
		// Check if file already exists
		if (file_exists($target_file)) {
		    echo "Sorry, file already exists.";
		    $uploadOk = 0;
		}
		// Check file size
		if ($_FILES["fileToUpload"]["size"] > 500000) {
		    echo "Sorry, your file is too large.";
		    $uploadOk = 0;
		}
		// Allow certain file formats
		if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
		&& $imageFileType != "gif" ) {
		    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
		    $uploadOk = 0;
		}
		// Check if $uploadOk is set to 0 by an error
		if ($uploadOk == 0) {
		    echo "Sorry, your file was not uploaded.";
		// if everything is ok, try to upload file
		} else {
		    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
		        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
		    } else {
		        echo "Sorry, there was an error uploading your file.";
		    }
		}
	}

	function AddUser($data,$user,$files){

		global $database;
		global $blobObj;
		global $msg;
		$id;
		$data = explode('|',$data);
		
		$options = [
		    'cost' => 10,
		];

		$user_fname		= $data['0'];
		$user_lname		= $data['1'];
		$o_name			= $data['2'];
		$user_gn		= $data['3'];
		$user_post		= $data['4'];
		$id_num			= $data['5'];
		$user_phone		= $data['6'];
		$user_add		= $data['7'];
		$user_site		= $data['8'];
		$user_role		= $data['9'];
		$username		= $data['10'];
		$email			= $data['11'];	
		$user_pass		= $data['12'];	
		$user_pass_rep	= $data['13'];	
		$user_pic		= $files;

		$b = $user_pic['user_pic1']['tmp_name'];
		$b1 = $user_pic['user_pic1']['type'];
		$b2 = $user_pic['user_pic1']['size'];

		if (Getid($id_num)) {
			$msg = '<div class="alert alert-danger alert-dismissible">
					    <button type="button" class="close" data-dismiss="alert">&times;</button>
					    <strong>Failed!</strong> The User Is Already In The System, Consider Editing His/Her Information.
					  </div>';
		}else{

			if ($b2 == 0) {
				
				$msg = '<div class="alert alert-danger alert-dismissible">
						    <button type="button" class="close" data-dismiss="alert">&times;</button>
						    <strong>Failed!</strong> To Register New User Due To The Provided Image.
						  </div>';
			}else{

				if ($blobObj->insertBlob($b,$b1,$b2)) {
					$id = $blobObj->last_id();
					$qry = $database->query("INSERT INTO members(fname, mname, lname, sex, position, idnumber, phone, address, role, img, site, register, reg_date,email) VALUES ('{$user_fname}','{$o_name}','{$user_lname}','{$user_gn}','{$user_post}','{$id_num}','{$user_phone}','{$user_add}','{$user_role}','{$id}','{$user_site}','{$user}','".date('Y-m-d H:i:s')."','{$email}')");

					$id = $database->inset_id();
					if ($id) {

						if (!empty($username) && !empty($email) && !empty($user_pass_rep)) {
							
							$qry = $database->query("INSERT INTO users(user, userName, password, status, apdate) VALUES ('{$id}','{$username}','".password_hash($user_pass,PASSWORD_BCRYPT, $options)."','1','0')");
							if ($database->inset_id()) {
								
								$msg = '<div class="alert alert-success alert-dismissible">
										    <button type="button" class="close" data-dismiss="alert">&times;</button>
										    <strong>Registered!</strong> New User\'s been Registered And Marked \'Admin\'  Successfully!.
										  </div>';
							}
						}else{

							$msg = '<div class="alert alert-success alert-dismissible">
									    <button type="button" class="close" data-dismiss="alert">&times;</button>
									    <strong>Registered!</strong> New User\'s been Registered Successfully!.
									  </div>';
						}
						
					}else{

						$msg = '<div class="alert alert-danger alert-dismissible">
								    <button type="button" class="close" data-dismiss="alert">&times;</button>
								    <strong>Failed!</strong> To register new member!.
								  </div>';
					}
				}else{
					unset($id);
					$msg = '<div class="alert alert-danger alert-dismissible">
							    <button type="button" class="close" data-dismiss="alert">&times;</button>
							    <strong>Failed!</strong> To Register New User Due To The Provided Image.
							  </div>';
				}
			}
		}
	}

	function ShowAllAttendance($user='',$dfrom='',$dto='')
	{
		# code...
	}

	function WTimes($params,$value='')
	{
		global $database;
		$a = "";
		if ($parms == 'set') {
			$results = $database->query("INSERT INTO settings (name,value) VALUES('times','{$value}')");
		}elseif ($parms == 'get' && $value !='') {
			$results = $database->fetch_array($database->query("SELECT value FROM settings where name = 'times' AND extra = '".$database->escape_value($value)."' LIMIT 1"));
			$a = $results['value'];
		}elseif ($value='') {
			$results = $database->fetch_array($database->query("SELECT value FROM settings where name = 'times'"));
			$a = $results;
		}

		return $a;

	}

	function WSites($params,$value='')
	{
		global $database;
		$a = "";
		if ($params == 'set') {
			$results = $database->query("INSERT INTO settings (name,value) VALUES('sites','{$value}')");
		}elseif ($params == 'get' && $value !='') {
			$results = $database->fetch_array($database->query("SELECT value FROM settings where name = 'sites' AND extra = '".$database->escape_value($value)."' LIMIT 1"));
			$a = $results['value'];
		}elseif ($value='') {
			$results = $database->fetch_array($database->query("SELECT value FROM settings where name = 'sites' "));
			$a = $results;
		}

		return $a;

	}
	function WPositions($parms,$value='')
	{
		global $database;
		$a = "";
		if ($parms == 'set') {
			# code...
		}elseif ($parms == 'get') {
			$results = $database->fetch_array($database->query("SELECT value FROM settings where name = 'pos' AND extra = '".$database->escape_value($value)."' LIMIT 1"));
			$a = $results['value'];
		}

		return $a;
	}

	function WAddress($parms, $value='')
	{
		global $database;
		$a = "";
		if ($parms == 'set') {
			# code...
		}elseif ($parms == 'get') {
			$results = $database->fetch_array($database->query("SELECT value FROM settings where name = 'distr' AND extra = '".$database->escape_value($value)."' LIMIT 1"));
			$a = $results['value'];
		}

		return $a;
	}
	function GetV($value)
	{
		global $database;

		$results = $database->query("SELECT value, extra FROM settings where name = '".$database->escape_value($value)."'");

		while ($row = $database->fetch_array($results)) {
			echo '<option value="'.$row["extra"].'">'.$row["value"].'</option>';
		}
	}
	function GetUser()
	{
		global $database;


	}

	function GetPos()
	{
		global $database;


	}

	function headNames($value='')
	{
		$res = GetUserInfo('prof');
		echo $res['fname'].' '.$res['lname'];
	}

	function headImg($value='')
	{
		$res = GetUserInfo('prof');
		if (empty($res['data'])) {
			echo '<img class="user-avatar" alt="" src="assets/images/noavatar.jpg" height="34" /> ';
		}else{
			// echo '<img class="user-avatar" src="data:'.$res['mime'].';base64,' . base64_encode( $res['data'] ) . '." alt="admin panel" style="width:50px !important; height:34px !important;" />';
			echo '<img class="user-avatar" alt="" src="assets/images/noavatar.jpg" height="34" /> ';
		}
	}

	function encryptIt($str) {
		$ck = "sdl";
		echo($str.'<br>');
		$str = base_convert($str, 10, 36);
		echo($str.'<br>');
		$str = @mcrypt_encrypt(MCRYPT_ARCFOUR, $ck, $str, MCRYPT_MODE_STREAM);
		echo($str.'<br>');
		$encoded = str_replace('=','', base64_encode($str));
		echo($encoded.'<br>');
		   			return $encoded;
	}
	function decryptIt($str) {
		$ck = "sdl";
		$str =base64_decode($str.'==');
		 
		$str = @mcrypt_encrypt(MCRYPT_ARCFOUR, $ck, $str, MCRYPT_MODE_STREAM);
		$decoded = base_convert($str, 36, 10);
		   			return $decoded;
	}

	function GetAllAtt($names='',$from='',$to='')
	{
		global $database;
		$i=1;
		$cke = false;
		$qry = "SELECT CONCAT(m.fname,' ',m.mname,' ',m.lname) AS names,m.idnumber,m.position,m.phone,m.site, a.date AS atDate, a.att AS atTime, CONCAT(a.date,' ',a.att) AS atDT FROM attendance AS a, members AS m ";
		$qry .= " WHERE a.attandee=m.id ";

		if ($from !='') {
			// $qry .= " WHERE a.attandee=m.id ";
			$qry .= " AND a.date >= '".$from."'";
			$cke  =TRUE;
		}
		if ($to !='' ) {
			if (!$cke) {
				// $qry .= " WHERE a.attandee=m.id ";
			}
			$qry .= " AND a.date <= '".$to."'";
		}
		if ($to == '' && $from == '') {
			$qry .= " GROUP BY a.date,m.idnumber ORDER BY a.id  DESC";
		}else{
		$qry .= " ORDER BY a.id  DESC";
		}
		return $database->query($qry);
	}

	function GetSpecificLogs($wrk='',$from='',$to='')
	{
		global $database;
		$i=1;
		$cke = false;
		$qry = "SELECT CONCAT(m.fname,' ',m.mname,' ',m.lname) AS names,m.idnumber,a.parms,m.position,m.phone,m.site, a.date AS atDate, a.att AS atTime, CONCAT(a.date,' ',a.att) AS atDT FROM attendance AS a, members AS m ";
			$qry .= " WHERE a.attandee=m.id AND m.idnumber='{$wrk}' ";

		if ($from !='') {
			// $qry .= " WHERE a.attandee=m.id AND m.idnumber='{$wrk}' ";
			$qry .= " AND a.date >= '".$from."'";
			$cke  =TRUE;
		}
		if ($to !='' ) {
			if (!$cke) {
				// $qry .= " WHERE a.attandee=m.id AND m.idnumber='{$wrk}' ";
			}
			$qry .= " AND a.date <= '".$to."'";
		}
		if ($to == '' && $from == '') {
			$qry .= " ORDER BY a.id  DESC";
		}else{
		$qry .= " ORDER BY a.id  DESC";
		}
		// echo encrypt(15).'<br>';
		// echo $qry.'<br>';
		// print_r($database->fetch_array($database->query($qry)));
		return $database->query($qry);
	}

	function encrypt($pure_string) {
	    $dirty = array("+", "/", "=");
	    $clean = array("_PLUS_", "_SLASH_", "_EQUALS_");
	    $_SESSION['encryption-key'] = 'Fezzopro';
	    $iv_size = mcrypt_get_iv_size(MCRYPT_BLOWFISH, MCRYPT_MODE_ECB);
	    $_SESSION['iv'] = mcrypt_create_iv($iv_size, MCRYPT_RAND);
	    $encrypted_string = mcrypt_encrypt(MCRYPT_BLOWFISH, $_SESSION['encryption-key'], utf8_encode($pure_string), MCRYPT_MODE_ECB, $_SESSION['iv']);
	    $encrypted_string = base64_encode($encrypted_string);
	    return str_replace($dirty, $clean, $encrypted_string);
	}

	function decrypt($encrypted_string) { 
	    $dirty = array("+", "/", "=");
	    $clean = array("_PLUS_", "_SLASH_", "_EQUALS_");
	    $_SESSION['encryption-key'] = 'Fezzopro';
	    $string = base64_decode(str_replace($clean, $dirty, $encrypted_string));

	    $decrypted_string = mcrypt_decrypt(MCRYPT_BLOWFISH, $_SESSION['encryption-key'],$string, MCRYPT_MODE_ECB, $_SESSION['iv']);
	    return $decrypted_string;
	}