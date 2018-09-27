<?php include("head.php"); ?>
<?php 
include("conn.php");

// 执行SQL语句

$SName =empty($_POST['SName'])? "null":$_POST['SName'];
$xingming =empty($_POST['xingming'])? "null":$_POST['xingming'];
$xuehao =empty($_POST['xuehao'])? "null":$_POST['xuehao'];
$kcName =empty($_POST['kcName'])? "null":$_POST['kcName'];

$sql3="SELECT s.姓名,k.课程名,c.成绩 FROM chengji as c LEFT JOIN kecheng as k ON c.课程编号=k.课程编号 LEFT JOIN xuesheng as s ON c.学号=s.学号 WHERE s.姓名='{$xingming}'";

$result =mysqli_query($conn, $sql3);
// 关闭数据库
mysqli_close($conn);

 ?>

<div class="sui-layout">
	<div class="sidebar">
		<!-- 左菜单 -->
		<?php include("leftmenu.php"); ?>
	</div>
	<div class="content">
		<p class="sui-text-xxlarge myBlue my-padd">成绩列表</p>
		<table class="sui-table table-primary">
			<tr>
				<th>姓名</th>			
				<th>课程名</th>
				<th>成绩</th>
			</tr>
			<?php 
			// 输出数据
			if (mysqli_num_rows($result)>0) {
				while($row=mysqli_fetch_assoc($result)){
					echo "<tr>
						<td>{$row['姓名']}</td>
						<td>{$row['课程名']}</td>
						<td>{$row['成绩']}</td>
					</tr>";
				}
			}else{
				echo "没有记录";
			}

			?>
		</table>
	</div>
</div>
<?php include("foot.php"); ?>