<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="maximum-scale=1.0,minimum-scale=1.0,user-scalable=0,width=device-width,initial-scale=1.0"/>
    <meta name="format-detection" content="telephone=no,email=no,date=no,address=no">
    <link rel="stylesheet" type="text/css" href="/Public/Home/css/aui.2.0.css" />
    <link rel="stylesheet" type="text/css" href="/Public/Home/css/aui-flex.css" />
    <link rel="stylesheet" type="text/css" href="/Public/Home/css/sign.css" />
    <script style="text/javascript" src="/Public/Home/js/jquery-2.2.2.min.js"></script>
    <title>签到系统</title>
</head>
<body>
    <div class="sing-user aui-flex-row">
        <div class="sing-user-img aui-pull-left aui-flex-item-2"> 
            <img src="<?php echo ($user_info["headimgurl"]); ?>" alt="">
        </div>
        <div class="aui-pull-right aui-flex-col aui-flex-item-10 sing-user-info">
            <div class="aui-flex-item-12">姓名：<?php echo ($user_info["username"]); ?></div>
            <div class="aui-flex-item-12">班级：<?php echo ($user_info["year_name"]); echo ($user_info["class_name"]); ?></div>
            <div class="aui-flex-item-12">学号：<?php echo ($user_info["student_no"]); ?></div>
            <div class="aui-flex-item-12">学分：<?php echo ($user_score); ?>/<?php echo ($subject_score_sum); ?></div>       
        </div>
    </div>

    <!--  课程列表开始  -->
    <?php if(is_array($class_hour_info)): $i = 0; $__LIST__ = $class_hour_info;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="course-list aui-flex-row">
        <div class="course-name"><?php echo ($vo["subject_name"]); ?>（<?php echo ($vo["teacher_name"]); ?>/<?php echo ($vo["subject_score"]); ?>学分）</div>
        <div class="rang">
            <div class="speed"></div>
        </div>
        <div class="rang-tips">
            <div class="tips-box">
                <div class="arrow"></div>
                <p now="<?php echo ($vo["subject_time_sum"]); ?>" totle="<?php echo ($vo["subject_time"]); ?>"><?php echo ($vo["subject_time_sum"]); ?>/<?php echo ($vo["subject_time"]); ?></p>
            </div>
        </div>
    </div><?php endforeach; endif; else: echo "" ;endif; ?>  
  <!--  课程列表结束  -->

<!-- 底部菜单 -->
   <div class="bottom-menu aui-flex-col">
       <div class="aui-flex-item-2 index-menu">
           <a href="http://www.emba.ynu.edu.cn/">&nbsp;&nbsp;&nbsp;&nbsp;</a>
       </div>
       <div class="aui-flex-col aui-flex-item-10 menu-list">
           <div class="aui-flex-item-4 aui-flex-middle sign-menu">
               <i>&nbsp;</i>课程.签到
               <div class="sing-menu-list">
                   <p><a href="<?php echo U('Sign/index');?>">签到信息</a></p>
                   <p><a href="<?php echo U('Choice/index');?>">课程信息</a></p>
               </div>
               <div class="sing-menu-list-arrow"></div>
           </div>
           <div class="aui-flex-item-4 aui-flex-middle"><a href="<?php echo U('Img/index');?>">EMBA</a></div>
           <div class="aui-flex-item-4 aui-flex-middle"><a href="<?php echo U('Center/index');?>">个人中心</a></div>    
       </div>
   </div>
   <script>
    //菜单
    $(".sign-menu").on("click",function (){
        var display=$(".sing-menu-list").css("display");
        if(display=="none"){
            $(".sing-menu-list").css("display","block");
        }else{
            $(".sing-menu-list").css("display","none");
        }
        
    });
   </script> 
<!-- 底部菜单 -->
    <script style="text/javascript" src="/Public/Home/js/jquery-2.2.2.min.js"></script>
    <script>
        
    //初始化进度条
        speed();
        
        function speed(){
            var speed=$(".course-list");
            for(var i=0;i<speed.length;i++){
                var now=parseInt($(speed[i]).find("p").attr("now"));
                var totle=parseInt($(speed[i]).find("p").attr("totle"));
                //alert("now:"+now+"|"+totle);
                var per=Math.round(now / totle * 10000) / 100.00 + "%";
                //alert(per);
                $(speed[i]).find(".speed").css('width',per);

                //判断颜色/箭头类型
                if(now<1){
                    $(speed[i]).find(".tips-box").addClass("tips-box-c2");
                    $(speed[i]).find(".arrow").addClass("arrow-left");
                    $(speed[i]).find(".tips-box").css("left","0");
                }
                if(now==totle){
                    $(speed[i]).find(".tips-box").addClass("tips-box-c1");
                    $(speed[i]).find(".arrow").addClass("arrow-right");
                    $(speed[i]).find(".tips-box").css("right","0");
                }
                if(now>0 && now<totle){
                    $(speed[i]).find(".tips-box").addClass("tips-box-c1");
                    $(speed[i]).find(".arrow").addClass("arrow-center"); 
                    var speedObj=$(speed[i]).find(".tips-box");
                    speedObj.css("left",per);
                    var offset=speedObj.offset().left;
                    speedObj.offset({
                        left:Math.ceil(offset)-15
                    })
                }
               
            }
        }

        
    </script>
</body>
</html>