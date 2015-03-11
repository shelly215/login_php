<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>注册</title>
<link  rel="stylesheet" type="text/css" href="styles/style.css"/>
<script language="javascript">
window.onload=function(){
	document.getElementById("username").focus();
}
function error(falseid,trueid,t)//各输入框的验证提示
{
	if(t.id=="username"&&(t.value.length<5||t.value.length>20||/^[a-zA-Z]$/.test(t.value[0])==false)){
		document.getElementById(falseid).style.display="";	
		document.getElementById(trueid).style.display="none";
		t.focus();
	}else if(t.id=="password"&&(t.value.length<6||t.value.length>20)){
		document.getElementById(falseid).style.display="";	
		document.getElementById(trueid).style.display="none";
		t.focus();
	}else if(t.id=="repassword"&&(t.value!=document.getElementById("password").value)){
		document.getElementById(falseid).style.display="";	
		document.getElementById(trueid).style.display="none";
		t.focus();
	}else if(t.id=="headphoto"){
		if(t.value.length==0){
			document.getElementById(falseid).style.display="";	
			document.getElementById(trueid).style.display="none";
			t.focus();
		}else if(t.value.length!=0){		
			var array=t.value.split(".");
			var type=array[1];
			if(!(type=="jpg"||type=="gif"||type=="png")){
				document.getElementById(falseid).style.display="";	
				document.getElementById(trueid).style.display="none";
				t.focus();
			}else{
				document.getElementById(falseid).style.display="none";
				document.getElementById(trueid).style.display="";
				//t.onabort();//出错！
			}
		}
		
	}else if(t.id=="nickname"&&t.value.length<=0){
		document.getElementById(falseid).style.display="";	
		document.getElementById(trueid).style.display="none";
		t.focus();
	}else if(t.id=="age"&&(t.value.length<4||t.value.length>0)&&(/^[0-9]+$/.test(t.value)==false)){
		document.getElementById(falseid).style.display="";	
		document.getElementById(trueid).style.display="none";
		t.focus();
	}else if(t.id=="email"&&(/\w+([-+.]\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*/.test(email.value)==false)){
		document.getElementById(falseid).style.display="";	
		document.getElementById(trueid).style.display="none";
		t.focus();
	}else if(t.id=="introduction"&&(t.value.length<=10)){
		document.getElementById(falseid).style.display="";	
		document.getElementById(trueid).style.display="none";
		t.focus();
	}else{		
		document.getElementById(falseid).style.display="none";
		document.getElementById(trueid).style.display="";
		t.onabort();
	} 
}
</script>
</head>
<body>
<div class="main">
	<div class="welcome">欢迎注册成为ci123.com新会员，请填写以下几项：（如果您已注册，请<a href="login.php" style="color:#333">在此登陆</a>）</div>
	<form action="sub/register_check.php" method="post" enctype="multipart/form-data">
		<table class="register-table">
			<tr>
				<td>用户名：</td>
				<td>
					<input type="text" class="textbox" id="username" name="username" onblur="error('alertuser','successuser',this)"/>
				</td>
                <td>
                  <div id="alertuser" style="display:none;">
                    <div class="alert"><img src="images/false.jpg" />&nbsp;只能用数字字母.-_且以字母开头，长度5-20个字符</div>
                  </div>
                  <div id="successuser" class="success" style="display:none"><img src="images/true.jpg" /></div>
                </td>
			</tr>
      		<tr><td></td><td class="prompt" colspan="2">请以字母开头，长度为5-20个字符</td></tr>
			<tr>
				<td>密码：</td>
				<td>
					<input type="password" class="textbox" id="password" name="password" onblur="error('alertpwd','successpwd',this)"/>
				</td>
                <td>
					<div id="alertpwd" style="display:none;">
                  <div class="alertpwd alert"><img src="images/false.jpg" />&nbsp;密码长度6-20位</div>
                  </div>
                  <div id="successpwd" class="success" style="display:none"><img src="images/true.jpg" /></div>
                </td>
			</tr>
      		<tr><td></td><td class="prompt" colspan="2">密码长度6-20位，字母请区分大小写</td></tr>
			<tr>
				<td>重复密码：</td>
				<td>
					<input type="password" class="textbox" id="repassword" name="repassword" onblur="error('alertRepwd','successRepwd',this)"/>	
				</td>
                <td>
                  <div id="alertRepwd" style="display:none;">
                  <div class="alertrepwd alert"><img src="images/false.jpg" />&nbsp;输入的密码与上面的不一致</div>
                  </div>
                  <div id="successRepwd" class="success" style="display:none"><img src="images/true.jpg" /></div>
                </td>
			</tr>
            <tr>
				<td>上传图像：</td>
				<td>
					<input type="file" name="file" id="headphoto" onblur="error('alertFile','successFile',this)"/> 
				</td>
                <td>
                  <div id="alertFile" style="display:none;">
                  <div class="alertrepwd alert"><img src="images/false.jpg" />&nbsp;请上传你的头像</div>
                  </div>
                  <div id="successFile" class="success" style="display:none"><img src="images/true.jpg" /></div>
                </td>
			</tr>
            <tr>
              <td>昵称：</td>
              <td>
                <input type="text" class="textbox" id="nickname" name="nickname"  onblur="error('alertnick','successnick',this)"/>
              </td>
              <td>
                <div id="alertnick" style="display:none;">
                  <div class="alert"><img src="images/false.jpg" />&nbsp;此处不能为空</div>
                </div>
                <div id="successnick" class="success" style="display:none"><img src="images/true.jpg" /></div>
              </td>
            </tr>
            <tr>
              <td>年龄：</td>
              <td>
                <input type="text" class="textbox" id="age" name="age"  onblur="error('alertage','successage',this)"/>
              </td>
              <td>
                <div id="alertage" style="display:none;">
                  <div class="alert"><img src="images/false.jpg" />&nbsp;只能为数字</div>
                </div>
                <div id="successage" class="success" style="display:none"><img src="images/true.jpg" /></div>
              </td>
            </tr>
            <tr>
              <td>性别：</td>
              <td>
                <input type="radio" class="" name="sex" value="1" checked="checked"/>男
                <input type="radio" class="" name="sex" value="0"/>女
              </td>
            </tr>
            <tr>
                <td>邮箱地址:</td>
                <td><input type="text" class="textbox" id="email" name="email" onblur="error('alertEmail','successEmail',this)"/></td>
                <td>
                  <div id="alertEmail" style="display:none;">
                  <div class="alertEmail alert"><img src="images/false.jpg" />&nbsp;邮箱格式错误</div>
                  </div>
                  <div id="successEmail" class="success"  style="display:none"><img src="images/true.jpg" /></div>
                </td>
          	</tr>
            <tr>
              <td>简介：</td>
              <td>
                <textarea class="introduction" id="introduction" name="introduction" onblur="error('alertintro','successintro',this)" ></textarea>
              </td>
              <td>
                <div id="alertintro" style="display:none;">
                  <div class="alert"><img src="images/false.jpg" />&nbsp;此处不少于20字</div>
                </div>
                <div id="successintro" class="success" style="display:none"><img src="images/true.jpg" /></div>
              </td>
            </tr>
            <tr>
              <td></td>
              <td><input type="checkbox" class="checkbox" name="iagree" style="float:left; display:inline; margin-right:6px;"/>我同意<a href="#" style="color:#333">《服务条款》</a></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" class="btn" value="完成注册" /></td>
            </tr>
		</table>
	</form>
</div>
</body>
</html>