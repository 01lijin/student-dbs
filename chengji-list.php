<?php include("head.php"); ?>
<?php 
include("conn.php");

// 执行SQL语句
$sql = "select id,学号,课程编号,成绩 from chengji";
$result = mysqli_query($conn, $sql);


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
				<th>id</th>
				<th>学号</th>
				<th>课程编号</th>
				<th>成绩</th>
				<th>操作</th>
			</tr>
			<?php 
			// 输出数据
			if (mysqli_num_rows($result)>0) {
				while($row=mysqli_fetch_assoc($result)){
					echo "<tr>
						<td>{$row['id']}</td>
						<td>{$row['学号']}</td>
						<td>{$row['课程编号']}</td>
						<td>{$row['成绩']}</td>
						<td>
						<a class='sui-btn btn-warning btn-small' href='chengji-update.php?kid={$row['id']}'>修改</a> &nbsp;&nbsp; 
						<a class='sui-btn btn-danger btn-small' href='chengji-del.php?kid={$row['id']}'>删除</a>
						</td>
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