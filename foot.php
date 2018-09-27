</div>
</body>
</html>
<script type="text/javascript" src="http://g.alicdn.com/sj/lib/jquery.min.js"></script>
<script type="text/javascript" src="http://g.alicdn.com/sj/dpl/1.5.1/js/sui.min.js"></script>
<script type="text/javascript" src="js/template-web.js"></script>
<script type="text/javascript">
//使用JQuery实现tab切换效果
$(function(){
	$(".box .level1>a").on("click",function(){
		//给当前元素添加"current"样式
		$(this).addClass("current")
		//下一个元素显示
		.next().show()
		//父元素的兄弟元素的子元素<a>
		.parent().siblings().children("a")
		//移除上面找到的所有<a>的current 样式
		.removeClass("current")
		//上面所有<a>的下一个元素隐藏
		.next().hide("fast");
		//获取当前li标签在兄弟中的序号,并放到cookie中
		// $(this).parent().index();
		document.cookie = "menuState=" + $(this).parent().index()+";";
		return false;
	});
});
//读取菜单状态cookie
//用正则表达式
var menuState = getCookie("menuState");
$(".box .menu>li").eq(menuState).find("ul").show();
function getCookie(name)
{
	var arr,reg=new RegExp("(^| )"+name+"=([^;]*)(;|$)");
	if(arr=document.cookie.match(reg)){
	return unescape(arr[2]);
	}else{
	return null;}
}

</script>