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
	.page{
		text-align: center;
	}
	.page span,.num,.prev,.next{
		margin:0 10px;
		font-size: 20px;
	}
	a:hover{
		text-decoration: none;
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
		<div class="btn-group" id="btngrp">
			<a href="/ExamSystem/index.php/Home/Teacher/addexam" class="btn btn-default">新增考试</a>
			<button class="btn btn-default" id="delBtn">删除考试</button>
		</div>
		<table class="table table-hover table-bordered">
			<thead>
				<th><input type="checkbox" id="checkAll"></th>
				<th>考试名称</th>
				<th>试题数量</th>
				<th>操作</th>
			</thead>
			<tbody>
				<form id="eform">
					<?php if(is_array($eList)): $i = 0; $__LIST__ = $eList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$e): $mod = ($i % 2 );++$i;?><tr>
						<td><input type="checkbox" class="ckOne" value="<?php echo ($e["id"]); ?>" name="id[]"></td>
						<td><?php echo ($e["name"]); ?></td>
						<td><?php echo ($e["num"]); ?></td>
						<td><a href="/ExamSystem/index.php/Home/Teacher/editexam/id/<?php echo ($e["id"]); ?>">修改</a></td>
					</tr><?php endforeach; endif; else: echo "" ;endif; ?>
				</form>
			</tbody>
		</table>
		<div class="page"><?php echo ($page); ?></div>
	</div>
<script type="text/javascript">
	$(function(){
		$('#checkAll').change(function(){
			if($('#checkAll').prop('checked')){
				$('.ckOne').prop('checked',true).parents('tr').addClass('warning');
			}else{
				$('.ckOne').prop('checked',false).parents('tr').removeClass('warning');
			}
		});
		$('.ckOne').change(function(){
			if($(this).prop('checked')){
				$(this).parents('tr').addClass('warning');
			}else{
				$(this).prop('checked',false).parents('tr').removeClass('warning');
			}
		});
		var lock = 1;
		$('#delBtn').click(function(){
			if(lock == 1){
				lock = 0;
				var cked = $('.ckOne:checked');
				if(!cked.length){
					alert('请至少选择一项');
					lock = 1;
				}else{
					$.ajax({
						url:"/ExamSystem/index.php/Home/Teacher/delexam",
						type:"POST",
						data:$('#eform').serialize(),
						success:function(data,status){
							lock = 1;
							cked.parents('tr').remove();
							alert('删除成功');
						}
					});
				}
			}
		});





	});
</script>
</body>
</html>