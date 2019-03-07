<?php
namespace Dashboard\Controller;

use Think\Controller;

class LogController extends CommonController
{

    public function index()
    {
        $obj = M('Log');

        $condition = array('status'=>1);

        $p_count = $obj->where($condition)->count();


        //$User = M('User'); // 实例化User对象
        //$count      = $User->where('status=1')->count();// 查询满足要求的总记录数
        $Page       = new \Think\Page($p_count,10);// 实例化分页类 传入总记录数和每页显示的记录数(25)
        $show       = $Page->show();// 分页显示输出
        $list = $obj->where($condition)->order('created')->limit($Page->firstRow.','.$Page->listRows)->select();
        $this->page = $show;// 赋值分页输出

        if(!empty($list))
        {
            foreach($list as $i=>$l)
            {
                $m = M('User');
                $list[$i]['user'] = $m->where('id='.$l['uid'])->select()[0]['username'];
            }
        }
        $this->data = $list;//$obj->where(array('status' => 1))->select();
        $this->display();
    }

    public function my()
    {
        $obj = M('Log');

        $condition = array('status'=>1,'uid'=>session('admin_user')[0]['id']);

        $p_count = $obj->where($condition)->count();


        //$User = M('User'); // 实例化User对象
        //$count      = $User->where('status=1')->count();// 查询满足要求的总记录数
        $Page       = new \Think\Page($p_count,10);// 实例化分页类 传入总记录数和每页显示的记录数(25)
        $show       = $Page->show();// 分页显示输出
        $list = $obj->where($condition)->order('created')->limit($Page->firstRow.','.$Page->listRows)->select();
        $this->page = $show;// 赋值分页输出

        if(!empty($list))
        {
            foreach($list as $i=>$l)
            {
                $m = M('User');
                $list[$i]['user'] = $m->where('id='.$l['uid'])->select()[0]['username'];
            }
        }
        $this->data = $list;//$obj->where(array('status' => 1))->select();
        $this->display();
    }

    public function delete()
    {
        $obj = M('Log');
        $obj->where('id=' . I('get.id'))->save(array('status' => 0));
        echo '<script>';
        echo 'window.history.back(-1);';
        echo '</script>';
    }
}