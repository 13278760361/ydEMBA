<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="">
<meta name="keywords" content="">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
<meta name="renderer" content="webkit">
<meta http-equiv="Cache-Control" content="no-siteapp"/>
<title></title>
<link rel="stylesheet" type="text/css" href="/Public/Home/css/20161109css.css"/>
    <script style="text/javascript" src="/Public/Home/js/jquery-2.2.2.min.js"></script>
    <script style="text/javascript" src="/Public/Home/js/common.js"></script>
    <script style="text/javascript" src="/Public/static/layer/layer.js"></script>
</head>
<body>
<div class="sign_box">
	<div class="img"><img src="/Public/Home/css/slice/lunch.jpg" /></div>
	<p class="title">是否参加午餐？</p>
	<p class="note">午餐报名截止时间上午11点</p>
	<div class="n_btn s_btn"> 

	    <input  no="status" type="hidden" value="-1">
	    <input  no="id" type="hidden" value="1"> <!-- 不参与 -->

	    <input  yes="status" type="hidden" value="1">
	    <input  yes="id" type="hidden" value="1"> <!-- 参与 -->
		<span class="btn_no fl" poster="no" action="<?php echo U('Vote/doVote');?>">不参加</span>
		<span class="btn_yes fr" poster="yes" action="<?php echo U('Vote/doVote');?>">参加</span>
	</div>
	<div class="s_text">
		<h5>签到成功</h5>
		<p>课程：<?php echo ($subject_name); ?></p>
		<!-- <p>教师：<?php echo ($teacher_name); ?></p>
		<p>教室：<?php echo ($class_name); ?></p> -->
	</div>
</div>
</body>
</html>