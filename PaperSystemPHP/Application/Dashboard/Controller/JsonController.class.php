<?php
namespace Dashboard\Controller;
use Think\Controller;
class JsonController extends CommonController {

    public function major(){
        $obj = M('Major');
        $list = $obj->where(array('status'=>1,'college_id'=>I('get.id')))->select();
       // var_dump($list);
        $html = '<option value="">==Please Select==</option>';
        $html = '';
        foreach($list as $l)
        {
            $html .='<option value="'.$l['id'].'">'.$l['major_name'].'</option>';
        }
        echo $html;
       // $this->ajaxReturn($html,'List Data',1);
    }

    public function myClass(){
        $obj = M('Class');
        $list = $obj->where(array('status'=>1,'major_id'=>I('get.mid'),'college_id'=>I('get.cid')))->select();
        // var_dump($list);
        $html = '<option value="">==Please Select==</option>';
        foreach($list as $l)
        {
            $html .='<option value="'.$l['id'].'">'.$l['class_name'].'</option>';
        }
        echo $html;
        // $this->ajaxReturn($html,'List Data',1);
    }
}