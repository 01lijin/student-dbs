<?php 
session_start();
//创建连接
include("conn.php");

// 邮箱
$inputEmail = empty($_POST['inputEmail']) ? "null":$_POST['inputEmail'];

// 密码提示
$question = empty($_POST['question']) ? "null":$_POST['question'];
// 答案
$answer = empty($_POST['answer']) ? "null":$_POST['answer'];


$responseArr = array(
	"code" => 200,
	"msg" => "登录成功"
);

 // 选择有没有邮件名称一样的
$sql="select id,email,name,password,question,answer from user where email='{$inputEmail}'";
$result = mysqli_query($conn,$sql);
if (mysqli_num_rows($result) >0) {
	// 提示邮箱正确
	$arr = mysqli_fetch_assoc($result);
	if ($answer == $arr["answer"]) {
		// 答案也对上了
		// 创建一个键session, 键为usname, 键为$mail
		$_SESSION['usemail'] = $arr["email"];
		$_SESSION['usname'] = $arr["name"];
		$_SESSION['usid'] = $arr["id"];
		
	}else{
		// 邮箱对但密码不对
		$responseArr["code"] = 201;
		$responseArr["msg"] = "验证失败";
	}
}else{
	// 邮箱不存在
	$responseArr["code"] = 20004;
	$responseArr["msg"] = "邮件不存在";
}
echo json_encode($responseArr);


// if (mysqli_num_rows($result) >=1) {
// 	$_SESSION['usname'] = $inputEmail;
// 	echo "<p class='pp'>验证通过</p>";
// 	// $row = mysqli_fetch_assoc($result);
// 	header("Refresh:2;url=index.php");
// }else{
// 	echo "<p class='pp'>验证失败</p>".mysqli_error($conn);
// 	header("Refresh:2;url=login.php");
// }
// 关闭数据库
mysqli_close($conn);
 ?>