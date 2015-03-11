<?php
	include_once('../inc/sqlquery.php');
	//setrawcookie("username",$_POST["username"], time()+86400);
	//setrawcookie("password",$_POST["password"], time()+86400);

$username=$_POST["username"];
$password=$_POST["password"];
$count=login_check(	$username,$password);
if($count==0){
	echo "<meta http-equiv='Content-Type' content='text/html; charset=utf-8' /><script>alert('密码错误！');window.location.href='../login.php';</script>"; 
}else if($count==1){
	$url="../login_ok.php"; 
	echo "<script type='text/javascript'>";  
	echo "window.location.href='{$url}'";
	echo "</script>"; 
}
?>
