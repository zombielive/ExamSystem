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
		<?php if(is_array($examList)): $i = 0; $__LIST__ = $examList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$ex): $mod = ($i % 2 );++$i; if($ex['isdone'] == 0): ?><div class="panel panel-info">
			<?php else: ?>
			<div class="panel panel-success"><?php endif; ?>
				<div class="panel-heading"><h3 class="panel-title"><?php echo ($ex["name"]); ?></h3></div>
				<div class="panel-body">
					<p>试题数量：<span><?php echo ($ex["num"]); ?></span></p>
					<?php if($ex['isdone'] == 0): ?><p><br></p>
					<button class="btn btn-info" onclick="createPaper(<?php echo ($ex["id"]); ?>);">进入考试</button>
					<?php else: ?>
					<p>成绩：<span><?php echo ($ex["score"]); ?></span></p>
					<a class="btn btn-success" href="/ExamSystem/index.php/Home/Student/checking/examid/<?php echo ($ex["id"]); ?>">查看详情</a><?php endif; ?>
				</div>
			</div><?php endforeach; endif; else: echo "" ;endif; ?>
	</div>
	<div class="jumbotron topBox">
		<div class="container">
			<h1>正在生成试卷，请稍后...</h1>
		</div>
	</div>
	<script type="text/javascript">
	function createPaper(examid){
		$('.topBox').show();
		$.ajax({
			url:'/ExamSystem/index.php/Home/Student/createPaper',
			type:'POST',
			data:{examid:examid},
			success:function(data,status){
				window.location.href = '/ExamSystem/index.php/Home/Student/answering/examid/'+examid;
			}
		});
	}
	</script>
</body>
</html>