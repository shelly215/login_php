<?php
	include_once('inc/sqlquery.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>登陆</title>
<link  rel="stylesheet" type="text/css" href="styles/style.css"/>

</head>
<body>
<div class="main">
	<form action="sub/login_check.php" method="post">
		<table class="register-table">
			<tr>
				<td>用户名：</td>
				<td>
					<input type='text' class='textbox' id='username' name='username'/>
				</td>
                <td>
                  <div id="alertuser" style="display:none;">
                    <div class="alert"><img src="images/false.jpg" />&nbsp;该用户不存在</div>
                  </div>
                </td>
			</tr>
			<tr>
				<td>密码：</td>
				<td>
					<input type="password" class="textbox" id="password" name="password" />
				</td>
			</tr>
            <tr>
                <td></td>
                <td><input type="submit" class="btn" style="width:70px;margin-right:10px;" value="登陆" />
                	<input type="button" class="btn" id="register" onclick="regist()" style="width:70px;margin-right:10px;" value="注册" />
                </td>
            </tr>
       </table>     
  </form>
</div>
</body>
</html>
<script type="text/javascript">
function regist(){
	window.location.href="register.php";
}
function error(falseid,t,user){//各输入框的验证提示
	if(t.id=="username"){
		if(t.value.length==0 || user==0){
			alert(user+t.value);
			document.getElementById(falseid).style.display="";
		}else if(t.value.length!=0 && user==1){
			document.getElementById(falseid).style.display="none";
		}		
	}
}
</script>
