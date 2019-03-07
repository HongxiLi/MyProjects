<?php
namespace Dashboard\Controller;

use Think\Controller;
use Think\Crypt\Driver\Think;

class StudentController extends CommonController
{

    public function index()
    {
        die('Access Deied.');
    }

    public function add()
    {
        $obj = M('College');
        $this->data = $obj->where(array('status'=>1))->select();


//var_dump($this->data3);
        $obj = M('Year');
        $this->data2 = $obj->where(array('status'=>1))->select();

        $this->display();
    }

    public function edit()
    {
        $obj = M('User');
        $this->data = $obj->where(array('id' => I('get.id')))->select();

        $obj = M('College');
        $this->data1 = $obj->where(array('status'=>1))->select();

        $obj = M('Year');
        $this->data2 = $obj->where(array('status'=>1))->select();

        $obj = M('Major');
        $this->data3 = $obj->where(array('status'=>1))->select();

        $obj = M('Class');
        $this->data4 = $obj->where(array('status'=>1))->select();


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

    public function addStudent()
    {

		$username = I('post.username');
        $obj = M('User');
		$user = $obj->where(array('status'=>1,'username'=>$username))->select();
		if($user)
		{
			redirect(U('Student/Add'),1,'用户名已经存在');
			die();
		}
		
        $obj->create();
		$obj->username = I('post.username');
        //$obj->realname = I('post.realname');
        $obj->sex = I('post.sex');
        $obj->realname = I('post.realname');
        $obj->year = I('post.year');
        $obj->class = I('post.class');
        $obj->college = I('post.college');
        $obj->major = I('post.major');
        $obj->created = time();
        $obj->password = md5(C('pwd_salt').I('post.password'));
        $obj->type =1;
        $obj->add();
        redirect(U('CT/USER'));

    }


    public function import()
    {
        $this->display();
    }

    public function importExcel()
    {
        $this->display();
    }


    public function ImportStudentExcel()
    {
        if (!empty($_FILES)) {
            $upload = new \Think\Upload(); // 实例化上传类
            $upload->maxSize = 3145728; // 设置附件上传大小
            $upload->exts = array('xls', 'xlsx'); // 设置附件上传类型
            $dir = 'Uploads/excel/';
            $upload->rootPath = './' . $dir; // 设置附件上传根目录
            $upload->savePath = ''; // 设置附件上传（子）目录
            // 上传文件
            $info = $upload->upload();
            if (!$info) { // 上传错误提示错误信息
                 $this->error($upload->getError());
            } else { // 上传成功
                $extension = $info['file']['ext'];
                $file_name = $dir.$info['file']['savepath'] . $info['file']['savename'];

                Vendor('PHPExcel.PHPExcel');
                // 判断使用哪种格式
                if( $extension =='xlsx' )
                {
                    $objReader = new \PHPExcel_Reader_Excel2007();
                }
                else
                {
                    $objReader = new \PHPExcel_Reader_Excel5();
                }

                $objPHPExcel = $objReader->load($file_name, $encode = 'utf-8');
                $sheet = $objPHPExcel->getSheet(0);
                // 取得总行数
                $highestRow = $sheet->getHighestRow();
                // 取得总列数
                $highestColumn = $sheet->getHighestColumn();
                //循环读取excel文件,读取一条,插入一条
                $data = array();
                //从第一行开始读取数据
                for ($j = 1; $j <= $highestRow; $j++) {
                    $userarr = array();
                    //从A列读取数据
                    for ($k = 'A'; $k <= $highestColumn; $k++) {
                        // 读取单元格
                        $userarr[] =  $objPHPExcel->getActiveSheet()->getCell("$k$j")->getValue();
                    }

                    $m = M('User');
                    $m->create();
                    $m->created = time();
                    $m->username = $userarr[0];
                    $m->password = md5(C('pwd_salt').$userarr[1]);
                    $m->realname = $userarr[2];
                    $m->sex = $userarr[3];

                    $m->add();
                }


            }

        }


        redirect(U('CT/USER'),1,'导入成功~');
    }

    public function importStudent()
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
            redirect(U('Student/Import'),1,'请选择文件');
            die();
        }
    }

    public function updateStudent()
    {
        $obj = M('User');
        $obj->create();
        $obj->sex = I('post.sex');
        $obj->realname = I('post.realname');
        $obj->year = I('post.year');
        $obj->class = I('post.class');
        $obj->college = I('post.college');
        $obj->major = I('post.major');

        $obj->type =1;
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

    public function Collection()
    {
        $obj = M('User');

        $condition = array('status'=>1,'type'=>1);

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
                $mb = M('Year');
                $col = $mb->where(array('id'=>$l['year']))->select()[0];
                $list[$i]['yr'] = $col['year'];
            }
        }

        $this->list = $list;//$obj->where(array('status' => 1))->select();
        $this->display();
    }
}