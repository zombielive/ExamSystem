<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-CN">
<head>
	<meta charset="UTF-8">
	<title>在线考试系统</title>
	<link rel="stylesheet" href="/ExamSystem/Public/css/bootstrap.min.css">
	<link rel="stylesheet" href="/ExamSystem/Public/css/bootstrap-theme.min.css">
	<script src="/ExamSystem/Public/js/jquery-3.1.1.min.js"></script>
	<script src="/ExamSystem/Public/js/bootstrap.min.js"></script>

<style>
	textarea{
		resize: none;
	}
	#onemore{
		margin: 20px 0;
	}
	.input-group{
		margin-bottom: 20px;
	}
	.star{
		cursor: pointer;
	}
	#msg{
		display: none;
	}
</style>
</head>
<body>
	<nav class="navbar navbar-default">
		<div class="container-fluid">
			<div class="navbar-header"><a href="/ExamSystem/index.php/Home/Teacher" class="navbar-brand">考试系统&nbsp;<span class="label label-primary">教师版</span></a></div>
			<div class="collapse navbar-collapse">
				<ul class="nav navbar-nav">
					<li><a href="/ExamSystem/index.php/Home/Teacher">试题管理</a></li>
					<li class="active"><a href="/ExamSystem/index.php/Home/Teacher/exam">试卷管理</a></li>
				</ul>
				<ul class="nav navbar-nav navbar-right">
					<li><a href="/ExamSystem/index.php/Home/Teacher/logout">注销</a></li>
				</ul>
			</div>
		</div>
	</nav>
	<div class="container">
		<div class="col-sm-8 col-sm-offset-2">
			<h1>修改考试</h1>
			<label><h3>考试名称</h3></label>
			<input type="text" class="form-control" id="nameInput" value="<?php echo ($name); ?>">
			<label><h3>试题数量</h3></label>
			<input type="number" class="form-control" id="numInput" value="<?php echo ($num); ?>">
			<br>
			<div class="alert alert-danger" role="alert" id="msg"></div>
			<button class="btn btn-primary" id="saveBtn">保存</button>
			<a class="btn btn-default" href="/ExamSystem/index.php/Home/Teacher/exam">取消</a>
		</div>
	</div>
<script type="text/javascript">
	$(function(){
		var lock = 1;
		$('#saveBtn').click(function(){
			if(lock == 1){
				lock = 0;
				var name = $('#nameInput').val();
				if(!name.length){msgout('名称不能为空');lock = 1;return;}
				var num = $('#numInput').val();
				if(!num.length){msgout('试题数量不能为空');lock = 1;return;}
				$.ajax({
					url:"/ExamSystem/index.php/Home/Teacher/updateexam",
					type:"POST",
					data:{name:name,num:num,id:<?php echo ($_GET['id']); ?>},
					success:function(data,status){
						lock = 1;
						//alert('修改成功');
						window.location.href = '/ExamSystem/index.php/Home/Teacher/exam';
					}
				});
			}
		});
		function msgout(text){
			$('#msg').text(text).show();
				setTimeout(function(){
					$('#msg').hide();
				},2000);
		}







	});
</script>
</body>
</html>