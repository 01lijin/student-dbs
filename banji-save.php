<?php 
	$banhao = empty($_POST["banhao"])?"null":$_POST["banhao"];
	$banzhang = empty($_POST["banzhang"])?"null":$_POST["banzhang"];
	$jiaoshi = empty($_POST["jiaoshi"])?"null":$_POST["jiaoshi"];
	$banzhuren = empty($_POST["banzhuren"])?"null":$_POST["banzhuren"];
	$kouhao = empty($_POST["kouhao"])?"null":$_POST["kouhao"];

	// 如果是录入页面提交, 那么$action等于add
	$action = empty($_POST["action"])?"add":$_POST["action"];
	if ($action=="add") {
		$str1 = "数据添加成功!";
		$str2 = "数据添加失败!";
		$url = "banji.php";
		$sql = "insert into banji2(班号,班长,教室,班主任,班级口号) value('$banhao','$banzhang','$jiaoshi','$banzhuren','$kouhao')";

	}else if ($action=="update") {
		$str1 = "数据更新成功!";
		$str2 = "数据更新失败!";
		$url = "banji-list.php";
		$bhao = $_POST["bhao"];
		$sql = "update banji2 set 班号='{$banhao}',班长='{$banzhang}',教室='{$jiaoshi}',班主任='{$banzhuren}',班级口号='{$kouhao}' where 班号='{$banhao}'";
	}else{
		die("请选择操作方法");
	}
	include("conn.php");
	
	// 执行SQL语句
	
	$result = mysqli_query($conn, $sql);

	// 输出数据

	if ($result) {
		echo "<script>alert('{$str1}');</script>";
		header("Refresh:1;url={$url}");
	}else{
		echo $str2.mysqli_error($conn);
	}

	// 关闭数据库
	mysqli_close($conn);
?>