<?php
	include_once('inc/sqlquery.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>登陆成功</title>
</head>
<body>
<?php 
	echo selectAll();	
?>
<br />
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
	<input type="text" class="textbox"  name="search_name"/>
	<input type="submit" class="btn" value="搜索" />
</form>
<?php 
	$username=$_POST["search_name"];
	if($username!=""){
		echo user_search($username);
	}
?>
</body>
</html>