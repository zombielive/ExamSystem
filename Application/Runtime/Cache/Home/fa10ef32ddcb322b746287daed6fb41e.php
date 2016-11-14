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
			<?php if(is_array($optionBag['data'])): $k = 0; $__LIST__ = $optionBag['data'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$op): $mod = ($k % 2 );++$k; if($op['id'] == $optionBag['ans']): ?><div class="option option-info"><?php echo chr($k+64).'.';?><span><?php echo ($op["content"]); ?></span><input type="hidden" value="<?php echo ($op["id"]); ?>"></div>
				<?php else: ?>
				<div class="option"><?php echo chr($k+64).'.';?><span><?php echo ($op["content"]); ?></span><input type="hidden" value="<?php echo ($op["id"]); ?>"></div><?php endif; endforeach; endif; else: echo "" ;endif; ?>
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
		$('.option').click(function(){
			$(this).addClass('option-info');
			$(this).siblings().removeClass('option-info');
		});
		lock = 1;
		$('.pagination').children('li').click(function(){
			if(lock == 1){
				lock = 0;
				var ans = $('.option-info').children('input').val();
				var p = $(this).children('span').text();
				$.ajax({
					url:'/ExamSystem/index.php/Home/Student/write',
					type:'POST',
					data:{UAid:<?php echo ($UAid); ?>,ans:ans},
					success:function(data,status){
						window.location.href = '/ExamSystem/index.php/Home/Student/answering/examid/'+<?php echo ($_GET['examid']); ?>+'/p/'+p;
					}
				});
			}
		});
		if($('#subPaper')){
			var locksub = 1;
			$('#subPaper').click(function(){
				var ans = $('.option-info').children('input').val();
				$.ajax({
					url:'/ExamSystem/index.php/Home/Student/write',
					type:'POST',
					data:{UAid:<?php echo ($UAid); ?>,ans:ans},
					success:function(data,status){
						var r = confirm("确定要交卷吗");
				if(r == true && locksub == 1){
					locksub = 0;
					$.ajax({
						url:'/ExamSystem/index.php/Home/Student/subpaper',
						type:'POST',
						data:{examid:<?php echo ($_GET['examid']); ?>},
						success:function(data,status){
							locksub = 1;
							alert(data.info);
							window.location.href = '/ExamSystem/index.php/Home/Student';
						}
					});
				}
					}
				});
			});
		}
	});
</script>
</body>
</html>