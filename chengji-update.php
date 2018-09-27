<?php include("head.php"); ?>
<?php 
$kid = empty( $_GET["kid"] )?"null":$_GET["kid"];
if ($kid == "null") {
	die("请选择要修改的记录");
}else{
	include("conn.php");
	// 执行SQL语句
	$sql = "select id,学号,课程编号,成绩 from chengji where id={$kid}";
	$result = mysqli_query($conn, $sql);
	//输出数据
	if (mysqli_num_rows($result)>0) {
		//将查询的结果换成数组
	            $row=mysqli_fetch_assoc($result);
	}else{
		echo "找不到这条记录";
	}
	// 关闭数据库
	$sql1= "SELECT DISTINCT 课程编号 FROM kecheng";
	$result1 = mysqli_query($conn, $sql1);
	mysqli_close($conn);
}
?>
<div class="sui-layout">
            	<div class="sidebar">
	<!-- 左菜单 -->
	<?php include("leftmenu.php"); ?>
	</div>
            <div class="content">
		<p class="sui-text-xxlarge myBlue my-padd">成绩修改页面</p>
		<form id="form1" action="chengji-save.php" method="post" class="sui-form form-horizontal sui-validate">
			<div class="control-group">
				<label for="xuehao" class="control-label">学号：</label>
				<div class="controls">
					<!-- 增加一个隐藏的input，用来区分是新增数据还是修改数据 -->
					<input type="hidden" name="action" value="update">
					<!-- 增加一个隐藏的input，保存课程编号 -->
					<input type="hidden" name="kid" value="<?php echo $row['id'] ?>">
					<input type="text" id="xuehao"  value="<?php echo $row['学号'] ?>" name="xuehao" class="input-large input-fat" placeholder="输入学号" data-rules="required|minlength=2|maxlength=10">
				</div>
			</div>
			<div class="control-group">
				<label for="kcHao" class="control-label">课程编号：</label>
				<div class="controls">
					<select name="kcHao" id="kcHao">
					<?php 
					if (mysqli_num_rows($result1) > 0) {
						while ( $row1= mysqli_fetch_assoc($result1) ) {
							echo "<option value='{$row1['课程编号']}'>{$row1['课程编号']}</option>";
						}
					}else{
						echo "<option value=''>请先添加课程编号</option>";
					}	
					 ?>
					</select>
				</div>
			</div>
			<div class="control-group">
				<label for="chengji" class="control-label">成绩：</label>
				<div class="controls">
					<input type="text" id="chengji" value="<?php echo $row['成绩'] ?>" name="chengji" class="input-large input-fat"  placeholder="输入成绩"  data-rules="required|minlength=2|maxlength=10">
				</div>
			</div>
			<div class="control-group">
				<label class="control-label"></label>
				<div class="controls">
					<input type="submit" name="" value="提交" class="sui-btn btn-large btn-primary">
				</div>
			</div>
		</form>
            </div>
</div>
<?php include("foot.php"); ?>