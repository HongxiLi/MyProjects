<?php
namespace Dashboard\Controller;

use Think\Controller;

class TeacherController extends CommonController
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
        $obj = M('User');
        $this->data = $obj->where(array('id' => I('get.id')))->select();

        $obj = M('College');
        $this->data1 = $obj->where(array('status'=>1))->select();

        $this->display();
    }

    public function password()
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

    public function addTeacher()
    {

		$username = I('post.username');
        $obj = M('User');
		$user = $obj->where(array('status'=>1,'username'=>$username))->select();
		if($user)
		{
			redirect(U('Teacher/Add'),1,'用户名已经存在');
			die();
		}
		
        $obj->create();
		$obj->username = I('post.username');
        //$obj->realname = I('post.realname');
        $obj->sex = I('post.sex');
        $obj->realname = I('post.realname');
        $obj->college = I('post.college');
        $obj->zc = I('post.zc');
        $obj->created = time();
        $obj->password = md5(C('pwd_salt').I('post.password'));
        $obj->type =2;
        $obj->add();
        redirect(U('TCT/USER'));

    }

    public function updateTeacher()
    {
        $obj = M('User');
        $obj->create();
        $obj->sex = I('post.sex');
        $obj->realname = I('post.realname');
        $obj->college = I('post.college');
        $obj->zc = I('post.zc');

        $obj->type =2;
        $obj->where('id='.I('post.id'))->save();
        redirect(U('CT/USER'));

    }

    public function updatePassword()
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
    public function import()
    {
        $this->display();
    }

    public function importTeacher()
    {
        if (!empty($_FILES['file']['name'])) {
            $upload = new \Think\Upload(); // 实例化上传类
            $upload->maxSize = 3145728; // 设置附件上传大小
            $upload->exts = array('jpg', 'gif', 'png', 'sql'); // 设置附件上传类型
            $dir = 'Uploads/system/';
            $upload->rootPath = './' . $dir; // 设置附件上传根目录
            $upload->savePath = ''; // 设置附件上传（子）目录
            // 上传文件
            $info = $upload->upload();
            if (!$info) { // 上传错误提示错误信息
                $this->error($upload->getError());
            } else { // 上传成功
                $file = './'. $dir . $info['file']['savepath'] . $info['file']['savename'];
                $content = file_get_contents($file);

                $exp_arr = explode(';',$content);
                //var_dump($exp_arr);
                $m = M('User');
                foreach($exp_arr as $i=>$e)
                {

                    if($i!=(count($exp_arr)-1))
                    {
                        $m->execute($e);
                    }
                }
                redirect(U('CT/USER'),1,'导入成功');
            }
        }else{
            redirect(U('Teacher/Import'),1,'请选择文件');
            die();
        }
    }

    public function Collection()
    {
        $obj = M('User');

        $condition = array('status'=>1,'type'=>2);

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
                $col = $mb->where(array('id'=>$l['college']))->select()[0];
                $list[$i]['col'] = $col['college_name'];
            }
        }

        $this->list = $list;//$obj->where(array('status' => 1))->select();
        $this->display();
    }
}