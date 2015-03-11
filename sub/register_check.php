<?php
echo "<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />";
include_once('../inc/sqlquery.php');
include_once('../inc/register_verify.php');
//获取信息
$check =new Check();
$username=$check -> IsUsername($_POST["username"]);
$password=$check->IsPassword($_POST["password"]);
$repassword=$check->IsRePassword($_POST["repassword"],$password);
$headphoto=$check->IsHeadphoto($_FILES["file"]["name"]);
$nickname=$check->IsNickname($_POST["nickname"]);
$age=$check->IsAge(intval($_POST["age"]));
$sex=$_POST["sex"];
$email=$check->IsMail($_POST["email"]);
$introduction=$check->IsIntroduction($_POST["introduction"]);
$iagree=$_POST["iagree"];
if($username&&$password&&$repassword&&$headphoto&&$nickname&&$age&&$email&&$introduction&&$iagree){//
	echo insert($username,$password,$headphoto,$nickname,$age,$sex,$email,$introduction);
	include_once('../inc/watermark.php');
	saveimage($_FILES["file"]);//保存图片到本地
	imageWaterMark("../upload/{$headphoto}",1,'../upload/A.png');//图片水印
	echo "<meta http-equiv='Content-Type' content='text/html; charset=utf-8' /><script>alert('注册成功');window.location.href='../login_ok.php';</script>";
}else{
	echo "1y:".$username."2p:".$password."3p:"."4r:".$repassword ."4h:".$headphoto ."5n:".$nickname."6a:".$age."7s:".$sex ."8e:". $email."9i:".$introduction."10i:".$iagree;
	echo "<meta http-equiv='Content-Type' content='text/html; charset=utf-8' /><script>alert('注册失败');window.location.href='../register.php';</script>";
}
?>