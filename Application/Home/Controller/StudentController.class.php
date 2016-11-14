<?php
namespace Home\Controller;
use Think\Controller;
class StudentController extends Controller {
    public function index()
    {
        if(session('group')==2){
            $Texam = M('exam');
            $Tuserexam = M('userexam');
            $examList = $Texam->select();
            $uid = session('id');
            $mapUE['uid'] = $uid;
            foreach ($examList as $key => $exam) {
                $mapUE['examid'] = $exam['id'];
                $thisexam = $Tuserexam ->where($mapUE)->find();
                if($thisexam){
                    $examList[$key]['isdone'] = 1;
                    $examList[$key]['score'] = $thisexam['score'];
                }else{
                    $examList[$key]['isdone'] = 0;
                }
            }
            $this->assign('examList',$examList);
            $this->display();
        }else{
            $this->redirect('Index/index');
        }
    }
    public function logout(){
        session('[destroy]');
        $this->redirect('Index/index');
    }
    public function createPaper(){
        $examid = I('post.examid');
        $uid = session('id');
        $Tuserans = M('userans');
        $Texam = M('exam');
        $Tquestion = M('question');
        $mapUA['examid'] = $examid;
        $mapUA['uid'] = $uid;
        $isWrite = $Tuserans->where($mapUA)->find();
        if($isWrite){
            return;
        }else{
            $mapE['id'] = $examid;
            $num = $Texam->where($mapE)->getField('num');
            $qidArr = $Tquestion->field('id')->select();
            $max = count($qidArr) - 1;
            $randIdArr = unique_rand(0,$max,$num);
            $dataUA['uid'] = $uid;
            $dataUA['examid'] = $examid;
            foreach ($randIdArr as $key => $randId) {
                $dataUA['qid'] = $qidArr[$randId]['id'];
                $Tuserans->add($dataUA);
            }
            $this->success('生成试卷成功');
        }
    }
    public function answering(){
        $examid = I('get.examid');
        $uid = session('id');
        if(!I('get.p')){
            $p = 1;
        }else{
            $p = I('get.p');
        }
        $Tuserans = M('userans');
        $Tquestion = M('question');
        $Toption = M('option');
        $mapUA['uid'] = $uid;
        $mapUA['examid'] = $examid;
        $userans = $Tuserans->where($mapUA)->page($p.',1')->select();
        $count = $Tuserans->where($mapUA)->count();
        for ($i=1 ; $i <= $count; $i++) {
            if($i == $p){
                $page .= '<li class="active"><span>'.$i.'</span></li>';
            }else{
                $page .= '<li><span>'.$i.'</span></li>';
            }
        }
        $this->assign('page',$page);
        $UAid = $userans[0]['id'];
        $this->assign('UAid',$UAid);
        $qid = $userans[0]['qid'];
        $mapQ['id'] = $qid;
        $stem = $Tquestion->where($mapQ)->getField('stem');
        $mapO['qid'] = $qid;
        $optionList = $Toption->where($mapO)->select();
        $optionBag['ans'] = $userans[0]['ans'];
        $optionBag['data'] = $optionList;
        $this->assign('stem',$stem);
        $this->assign('optionBag',$optionBag);

        if($p == $count){
            $subview = '<button class="btn btn-primary" id="subPaper">交卷</button>';
            $this->assign('subview',$subview);
        }
        $this->display();
    }
    public function write(){ 
        $ans = I('post.ans');
        if($ans){
            $UAid = I('post.UAid');
            $mapUA['id'] = $UAid;
            $Toption = M('option');
            $Tuserans = M('userans');
            $dataUA['ans'] = $ans;
            $mapO['id'] = $ans;
            $isans = $Toption->where($mapO)->getField('isans');
            $dataUA['isright'] = $isans;
            $Tuserans->where($mapUA)->save($dataUA);
        }
    }
    public function subpaper(){
        $examid = I('post.examid');
        $uid = session('id');
        $Tuserans = M('userans');
        $mapUA['uid'] = $uid;
        $mapUA['examid'] = $examid;
        $countNum = $Tuserans->where($mapUA)->count();
        $mapUA['isright'] = 1;
        $rightNum = $Tuserans->where($mapUA)->count();
        $score = round($rightNum/$countNum*100,2);
        $dataUE['uid'] = $uid;
        $dataUE['examid'] = $examid;
        $dataUE['score'] = $score;
        $subcheck = M('userexam')->add($dataUE);
        if ($subcheck) {
            $this->success('你的成绩是：'.$score);
        }

    }
    public function checking(){
        $examid = I('get.examid');
        $uid = session('id');
        if(!I('get.p')){
            $p = 1;
        }else{
            $p = I('get.p');
        }
        $Tuserans = M('userans');
        $Tquestion = M('question');
        $Toption = M('option');
        $mapUA['uid'] = $uid;
        $mapUA['examid'] = $examid;
        $userans = $Tuserans->where($mapUA)->page($p.',1')->select();
        $count = $Tuserans->where($mapUA)->count();
        for ($i=1 ; $i <= $count; $i++) {
            if($i == $p){
                $page .= '<li class="active"><span>'.$i.'</span></li>';
            }else{
                $page .= '<li><span>'.$i.'</span></li>';
            }
        }
        $this->assign('page',$page);
        $UAid = $userans[0]['id'];
        $this->assign('UAid',$UAid);
        $qid = $userans[0]['qid'];
        $mapQ['id'] = $qid;
        $stem = $Tquestion->where($mapQ)->getField('stem');
        $mapO['qid'] = $qid;
        $optionList = $Toption->where($mapO)->select();
        $optionBag['ans'] = $userans[0]['ans'];
        $optionBag['data'] = $optionList;
        $this->assign('stem',$stem);
        $this->assign('optionBag',$optionBag);
        $this->display();
    }















}