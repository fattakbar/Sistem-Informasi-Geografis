<?php

require_once ('../inc/config.php');

$username=$_POST['username'];
$password = md5(trim($_POST['password']));


$sql = "update admin set password='$password' where username='$username'";

$result = mysql_query($sql) or die(mysql_error());

if ($result) {
	header('location:../index.php?mod=login&pg=cp_form&status=0');
} else {
	header('location:../index.php?mod=login&pg=cp_form&status=1');
}

?>
