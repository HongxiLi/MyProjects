<?php
namespace Dashboard\Controller;

use Think\Controller;

class CollegeController extends CommonController
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
        $obj = M('College');
        $this->data = $obj->where(array('id' => I('get.id')))->select();
        $this->display();
    }

    public function view()
    {
        $obj = M('College');
        $this->data = $obj->where(array('id' => I('get.id')))->select();
        $this->display();
    }

    //添加
    public function addCollege()
    {

		$college_name = I('post.college_name');
        $obj = M('College');
		$data = $obj->where(array('status'=>1,'college_name'=>$college_name))->select();
		if($data)
		{
			redirect(U('College/Add'),1,'该学院已经存在');
			die();
		}
		
        $obj->create();
		$obj->college_name = I('post.college_name');
        $obj->created = time();
        $obj->add();
        redirect(U('CT/Index'));

    }

    //更新
    public function updateCollege()
    {
        $obj = M('College');
        $data['college_name'] = I('post.college_name');
        $obj->where(array('id'=>I('post.id')))->save($data);
        redirect(U('CT/Index'));
    }

    public function delete()
    {
        $obj = M('College');
        $obj->where('id=' . I('get.id'))->save(array('status' => 0));
        redirect(U('CT/Index'));
    }

    public function Collection()
    {
        $obj = M('College');

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