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
	#btngrp{
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
		<div class="btn-group" id="btngrp">
			<a href="/ExamSystem/index.php/Home/Teacher/addquestion" class="btn btn-default">新增试题</a>
			<button class="btn btn-default">删除试题</button>
		</div>
		<table class="table table-hover table-bordered">
			<thead>
				<th><input type="checkbox"></th>
				<th>题干</th>
				<th>操作</th>
			</thead>
			<tbody>
				<tr>
					<td><input type="checkbox"></td>
					<td>this is a question just for testing.</td>
					<td><a href="">修改</a></td>
				</tr>
			</tbody>
		</table>
	</div>
</body>
</html>