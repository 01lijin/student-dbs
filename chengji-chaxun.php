<?php include("head.php");
include "conn.php";
$sql1= "SELECT DISTINCT 课程编号 FROM kecheng";
	$result1 = mysqli_query($conn, $sql1);
 ?>
<div class="sui-layout">
	<div class="sidebar">
		<?php include("leftmenu.php"); ?>
	</div>
	<div class="content">
		<p class="sui-text-xxlarge myBlue my-padd">成绩信息查询</p>
		<form class="sui-form form-horizontal sui-validate" action="chengji-chaxun-list.php" method="post">
			<div class="control-group">
				<label for="xingming" class="control-label">姓名：</label>
				<div class="controls">
					<input type="hidden" name="SName" value="SName">
					<input type="text" id="xingming" name="xingming" class="input-large input-fat"  placeholder="输入成绩"  data-rules="required|minlength=2|maxlength=10">
				</div>
			</div>
			<div class="control-group">
				<label for="xuehao" class="control-label">学号：</label>
				<div class="controls">
					<input type="text" id="xuehao"  name="xuehao" class="input-large input-fat" placeholder="请输入学号" data-rules="required|minlength=2|maxlength=10">
				</div>
			</div>
			<div class="control-group">
				<label for="kcHao" class="control-label">课程编号: </label>
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
				<label class="control-label"></label>
				<div class="controls">
					<input type="submit" name="" value="查询" class="sui-btn btn-large btn-primary">
				</div>
			</div>
		</form>
	</div>
</div>
<?php include("foot.php"); ?>