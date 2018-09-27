<?php 
include("conn.php");
$kid = empty( $_GET["kid"] )?"null":$_GET["kid"];

// $hid = empty($_GET['hid'])?"null":$_GET['hid'];
$sql2 = "select * from newscolumn";
$result2 = mysqli_query($conn, $sql2);
if ($kid == "null") {
	die("请选择要修改的记录");
}else{
	include("conn.php");
	$sql = "select * from news where id='{$kid}'";
	$result = mysqli_query($conn, $sql);
	if (mysqli_num_rows($result)>0) {
		$row = mysqli_fetch_assoc($result);
	}else{
		echo "没有数据";
	}
	// 关闭数据库
	mysqli_close($conn);
}
?>
<?php include("head.php"); ?>
<div class="sui-layout">
            	<div class="sidebar">
	<!-- 左菜单 -->
	<?php include("leftmenu.php"); ?>
	</div>
            <div class="content">
		<p class="sui-text-xxlarge myBlue my-padd">学生修改页面</p>
		<form id="form1" action="new-save.php" method="post" class="sui-form form-horizontal sui-validate" enctype="multipart/form-data">
			<div class="control-group">
				<label for="title" class="control-label">标题：</label>
				<div class="controls">
					<!-- 增加一个隐藏的input，用来区分是新增数据还是修改数据 -->
					<input type="hidden" name="action" value="update">
					<!-- 增加一个隐藏的input，保存课程编号 -->
					<input type="hidden" name="kid" value="<?php echo $row['id'] ?>">
					<input type="text" id="title"  value="<?php echo $row['标题'] ?>" name="title" class="input-large input-fat" placeholder="输入标题" data-rules="required|minlength=2|maxlength=10">
				</div>
			</div>
			<div class="control-group">
				<label for="title2" class="control-label">肩题：</label>
				<div class="controls">
					<input type="text" id="title2"  name="title2" class="input-large input-fat"  placeholder="输入肩题"  data-rules="required|minlength=2|maxlength=50" value="<?php echo $row['肩题']; ?>">
				</div>
			</div>
			<div class="control-group">
				<label for="zuozhe" class="control-label">作者：</label>
				<div class="controls">
					<input type="hidden" name="userid" value="<?php echo $_SESSION['usid']; ?>">
					<input type="text" id="xingming" readonly="readonly" name="zuozhe" class="input-large input-fat" value="<?php echo $_SESSION['usname']; ?>">
				</div>
			</div>
			<div class="control-group">
				<label for="column" class="control-label">栏目：</label>
				<div class="controls">
					<select name="column" id="column">
					<?php 
					if (mysqli_num_rows($result2) > 0) {
						while ( $row2 = mysqli_fetch_assoc($result2) ) {
							echo "<option value='{$row2['id']}'>{$row2['name']}</option>";
						}
					}else{
						echo "<option>请先添加栏目名称</option>";
					}	
					 ?>
					</select>
				</div>
			</div>
			<div class="control-group">
				<label for="xingming" class="control-label">照片：</label>
				<div class="controls">
					<input type="hidden" name="file1" value="<?php echo $row['图片']; ?>">
					<input type="file" name="file"/>
					<img width="80px" height="150px" src="<?php echo $row['图片']; ?>" >
				</div>
			</div>
			<div class="control-group">
				<label for="fb-time" class="control-label">发布时间：</label>
				<div class="controls">
					<input type="text" id="fb-time" name="fb_time" class="input-large input-fat" placeholder="输入发布时间" data-toggle="datepicker-inline" value="<?php echo $row['发布时间']; ?>">
				</div>
			</div>
			<div class="control-group">
				<label for="inputDes" class="control-label v-top">内容：</label>
				<div class="controls">
					<textarea id="content" name="content" style="width:500px;height:150px;"><?php echo $row['内容']; ?></textarea>
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