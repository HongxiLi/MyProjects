<?php
namespace Dashboard\Controller;

use Think\Controller;

class RoomController extends CommonController
{

    public function index()
    {
        die('Access Deied.');
    }

    public function delete()
    {
        $obj = M('Room');
        $obj->where('id=' . I('get.id'))->save(array('status' => 0));
        redirect(U('CT/MAIN'));
    }

    public function add()
    {
        $obj = M('Room');
        $this->list = $obj->where(array('status'=>1))->select();
        $this->display();
    }

    public function edit()
    {
        $obj = M('Room');
        $tour = $obj->where(array('id' => I('get.id')))->select()[0];
        $this->data = $tour;

        $obj = M('Room');
        $this->list = $obj->where(array('status'=>1))->select();
        $this->display();
    }

    public function addRoom()
    {


            $obj = M('Room');
            $obj->create();
            $obj->created = time();
            $obj->add();
            redirect(U('CT/MAIN'));


    }

    public function updateRoom()
    {
        $obj = M('Room');
        $data['room_name'] = I('post.title');
        $obj->where(array('id' => I('post.id')))->save($data);
        redirect(U('CT/MAIN'));
    }



    public function Collection()
    {
        $obj = M('Room');
        $condition = array('status'=>1);

        $p_count = $obj->where($condition)->count();

        //$User = M('User'); // 实例化User对象
        //$count      = $User->where('status=1')->count();// 查询满足要求的总记录数
        $Page       = new \Think\Page($p_count,10);// 实例化分页类 传入总记录数和每页显示的记录数(25)
        $show       = $Page->show();// 分页显示输出
        $list = $obj->where($condition)->order('id ASC')->limit($Page->firstRow.','.$Page->listRows)->select();
        $this->page = $show;// 赋值分页输出
        $this->list = $list;
        $this->display();
    }
}