<?php include("head.php");
include "conn.php";
// 先读取数据库中newscolumn的name, 然后更新下拉列表,保证name是更新的

$sql = "select * from newscolumn";
$result = mysqli_query($conn, $sql);

 ?>

<div class="sui-layout">
	<div class="sidebar">
		<?php include("leftmenu.php"); ?>
	</div>
	<div class="content">
		<p class="sui-text-xxlarge myBlue my-padd">新闻发布</p>
		<form class="sui-form form-horizontal sui-validate" action="new-save.php" method="post" enctype="multipart/form-data">
			<div class="control-group">
				<label for="title" class="control-label">标题：</label>
				<div class="controls">
					<input type="text" id="title"  name="title" class="input-large input-fat" placeholder="请输入标题" data-rules="required|minlength=2|maxlength=50">
				</div>
			</div>
			<div class="control-group">
				<label for="title2" class="control-label">肩题：</label>
				<div class="controls">
					<input type="text" id="title2"  name="title2" class="input-large input-fat"  placeholder="输入肩题"  data-rules="required|minlength=2|maxlength=50">
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
					if (mysqli_num_rows($result) > 0) {
						while ( $row = mysqli_fetch_assoc($result) ) {
							echo "<option value='{$row['id']}'>{$row['name']}</option>";
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
					<input type="file" name="file"/>
				</div>
			</div>
			<div class="control-group">
				<label for="fb-time" class="control-label">发布时间：</label>
				<div class="controls">
					<input type="text" id="fb-time" name="fb_time" class="input-large input-fat" placeholder="输入发布时间" data-toggle="datepicker-inline">
				</div>
			</div>
			<div class="control-group">
				<label for="inputDes" class="control-label v-top">内容：</label>
				<div class="controls">
					<textarea id="content" name="content" style="width:500px;height:150px;"></textarea>
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