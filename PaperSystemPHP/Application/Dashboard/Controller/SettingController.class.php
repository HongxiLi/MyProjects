<?php
namespace Dashboard\Controller;

use Think\Controller;

class SettingController extends CommonController
{

    /*更新系统信息页面*/
    public function index()
    {
        $obj = M('config');
        $this->data = $obj->where('id=1')->select();
        $this->display();
    }

    /*更新系统信息*/
    public function updateSetting()
    {
        $obj = M("Config");
        // 要修改的数据对象属性赋值
        $data['logo'] = I('post.old_thumb');
        $data['title'] = I('post.title');
        $data['keywords'] = I('post.keywords');
        $data['description'] = I('post.description');
        $data['address'] = I('post.address');
        $data['url'] = I('post.url');
        $data['weixin'] = I('post.weixin');
        $data['tel'] = I('post.tel');
        $data['weibo'] = I('post.weibo');
        $data['fax'] = I('post.fax');
        $data['email'] = I('post.email');
        $data['icp'] = I('post.icp');
        $data['master'] = I('post.master');
        $data['copyright'] = I('post.copyright');
        $data['code'] = I('post.code');

        if (!empty($_FILES['thumb']['name'])) {
            $upload = new \Think\Upload(); // 实例化上传类
            $upload->maxSize = 3145728; // 设置附件上传大小
            $upload->exts = array('jpg', 'gif', 'png', 'jpeg'); // 设置附件上传类型
            $dir = 'Uploads/system/';
            $upload->rootPath = './' . $dir; // 设置附件上传根目录
            $upload->savePath = ''; // 设置附件上传（子）目录
            // 上传文件
            $info = $upload->upload();
            if (!$info) { // 上传错误提示错误信息
                // $this->error($upload->getError());
            } else { // 上传成功
                $data['logo'] = $dir . $info['thumb']['savepath'] . $info['thumb']['savename'];
            }
        }
        $obj->where('id=1')->save($data); // 根据条件保存修改的数据
        redirect(U('Setting/Index'));
    }
}