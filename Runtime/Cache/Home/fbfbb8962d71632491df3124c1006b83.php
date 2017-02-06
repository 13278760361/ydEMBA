<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="maximum-scale=1.0,minimum-scale=1.0,user-scalable=0,width=device-width,initial-scale=1.0"/>
    <meta name="format-detection" content="telephone=no,email=no,date=no,address=no">
    
    <link rel="stylesheet" type="text/css" href="/Public/Home/css/aui.2.0.css" />
    <link rel="stylesheet" type="text/css" href="/Public/Home/css/aui-flex.css" />
    <link rel="stylesheet" type="text/css" href="/Public/Home/css/style.css" />
    <title>个人中心</title>
    <style>
        body{
            background:url("/Public/Home/image/bg.png");
            background-size: cover;
        }

         .course-icon {
                background: url("/Public/Home/image/course.svg") no-repeat left center;
                background-size: 18px;
            }

         ::-webkit-input-placeholder { /* WebKit browsers */ color: #FFF; } 
        :-moz-placeholder { /* Mozilla Firefox 4 to 18 */ color: #FFF; } 
        ::-moz-placeholder { /* Mozilla Firefox 19+ */ color: #FFF; } 
        :-ms-input-placeholder { /* Internet Explorer 10+ */ color: #FFF;} 
    </style>
</head>
<body>
    <div class="my-center-logo">
       <img src="<?php echo ($info["headimgurl"]); ?>" alt="" />
    </div>
    <div class="form-list">
        <ul>
            <li class="form-list-item aui-flex-col">
                <div class="aui-flex-item-1 aui-pull-left">
                    <i class="aui-iconfont aui-icon-lock "></i>
                </div>
                <div class="aui-pull-left aui-flex-item-11" >
                    <input type="text" value="<?php echo ($info["username"]); ?>" placeholder="姓名"  disabled="disabled" >
                </div>
                
            </li>
            <li class="form-list-item aui-flex-col">
                <div class="aui-flex-item-1 aui-pull-left">
                    <i class="myfont icon-edu-line"></i>
                </div>
                <div class="aui-pull-left aui-flex-item-11" >
                    <input type="text" value="<?php echo ($info["student_no"]); ?>" placeholder="学号"  disabled="disabled" >
                </div>
                
            </li>

             <li class="form-list-item aui-flex-col" id="choice-course">
                    <div class="aui-flex-item-1 aui-pull-left course-icon"></div>
                    <div class="aui-pull-left aui-flex-item-11" >
                        <input type="text" value="<?php echo ($info["year_name"]); echo ($info["class_name"]); ?>"  disabled="disabled" id="className">
                       
                    </div>
                </li>

            <li class="form-list-item aui-flex-col">
                <div class="aui-flex-item-1 aui-pull-left">
                    <i class="aui-iconfont aui-icon-phone "></i>
                </div>
                <div class="aui-pull-left aui-flex-item-11" >
                    <input type="text" value="<?php echo ($info["phone"]); ?>"  placeholder="电话号码" disabled="disabled" >
                </div>
                
            </li>
            <li class="form-list-item aui-flex-col">
                <div class="aui-flex-item-1 aui-pull-left">
                    <i class="myfont icon-xingbie "></i>
                </div>
                <div class="aui-pull-left aui-flex-item-11" >
                  <?php if($info['sex'] == 1): ?><input type="text" value="男"  disabled="disabled" placeholder="性别">
                    <?php elseif($info['sex'] == 2): ?>
                    <input type="text" value="女" disabled="disabled"  placeholder="性别">
                    <?php elseif($info['sex'] == 0): ?>
                    <input type="text" value="未知" disabled="disabled"  placeholder="性别"><?php endif; ?> 
                </div>
                
            </li>
         <!--    <li class="form-list-item aui-flex-col">
                <div class="aui-flex-item-1 aui-pull-left">
                    <i class="aui-iconfont aui-icon-location "></i>
                </div>
                <div class="aui-pull-left aui-flex-item-11" >
                    <input type="text" value="<?php echo ($info["address"]); ?>" >
                </div>
                
            </li> -->
        </ul>
    </div>
</body>
</html>