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
        $mapUA['examid'] = $examid;
        $mapUA['uid'] = $uid;
        $isWrite = $Tuserans->where($mapUA)->find();
        if($isWrite){
            return;
        }else{
            $mapE['id'] = $examid;
            $num = $Texam->where($mapE)->getField('num');
        }











    }
}