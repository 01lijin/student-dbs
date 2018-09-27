<?php 
//创建连接
include("conn.php");

// 用户名
$uname = empty($_POST['uname']) ? "null":$_POST['uname'];
// 密码
$passWord = empty($_POST['passWord']) ? "null":$_POST['passWord'];
// 密码提示
$question = empty($_POST['question']) ? "null":$_POST['question'];
// 答案
$answer = empty($_POST['answer']) ? "null":$_POST['answer'];
$kid = empty($_POST['kid']) ? "null":$_POST['kid'];

if ($question=='xx') {
             $question='你的小学在哪里上?';
}else if ($question=='xm') {
             $question='你的最好朋友的姓名?';
}else if ($question=='rq') {
             $question='你的最有纪念意义的日期?';
}


// 执行SQL语句
$sql = "update user set name='{$uname}',password='{$passWord}',question='{$question}',answer='{$answer}' where id ='{$kid}'";

$result = mysqli_query($conn, $sql);

$str1 = "数据更新成功";
$str2 = "数据更新失败";
if ($result) {
echo "<script>alert('{$str1}');</script>";
// 页面指定2秒后跳转
header("Refresh:2;url=huiyuan-list.php");
}else{
echo $str2.mysqli_error($conn);
}
// 关闭数据库
mysqli_close($conn);

 ?>