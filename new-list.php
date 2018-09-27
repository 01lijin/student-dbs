<?php include("head.php"); ?>
<?php 
include("conn.php");
$sql="select * from news";
$result =mysqli_query($conn, $sql);
// 关闭数据库
mysqli_close($conn);
 ?>
 <div class="sui-layout">
	<div class="sidebar">
		<!-- 左菜单 -->
		<?php include("leftmenu.php"); ?>
	</div>
	<div class="content">
		<p class="sui-text-xxlarge myBlue my-padd">新闻列表</p>
		<table class="sui-table table-primary">
			<tr>
				<th>id</th>
				<th>标题</th>
				<th>时间</th>
				<th>操作</th>
			</tr>
			<?php 
			// 输出数据
			if (mysqli_num_rows($result)>0) {
				while($row=mysqli_fetch_assoc($result)){
					echo "<tr>
						<td>{$row['id']}</td>
						<td>{$row['标题']}</td>
						<td>{$row['发布时间']}</td>
						<td>
						<a class='sui-btn btn-warning btn-small' href='new-update.php?kid={$row['id']}'>修改</a> &nbsp;&nbsp; 
						<a class='sui-btn btn-danger btn-small' href='new-del.php?kid={$row['id']}'>删除</a>
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