<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="maximum-scale=1.0,minimum-scale=1.0,user-scalable=0,width=device-width,initial-scale=1.0"/>
    <meta name="format-detection" content="telephone=no,email=no,date=no,address=no">
    
    <link rel="stylesheet" type="text/css" href="/Public/Home/css/aui.2.0.css" />
    <link rel="stylesheet" type="text/css" href="/Public/Home/css/aui-flex.css" />
    <link rel="stylesheet" type="text/css" href="/Public/Home/css/style.css" />

    <script style="text/javascript" src="/Public/Home/js/jquery-2.2.2.min.js"></script>
    <script style="text/javascript" src="/Public/Home/js/common.js"></script>
    <script style="text/javascript" src="/Public/static/layer/layer.js"></script>
    <title>选课</title>
    <style>
        body{padding-bottom:3.1rem;}
    </style>
</head>
<body pages start="2" success="returnfunc"  action="<?php echo U('Choice/ajaxClass');?>" page-keyword="<?php echo ($keyword); ?>">
    <div class="aui-searchbar" id="search">
        <div class="aui-border-radius search-input" tapmode >
            <i class="aui-iconfont aui-icon-search"></i>
             <form action="" method="get">
              <input type="hidden" name="s" value="/Home/Choice/index/">
              <input type="search" placeholder="请输入搜索内容" id="search-input" name="keyword" value="<?php echo ($keyword); ?>">
              <button type="submit" id="geter" style="display:none;">搜索</button>
            </form>
        </div>
        <div class="aui-searchbar-cancel" tapmod>取消</div>
    </div>

  <!--   <form action="" method="get">
       <input type="text" name="s" value="/Home/Choice/index/">
        <input type="text" name="keyword">
        <button type="submit">搜索</button>
    </form> -->
<!--    课程列表开始-->
  <?php if(is_array($lists)): $i = 0; $__LIST__ = $lists;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><div class="aui-flex-col course-list">
        <img src="/Public/Home/image/Bitmap.png" alt="">
        <div class="aui-flex-item-10 aui-flex-row">
            <div class="course-name" ><?php echo ($v["subject_name"]); ?>(<?php echo ($v["teacher_name"]); ?>/<?php echo ($v["subject_score"]); ?>学分)</div>
            <div class="course-info aui-ellipsis-1">
              <div class="course-time aui-pull-left">学时：<?php echo ($v["subject_time"]); ?></div>
              <div class="study-time aui-pull-right down" data="<?php echo ($v["id"]); ?>">上课时间</div>
            </div>
        </div>
        <div class="aui-flex-item-2 course-btn">
            <label>
             <?php if($v['subject_type'] == 0): ?><input onclick="doClick(this)" class="my-checkbox" id="<?php echo ($v["id"]); ?>" status="<?php echo ($v["subject_type"]); ?>" type="checkbox" time="<?php echo ($v["subject_time"]); ?>" credit="<?php echo ($v["subject_score"]); ?>"  <?php if($v["check_box_status"] == 1): ?>checked="checked"<?php endif; ?>>选课
            <?php elseif($v['subject_type'] == 1): ?>
             已选
            <?php elseif($v['subject_type'] == 2): ?>

             已修<?php endif; ?>   
            </label>
        </div>
    </div>
    <div class="aui-flex-col course-detail" id="course-<?php echo ($v["id"]); ?>">
        <div class="aui-flex-item-10">
            <?php if(is_array($v['class_hour'])): $i = 0; $__LIST__ = $v['class_hour'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vc): $mod = ($i % 2 );++$i;?><p><?php if($key == 0): ?>上课时间：<?php endif; echo ($vc["month"]); ?>&nbsp;<?php echo ($vc["start_time"]); ?>-<?php echo ($vc["end_time"]); ?>&nbsp;<?php echo ($vc["class_room_name"]); ?></p><?php endforeach; endif; else: echo "" ;endif; ?>
        </div>
        <div class="aui-flex-item-2"></div>
    </div><?php endforeach; endif; else: echo "" ;endif; ?>  
<!--    课程列表结束--> 
<input name="ids" type="hidden" info="ids" >
<!-- 底部已选列表 -->

    <div class="selected-list">
        <div class="selected-list-detail"></div>
        <div class="selected-list-btn" poster="info" action="/index.php?s=/Home/Choice/index.html">确定</div>
    </div>
  
