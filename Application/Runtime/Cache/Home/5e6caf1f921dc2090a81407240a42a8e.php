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
	html,body,.content{
		height:100%
	}
	.container{
		display: flex;
		flex-wrap: wrap;
		justify-content: flex-start;
	}
	.panel{
		width: 20%;
		margin:20px 5%;
	}
	.topBox{
		display: none;
		position: absolute;
		top: 0;left: 0;
		z-index: 10;
		height: 100%;
		width: 100%;
		margin:0;
		text-align: center;
	}
</style>
</head>
<body>
	<nav class="navbar navbar-default">
		<div class="container-fluid">
			<div class="navbar-header"><a href="/ExamSystem/index.php/Home/Student" class="navbar-brand">考试系统&nbsp;<span class="label label-info">学生版</span></a></div>
			<div class="collapse navbar-collapse">
				<ul class="nav navbar-nav navbar-right">
					<li><a href="/ExamSystem/index.php/Home/Student/logout">注销</a></li>
				</ul>
			</div>
		</div>
	</nav>
	<div class="container examBox">
		<div class="panel panel-info">
			<div class="panel-heading"><h3 class="panel-title">天下第一武道会</h3></div>
			<div class="panel-body">
				<p>试题数量：<span>20</span></p>
				<button class="btn btn-info">进入考试</button>
			</div>
		</div>
	</div>
	<div class="jumbotron topBox">
		<div class="container">
			<h1>正在生成试卷，请稍后...</h1>
		</div>
	</div>
</body>
</html>