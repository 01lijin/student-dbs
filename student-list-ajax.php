<?php include("head.php"); ?>

<div class="sui-layout">
	<div class="sidebar">
		<!-- 左菜单 -->
		<?php include("leftmenu.php"); ?>
	</div>
	<div class="content">
		<p class="sui-text-xxlarge myBlue my-padd">学生列表</p>
		<table class="sui-table table-primary">
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
			<tbody id="studentlist">

			</tbody>
		</table>

	</div>
</div>
<?php include("foot.php"); ?>
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
			// $("#studentlist").html("<tr><td>正在查询, 请稍后</td></tr>");				
		},
		success:function(data,textStatus){
			if (data.code==200) {
				/*for (var i = 0; i < data.data.length; i++) {
					var $tr = $("<tr></tr>");
					for(j in data.data[i]){
						var $td = "<td>"+data.data[i][j]+"</td>";
						$tr.append($td);
					}
					$("#studentlist").append($tr);
					
				};*/

				var str = "";
				console.log(data);
				for (var i = 0; i < data.data.length; i++) {
					// console.log(data.data[i].Id);		
					str+="<tr><td>"+data.data[i].Id+"</td><td>"+data.data[i].学号+"</td><td>"+data.data[i].班号+"</td><td>"+data.data[i].姓名+"</td><td>"+data.data[i].照片+"</td><td>"+data.data[i].性别+"</td><td>"+data.data[i].日期+"</td><td>"+data.data[i].联系电话+"</td><td><a href='student-update.php?kid="+data.data[i].Id+"' class='sui-btn btn-warning'>修改</a>&nbsp;&nbsp;<a href='student-del.php?kid="+data.data[i].Id+"' class='sui-btn btn-danger'>删除</a></td></tr>";
				}
				$("#studentlist").html(str);
			}
		},
		error:function(XMLHttpRequest,textStatus,errorThrown){
			// 请求失败后调用此函数
			console.log("失败原因:"+errorThrown);
		}
	});
})

</script>