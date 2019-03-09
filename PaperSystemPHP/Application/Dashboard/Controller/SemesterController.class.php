<?php
namespace Dashboard\Controller;

use Think\Controller;

class SemesterController extends CommonController
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
        $obj = M('Semester');
        $this->data = $obj->where(array('id' => I('get.id')))->select();
        $this->display();
    }

    public function view()
    {
        $obj = M('Semester');
        $this->data = $obj->where(array('id' => I('get.id')))->select();
        $this->display();
    }

    //添加
    public function addSemester()
    {

		$yname = I('post.yname');
        $sep = I('post.sep_half');
        $obj = M('Semester');
		$data = $obj->where(array('status'=>1,'sep_half'=>$sep,'year'=>$yname))->select();
		if($data)
		{
			redirect(U('Semester/Add'),1,'该学期已经存在');
			die();
		}
		
        $obj->create();
		$obj->year = I('post.yname');
        $obj->sep_half = I('post.sep_half');
        $obj->created = time();
        $obj->add();
        redirect(U('CT/SY'));

    }

    //更新
    public function updateSemester()
    {
        $obj = M('Semester');
        $data['year'] = I('post.yname');
        $data['sep_half'] = I('post.sep_half');
        $obj->where(array('id'=>I('post.id')))->save($data);
        redirect(U('CT/SY'));
    }

    public function delete()
    {
        $obj = M('Semester');
        $obj->where('id=' . I('get.id'))->save(array('status' => 0));
        redirect(U('CT/SY'));
    }

    public function Collection()
    {
        $obj = M('Semester');

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
              if($l['sep_half'])
              {
                $list[$i]['sep'] = '下学期';
              }else{
                  $list[$i]['sep'] = '上学期';
              }
            }
        }
        $this->list = $list;//$obj->where(array('status' => 1))->select();
        $this->display();
    }
}