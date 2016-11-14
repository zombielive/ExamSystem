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
		padding: 15px;		
		border-radius: 4px;
		margin: 20px 0;
		border:1px solid #ccc;
	}
	.option-success{
		background-color: #d6e9c6;
	}
	.option-danger{
		background-color: #ebccd1;
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
			<?php if(is_array($optionBag['data'])): $k = 0; $__LIST__ = $optionBag['data'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$op): $mod = ($k % 2 );++$k; if($op['isans'] == 1): ?><div class="option option-success"><?php echo chr($k+64).'.';?><span><?php echo ($op["content"]); ?></span></div>
				<?php elseif(($op['id'] == $optionBag['ans']) AND ($op['isans'] == 0)): ?>
				<div class="option option-danger"><?php echo chr($k+64).'.';?><span><?php echo ($op["content"]); ?></span></div>
				<?php else: ?>
				<div class="option"><?php echo chr($k+64).'.';?><span><?php echo ($op["content"]); ?></span></div><?php endif; endforeach; endif; else: echo "" ;endif; ?>
		</div>
		<nav id="page">
			<ul class="pagination">
				<?php echo ($page); ?>
			</ul>
		</nav>
		<?php echo ($subview); ?>
	</div>
<script type="text/javascript">
	$(function(){
		$('.pagination').children('li').click(function(){
			var p = $(this).children('span').text();
			window.location.href = '/ExamSystem/index.php/Home/Student/checking/examid/'+<?php echo ($_GET['examid']); ?>+'/p/'+p;			
		});
	});
</script>
</body>
</html>