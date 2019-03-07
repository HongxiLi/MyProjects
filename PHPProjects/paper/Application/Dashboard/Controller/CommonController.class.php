<?php
namespace Dashboard\Controller;
use Think\Controller;
class CommonController extends Controller {
    public function __construct(){
        parent::__construct();
        if(!session('admin_user'))
        {
            header('content-type:text/html;charset=utf8;');
            redirect(U('User/Login'));
        }
        $this->log(CONTROLLER_NAME.'Controller->'.ACTION_NAME.'()' ,session('admin_user')[0]['id']);
        $obj = M('config');
        $this->configuration = $obj->where('id=1')->select();
        $this->menu = C(session('cType').'_menu');
    }

    public  function log($msg,$user_id)
    {
        $obj = M('Log');
        //$obj->id = rand(9999,9999999999999);
       // $obj->create();
        $obj->event_name = $msg;
        $obj->c = CONTROLLER_NAME;
        $obj->m = ACTION_NAME;
        $obj->created = time();
        $obj->uid = $user_id;
        $obj->add();
    }
}