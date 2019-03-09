<?php
namespace Dashboard\Controller;

use Think\Controller;

class YearController extends CommonController
{

    public function index()
    {
        die('Access Deied.');
    }

    public function add()
    {
               $this->display();
    }

    public function edit()
    {
        $obj = M('Year');
        $this->data = $obj->where(array('id' => I('get.id')))->select();
        $this->display();
    }

    public function view()
    {
        $obj = M('Major');
        $this->data = $obj->where(array('id' => I('get.id')))->select();
        $this->display();
    }

    //添加
    public function addYear()
    {

		$yname = I('post.yname');
        $obj = M('Year');
		$data = $obj->where(array('status'=>1,'year'=>$yname))->select();
		if($data)
		{
			redirect(U('Year/Add'),1,'该年级已经存在');
			die();
		}
		
        $obj->create();
		$obj->year = I('post.yname');
        $obj->created = time();
        $obj->add();
        redirect(U('CT/SY'));

    }

    //更新
    public function updateYear()
    {
        $obj = M('Year');
        $data['year'] = I('post.yname');
        $obj->where(array('id'=>I('post.id')))->save($data);
        redirect(U('CT/SY'));
    }

    public function delete()
    {
        $obj = M('Year');
        $obj->where('id=' . I('get.id'))->save(array('status' => 0));
        redirect(U('CT/SY'));
    }

    public function Collection()
    {
        $obj = M('Year');

        $condition = array('status'=>1);

        $p_count = $obj->where($condition)->count();


        //$User = M('User'); // 实例化User对象
        //$count      = $User->where('status=1')->count();// 查询满足要求的总记录数
        $Page       = new \Think\Page($p_count,10);// 实例化分页类 传入总记录数和每页显示的记录数(25)
        $show       = $Page->show();// 分页显示输出
        $list = $obj->where($condition)->order('created')->limit($Page->firstRow.','.$Page->listRows)->select();
        $this->page = $show;// 赋值分页输出


        $this->list = $list;//$obj->where(array('status' => 1))->select();
        $this->display();
    }
}