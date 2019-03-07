<?php
namespace Dashboard\Controller;

use Think\Controller;

class CourseController extends CommonController
{

    public function index()
    {
        die('Access Deied.');
    }

    public function add()
    {
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
    public function addCourse()
    {

		$course_name = I('post.course_name');
        $the_time1 = I('post.the_time1');
        $the_time2 = I('post.the_time2');
        $room_id = I('post.room_id');

        $obj = M('Course');
		$data = $obj->where(array('status'=>1,'course_name'=>$course_name))->select();
		if($data)
		{
			redirect(U('Course/Add'),1,'该题目已经存在');
			die();
		}

        $exist = $obj->where(array('room_id'=>$room_id,'the_time1'=>$the_time1,'the_time2'=>$the_time2))->select();
        if($exist)
        {
            redirect(U('Course/Add'),1,'时间/教室冲突');
            die();
        }

        $obj->create();
        $obj->created = time();
        $obj->user_id = session('admin_user')[0]['id'];
        $obj->start = I('post.start');
        $obj->ehd = I('post.end');
        $obj->add();
        redirect(U('CT/TM'));

    }

    //更新
    public function updateCourse()
    {
        $obj = M('Course');
        $obj->create();
        $obj->where(array('id'=>I('post.id')))->save();
        echo '<script>';
        echo 'window.history.back(-1);';
        echo '</script>';
        die();
       // redirect(U('Course/Collection'));
    }

    public function delete()
    {
        $obj = M('Course');
        $obj->where('id=' . I('get.id'))->save(array('status' => 0));
        echo '<script>';
        echo 'window.history.back(-1);';
        echo '</script>';
        die();
        //redirect(U('Course/Collection'));
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

    public function CollectionAll()
    {
        $obj = M('Course');

        $condition = array('status'=>1);

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