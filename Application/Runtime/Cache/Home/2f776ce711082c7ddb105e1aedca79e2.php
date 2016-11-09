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
			<button class="btn btn-default" id="delBtn">删除试题</button>
		</div>
		<table class="table table-hover table-bordered">
			<thead>
				<th><input type="checkbox" id="checkAll"></th>
				<th>题干</th>
				<th>操作</th>
			</thead>
			<tbody>
				<form id="qform">
					<?php if(is_array($qList)): $i = 0; $__LIST__ = $qList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$q): $mod = ($i % 2 );++$i;?><tr>
						<td><input type="checkbox" class="ckOne" value="<?php echo ($q["id"]); ?>" name="id[]"></td>
						<td><?php echo ($q["stem"]); ?></td>
						<td><a href="">修改</a></td>
					</tr><?php endforeach; endif; else: echo "" ;endif; ?>
				</form>
			</tbody>
		</table>
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
						url:"/ExamSystem/index.php/Home/Teacher/delquestion",
						type:"POST",
						data:$('#qform').serialize(),
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