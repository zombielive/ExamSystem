<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index()
    {
    	if(session('group')==1){
    		$this->redirect('Teacher/index');
    	}else if(session('group')==2){
    		$this->redirect('Student/index');
    	}else{
    		$this->display();
    	}
    }
    public function login()
    {
    	$map['name'] = I('post.name');
    	$map['password'] = I('post.psw');
    	$map['group'] = I('post.group');
    	$login = M('user')->where($map)->getField('id');
    	if($login){
    		session('name',I('post.name'));
    		session('group',I('post.group'));
            session('id',$login);
    		$back['status'] = 1;
    		$back['group'] = I('post.group');
    		$this->ajaxReturn($back);
    	}else{
    		$back['status'] = 0;
    		$back['msg'] = '用户名或密码错误';
    		$this->ajaxReturn($back);
    	}
    }
}