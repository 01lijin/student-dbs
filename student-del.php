<?php 
include("conn.php");

$sql = "delete from xuesheng where id={$_REQUEST['kid']}";
$result = mysqli_query($conn, $sql);

if ($result) {
	echo "<script>alert('数据删除成功');</script>" ;
	header("Refresh:1;url=student-list-ajax.php");
}else{
	echo "数据删除失败".mysqli_error($conn);
}
// 关闭数据库
mysqli_close($conn);

?>