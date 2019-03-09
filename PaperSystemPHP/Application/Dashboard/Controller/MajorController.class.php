<?php
namespace Dashboard\Controller;

use Think\Controller;

class MajorController extends CommonController
{

    public function index()
    {
        die('Access Deied.');
    }

    public function add()
    {
        $obj = M('College');
        $this->data = $obj->where(array('status'=>1))->select();
        $this->display();
    }

    public function edit()
    {
        $obj = M('Major');
        $this->data = $obj->where(array('id' => I('get.id')))->select();

        $obj = M('College');
        $this->list = $obj->where(array('status'=>1))->select();

        $this->display();
    }

    public function view()
    {
        $obj = M('Major');
        $this->data = $obj->where(array('id' => I('get.id')))->select();
        $this->display();
    }

    //添加
    public function addMajor()
    {

		$major_name = I('post.major_name');
        $cid = I('post.college');
        $obj = M('Major');
		$data = $obj->where(array('status'=>1,'college_id'=>$cid,'major_name'=>$major_name))->select();
		if($data)
		{
			redirect(U('Major/Add'),1,'该专业已经存在');
			die();
		}
		
        $obj->create();
		$obj->major_name = I('post.major_name');
        $obj->college_id = I('post.college');
        $obj->created = time();
        $obj->add();
        redirect(U('CT/Index'));

    }

    //更新
    public function updateMajor()
    {
        $obj = M('Major');
        $data['major_name'] = I('post.major_name');
        $data['college_id'] = I('post.college');
        $obj->where(array('id'=>I('post.id')))->save($data);
        redirect(U('CT/Index'));
    }

    public function delete()
    {
        $obj = M('Major');
        $obj->where('id=' . I('get.id'))->save(array('status' => 0));
        redirect(U('CT/Index'));
    }

    public function Collection()
    {
        $obj = M('Major');

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
                $mb = M('College');
                $col = $mb->where(array('id'=>$l['college_id']))->select()[0];
                $list[$i]['col'] = $col['college_name'];
            }
        }


        $this->list = $list;//$obj->where(array('status' => 1))->select();
        $this->display();
    }
}