<?php
namespace Home\Controller;
use Think\Controller;
class StudentController extends Controller {
    public function index()
    {
        if(session('group')==2){
            $Texam = M('exam');
            $this->display();
        }else{
            $this->redirect('Index/index');
        }
    }
    public function logout(){
        session('[destroy]');
        $this->redirect('Index/index');
    }
}