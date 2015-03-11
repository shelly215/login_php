<?php
	$con = mysql_connect("localhost","root","admin");
	if (!$con)
	  {
	  die('Could not connect: ' . mysql_error());
	  }
	mysql_select_db("my_db", $con);
	mysql_query('SET NAMES UTF8');// 改变数据库编码
	
	//check login
	function login_check($username,$password){
		$sql="select count(*) from users where username='{$username}' and password='{$password}'";
		$result = mysql_query($sql);
		$row = mysql_fetch_array($result);
		return $row[0];
		}
	//判断
	function user_exist($username){
		$sql="select count(*) from users where username='{$username}'";
	 	$result = mysql_query($sql);
	 	$row = mysql_fetch_array($result);
	 	return $row[0];
	}
	
	//插入数据
	function insert($username,$password,$headphoto,$nickname,$age,$sex,$email,$introduction){
		if(user_exist($username)==0){
			$sql ="insert into users (username, password,headphoto, nickname,age,sex,email,introduction) values ('{$username}','{$password}','{$headphoto}','{$nickname}',{$age},{$sex},'{$email}','{$introduction}')";
			mysql_query($sql);
		}
	}
	
	//删除
	function delete($id){
		$sql="delete from users where id='{$id}'";
		mysql_query($sql);
		}
	
	//修改头像
	function alter($id,$headphoto){
		$sql="update users set headphoto='{$headphoto}' where id ='{$id}'";
		mysql_query($sql);
		}
		
	//填写（部分）昵称或用户名（同一个输入框）搜索用户
	function user_search($username){
		$sql="select * from users where username like '%{$username}%'";
		$result = mysql_query($sql);
		while($row = mysql_fetch_array($result))
		  {
		  echo $row['username'] . " " . $row['nickname'];
		  echo "<br />";
		  }
		}
	
	//获取所有用户数据
	function selectAll(){
		$sql="select * from users";
		$result = mysql_query($sql);
		/*while($row = mysql_fetch_array($result))
		  {
		  echo $row['username'] . " " . $row['nickname'];
		  echo "<br />";
		  }*/
		 echo "<table border='1' style='border-spacing:0;'>
		  <tr>
		  <th>id</th>
		  <th>username</th>
		  <th>password</th>
		  <th>headphoto</th>
		  <th>nickname</th>
		  <th>age</th>
		  <th>sex</th>
		  <th>email</th>
		  <th>introduction</th>
		  <th>删除</th>
		  <th>修改头像</th>
		  </tr>";
		  while($row = mysql_fetch_array($result))
			{
				$i=$row['id'] ;
				echo "<tr>";
				echo "<td>" . $row['id'] . "</td>";
				echo "<td>" . $row['username'] . "</td>";
				echo "<td>" . $row['password'] . "</td>";
				echo "<td>" . "<div style='background:url(upload/{$row['headphoto']}) 0 0 no-repeat; width:80px; height:80px;'></div> </td>";
				echo "<td>" . $row['nickname'] . "</td>";
				echo "<td>" . $row['age'] . "</td>";
				echo "<td>" . $row['sex'] . "</td>";
				echo "<td>" . $row['email'] . "</td>";
				echo "<td>" . $row['introduction'] . "</td>";
				echo "<td><img src='images/false.jpg' onclick='delete_user({$i})'/></td>";
				echo "<td><form action='sub/alter.php?id={$i}' method='post' enctype='multipart/form-data'>
    						<input type='file' name='file' id='headphoto'/>
        					<input type='submit' class='btn' value='修改图像' />
    						</form>
					</td>";
				echo "</tr>";
			}
		  echo "</table>";
	}	
?>
<script type="text/javascript">
	function delete_user(id){
		window.location.href="sub/user_delete.php?id="+id;
	}
</script>