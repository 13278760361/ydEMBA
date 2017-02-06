<?php
// +----------------------------------------------------------------------
// | OneThink [ WE CAN DO IT JUST THINK IT ]
// +----------------------------------------------------------------------
// | Copyright (c) 2013 http://www.onethink.cn All rights reserved.
// +----------------------------------------------------------------------
// | Author: 麦当苗儿 <zuojiazi@vip.qq.com> <http://www.zjzit.cn>
// +----------------------------------------------------------------------

namespace Home\Controller;
// use OT\DataDictionary;
use Think\Controller;
use Wechat\TPWechat;
/**
 * 前台首页控制器
 * 主要获取首页聚合数据
 */
class MsgController extends BaseController {

     function _initialize(){
        parent::_initialize();
            $this->db = M('Msg');
        $this->db_r =M('Msg_record');
        // $this->user_id= 229;
   
    }
    //投票
    public function index(){

       if ( empty($this->user_id) ) {  //检测是否绑定
               redirect( U('Public/login') );
            }
             
          $field ='m.id,m.title,m.intro,mr.status';  
          $where ="m.id = mr.msg_id and mr.user_id = {$this->user_id}" ; 
        
          $lists = $this->db->table('dk_msg m,dk_msg_record mr')->where($where)->field($field)->order('time DESC')->limit(0,6)->select();
          
          $this->assign('lists',$lists); 
          $this->display();
    }

    public function info(){
        $id = I('get.id');
       
        $info = $this->db->field('id,title,content,time')->where( array('id'=>$id) )->find();
        $status = $this->db_r->where( array('msg_id'=>$id,'user_id'=>$this->user_id) )->getField('status');
        //状态获取 0未读  1已读  

        // echo $this->db_r->getLastSql();exit();

        if ( $status == 0 ) { //未读情况下 改变状态
           $this->db_r->where( array('msg_id'=>$id,'user_id'=>$this->user_id) )->setField('status',1);
        }

        $info['time'] = date('Y-m-d H:i',$info['time']);
        $info['content'] = htmlspecialchars_decode( $info['content'] );
        $this->assign('info',$info);
        $this->display();
    }

    public function ajaxMsg(){

        $page = I('post.page');
        
        $num = 6; 

        $start = ($page - 1)*$num; 

         $field ='m.id,m.title,m.intro,mr.status';  
          $where ="m.id = mr.msg_id and mr.user_id = {$this->user_id}" ; 
        
          $lists = $this->db->table('dk_msg m,dk_msg_record mr')->where($where)->field($field)->order('time DESC')->limit($start,$num)->select();

          foreach ($lists as $key => $val) {
               $lists[$key]['title'] = msubstr($val['title'],0,12,'utf-8',true);
               $lists[$key]['intro'] = msubstr($val['intro'],0,12,'utf-8',true);
          }
      
       echo json_encode($lists);
    }
    

}