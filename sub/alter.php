<?php
include_once('../inc/sqlquery.php');

$headphoto=$_FILES["file"]["name"];
alter($_REQUEST["id"],$headphoto);
?>
<?php 
	include_once('../inc/watermark.php');
    saveimage($_FILES["file"]);//保存图片到本地
    imageWaterMark("../upload/{$headphoto}",1,'../upload/A.png');//图片水印
    echo "<meta http-equiv='Content-Type' content='text/html; charset=utf-8' /><script>alert('图片修改成功');window.location.href='../login_ok.php';</script>";
?>
