<?php
namespace Dashboard\Controller;

use Think\Controller;

class ClassController extends CommonController
{

    public function index()
    {
        die('Access Deied.');
    }

    public function add()
    {
        $obj = M('Class');
        $this->data = $obj->where(array('status'=>1))->select();
        $obj = M('College');
        $this->list = $obj->where(array('status'=>1))->select();
        $this->display();
    }

    public function edit()
    {
        $obj = M('Class');
        $this->data = $obj->where(array('id' => I('get.id')))->select();

        $obj = M('College');
        $this->list = $obj->where(array('status'=>1))->select();

        $obj = M('Major');
        $this->list2 = $obj->where(array('status'=>1))->select();

        $this->display();
    }

    public function view()
    {
        $obj = M('Class');
        $this->data = $obj->where(array('id' => I('get.id')))->select();
        $this->display();
    }

    //添加
    public function addClass()
    {

		$major_name = I('post.class_name');
        $cid = I('post.college');
        $mid = I('post.major');
        $obj = M('Class');
		$data = $obj->where(array('status'=>1,'major_id'=>$mid,'college_id'=>$cid,'class_name'=>$major_name))->select();
		if($data)
		{
			redirect(U('Class/Add'),1,'该专业已经存在');
			die();
		}
		
        $obj->create();
		$obj->major_name = I('post.class_name');
        $obj->college_id = I('post.college');
        $obj->major_id = I('post.major');
        $obj->created = time();
        $obj->add();
        redirect(U('CT/Index'));

    }

    //更新
    public function updateClass()
    {
        $obj = M('Class');
        $data['class_name'] = I('post.class_name');
        $data['college_id'] = I('post.college');
        $data['major_id'] = I('post.major');
        $obj->where(array('id'=>I('post.id')))->save($data);
        redirect(U('CT/Index'));
    }

    public function delete()
    {
        $obj = M('Class');
        $obj->where('id=' . I('get.id'))->save(array('status' => 0));
        redirect(U('CT/Index'));
    }

    public function Collection()
    {
        $obj = M('Class');

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

                $mb = M('Major');
                $col = $mb->where(array('id'=>$l['major_id']))->select()[0];
                $list[$i]['maj'] = $col['major_name'];
            }
        }


        $this->list = $list;//$obj->where(array('status' => 1))->select();
        $this->display();
    }
}