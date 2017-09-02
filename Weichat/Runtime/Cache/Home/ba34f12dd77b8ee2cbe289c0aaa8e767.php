<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title></title>
		<script src="https://cdn.bootcss.com/jquery/1.7.2/jquery.min.js"></script>
		<style>
			*{padding: 0; margin: 0;}
			.erweima{width: 200px; height: 200px; margin: 0 auto; margin-top: 200px;}
			#login_note{width: 280px; height: 50px; margin: 0 auto; margin-top: 10px; text-align: center; line-height: 50px; color: red;}
		</style>
	</head>
	<body>
		<div class="erweima">
			<img src="<?php echo ($erweima_img); ?>" width="200px" height="200px" />
		</div>
		<div id="login_note">
			扫描登录
		</div>
		<script>
			$(document).ready(function(){
				var lunxun;
				lunxun = setInterval(login_jiance,3000);
				function login_jiance(){
					$.get('/index.php/Home/Index/login',{
						'uuid':'<?php echo ($uuid); ?>'
					},function(result){
						if(result == 'scan_success'){
							$('#login_note').html('扫码成功，请在手机上确定...');
						}else if(result == 'login_success'){
							$('#login_note').html('登录成功,正在转跳......');
							clearInterval(lunxun);
							window.location.href="index.php/Home/Main/index";
						}else{
							$('#login_note').html('登录失败,请刷新后再试');
							clearInterval(lunxun);
						}
					});
				}
			});
		</script>
	</body>
</html>