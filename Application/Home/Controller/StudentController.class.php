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
        $uaList = $Tuserans->where($mapUA)->select();
        $this->assign('uaList',$uaList);
        $ans = $userans[0]['ans'];
        $this->assign('ans',$ans);
        $qid = $userans[0]['qid'];
        $mapQ['id'] = $qid;
        $stem = $Tquestion->where($mapQ)->getField('stem');
        $mapO['qid'] = $qid;
        $optionList = $Toption->where($mapO)->select();
        $this->assign('stem',$stem);
        $this->assign('optionList',$optionList);
        $this->display();
    }















}