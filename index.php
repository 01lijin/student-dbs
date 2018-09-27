<?php include("head.php"); ?>
	<div class="sui-layout">
		<div class="sidebar">
			<!-- 左菜单 -->
			<?php include("leftmenu.php");?>	
		</div>
		<div class="content">
			<p class="sui-text-xxlarge my-padd label-success">欢迎访问学生管理系统！</p>
			<div id="new-con">
				
			</div>
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
			"action":"news"
		},
		beforeSend:function(XMLHttpRequest){
			// $("#studentlist").html("<tr><td>正在查询, 请稍后</td></tr>");				
		},
		success:function(data,textStatus){
			if (data.code==200) {

				var str = "";
				for (var i = 0; i < data.data.length; i++) {
					// console.log(data.data);
					// console.log(data.data[i].Id);	
					str+="<div class='news'><div class='tu'><a href='beiwang.php?kid="+data.data[i].id+"'><img src='"+data.data[i].图片+"'></a></div><h4>"+data.data[i].标题+"</h4><h5><a href='beiwang.php?kid="+data.data[i].id+"'>"+data.data[i].肩题+"</a></h5><p>"+data.data[i].内容+"</p></div>";	
					
				}
				$("#new-con").html(str);
			}
		},
		error:function(XMLHttpRequest,textStatus,errorThrown){
			// 请求失败后调用此函数
			console.log("失败原因:"+errorThrown);
		}
	});
});
</script>