<!-- 底部已选列表 -->
   
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
</body>
<script>

    //搜索特效
    var searchBar = document.querySelector(".search-input");
    var myCheckbox=document.querySelector(".my-checkbox");
    var Mask=document.querySelector(".aui-mask");
    if(searchBar){
        searchBar.onclick = function(){
            document.querySelector(".aui-searchbar-cancel").style.marginRight = 0;
        }
    }
    document.querySelector(".aui-searchbar-cancel").onclick = function(){
        this.style.marginRight = "-"+this.offsetWidth+"px";
        document.getElementById("search-input").value = '';
        document.getElementById("search-input").blur();
    }
    // function doSearch(){
    //     var keyworlds=$("#search-input").val();
    //     alert("搜索内容："+keyworlds);
    // }

    //选课相关
    var coiurseNum=0;var courseTime=0;var courseCredit=0;var courseData={};
       var ids =  [];



function doClick(obj){
     
        $(".selected-list").css("visibility","visible");
        //不要问我为什么用status来判断，checked不兼容！
        var ctime=$(obj).attr("time");
        //取出ID    
        var id = $(obj).attr('id');

        var credit=$(obj).attr("credit");
        if($(obj).attr("status")==0){
            $(obj).attr("status",1)
            //推入数组
            ids.push(id);
            coiurseNum+=1;
            courseTime+=parseInt(ctime);
            courseCredit+=parseInt(credit);
        }else{
            $(obj).attr("status",0)
             //排除数组
             var index  = ids.indexOf(id);
             // alert(index);
             ids.splice(index,1);

            coiurseNum-=1;
            courseTime-=parseInt(ctime);
            courseCredit-=parseInt(credit);
             if(coiurseNum==0){
                  $(".selected-list").css("visibility","hidden");
             }
        }
         //加入input
        $("input[name = 'ids']").val(ids);  
        //将数据压入JSON
        courseData.coiurseNum=coiurseNum;
        courseData.courseTime=courseTime;
        courseData.courseCredit=courseCredit;
        //alert(JSON.stringify(courseData));
        $(".selected-list-detail").html("已选："+coiurseNum+"门，学时："+courseTime+"，学分："+courseCredit+"分");

   
    }
   
    // $(".my-checkbox").on('click',function (){
     
    //     $(".selected-list").css("visibility","visible");
    //     //不要问我为什么用status来判断，checked不兼容！
    //     var ctime=$(this).attr("time");
    //     //取出ID    
    //     var id = $(this).attr('id');

    //     var credit=$(this).attr("credit");
    //     if($(this).attr("status")==0){
    //         $(this).attr("status",1)
    //         //推入数组
    //         ids.push(id);
    //         coiurseNum+=1;
    //         courseTime+=parseInt(ctime);
    //         courseCredit+=parseInt(credit);
    //     }else{
    //         $(this).attr("status",0)
    //          //排除数组
    //          var index  = ids.indexOf(id);
    //          // alert(index);
    //          ids.splice(index,1);

    //         coiurseNum-=1;
    //         courseTime-=parseInt(ctime);
    //         courseCredit-=parseInt(credit);
    //          if(coiurseNum==0){
    //               $(".selected-list").css("visibility","hidden");
    //          }
    //     }
    //      //加入input
    //     $("input[name = 'ids']").val(ids);  
    //     //将数据压入JSON
    //     courseData.coiurseNum=coiurseNum;
    //     courseData.courseTime=courseTime;
    //     courseData.courseCredit=courseCredit;
    //     //alert(JSON.stringify(courseData));
    //     $(".selected-list-detail").html("已选："+coiurseNum+"门，学时："+courseTime+"，学分："+courseCredit+"分");

   
    // });


