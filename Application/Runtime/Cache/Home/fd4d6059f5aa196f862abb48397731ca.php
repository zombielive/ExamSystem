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
			<div class="navbar-header"><a href="" class="navbar-brand">考试系统&nbsp;<span class="label label-primary">教师版</span></a></div>
			<div class="collapse navbar-collapse">
				<ul class="nav navbar-nav">
					<li class="active"><a href="/ExamSystem/index.php/Home/Teacher">试题管理</a></li>
					<li><a href="">试卷管理</a></li>
				</ul>
				<ul class="nav navbar-nav navbar-right">
					<li><a href="/ExamSystem/index.php/Home/Teacher/logout">注销</a></li>
				</ul>
			</div>
		</div>
	</nav>
	<div class="container">
		<div class="col-sm-8 col-sm-offset-2">
			<h1>新增试题</h1>
			<label><h3>题干</h3></label>
			<textarea cols="30" rows="5" class="form-control" id="stemBox"></textarea>
			<label><h3>选项</h3></label>
			<div class="alert alert-info" role="alert">请点击选项标号将该选项设为正确答案</div>
			<div id="optionBox">
				<div class="input-group">
					<div class="input-group-addon star">A.</div>
					<input type="text" class="form-control optionInput">
				</div>
				<div class="input-group">
					<div class="input-group-addon star">B.</div>
					<input type="text" class="form-control optionInput">
				</div>
			</div>
			<button class="btn btn-default" id="onemore">+</button>
			<button class="btn btn-default" id="oneless">-</button>
			<br>
			<div class="alert alert-danger" role="alert" id="msg"></div>
			<button class="btn btn-primary" id="saveBtn">保存</button>
			<a class="btn btn-default" href="/ExamSystem/index.php/Home/Teacher">取消</a>
		</div>
	</div>
<script type="text/javascript">
	$(function(){
		$('.star').click(function(){clickStar($(this));});
		function clickStar(t){
			var option = t.parent();
			option.addClass('has-success');
			option.siblings().removeClass('has-success');
		}
		var opnum = 2;
		$('#onemore').click(function(){
			if(opnum < 10){
				var starTag = String.fromCharCode(65+opnum);
				var optionBox = $(this).siblings('#optionBox');
				optionBox.append('<div class="input-group"><div class="input-group-addon star">'+starTag+'.</div><input type="text" class="form-control optionInput"></div>');
				optionBox.find('.star').bind('click',function(){clickStar($(this));})
				opnum++;
			}else{
				msgout('最多设置10个选项');
			}
		});
		$('#oneless').click(function(){
			if(opnum > 2){
				var optionBox = $(this).siblings('#optionBox');
				optionBox.children().last().unbind().remove();
				opnum--;
			}else{
				msgout('最少要设置2个选项');
			}
		});
		var lock = 1;
		$('#saveBtn').click(function(){
			if(lock == 1){
				lock = 0;
				var stem = $('#stemBox').val();
				if(!stem.length){msgout('题干不能为空');lock = 1;return;}
				var optionInputArray = $('.optionInput');
				var optionArray = [];
				for(var i=0;i < optionInputArray.length;i++){
					var ivar = $(optionInputArray[i]).val();
					if(!ivar){msgout('选项不能为空');lock = 1;return;}
					optionArray.push(ivar);
				};
				var ans = $('.has-success').children('.optionInput').val();
				if(!($('.has-success').length)){msgout('请选择一个正确答案');lock = 1;return;}
				$.ajax({
					url:"/ExamSystem/index.php/Home/Teacher/insertquestion",
					type:"POST",
					data:{stem:stem,optionArray:optionArray,ans:ans},
					success:function(data,status){
						lock = 1;
						alert('新增成功');
						window.location.href = '/ExamSystem/index.php/Home/Teacher';
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