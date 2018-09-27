<?php 
//四大步
//1、登录连接数据库
$conn = mysqli_connect("localhost","root","");
// if ($conn) {
// 	// echo "连接数据成功";
// }else{
// 	// echo "连接失败!";
// }

//2、选择要操作的数据库
mysqli_select_db($conn,"student-dbs");
// 设置读取数据库的编码, 不然有可能显示乱码
mysqli_query($conn, "set names utf8");

// 执行查询email的sql
$email = $_REQUEST["inputEmail"];
$sql = "select * from user where email='{$email}'";
$result = mysqli_query($conn,$sql);
// 如果查找的记录有一条, 说明此email已经被注册过了
if (mysqli_num_rows($result)>0) {
	echo "error";
}else{
	echo "ok";
}

//4、关闭连接, 释放资源
mysqli_close($conn);
?>
