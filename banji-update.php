<?php include("head.php"); ?>	
<?php 
$bhao = empty($_GET["bhao"])?"null":$_GET["bhao"];

if ($bhao == "null") {
	die("请选择要修改的记录");
}else{
	include("conn.php");

	// 执行SQL语句
	$sql = "select 班号,班长,教室,班主任,班级口号 from banji2 where 班号={$bhao}";
	$result = mysqli_query($conn, $sql);

	// 输出数据
	if (mysqli_num_rows($result)>0) {
		// 将查询的结果转换成数组
		$row=mysqli_fetch_assoc($result);
	}else{
		echo "找不到这条记录";
	}

	// 关闭数据库
	mysqli_close($conn);
}
 ?>	
	<div class="sui-layout">
		<div class="sidebar">
			<!-- 左菜单 -->
			<?php include("leftmenu.php");?>
			
		</div>
		<div class="content">
			<p class="sui-text-xxlarge my-">班级信息录入</p>
			<form action="banji-save.php" method="post" class="sui-form form-horizontal sui-validate">
				<div class="control-group">
					<!-- 增加一个隐藏的input, 用来区分是新增数据还是修改数据 -->
					<input type="hidden" name="action" value="update">
					<!-- 增加一个隐藏的input, 保存课程编号 -->
					<input type="hidden" name="bhao" value="<?php echo $row['班号'];?>">
					<label for="banhao" class="control-label">班号：</label>
					<div class="controls">
						<input type="text" id="banhao" name="banhao" value="<?php echo $row['班号'];?>" class="input-large input-fat" placeholder="输入班号" data-rules='required|minlength=2|maxlength=10'>
					</div>
					
				</div>
				<div class="control-group">
					<label for="banzhang" class="control-label">班长：</label>
					<div class="controls">
						<input type="text" id="banzhang" name="banzhang" value="<?php echo $row['班长'];?>" class="input-large input-fat"placeholder="输入班长姓名" data-rules="required|minlength=2|maxlength=10">
					</div>
				</div>
				<div class="control-group">
					<label for="jiaoshi" class="control-label">教室:  </label>
					<div class="controls">
						<input type="text" value="<?php echo $row['教室'];?>" name="jiaoshi" id="jiaoshi" class="input-large input-fat" placeholder="输入教室" data-rules="required|minlength=2|maxlength=10">
					</div>
				</div>
				<div class="control-group">
					<label for="banzhuren" class="control-label">班主任：</label>
					<div class="controls">
					<input type="text" value="<?php echo $row['班主任'];?>" id="banzhuren" name="banzhuren" class="input-large input-fat"  placeholder="输入班主任姓名" data-rules="required|minlength=2|maxlength=10">
					</div>
				</div>
				<div class="control-group">
					<label for="kouhao" class="control-label">班级口号：</label>
					<div class="controls">
						<input type="text" value="<?php echo $row['班级口号'];?>" id="kouhao"name="kouhao" class="input-large input-fat"  placeholder="输入班级口号" data-rules="required|minlength=2|maxlength=20">
					</div>
				</div>				  
				  <div class="control-group">
				  	<label class="control-label"></label>
				  	<div class="controls">
				  		<input type="submit" value="提交" class="sui-btn btn-large btn-primary">
				  	</div>
				  </div>
			</form>
		</div>
	</div>
<?php include("foot.php"); ?>