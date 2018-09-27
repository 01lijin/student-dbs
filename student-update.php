<?php 

$kid = empty( $_REQUEST["kid"] )?"null":$_REQUEST["kid"];
// $file1 = empty( $_REQUEST["file1"] )?"null":$_REQUEST["file1"];
if ($kid == "null") {
	die("请选择要修改的记录");
}else{
	include("conn.php");
	$sql = "select Id,学号,班号,姓名,照片,性别,日期,联系电话 from xuesheng where Id='{$kid}'";	
	$result = mysqli_query($conn, $sql);
	//输出数据
	if (mysqli_num_rows($result)>0) {
		//将查询的结果换成数组
	            $row=mysqli_fetch_assoc($result);
	}else{
		echo "找不到这条记录";
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
		<form id="form1" action="student-save.php" method="post" class="sui-form form-horizontal sui-validate" enctype="multipart/form-data">
			<div class="control-group">
				<label for="xuehao" class="control-label">学号：</label>
				<div class="controls">
					<!-- 增加一个隐藏的input，用来区分是新增数据还是修改数据 -->
					<input type="hidden" name="action" value="update">
					<!-- 增加一个隐藏的input，保存课程编号 -->
					<input type="hidden" name="kid" value="<?php echo $row['Id'] ?>">
					<input type="text" id="xuehao"  value="<?php echo $row['学号'] ?>" name="xuehao" class="input-large input-fat" placeholder="输入课程名称" data-rules="required|minlength=2|maxlength=10">
				</div>
			</div>
			<div class="control-group">
				<label for="banhao" class="control-label">班号：</label>
				<div class="controls">
					<input type="text" id="banhao" value="<?php echo $row['班号'] ?>" name="banhao" class="input-large input-fat" placeholder="输入课程时间">
				</div>
			</div>
			<div class="control-group">
				<label for="xingming" class="control-label">姓名：</label>
				<div class="controls">
					<input type="text" id="xingming" value="<?php echo $row['姓名'] ?>" name="xingming" class="input-large input-fat"  placeholder="输入姓名"  data-rules="required|minlength=2|maxlength=10">
				</div>
			</div>
			<div class="control-group">
				<label for="xingming" class="control-label">照片：</label>
				<div class="controls">
					<input type="hidden" name="file1" value="<?php echo $row['照片']; ?>">
					<input type="file" name="file" value="<?php echo $row['照片']; ?>">
					<img width="80px" height="150px" src="<?php echo $row['照片']; ?>" >
				</div>
			</div>

			<div class="control-group">
				<label for="sex" class="control-label">性别：</label>
				<div class="controls">
					<label class="radio-pretty inline <?php if ($row['性别']=="1"){echo 'checked';} ?>">
						<input type="radio" value="1" name="sSex" <?php if ($row['性别']=="1"){echo 'checked=checked';} ?>><span>男</span>
					</label>
					<label class="radio-pretty inline <?php if ($row['性别']=="0"){echo 'checked';} ?>">
						<input type="radio" value="0" name="sSex" <?php if ($row['性别']=="0"){echo 'checked=checked';} ?>><span>女</span>
					</label>
				</div>

			</div>
			<div class="control-group">
				<label for="riqi" class="control-label">日期：</label>
				<div class="controls">
					<input type="text" id="riqi" value="<?php echo $row['日期'] ?>" name="riqi" class="input-large input-fat"  data-toggle="datepicker-inline" placeholder="输入日期">
				</div>
			</div>

			<div class="control-group">
				<label for="phone" class="control-label">联系电话：</label>
				<div class="controls">
					<input type="text" id="phone" value="<?php echo $row['联系电话'] ?>" name="phone" class="input-large input-fat"  placeholder="输入电话号码"  data-rules="required|minlength=2|maxlength=11">
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