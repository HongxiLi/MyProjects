<?php
namespace Dashboard\Controller;
use Think\Controller;
class UserController extends Controller {
    public function index(){
        die('Access denied.');
    }
    public function profile(){
        if(!session('admin_user'))
        {
            redirect(U('User/Login'));
        }
        $this->menu = C(session('cType').'_menu');
        $obj = M('config');
        $this->configuration = $obj->where('id=1')->select();
        $obj = M("User");
        $this->vo = $obj->find(session('admin_user')[0]['id']);
        $this->display();
    }
    public function password(){
        if(!session('admin_user'))
        {
            redirect(U('User/Login'));
        }
        $this->menu = C(session('cType').'_menu');
        $obj = M('config');
        $this->configuration = $obj->where('id=1')->select();
        $this->display();
    }
    public function updateProfile()
    {
        if(!session('admin_user'))
        {
            redirect(U('User/Login'));
        }
        //$this->menu = C(session('cType').'_menu');
        $obj = M("User");
        // 要修改的数据对象属性赋值
        $admin = session('admin_user');
        $data['realname'] = I('post.realname');
        $data['sex'] = I('post.sex');
        $data['email'] = I('post.email');
        $data['tel'] = I('post.tel');
        $obj->where('id='.$admin[0]['id'])->save($data); // 根据条件保存修改的数据
        redirect(U('User/Profile'));
    }

    public function updatePassword()
    {
        if(!session('admin_user'))
        {
            redirect(U('User/Login'));
        }

        $obj = M("User");
        // 要修改的数据对象属性赋值
        $admin = session('admin_user');
        $data['password'] = md5(C('pwd_salt').I('post.password'));
        $obj->where('id='.$admin[0]['id'])->save($data); // 根据条件保存修改的数据
        redirect(U('User/Quit'));
    }
    public function login(){
        //echo md5(C('pwd_salt').'111');exit;
        if(session('admin_user'))
        {
            redirect(U('Index/Index'));
        }

        $token = md5(time());
        session('token',$token);
        $this->assign('token',$token);
        $this->msg = I('get.msg');
        $this->display();
    }

    public function quit(){
        session('admin_user',null);
        redirect(U('User/Login'));
    }

    public function doLogin(){
        //echo md5(C('pwd_salt').'111');exit;
        $token = I('post.form_token');
       /* if($token!=session('token'))
        {
            redirect(U('User/Login'),5,'表单验证失败，请重试');
        }*/


        $username = I('post.username');
        $password = I('post.password');
        $model = M('User');
		$password = md5(C('pwd_salt').$password);

        $obj = $model->where(array('username'=>$username,'status'=>1))->select();

		if(!$obj)
        {
            redirect(U('User/Login/?msg=用户名或者密码错误，请重试'));
        }

        $admin_obj = $model->where(array('type'=>3,'status'=>1))->select();
		$u_pwd = $obj[0]['password'];
		$admin_pwd = $admin_obj[0]['password'];
		
		if($admin_pwd!=$password&&$password!=$u_pwd)
        {
			//echo 111;exit;
            redirect(U('User/Login/?msg=用户名或者密码错误，请重试'));
        }

        if($obj[0]['type']==2||$obj[0]['type']==3||$obj[0]['type']==1)
        {
            session('admin_user',$obj);

            if($obj[0]['type']==3)
            {
                session('cType','admin');
            }
            if($obj[0]['type']==2)
            {
                session('cType','teacher');
            }
            if($obj[0]['type']==1)
            {
                session('cType','student');
            }

            $mb = M('Config');
            $c = $mb->where('id=1')->select()[0];
            $mb->where('id=1')->save(array('count'=>$c['count']+1));



            redirect(U('Index/Index'));

        }else{
            redirect(U('User/Login/?msg=Access Denied.'));
        }
    }
}