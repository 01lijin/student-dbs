<?php 

$kid = empty( $_REQUEST["kid"] )?"null":$_REQUEST["kid"];
// $file1 = empty( $_REQUEST["file1"] )?"null":$_REQUEST["file1"];
if ($kid == "null") {
	die("请选择要修改的记录");
}else{
	include("conn.php");
	$sql = "select * from user where id='{$kid}'";	
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
		<p class="sui-text-xxlarge myBlue my-padd">会员信息修改</p>
		<form id="form1" action="huiyuan-save.php" method="post" class="sui-form form-horizontal sui-validate">
			<div class="control-group">
				<label for="uname" class="control-label">用户名：</label>
				<div class="controls">
					<!-- 增加一个隐藏的input，用来区分是新增数据还是修改数据 -->
					<input type="hidden" name="action" value="update">
					<!-- 增加一个隐藏的input，保存课程编号 -->
					<input type="hidden" name="kid" value="<?php echo $row['id'] ?>">
					<input type="text" id="uname"  value="<?php echo $row['name'] ?>" name="uname" class="input-large input-fat" placeholder="输入用户名" data-rules="required|minlength=2|maxlength=10">
				</div>
			</div>
			<div class="control-group">
				<label for="passWord" class="control-label">密码：</label>
				<div class="controls">
					<input type="text" id="passWord" value="<?php echo $row['password'] ?>" name="passWord" class="input-large input-fat" placeholder="输入密码">
				</div>
			</div>
			<div class="control-group">
				<label for="question" class="control-label">密码提示问题</label>
				<div class="controls">
					
					<span class="sui-dropdown dropdown-bordered select">
						<span class="dropdown-inner">
						<a id="drop12" role="button" data-toggle="dropdown" href="#" class="dropdown-toggle"><input value="<?php echo $row['question']; ?>" name="question" type="hidden"><i class="caret"></i><span><?php echo $row['question']; ?></span></a>
						<ul id="menu12" role="menu" aria-labelledby="drop12" class="sui-dropdown-menu">
							<li role="presentation"><a role="menuitem" tabindex="-1" href="javascript:void(0);" value="xx">你的小学在哪里上?</a></li>
							<li role="presentation"><a role="menuitem" tabindex="-1" href="javascript:void(0);" value="xm">你的最好朋友的姓名?</a></li>
							<li role="presentation"><a role="menuitem" tabindex="-1" href="javascript:void(0);" value="rq">你的最有纪念意义的日期?</a></li>
						</ul>
						</span>
					</span>
				</div>
			</div>
			<div class="control-group">
				<label for="answer" class="control-label">密码答案：</label>
				<div class="controls">
					<input type="text" id="answer" value="<?php echo $row['answer'] ?>" name="answer" class="input-large input-fat"  placeholder="输入密码答案"  data-rules="required|minlength=2|maxlength=10">
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