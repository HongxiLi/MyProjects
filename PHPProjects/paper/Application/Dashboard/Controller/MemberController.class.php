<?php
namespace Dashboard\Controller;

use Think\Controller;

class MemberController extends CommonController
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
        $obj = M('User');
        $this->data = $obj->where(array('id' => I('get.id')))->select();
        $this->display();
    }

    public function view()
    {
        $obj = M('User');
        $this->data = $obj->where(array('id' => I('get.id')))->select();
        $this->display();
    }

    public function addMember()
    {

		$username = I('post.username');
        $obj = M('User');
		$user = $obj->where(array('status'=>1,'username'=>$username))->select();
		if($user)
		{
			redirect(U('Member/Add'),1,'用户名已经存在');
			die();
		}
		
        $obj->create();
		$obj->username = I('post.username');
        $obj->created = time();
        $obj->password = md5(C('pwd_salt').I('post.password'));
        $obj->type = 3;
        $obj->add();
        redirect(U('CT/USER'));

    }

    public function updateMember()
    {
        $obj = M('User');
        $data['password'] = md5(C('pwd_salt').I('post.password'));
        $obj->where(array('id'=>I('post.id')))->save($data);
        redirect(U('CT/USER'));
    }

    public function delete()
    {
        $obj = M('User');
        $obj->where('id=' . I('get.id'))->save(array('status' => 0));
        redirect(U('CT/USER'));
    }

    public function Collection()
    {
        $obj = M('User');

        $condition = array('status'=>1,'type'=>3);

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