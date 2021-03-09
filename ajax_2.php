<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php
  
include("connect.php");
$idbaru =isset($_POST['userid']) ? $_POST['userid'] : '';
$query = mysqli_query($mysqli, "SELECT * FROM dataidpwuser WHERE iduser = '".$idbaru."'");

if(mysqli_num_rows($query) >= 1){
	echo "<font color='red'>ID is already in use, please enter a different one</font>";
}else{
    echo "ID available";
    

}
 
?>
</body>
</html>