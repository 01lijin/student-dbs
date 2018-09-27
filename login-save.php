<?php 
session_start();
//创建连接
include("conn.php");

// 邮箱
$inputEmail = empty($_POST['inputEmail']) ? "null":strtolower($_POST['inputEmail']);
// 密码
$passWord = empty($_POST['passWord']) ? "null":$_POST['passWord'];

$sql="select email,name,password,question,answer from user where email = '{$inputEmail}' and password='{$passWord}'";
$result = mysqli_query($conn,$sql);
if (mysqli_num_rows($result) >=1) {
	// 创建一个键session, 键为usname, 键为$mail
	$_SESSION['usname'] = $inputEmail;
	echo "<p class='pp'>登陆成功</p><script>document.cookie='usname={$inputEmail}';</script>";
	header("Refresh:100;url=index.php");
}else{
	echo "<p class='pp'>登录失败</p>".mysqli_error($conn);
	header("Refresh:100;url=login.php");
}

// 关闭数据库
mysqli_close($conn);
 ?>