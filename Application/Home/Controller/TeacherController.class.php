<?php
namespace Home\Controller;
use Think\Controller;
class TeacherController extends Controller {
    public function index()
    {
        if(session('group')==1){
            $Tquestion = M('question');
            $questionList = $Tquestion->select();
            $this->assign('qList',$questionList);
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
    public function insertquestion(){
        $stem = I('post.stem');
        $optionArr = I('post.optionArray');
        $ans = I('post.ans');
        $Tquestion = M('question');
        $Toption = M('option');
        $dataQ['stem'] = $stem;
        $Tquestion->add($dataQ);
        $dataO['qid'] = $Tquestion->where($dataQ)->getField('id');
        foreach ($optionArr as $op) {
            $dataO['content'] = $op;
            if($op == $ans){$dataO['isans'] = 1;}else{$dataO['isans'] = 0;}
            $Toption->add($dataO);
        }
        $this->success('新增成功');
    }
}