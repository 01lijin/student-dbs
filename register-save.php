<?php 
//创建连接
include("conn.php");

// 邮箱
$inputEmail = empty($_POST['inputEmail']) ? "null":strtolower($_POST['inputEmail']);
// 用户名
$uname = empty($_POST['uname']) ? "null":$_POST['uname'];
// 密码
$passWord = empty($_POST['passWord']) ? "null":$_POST['passWord'];
// 密码提示
$question = empty($_POST['question']) ? "null":$_POST['question'];
// 答案
$answer = empty($_POST['answer']) ? "null":$_POST['answer'];

if ($question=='xx') {
             $question='你的小学在哪里上?';
}else if ($question=='xm') {
             $question='你的最好朋友的姓名?';
}else if ($question=='rq') {
             $question='你的最有纪念意义的日期?';
}

 // 选择有没有邮件名称一样的
$scc="select email,name,password,question,answer from user where email = '{$inputEmail}'";
$rcc = mysqli_query($conn,$scc);
if (mysqli_num_rows($rcc) >=1) {
	echo "<p class='pp'>此邮件已经重复注册</p>";
	// echo "<script>$('.pp').slideDown(50);</script>";
	header("Refresh:2;url=register.php");
	// die();
}else{
	$sql="insert into user(email,name,password,question,answer) value('$inputEmail','$uname','$passWord','$question','$answer')";
	$result = mysqli_query($conn,$sql);
	if ($result) {
	echo "<p class='pp'>注册成功</p>";
	header("Refresh:2;url=login.php");
	}else{
	echo "<p class='pp'>注册失败</p>".mysqli_error($conn);
	header("Refresh:2;url=register.php");
	}
}
// 关闭数据库
mysqli_close($conn);
 ?>