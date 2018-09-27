<?php 

	$title = ($_REQUEST["title"]);
	$title2 = ($_REQUEST["title2"]);
	$content = ($_REQUEST["content"]);
	$fb_time = ($_REQUEST["fb_time"]);
	$zuozhe = ($_REQUEST["userid"]);
	$column = ($_REQUEST["column"]);
	
if (empty($_FILES["file"]["tmp_name"])==false) {
	if ((($_FILES["file"]["type"] == "image/gif")
	|| ($_FILES["file"]["type"] == "image/jpeg")
	|| ($_FILES["file"]["type"] == "video/mp4")
	|| ($_FILES["file"]["type"] == "image/pjpeg"))
	&& ($_FILES["file"]["size"] < 10241000))
	{
		if ($_FILES["file"]["error"] > 0){
			echo "错误: " . $_FILES["file"]["error"] . "<br />";
		}else{
			// 重新给上传的文件命名, 增加一个年月日时分秒的前缀, 并且加上保存路径
			$filename = "upload/".date('YmdHis').$_FILES["file"]["name"];

			//move_uploaded_file()移动临时文件到上传的文件存放的位置,参数1.临时文件的路径, 参数2.存放的路径
			move_uploaded_file($_FILES["file"]["tmp_name"],$filename);  
		}
	}else{
		echo "您上传的文件不符合要求";
	}
}else{
	$filename=($_REQUEST['file1']);
}
	

	$action= empty($_POST["action"])?"add":$_POST["action"];
	if ($action=="add") {
		$str1 = "数据添加成功!";
		$str2 = "数据添加失败!";
		$url="new-input.php";
		$sql="insert into news(标题,肩题,图片,内容,发布时间,创建时间,userid,columnid) value('$title','$title2','$filename','$content','$fb_time',".time().",$zuozhe,'$column')";
		// echo $sql;
	}else if($action=="update"){
		$str1 = "数据更新成功";
		$str2 = "数据更新失败";
		$url="new-list.php";
		$kid = $_POST["kid"];
		$sql = "update news set 标题='{$title}',肩题='{$title2}',图片='{$filename}',内容='{$content}',userid='{$zuozhe}',columnid='{$column}',发布时间='{$fb_time}' where id = '{$kid}'";
		// echo $sql;
		
	}else{
		die("请选择方法");
	}

	include("conn.php");

	$result = mysqli_query($conn, $sql);
	// 输出数据
	if ($result) {
		echo "<script>alert('{$str1}');</script>";
		header("Refresh:2;url=new-input.php");
	}else{
		echo $str2.mysqli_error($conn);
	}

	// 关闭数据库
	mysqli_close($conn);

?>