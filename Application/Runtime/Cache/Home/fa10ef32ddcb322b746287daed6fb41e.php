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
	.option{
		cursor: pointer;
		padding: 15px;		
		border-radius: 4px;
		margin: 20px 0;
		border:1px solid #ccc;
	}
	.option-success{
		background-color: #d6e9c6;
	}
	.option-info{
		background-color: #bce8f1;
	}
	#page{
		text-align: center;
		cursor: pointer;
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
	<div class="container">
		<div class="page-header">
			<h1><?php echo ($stem); ?></h1>
		</div>
		<div class="optionBox">
			<?php if(is_array($optionList)): $k = 0; $__LIST__ = $optionList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$op): $mod = ($k % 2 );++$k; if($op['id'] == $ans): ?><div class="option option-info"><?php echo chr($k+64).'.';?><span><?php echo ($op["content"]); ?></span><input type="hidden" value="<?php echo ($op["id"]); ?>"></div>
				<?php else: ?>
				<div class="option"><?php echo chr($k+64).'.';?><span><?php echo ($op["content"]); ?></span><input type="hidden" value="<?php echo ($op["id"]); ?>"></div><?php endif; endforeach; endif; else: echo "" ;endif; ?>
		</div>
		<nav id="page">
			<ul class="pagination">
				<li><span>&laquo;</span></li>
				<?php if(is_array($uaList)): $i = 0; $__LIST__ = $uaList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$ua): $mod = ($i % 2 );++$i; if(($i) == "p"): ?><li class="active"><span><?php echo ($i); ?></span></li>
				<?php else: ?>
				<li><span><?php echo ($i); ?></span></li><?php endif; endforeach; endif; else: echo "" ;endif; ?>
				<li><span>&raquo;</span></li>
			</ul>
		</nav>
	</div>
<script type="text/javascript">
	$(function(){
		$('.option').click(function(){
			$(this).addClass('option-info');
			$(this).siblings().removeClass('option-info');
		});
		lock = 1;
		$('.page').children('a').click(function(){
			if(lock == 1){
				lock = 0;
				$.ajax({
					url:'/ExamSystem/index.php/Home/Student/write',
					type:'POST',
					data:{examid:examid},
					success:function(data,status){
						
					}
				});
			}
		});
	});
</script>
</body>
</html>