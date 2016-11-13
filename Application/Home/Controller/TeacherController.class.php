<?php
namespace Home\Controller;
use Think\Controller;
class TeacherController extends Controller {
    public function index()
    {
        if(session('group')==1){
            $Tquestion = M('question');
            $count = $Tquestion->count();
            $Page = new \Think\Page($count,20);
            $show = $Page->show();
            $questionList = $Tquestion->order('id desc')->limit($Page->firstRow.','.$Page->listRows)->select();
            $this->assign('qList',$questionList);
            $this->assign('page',$show);
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
    public function delquestion(){
        $Tquestion = M('question');
        $Toption = M('option');
        $id = I('post.id');
        $Qmap['id'] = array('in',$id);
        $Tquestion->where($Qmap)->delete();
        $Omap['qid'] = array('in',$id);
        $Toption->where($Omap)->delete();
    }
    public function editquestion(){
        $Tquestion = M('question');
        $Toption = M('option');
        $qid = I('get.id');
        $mapQ['id'] = $qid;
        $mapO['qid'] = $qid;
        $stem = $Tquestion->where($mapQ)->getField('stem');
        $this->assign('stem',$stem);
        $optionList = $Toption->where($mapO)->select();
        $this->assign('count',count($optionList));
        $this->assign('opList',$optionList);
        $this->display();
    }
    public function updatequestion(){
        $qid = I('post.qid');
        $stem = I('post.stem');
        $optionArr = I('post.optionArray');
        $ans = I('post.ans');
        $Tquestion = M('question');
        $Toption = M('option');
        $mapQ['id'] = $qid;
        $dataQ['stem'] = $stem;
        $Tquestion->where($mapQ)->save($dataQ);
        $mapO['qid'] = $qid;
        $Toption->where($mapO)->delete();
        $dataO['qid'] = $qid;
        foreach ($optionArr as $op) {
            $dataO['content'] = $op;
            if($op == $ans){$dataO['isans'] = 1;}else{$dataO['isans'] = 0;}
            $Toption->add($dataO);
        }
        $this->success('修改成功');
    }
    public function exam(){
        $Texam = M('exam');
        $examList = $Texam->order('id desc')->select();
        $this->assign('eList',$examList);
        $this->display();
    }
    public function addexam(){
        $this->display();
    }
    public function insertexam(){
        $name = I('post.name');
        $num = I('post.num');
        $Tquestion = M('question');
        $qcount = $Tquestion->count();
        if ($num > $qcount) {
            $this->error('试题数量超过题库总题量');
        }
        $Texam = M('exam');
        $dataE['name'] = $name;
        $dataE['num'] = $num;
        $Texam->add($dataE);
        $this->success('新增成功');
    }
    public function delexam(){
        $Texam = M('exam');
        $id = I('post.id');
        $Emap['id'] = array('in',$id);
        $Texam->where($Emap)->delete();
    }
    public function editexam(){
        $Texam = M('exam');
        $eid = I('get.id');
        $mapE['id'] = $eid;
        $name = $Texam->where($mapE)->getField('name');
        $num = $Texam->where($mapE)->getField('num');
        $this->assign('name',$name);
        $this->assign('num',$num);
        $this->display();
    }
    public function updateexam(){
        $Texam = M('exam');
        $id = I('post.id');
        $name = I('post.name');
        $num = I('post.num');
        $Tquestion = M('question');
        $qcount = $Tquestion->count();
        if ($num > $qcount) {
            $this->error('试题数量超过题库总题量');
        }
        $mapE['id'] = $id;
        $dataE['name'] = $name;
        $dataE['num'] = $num;
        $Texam->where($mapE)->save($dataE);
        $this->success('修改成功');
    }
















}