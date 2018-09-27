<?php 
include("conn.php");

$sql = "delete from news where id={$_REQUEST['kid']}";
$result = mysqli_query($conn, $sql);

if ($result) {
	echo "<script>alert('数据删除成功');</script>" ;
	header("Refresh:1;url=new-list.php");
}else{
	echo "数据删除失败".mysqli_error($conn);
}
// 关闭数据库
mysqli_close($conn);

?>