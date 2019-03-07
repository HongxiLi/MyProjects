<?php
namespace Dashboard\Controller;

use Think\Controller;

class ScoreController extends CommonController
{

    public function index()
    {
        die('Access Deied.');
    }


    public function download()
    {
        $course_id = I('get.id');
        $sm = M('Selection');
        $list = $sm->where(array('course_id'=>$course_id))->select();

        vendor("PHPExcel.PHPExcel");       
        $objPHPExcel = new \PHPExcel();
         $objPHPExcel->setActiveSheetIndex(0)->setCellValue('A1','学号'); 
         $objPHPExcel->setActiveSheetIndex(0)->setCellValue('B1','姓名'); 
         $objPHPExcel->setActiveSheetIndex(0)->setCellValue('C1','课程'); 
         $objPHPExcel->setActiveSheetIndex(0)->setCellValue('D1','课程编号'); 
         $objPHPExcel->setActiveSheetIndex(0)->setCellValue('E1','分数'); 

        if(empty($list))
        {
            redirect(U('Score/Add'),1,'没有学生选择该课程');
            die();
        }


        if(!empty($list))
        {
            foreach($list as $i=>$l)
            {
                $um = M('User');
                $user = $um->where(array('id'=>$l['student_id']))->select()[0];

                 $conj = M('Course');
                $course = $conj->where(array('id'=>$l['course_id']))->select()[0];


                $objPHPExcel->setActiveSheetIndex(0)->setCellValue('A'.($i+2),$user['id']); 
                $objPHPExcel->setActiveSheetIndex(0)->setCellValue('B'.($i+2),$user['username']); 
                $objPHPExcel->setActiveSheetIndex(0)->setCellValue('C'.($i+2),$course['course_name']); 
                $objPHPExcel->setActiveSheetIndex(0)->setCellValue('D'.($i+2),$course['id']); 
                $objPHPExcel->setActiveSheetIndex(0)->setCellValue('E'.($i+2),''); 
            }
        }



        header('pragma:public');
        header('Content-type:application/vnd.ms-excel;charset=utf-8;name="ImportTmpl.xls"');
        header("Content-Disposition:attachment;filename=ImportTmpl.xls");//attachment新窗口打印inline本窗口打印
        $objWriter = \PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');  
        $objWriter->save('php://output'); 
        exit;   
        //$this->list = $list;
    }


    public function add()
    {
        //课程信息
        $obj = M('Course');
        $condition = array('status'=>1,'teacher_id'=>session('admin_user')[0]['id']);
        $list = $obj->where($condition)->order('created')->select();
        $this->list = $list;

        $this->display();
    }

    public function edit()
    {
        $obj = M('Course');
        $this->data = $obj->where(array('id' => I('get.id')))->select()[0];
        $obj = M('Category');
        $this->list = $obj->where(array('status'=>1))->select();
        $obj = M('User');
        $this->list2 = $obj->where(array('status'=>1,'type'=>2))->select();
        $obj = M('Year');
        $this->list3 = $obj->where(array('status'=>1))->select();
        $obj = M('Semester');
        $this->list4 = $obj->where(array('status'=>1))->select();
        $obj = M('Week');
        $this->list5 = $obj->where(array('status'=>1))->select();
        $obj = M('Time');
        $this->list6 = $obj->where(array('status'=>1))->select();
        $obj = M('Room');
        $this->list7 = $obj->where(array('status'=>1))->select();
        $this->display();
    }

    public function view()
    {
        $obj = M('Course');
        $this->data = $obj->where(array('id' => I('get.id')))->select();
        $this->display();
    }

