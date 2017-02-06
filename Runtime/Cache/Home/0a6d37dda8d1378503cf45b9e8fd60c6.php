<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="maximum-scale=1.0,minimum-scale=1.0,user-scalable=0,width=device-width,initial-scale=1.0"/>
    <meta name="format-detection" content="telephone=no,email=no,date=no,address=no">
    <title>签到成功</title>
    <style>
        *{margin: 0;padding: 0;font-size: 14px;}
        body{background: #EBEBEB;}
        .success{width:200px;height:200px;margin: 0 auto;margin-top: 20px;}
        .success img{width:200px;height: 200px;margin: 0 auto;}
        .sign-info{width:160px;height: 200px;margin: 0 auto;}
        .sign-info h1{padding: 10px 0; font-size: 26px;color: #09BA07;text-align: center;}
        .sign-info p{height: 16px;line-height: 16px;}
    </style>
</head>
<body>
    <div class="success">
        <img src="/Public/Home/image/success.svg" alt="">
    </div>
    <div class="sign-info">
        <h1>签到成功</h1>
        <p>课程：<?php echo ($subject_name); ?></p>
        <p>教师：<?php echo ($teacher_name); ?></p>
        <p>教室：<?php echo ($class_name); ?></p>
    </div>
    <!-- <div style="width:100%;text-align-center;"><?php echo ($prompt); ?></div> -->            
   <!--  <a href="<?php echo U('Choice/index');?>">选课</a>
    <a href="<?php echo U('Sign/index');?>">查看签到记录</a>
    <a href="<?php echo U('Center/index');?>">我的</a> -->
</body>
</html>