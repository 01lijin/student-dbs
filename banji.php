<?php include("head.php"); ?>		
	<div class="sui-layout">
		<div class="sidebar">
			<!-- 左菜单 -->
			<?php include("leftmenu.php");?>
			
		</div>
		<div class="content">
			<p class="sui-text-xxlarge my-">班级信息录入</p>
			<form action="banji-save.php" method="post" class="sui-form form-horizontal sui-validate">
				<div class="control-group">
					<label for="banhao" class="control-label">班号：</label>
					<div class="controls">
						<input type="text" id="banhao" name="banhao" class="input-large input-fat" placeholder="输入班号" data-rules='required|minlength=2|maxlength=10'>
					</div>
				</div>
				<div class="control-group">
					<label for="banzhang" class="control-label">班长：</label>
					<div class="controls">
						<input type="text" id="banzhang" name="banzhang" class="input-large input-fat"placeholder="输入班长姓名" data-rules="required|minlength=2|maxlength=10">
					</div>
				</div>
				<div class="control-group">
					<label for="jiaoshi" class="control-label">教室:  </label>
					<div class="controls">
						<input type="text" name="jiaoshi" id="jiaoshi" class="input-large input-fat" placeholder="输入教室" data-rules="required|minlength=2|maxlength=10">
					</div>
				</div>
				<div class="control-group">
					<label for="banzhuren" class="control-label">班主任：</label>
					<div class="controls">
					<input type="text" id="banzhuren" name="banzhuren" class="input-large input-fat"  placeholder="输入班主任姓名" data-rules="required|minlength=2|maxlength=10">
					</div>
				</div>
				<div class="control-group">
					<label for="kouhao" class="control-label">班级口号：</label>
					<div class="controls">
						<input type="text" name="kouhao" class="input-large input-fat"  placeholder="输入班级口号" data-rules="required|minlength=2|maxlength=20">
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