    //添加
    public function addScore()
    {
		$course_id = I('post.course');

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
                for ($j = 2; $j <= $highestRow; $j++) {
                    $userarr = array();
                    //从A列读取数据
                    for ($k = 'A'; $k <= $highestColumn; $k++) {
                        // 读取单元格
                        $userarr[] =  $objPHPExcel->getActiveSheet()->getCell("$k$j")->getValue();
                    }


                    $CM = M('Score');
                    $Cmlist = $CM->where(array('userid'=>$userarr[0],'courseid'=>$userarr[3]))->select();
                    if(empty($Cmlist)){
                        $m = M('Score');
                        $m->create();
                        $m->created = time();
                        $m->userid = $userarr[0];
                        $m->courseid = $userarr[3];
                        $m->score = $userarr[4];                  

                        $m->add();
                 }
                }


            }

        }

        redirect(U('Score/ScoreList').'/?id='.$course_id,1,'导入成功');

    }


    public function scoreList()
    {
        $m = M('Score');    
        $list = $m->where(array('courseid'=>I('get.id')))->select();
        if(!empty($list))
        {

            foreach ($list as $key => $value) {
                $oshit = M('Course');
                $course = $oshit->where('id='.$value['courseid'])->select()[0];  

                $ouser = M('User');                 
                 $user = $ouser->where('id='.$value['userid'])->select()[0];

                $mm = M('Selection');
                $list[$key]['sele'] = $mm->where(array('student_id'=>$user['id'],'course_id'=>$course['id']))->select()[0];


                 $list[$key]['user'] = $user;
                 $list[$key]['course'] = $course;
            }      
            $this->list = $list;
            $this->display();       

        }else{
            echo '<script>';
            echo 'alert("NO DATA");';
            echo 'window.history.back(-1);';
            echo '</script>';
            die();
           // redirect(U('Score/Add'),1,'没有成绩数据');
        }

    }
    public function updateScore()
    {
        $m = M('Score');
        $m->where(array('id'=>I('post.id')))->save(array('score'=>I('post.score')));
        $sc = $m->where(array('id'=>I('post.id')))->select()[0];
        redirect(U('Score/ScoreList').'/?id='.$sc['courseid'],1,'成绩修改成功');
    }


    public function export()
    {
        $couse_id = I('get.id');
        $m = M('Score');    
        $list = $m->where(array('courseid'=>I('get.id')))->select();
        if(!empty($list))
        {


vendor("PHPExcel.PHPExcel");       
        $objPHPExcel = new \PHPExcel();
         $objPHPExcel->setActiveSheetIndex(0)->setCellValue('A1','学号'); 
         $objPHPExcel->setActiveSheetIndex(0)->setCellValue('B1','姓名'); 
         $objPHPExcel->setActiveSheetIndex(0)->setCellValue('C1','课程'); 
         $objPHPExcel->setActiveSheetIndex(0)->setCellValue('D1','课程编号'); 
         $objPHPExcel->setActiveSheetIndex(0)->setCellValue('E1','分数'); 

            foreach ($list as $key => $value) {
                $oshit = M('Course');
                $course = $oshit->where('id='.$value['courseid'])->select()[0];  

                $ouser = M('User');                 
                 $user = $ouser->where('id='.$value['userid'])->select()[0];  

               //  $list[$key]['user'] = $user;
               //  $list[$key]['course'] = $course;

 $objPHPExcel->setActiveSheetIndex(0)->setCellValue('A'.($key+2),$user['id']); 
                $objPHPExcel->setActiveSheetIndex(0)->setCellValue('B'.($key+2),$user['username']); 
                $objPHPExcel->setActiveSheetIndex(0)->setCellValue('C'.($key+2),$course['course_name']); 
                $objPHPExcel->setActiveSheetIndex(0)->setCellValue('D'.($key+2),$course['id']); 
                $objPHPExcel->setActiveSheetIndex(0)->setCellValue('E'.($key+2),$value['score']); 

            }      
 header('pragma:public');
        header('Content-type:application/vnd.ms-excel;charset=utf-8;name="成绩数据.xls"');
        header("Content-Disposition:attachment;filename=成绩数据.xls");//attachment新窗口打印inline本窗口打印
        $objWriter = \PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');  
        $objWriter->save('php://output'); 
        exit;   

        }else{
            redirect(U('Score/Add'),1,'没有成绩数据');
        }
    }

    public function ScoreEdit()
    {
        $m= M('Score');
        $sc = $m->where(array('id'=>I('get.id')))->select()[0];
        $this->sc = $sc;
        $this->display();
    }

    //更新
    public function updateCourse()
    {
        $obj = M('Course');
        $obj->create();
        $obj->where(array('id'=>I('post.id')))->save();
        redirect(U('Course/Collection'));
    }

    public function delete()
    {
        $obj = M('Course');
        $obj->where('id=' . I('get.id'))->save(array('status' => 0));
        redirect(U('Course/Collection'));
    }

    public function Selected()
    {
        $sm = M('Selection');
        $list = $sm->where(array('course_id'=>I('get.id')))->select();
        if(!empty($list))
        {
            foreach($list as $i=>$l)
            {
                $um = M('User');
                $list[$i]['stu'] = $um->where(array('id'=>$l['student_id']))->select()[0];
            }
        }
        $this->list = $list;
        $this->display();
    }

    public function Collection()
    {
        $obj = M('Course');

        $condition = array('status'=>1,'teacher_id'=>session('admin_user')[0]['id']);

        $p_count = $obj->where($condition)->count();


        //$User = M('User'); // 实例化User对象
        //$count      = $User->where('status=1')->count();// 查询满足要求的总记录数
        $Page       = new \Think\Page($p_count,10);// 实例化分页类 传入总记录数和每页显示的记录数(25)
        $show       = $Page->show();// 分页显示输出
        $list = $obj->where($condition)->order('created')->limit($Page->firstRow.','.$Page->listRows)->select();
        $this->page = $show;// 赋值分页输出

        foreach($list as $i=>$l)
        {
            //课程性质
            $c_m = M('Category');
            $list[$i]['cate_field'] = $c_m->where(array('id'=>$l['category']))->select()[0]['category_name'];

            //任课教师
            $c_m = M('User');
            $list[$i]['teacher_field'] = $c_m->where(array('id'=>$l['teacher_id']))->select()[0]['username'];
            //年级
            $c_m = M('Year');
            $list[$i]['year_field'] = $c_m->where(array('id'=>$l['year']))->select()[0]['year'];

            //学年 学期
            $c_m = M('Semester');
            $se = $c_m->where(array('id'=>$l['semester']))->select()[0];
            $x = '';
            if($se['sep_half']==0) $x='上学期';else $x='下学期';
            $list[$i]['semester_field'] = $se['year'].'-'.$x;

            //上课时间 周
            $c_m = M('Week');
            $list[$i]['week_field'] = $c_m->where(array('id'=>$l['the_time1']))->select()[0]['week_name'];

            //上课时间 周
            $c_m = M('Time');
            $list[$i]['time_field'] = $c_m->where(array('id'=>$l['the_time2']))->select()[0]['item_name'];

            //上课教室
            $c_m = M('Room');
            $list[$i]['room_field'] = $c_m->where(array('id'=>$l['room_id']))->select()[0]['room_name'];

            //统计已选课人数
            $cm=M('Selection');
            $se_list = $cm->where(array('course_id'=>$l['id'],'status'=>1))->select();
            $list[$i]['selection'] = count($se_list);
        }
        $this->list = $list;//$obj->where(array('status' => 1))->select();
        $this->display();
    }
}