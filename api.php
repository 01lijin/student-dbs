<?php 
include("conn.php");
$action = empty($_REQUEST['action'])?"null":$_REQUEST['action'];

$responseArr = array(
	"code"=>200,
	"data"=>null,
	"msg"=>"数据获取成功"
);
switch ($action) {
	case 'xuesheng':
		$sql = "select * from ".$action;
		$result = mysqli_query($conn,$sql);
		if( mysqli_num_rows($result)>0 ){
			$studentlist = array();
			while($row=mysqli_fetch_assoc($result)){
				$studentlist[]=$row;
			}
			// var_dump($studentlist);
			$responseArr["data"] = $studentlist;
		}else{
			$responseArr["code"] = 207;
			$responseArr["msg"] = "暂无记录";
		}
		die(json_encode($responseArr));
		break;
	case 'news':
		$sql = "select * from ".$action;
		$result = mysqli_query($conn,$sql);
		if( mysqli_num_rows($result)>0 ){
			$new = array();
			while($row=mysqli_fetch_assoc($result)){
				$new[]=$row;
			}
			// var_dump($studentlist);
			$responseArr["data"] = $new;
		}else{
			$responseArr["code"] = 207;
			$responseArr["msg"] = "暂无记录";
		}
		die(json_encode($responseArr));
		break;
	
	default:
		echo "请指定正确的参数";
		break;
}
 ?>