//确定按钮
    // $(".selected-list-btn").on('click',function (){
    //     alert(JSON.stringify(courseData));
    // });

      

     

      $("#search-input").change(function(){
         $("#geter").click();
      })


 function returnfunc(data){
        var html = '';
         for (key in data){
            if (data[key].subject_type == 0) {
             html +="<div class='aui-flex-col course-list'><img src='/Public/Home/image/Bitmap.png' alt=''><div class='aui-flex-item-10 aui-flex-row'><div class='course-name'>"+data[key].subject_name+"("
              +data[key].teacher_name+"/"+data[key].subject_score+"学分)</div><div class='course-info aui-ellipsis-1'><div class='course-time aui-pull-left'>学时："+data[key].subject_time+"</div><div class='study-time aui-pull-right down' data="+data[key].id+">上课时间</div></div></div><div class='aui-flex-item-2 course-btn'><label><input onclick='doClick(this)' class='my-checkbox' id="+data[key].id+" status="+data[key].subject_type+" type='checkbox' time="+data[key].subject_time+" credit="+data[key].subject_score+">选课</label></div></div><div class='aui-flex-col course-detail' id='course-"+data[key].id+"'><div class='aui-flex-item-10'>";
            for(key1 in data[key].class_hour){
              if (key1 == 0) {
                html +=  "<p>上课时间："+data[key].class_hour[key1].month+"&nbsp;"+data[key].class_hour[key1].start_time+"-"+data[key].class_hour[key1].end_time+"&nbsp;"+data[key].class_hour[key1].class_room_name+"</p>";
              }else{
                html +=  "<p>"+data[key].class_hour[key1].month+"&nbsp;"+data[key].class_hour[key1].start_time+"-"+data[key].class_hour[key1].end_time+"&nbsp;"+data[key].class_hour[key1].class_room_name+"</p>";
              }
             
            }

            html+="</div><div class='aui-flex-item-2'></div></div>";
        

         
            }else if (data[key].subject_type == 1){
                html +="<div class='aui-flex-col course-list'><img src='/Public/Home/image/Bitmap.png' alt=''><div class='aui-flex-item-10 aui-flex-row'><div class='course-name'>"+data[key].subject_name+"("
              +data[key].teacher_name+"/"+data[key].subject_score+"学分)</div><div class='course-info aui-ellipsis-1'><div class='course-time aui-pull-left'>学时："+data[key].subject_time+"</div><div class='study-time aui-pull-right down' data="+data[key].id+">上课时间</div></div></div><div class='aui-flex-item-2 course-btn'><label>已选</label></div></div><div class='aui-flex-col course-detail' id='course-"+data[key].id+"'><div class='aui-flex-item-10'>";
            for(key1 in data[key].class_hour){
              if (key1 == 0) {
                html +=  "<p>上课时间："+data[key].class_hour[key1].month+"&nbsp;"+data[key].class_hour[key1].start_time+"-"+data[key].class_hour[key1].end_time+"&nbsp;"+data[key].class_hour[key1].class_room_name+"</p>";
              }else{
                html +=  "<p>"+data[key].class_hour[key1].month+"&nbsp;"+data[key].class_hour[key1].start_time+"-"+data[key].class_hour[key1].end_time+"&nbsp;"+data[key].class_hour[key1].class_room_name+"</p>";
              }
             
            }

            html+="</div><div class='aui-flex-item-2'></div></div>";
                 

            }else if (data[key].subject_type == 2) {
               html +="<div class='aui-flex-col course-list'><img src='/Public/Home/image/Bitmap.png' alt=''><div class='aui-flex-item-10 aui-flex-row'><div class='course-name'>"+data[key].subject_name+"("
              +data[key].teacher_name+"/"+data[key].subject_score+"学分)</div><div class='course-info aui-ellipsis-1'><div class='course-time aui-pull-left'>学时："+data[key].subject_time+"</div><div class='study-time aui-pull-right down' data="+data[key].id+">上课时间</div></div></div><div class='aui-flex-item-2 course-btn'><label>已修</label></div></div><div class='aui-flex-col course-detail' id='course-"+data[key].id+"'><div class='aui-flex-item-10'>";
            for(key1 in data[key].class_hour){
              if (key1 == 0) {
                html +=  "<p>上课时间："+data[key].class_hour[key1].month+"&nbsp;"+data[key].class_hour[key1].start_time+"-"+data[key].class_hour[key1].end_time+"&nbsp;"+data[key].class_hour[key1].class_room_name+"</p>";
              }else{
                html +=  "<p>"+data[key].class_hour[key1].month+"&nbsp;"+data[key].class_hour[key1].start_time+"-"+data[key].class_hour[key1].end_time+"&nbsp;"+data[key].class_hour[key1].class_room_name+"</p>";
              }
             
            }

            html+="</div><div class='aui-flex-item-2'></div></div>";

            }
         }
       
         $("body").append(html);
    }
//上课时间

// $(document).delegate('.radio label','click',function() {});


 $(document).delegate('.study-time','click',function() {
       if( $(this).hasClass("down")){
            $(".course-list").css("marginBottom","0")
            $(this).removeClass("down");
            $(this).addClass("up");
        }else{
            $(this).removeClass("up");
            $(this).addClass("down");
        }
        var courseId=$(this).attr("data");
        $("#course-"+courseId).toggle();
    });

    // $(".study-time").on('click',function() {
    //    if( $(this).hasClass("down")){
    //         $(".course-list").css("marginBottom","0")
    //         $(this).removeClass("down");
    //         $(this).addClass("up");
    //     }else{
    //         $(this).removeClass("up");
    //         $(this).addClass("down");
    //     }
    //     var courseId=$(this).attr("data");
    //     $("#course-"+courseId).toggle();
    // });
</script>
</html>