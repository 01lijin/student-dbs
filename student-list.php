<?php include("head.php"); ?>
<?php 
include("conn.php");

// 执行SQL语句
$sql = "select id,学号,班号,姓名,性别,日期,联系电话 from xuesheng";
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
		<p class="sui-text-xxlarge myBlue my-padd">学生列表</p>
		<table class="sui-table table-primary">
			<tr>
				<th>id</th>
				<th>学号</th>
				<th>班号</th>
				<th>姓名</th>
				<th>性别</th>
				<th>日期</th>
				<th>联系电话</th>
				<th>操作</th>
			</tr>
			<?php 
			// 输出数据
			if (mysqli_num_rows($result)>0) {
				while($row=mysqli_fetch_assoc($result)){
					$sex1=$row["性别"]=="0"?"女":"男";
					echo "<tr>
						<td>{$row['id']}</td>
						<td>{$row['学号']}</td>
						<td>{$row['班号']}</td>
						<td>{$row['姓名']}</td>
						<td>{$sex1}</td>
						<td>{$row['日期']}</td>
						<td>{$row['联系电话']}</td>
						<td>
						<a class='sui-btn btn-warning btn-small' href='student-update.php?kid={$row['id']}'>修改</a> &nbsp;&nbsp; 
						<a class='sui-btn btn-danger btn-small' href='student-del.php?kid={$row['id']}'>删除</a>
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