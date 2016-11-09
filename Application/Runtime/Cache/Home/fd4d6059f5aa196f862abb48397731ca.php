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
			<textarea cols="30" rows="5" class="form-control"></textarea>
			<label><h3>选项</h3></label>
			<div class="input-group">
				<div class="input-group-addon">A.</div>
				<input type="text" class="form-control">
			</div>
			<div class="input-group">
				<div class="input-group-addon">B.</div>
				<input type="text" class="form-control">
			</div>
			<button class="btn btn-default" id="onemore">+</button>
			<button class="btn btn-default" id="onemore">-</button>
			<br>
			<button class="btn btn-primary">保存</button>
			<a class="btn btn-default" href="/ExamSystem/index.php/Home/Teacher">取消</a>
		</div>
	</div>
<script type="text/javascript">
	$(function(){







	})
</script>
</body>
</html>