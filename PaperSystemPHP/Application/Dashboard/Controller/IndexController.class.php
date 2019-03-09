<?php
namespace Dashboard\Controller;
use Think\Controller;
class IndexController extends CommonController {

    public function index(){

    	$m = M('Course');
        $clist = $m->where(array('status'=>1))->select();

        $m = M('User');
        $ulist = $m->where(array('status'=>1))->select();

        $m = M('Selection');
        $slist = $m->where(array('status'=>1))->select();

        $this->clist = count($clist);
        $this->ulist = count($ulist);
        $this->slist = count($slist);
        $this->display();
    }
}