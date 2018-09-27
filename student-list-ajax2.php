<?php include("head.php"); ?>

<div class="sui-layout">
	<div class="sidebar">
		<!-- 左菜单 -->
		<?php include("leftmenu.php"); ?>
	</div>
	<div class="content">
		<p class="sui-text-xxlarge myBlue my-padd">学生列表</p>
		<table class="sui-table table-primary">
			<thead>
				<tr>
					<th>id</th>
					<th>学号</th>
					<th>班号</th>
					<th>姓名</th>
					<th>照片</th>
					<th>性别</th>
					<th>日期</th>
					<th>联系电话</th>
					<th>操作</th>
				</tr>
			</thead>
			<tbody id="tbody"></tbody>
		</table>
	</div>
</div>
<?php include("foot.php"); ?>
<script type="text/html" id="template1">
	{{each arr val idx}}
	<tr>
		<td>{{val.Id}}</td>
		<td>{{val.学号}}</td>
		<td>{{val.班号}}</td>
		<td>{{val.姓名}}</td>
		<td>{{val.照片}}</td>
		<td>{{val.性别}}</td>
		<td>{{val.日期}}</td>
		<td>{{val.联系电话}}</td>
		<td></td>
	</tr>
	{{/each}}
</script>
<script type="text/javascript">
$(function(){
	$.ajax({
		url:"api.php",
		type:"POST",
		dataType:"json",
		data:{
			"action":"xuesheng"
		},
		beforeSend:function(XMLHttpRequest){
			
		},
		success:function(data,textStatus){
			var arr = data.data; // 声明一个变量命名为arr
			var html = template('template1',{"arr":arr});
			$("tbody").html(html);
			$("tr td:last").append("<a class='sui-btn btn-warning btn-small' href='student-update.php?kid={$row['id']}'>修改</a><a class='sui-btn btn-danger btn-small' href='student-del.php?kid={$row['id']}'>删除</a>")
		},
		error:function(XMLHttpRequest,textStatus,errorThrown){
			// 请求失败后调用此函数
			console.log("失败原因:"+errorThrown);
		}
	});
})

</script>
