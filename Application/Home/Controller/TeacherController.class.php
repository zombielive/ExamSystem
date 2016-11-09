<?php
namespace Home\Controller;
use Think\Controller;
class TeacherController extends Controller {
    public function index()
    {
        if(session('group')==1){
            $this->display();
        }else{
            $this->redirect('Index/index');
        }
    }
    public function logout(){
        session('[destroy]');
        $this->redirect('Index/index');
    }
    public function addquestion(){
        $this->display();
    }
}