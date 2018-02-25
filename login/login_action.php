<?php
session_start();

include ('../inc/config.php');

$username = $_POST['username'];
$password = md5(trim($_POST['password']));
$sql = "select  * from  admin  where username='$username'
  and password='$password' ";

$sql_login = mysql_query($sql) or die(mysql_error());
$hasil = mysql_fetch_object($sql_login);

if(mysql_num_rows($sql_login) == 1) {
	$_SESSION['username'] = $username;

	header("Location:../index.php?mod=login&pg=welcome");

} else {
	header("Location:../index.php?mod=login&pg=form_login&s=1");
}?>
