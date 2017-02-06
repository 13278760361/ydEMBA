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
class VoteController extends BaseController {

	 function _initialize(){
        parent::_initialize();
	 	    $this->db = M('Vote');
        $this->db_r =M('Vote_record');
        // $this->user_id= 229;
   
    }
	//投票
    public function index(){
          

           if ( empty($this->user_id) ) {  //检测是否绑定
               redirect( U('Public/login') );
            }

             
          $field ='v.id,v.title,v.intro,vr.status';  
          $where ="v.id = vr.vote_id and vr.user_id = {$this->user_id}" ; 
        
          $lists = $this->db->table('dk_vote v,dk_vote_record vr')->where($where)->field($field)->order('id,s_time DESC')->limit(0,10)->select();

          // foreach ($lists as $key => $val) {
          //     if ($val['id'] == 1) {
          //        $lists[$key]['title'] = "<font color='red'>{$val['title']}</font>";
          //     }
          // }

          // dump($lists);
          
          $this->assign('lists',$lists); 
          $this->display();
    }

    public function info(){
        $id = I('get.id');
        $status = I('get.status');

        $now_time = time(); //当前时间


        $info = $this->db->field('id,title,content,s_time,e_time')->where( array('id'=>$id) )->find();

        if (  $now_time < $info['e_time']  && $now_time > $info['s_time']  && $status == 0 ) { //是否显示投票按钮
            $info['is_show'] = 1; //显示
         }else{
            $info['is_show'] = 0; //不显示
         } 

        $info['s_time'] = date('Y-m-d H:i',$info['s_time']);
        $info['content'] = htmlspecialchars_decode( $info['content'] );
        $this->assign('info',$info);
        $this->display();
    }

    public function ajaxVote(){

        $page = I('post.page');
        
        $num = 10; 

        $start = ($page - 1)*$num; 

          $field ='v.id,v.title,v.intro,vr.status';  
          $where ="v.id = vr.vote_id and vr.user_id = {$this->user_id}" ; 
        
          $lists = $this->db->table('dk_vote v,dk_vote_record vr')->where($where)->field($field)->order('id,s_time DESC')->limit($start,$num)->select();

          foreach ($lists as $key => $val) {
               $lists[$key]['title'] = msubstr($val['title'],0,12,'utf-8',true);
               $lists[$key]['intro'] = msubstr($val['intro'],0,12,'utf-8',true);
          }
      
       echo json_encode($lists);
    }

    public function doVote(){ //投票
            $status = I('post.status');
            $id = I('post.id');
            
            $flag =$this->db_r->where( array('vote_id'=>$id,'user_id'=>$this->user_id) )->getField('status');
            //检测是否已经投过票
            // dump($flag);exit();
            if ( $flag == 1  || $flag == -1 ) {
                       $this->error('请勿重复投票');
            }

          
            $data['status']  = $status;
            $data['vote_time'] = time();
            $data['vote_date'] = date('Y-m-d');

            $res = $this->db_r ->where( array('vote_id'=>$id,'user_id'=>$this->user_id) )->save($data);
            
         
            if ($res !==false) {
                $this->success('投票成功',U('Vote/index'));
            }else{
                $this->error('投票失败');
            }
    }

    

}