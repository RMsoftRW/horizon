<?php
ob_start();
error_reporting(0);
include_once("_includes/check_login_status.php");
include_once("encrypt_decrypt.php");
// Create the two new objects before we can use them below in this script
$sql = mysqli_query($db_conx, "SELECT * FROM ublog");
$num = mysqli_num_rows($sql);
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="ISO-8859-1">
<meta name="rating" content="General" />
<meta name="ROBOTS" content="All" /><title>Blogs</title>
</head>
<body>
<div id="pageMiddle">
	<?php if($num > 0){
	while($row = mysqli_fetch_array($sql)) {
		$blogid = $row["id"];
		$blogtitle = $row["blog_title"];
		echo '<p><b>Blog No. '.$blogid.': </b><a href="decrypt_part.php?id='.encryptIt($blogid).'">'.$blogtitle.'</a></p>';
	}} else { echo '<div class="reply_boxes"><p>@'.$u.', has no blogs yet</p></div>';} ?>
	</div>
</body>
</html>
