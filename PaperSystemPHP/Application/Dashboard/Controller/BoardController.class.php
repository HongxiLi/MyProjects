<?php
namespace Dashboard\Controller;

use Think\Controller;

class BoardController extends CommonController
{

    public function index()
    {


        $obj = M('Board');
        $list = $obj->where(array('status'=>1))->select();

        if(!empty($list))
        {
            foreach ($list as $i=>$l)
            {
                $m = M('User');
                $to = $m->where(array('id'=>$l['userid']))->select()[0];
                $list[$i]['user'] = $to;
            }
        }
        $this->list = $list;
        $this->display();
    }

    public function add()
    {
        $this->display();
    }

    public function view()
    {
        $condition['status'] = 1;
        $condition['id'] = I('get.id');
        $obj = M('Message');
        $m = $obj->where($condition)->select()[0];

        $um = M('User');
        $m['from'] = $um->where(array('id'=>$m['from']))->select()[0];
        $m['to'] = $um->where(array('id'=>$m['to']))->select()[0];

        $uid = session('admin_user')[0]['id'];
if($uid==$m['to']['id'])
{
    $mm = M('Message');
    $mm->where(array('id'=>$m['id']))->save(array('readed'=>1));
}

        $this->vo = $m;
        $this->display();
    }

    public function addMsg()
    {


        $from = session('admin_user')[0]['id'];


        $obj = M('Board');
        $obj->create();
        $obj->userid = $from;
        $obj->title = I('post.title');
        $obj->content = I('post.content');
        $obj->created = time();
            $obj->add();


        redirect(U('Board/Index'),1,'留言发布成功');
    }



    public function Recevied()
    {
        $to = session('admin_user')[0]['id'];
        $obj = M('Message');
        $list = $obj->where(array('status'=>1,'to'=>$to))->select();
        if(!empty($list))
        {
            foreach ($list as $i=>$l)
            {
                $m = M('User');
                $to = $m->where(array('id'=>$l['from']))->select()[0];
                $list[$i]['from'] = $to;
            }
        }

        $this->list = $list;
        $this->display();
    }

    public function sended()
    {
        $from = session('admin_user')[0]['id'];
        $obj = M('Message');
        $list = $obj->where(array('status'=>1,'from'=>$from))->select();
        if(!empty($list))
        {
            foreach ($list as $i=>$l)
            {
                $m = M('User');
                $to = $m->where(array('id'=>$l['to']))->select()[0];
                $list[$i]['to'] = $to;
            }
        }

        $this->list = $list;
        $this->display();
    }
}