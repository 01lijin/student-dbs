<?php include("01-head.php"); ?>	

<div class="box-con">
	<form id="form1" action="forget-save.php" method="post" class="sui-form form-horizontal sui-validate">
		<div class="control-group">
			<label for="inputEmail" class="control-label">用户邮箱：</label>
			<div class="controls">
				<input type="text" id="inputEmail" name="inputEmail" class="input-large input-fat" placeholder="邮箱" data-rules='required|minlength=2|maxlength=30'>
			</div>
		</div>
		<div class="control-group">
			<label for="yzm" class="control-label">验证码：</label>
			<div class="controls">
				<input type="text" id="yzm" name="yzm" class="input-medium input-fat"  placeholder="输入验证码" data-rules="required|minlength=0|maxlength=4">
			</div>
			
		</div>
		<div class="control-group">
			<label for="yzm" class="control-label"></label>
			<input type="button" id="yanzhengma"><br>
		</div>
			
		<div class="control-group">
			<label for="question" class="control-label">密码提示问题：</label>
			<span class="sui-dropdown dropdown-bordered select">
				<span class="dropdown-inner">
				<a id="drop12" role="button" data-toggle="dropdown" href="#" class="dropdown-toggle"><input value="hz" name="question" type="hidden"><i class="caret"></i><span>你的小学在哪里上?</span></a>
				<ul id="menu12" role="menu" aria-labelledby="drop12" class="sui-dropdown-menu">
					<li role="presentation"><a role="menuitem" tabindex="-1" href="javascript:void(0);" value="0">你的小学在哪里上?</a></li>
					<li role="presentation"><a role="menuitem" tabindex="-1" href="javascript:void(0);" value="1">你的最好朋友的姓名?</a></li>
					<li role="presentation"><a role="menuitem" tabindex="-1" href="javascript:void(0);" value="2">你的最有纪念意义的日期?</a></li>
				</ul>
				</span>
			</span>
		</div>
		<div class="control-group">
			<label for="answer" class="control-label">密码答案：</label>
			<div class="controls">
				<input type="text" name="answer" class="input-medium input-fat"  placeholder="输入密码答案" data-rules="required|minlength=2|maxlength=20">
			</div>
		</div>
		<div class="control-group">
			<label class="control-label"></label>
			<div class="controls">
				<button type="submit" class="sui-btn btn-large btn-primary" id="zhuce">登录</button>
			</div>
		</div>
	</form>
	<p class="pp">验证成功</p>
</div>
<?php include("foot.php"); ?>
<script>
// 给提交按钮绑定事件
$("button[type=submit]").on("click",function(){
	// 使用$.ajax()提交数据
	$.ajax({
		url:"forget-save-ajax.php",
		type:"POST",
		data:$("#form1").serialize(),
		dataType:"json",
		success:function(data,textStatus){
			// 请求成功后调用此函数
			console.log(data);
			if (data.code==200) {
				$(".pp").slideDown(1000,function(){
					window.location.href="index.php";
				});
			}
			if (data.code==201) {
				// 提示密码错误
				$(".pp").html("验证失败").slideDown(1000,function(){
					window.location.href="login.php";
				});
			}
			if (data.code==20004) {
				// 提示邮箱填写错误
			}
		},
		error:function(XMLHttpRequest,textStatus,errorThrown){
			// 请求失败后调用此函数
			console.log("失败原因:"+errorThrown);
		}
	});
	return false;
})




var yanzhengma=document.getElementById('yanzhengma');
	getCodeFn();
	yanzhengma.onclick=getCodeFn;
function getCodeFn(){
	var strArry=["0","1","2","3","4","5","6","7","8","9","a","b",'c','d','e','f','h','i','g','k','l','m','m','o','p','q','r','s','t','u','v','w','x','y','z',"A","B",'C','D','E','F','G','I','G','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z'];
	var code_str="",num;
	for (var i = 0; i <4; i++) {
		num=parseInt(Math.random()*strArry.length);
		code_str+=strArry[num];
		
	}
	yanzhengma.value=code_str;

}	
	var zhuce=document.getElementById('zhuce');
	var yzm=document.getElementById('yzm');
	
	zhuce.onclick=function(){	
		var neirong=yzm.value.toUpperCase();
	// var password=document.getElementById('password').value;
	// var password2=document.getElementById('password2').value;	
		// var yzm_in=yzm.Value;
		if(neirong==yanzhengma.value.toUpperCase()){
			alert("验证通过");
		}else if(yzm.value.length==0){
			alert("请输入验证码");
		}else{
			alert("验证有误");
			$("form").attr("action","login.php");
			history.go(0); 
		}
		// if (password==password2){
		// 	alert("密码一致通过");
		// }else{
		// 	alert("密码不一致");
		// 	$("form").attr("action","login.php");
		// 	history.go(0);
		// }
	}
	
	


</script>