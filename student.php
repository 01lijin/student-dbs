<?php include("head.php");
include "conn.php";
// 先读取数据库中班级的班号, 然后更新下拉列表,保证班号是更新的
$sql = "SELECT DISTINCT 班号 FROM banji2";
$result = mysqli_query($conn, $sql);
 ?>
<div class="sui-layout">
	<div class="sidebar">
		<?php include("leftmenu.php"); ?>
	</div>
	<div class="content">
		<p class="sui-text-xxlarge myBlue my-padd">学生信息录入</p>
		<form class="sui-form form-horizontal sui-validate" action="student-save.php" method="post" enctype="multipart/form-data">
			<div class="control-group">
				<label for="xuehao" class="control-label">学号：</label>
				<div class="controls">
					<input type="text" id="xuehao"  name="xuehao" class="input-large input-fat" placeholder="请输入学号" data-rules="required|minlength=2|maxlength=10">
				</div>
			</div>
			<div class="control-group">
				<label for="banhao" class="control-label">班号：</label>
				<div class="controls">
					<!-- <input type="text" id="banhao"  name="banhao" class="input-large input-fat"  placeholder="输入班号"  data-rules="required|minlength=2|maxlength=10"> -->
					<select name="banhao" id="banhao">
					<?php 
					if (mysqli_num_rows($result) > 0) {
						while ( $row = mysqli_fetch_assoc($result) ) {
							echo "<option value='{$row['班号']}'>{$row['班号']}</option>";
						}
					}else{
						echo "<option value=''>请先添加班级信息</option>";
					}	
					 ?>
					</select>
				</div>
			</div>
			<div class="control-group">
				<label for="xingming" class="control-label">姓名：</label>
				<div class="controls">
					<input type="text" id="xingming" name="xingming" class="input-large input-fat"  placeholder="输入姓名"  data-rules="required|minlength=2|maxlength=10">
				</div>
			</div>
			<div class="control-group">
				<label for="xingming" class="control-label">照片：</label>
				<div class="controls">
					<input type="file" name="file"/>
				</div>
			</div>
			<div class="control-group">
				<label for="sex" class="control-label">性别：</label>
				<div class="controls">
					<label class="radio-pretty inline checked">
						<input type="radio" value="1" checked="checked" name="sSex"><span>男</span>
					</label>
					<label class="radio-pretty inline">
						<input type="radio" value="0" name="sSex"><span>女</span>
					</label>
				</div>
			</div>
			<div class="control-group">
				<label for="riqi" class="control-label">日期：</label>
				<div class="controls">
					<input type="text" id="riqi" name="riqi" class="input-large input-fat"  data-toggle="datepicker-inline" placeholder="输入出生日期">
				</div>
			</div>

			<div class="control-group">
				<label for="phone" class="control-label">联系电话：</label>
				<div class="controls">
					<input type="text" id="phone" name="phone" class="input-large input-fat"  placeholder="输入电话号码"  data-rules="required|minlength=2|maxlength=11">
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