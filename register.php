<?php include("01-head.php"); ?>	

<div class="box-con">
	<form id="form1" action="register-save.php" method="post" class="sui-form form-horizontal sui-validate">
		<div class="control-group">
			<label for="inputEmail" class="control-label">用户邮箱：</label>
			<div class="controls">
				<input type="text" id="inputEmail" name="inputEmail" class="input-large input-fat" placeholder="邮箱" data-rules='required|minlength=1|maxlength=30'>
			</div>
			<span id="tips" style="color:red;"></span>
		</div>
		<div class="control-group">
			<label for="uname" class="control-label">用户名：</label>
			<div class="controls">
				<input type="text" id="uname" name="uname" class="input-large input-fat" placeholder="请输入用户名" data-rules="required|minlength=1|maxlength=6" data-empty-msg="请填写用户名">
			</div>
		</div>
		<div class="control-group">
			<label for="passWord" class="control-label">密码:  </label>
			<div class="controls">
				<input type="password" name="passWord" id="passWord" class="input-large input-fat" placeholder="请输入密码" data-rules="required|minlength=1|maxlength=12">
			</div>
		</div>
		<div class="control-group">
			<label for="password2" class="control-label">重复密码：</label>
			<div class="controls">
			<input type="password" id="password2" name="password2" class="input-large input-fat"  placeholder="输入密码" data-rules="required|minlength=1|maxlength=12">
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
				<a id="drop12" role="button" data-toggle="dropdown" href="#" class="dropdown-toggle"><input name="question" type="hidden"><i class="caret"></i><span>你的小学在哪里上?</span></a>
				<ul id="menu12" role="menu" aria-labelledby="drop12" class="sui-dropdown-menu">
					<li role="presentation"><a role="menuitem" tabindex="-1" href="javascript:void(0);" value="xx">你的小学在哪里上?</a></li>
					<li role="presentation"><a role="menuitem" tabindex="-1" href="javascript:void(0);" value="xm">你的最好朋友的姓名?</a></li>
					<li role="presentation"><a role="menuitem" tabindex="-1" href="javascript:void(0);" value="rq">你的最有纪念意义的日期?</a></li>
				</ul>
				</span>
			</span>
		</div>
		<div class="control-group">
			<label for="answer" class="control-label">密码答案：</label>
			<div class="controls">
				<input type="text" name="answer" class="input-medium input-fat"  placeholder="输入密码答案" data-rules="required|minlength=1|maxlength=20">
			</div>
		</div>
		<div class="control-group">
			<label class="control-label"></label>
			<div class="controls">
				<input type="submit" value="注册" class="sui-btn btn-large btn-primary" id="zhuce">
			</div>
		</div>
	</form>
</div>
<?php include("foot.php"); ?>
<!-- <script type="text/javascript">
	var code_btn = document.getElementById('yanzhengma');	
	var zhuce = document.getElementById('zhuce');
	var yzm = document.getElementById('yzm');
	var email = document.getElementById('inputEmail');
	zhuce.onclick = function() {
		var neirong = yzm.value.toUpperCase();
		if(neirong == code_btn.value.toUpperCase()) {
			alert("验证通过");
		} else if(yzm.value.length == 0) {
			alert("请输入验证码");
		} else {
			alert("验证有误");
			$("form").attr("action","login.php");
			history.go(0);
		}
		if(window.XMLHttpRequest){
			var xhr = new XMLHttpRequest();
		} else {
			// 兼容IE老版本
			var xhr = new ActiveObject("Msxml2.XMLHTTP");
		}
		xhr.onreadystatechange = function(){
			if (xhr.readyState == 3){
				console.log("正在处理中,请稍后...");
			}
			if (xhr.readyState == 4) {
				console.log(xhr.responseText);
				console.log("请求完成,准备好了");
			}
		}
		xhr.open("get","register-save.php",true);
		xhr.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
		xhr.send("email="+encodeURIComponent(email.value)+"&userm="+encodeURIComponent(userm.value)+"&password="+encodeURIComponent(password.value)+"&question="+encodeURIComponent(question.value)+"&answer="+encodeURIComponent(answer.value));
	}

	$("input[name=inputEmail]").on("blur",function(){
		$.get("register-save-ajax.php",
			{"email":$(this).val()},
			function(data){
				console.log(data);
				if (data == "ok") {
					$("#tips").html("可以注册");
				} else {
					$("#tips").html("邮件重复");
				}
			},
			"text"
		);
	});
</script> -->

<script>
// var inputEmail = document.getElementById('inputEmail');
$("input[name=inputEmail]").on("blur",function(){

	$.get("register-save-ajax.php",
		{"inputEmail":$(this).val()},
		function(data){
			// console.log(data);
			if (data=="ok") {
				$("#tips").html("可以注册");
			}else{
				$("#tips").html("邮件重复");
			}
		},
		"text"
	);
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
	var password=document.getElementById('passWord').value;
	var password2=document.getElementById('password2').value;	
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
		if (password==password2){
			alert("密码一致通过");
		}else{
			alert("密码不一致");
			$("form").attr("action","login.php");
			history.go(0);
		}
	}

</script>