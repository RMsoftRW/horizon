<?php 
ob_start();
error_reporting(0);
include_once("_includes/check_login_status.php");
include_once("encrypt_decrypt.php");
/////
if(isset($_GET['id'])){
	$b = preg_replace('#[^0-9]#i', '', decryptIt($_GET['id']));
} else {
	header("Location: home");
    exit();	
}
//GRAB PAGE ID
$blogid = "";
$blogtitle = "";
$blogbody = "";
//Get Blog data
$sql = mysqli_query($db_conx, "SELECT * FROM ublog WHERE id='$b' LIMIT 1");
$existCount = mysqli_num_rows($sql);
while($row = mysqli_fetch_array($sql)){
	$blogid = $row["id"];
	$blogtitle = $row["blog_title"];
	$blogbody = $row["blog_body"];
}	
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="ISO-8859-1">
<meta name="Keywords" content="<?php echo $blogtitle; ?>" />
<meta name="rating" content="General" />
<meta name="ROBOTS" content="All" /><title><?php echo $blogtitle; ?></title>
</head>
<body><div id="pageMiddle">

	<div id="blogTitle"><h3 style="color:#696772">Blog No. <?php echo decryptIt($_GET['id']); ?>: <?php echo $blogtitle; ?></h3><hr style="border:#696772 1px solid;" />
</div>
	<div id="blogContent" style="padding:8px; border:#eee 1px solid; background: #F7F7F7; margin-bottom:12px;"><p><?php echo $blogbody; ?></p><div class="clear"></div></div>
</div>
</body>
</html>
