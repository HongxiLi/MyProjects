<?php
namespace Dashboard\Controller;

use Think\Controller;

class CourseControlController extends CommonController
{

    public function index()
    {
        die('Access Deied.');
    }

    public function select()
    {
        $user_id = session('admin_user')[0]['id'];
        $course_id = I('get.id');
        $sm = M('Selection');
        $exist = $sm->where(array('course_id'=>$course_id,'student_id'=>$user_id))->select();
        $exist2 = $sm->where(array('student_id'=>$user_id))->select();
        if(!empty($exist))
        {
            redirect(U('CourseControl/Collection'),1,'您已经选择了该题目');
            die();
        }
        if(!empty($exist2))
        {
            redirect(U('CourseControl/Collection'),1,'您已经选择了题目，不能再继续选择');
            die();
        }

        $cm = M('Course');
        $course = $cm->where(array('id'=>$course_id))->select()[0];

        $sm->create();
        $sm->created = time();
        $sm->student_id = $user_id;
        $sm->gp = $course['semester'];
        $sm->course_id = $course_id;
        $sm->step = 2;
		$sm->week = $course['the_time1'];
		$sm->time = $course['the_time1'];
        $sm->add();
        redirect(U('CourseControl/My'),1,'申请成功');
    }
public function plane()
{

$user_id = session('admin_user')[0]['id'];
    $sm = M('Selection');
    $list1 = $sm->where(array('status'=>1,'step'=>1,'student_id'=>$user_id))->group('gp')->select();

    if(!empty($list1))
    {
        foreach($list1 as $j=>$m)
        {
            $list = $sm->where(array('status'=>1,'step'=>1,'student_id'=>$user_id,'gp'=>$m['gp']))->select();

            if(!empty($list))
            {
                foreach($list as $i=>$se)
                {

                    $cm = M('Course');
                    $l = $cm->where(array('id'=>$se['course_id']))->select()[0];
                    $list[$i] = $l;
                    $list[$i]['sele'] = $se;
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
            }

            $sem = M('Semester');
            $se4 = $sem->where(array('id'=>$m['gp']))->select()[0];
            $y = '';
            if($se4['sep_half']==0) $y='上学期';else $y='下学期';

            $list1[$j]['semester_field'] = $se4['year'].'-'.$y;
            $list1[$j]['SeleData'] = $list;
        }
    }

$this->list1 = $list1;
        $this->display();

    //var_dump($list1);
}
    public function my()
    {


		$w_md = M('Week');
		$week_list = $w_md->where(array('status'=>1))->select();

		$t_md = M('Time');
		$time_list = $t_md->where(array('status'=>1))->select();

		
		$treturn_data = array();
		$user_id = session('admin_user')[0]['id'];
        $sm = M('Selection');
		$cm = M('Course');

		$group_list = $sm->where(array('status'=>1))->group('gp')->select();
		if(!empty($group_list))
		{
			foreach($group_list as $g=>$gg)
			{

				

				$c_m = M('Semester');
				$se = $c_m->where(array('id'=>$gg['gp']))->select()[0];
				$x = '';
				if($se['sep_half']==0) $x='上学期';else $x='下学期';
				$gg['semester'] = $se['year'].'-'.$x;


				$return_data = array();
				foreach($week_list as $i=>$week)
				{					
					$co_list = array();
					foreach($time_list as $j=>$time)
					{
						$condition['status'] = 1;
						$condition['week'] = $week['id'];
						$condition['time'] = $time['id'];
						$condition['student_id'] = $user_id;
						$condition['gp'] = $gg['gp'];
						$sel_obj = $sm->where($condition)->select()[0];
						$course = $cm->where(array('id'=>$sel_obj['course_id']))->select()[0];
						if($sel_obj)
						{
							//echo 111;
							$r_m = M('Room');
							$course['room_field'] = $r_m->where(array('id'=>$course['room_id']))->select()[0]['room_name'];

							$u_m = m('User');
							$course['teacher']= $u_m->where(array('id'=>$course['teacher_id']))->select()[0]['username'];
						}

						//var_dump($course);
						$co_list[]=$course;
					}

					$return_data[] = array($week,$co_list);
				}
				$treturn_data[] = array($gg,$return_data);
			}
		}


//var_dump($treturn_data[0][1]);//exit;
		


        
        /*$list1 = $sm->where(array('status'=>1,'step'=>2,'student_id'=>$user_id))->group('gp')->select();

        if(!empty($list1))
        {
            foreach($list1 as $j=>$m)
            {
                $list = $sm->where(array('status'=>1,'step'=>2,'student_id'=>$user_id,'gp'=>$m['gp']))->select();

                if(!empty($list))
                {
                    foreach($list as $i=>$se)
                    {

                        
                        $l = $cm->where(array('id'=>$se['course_id']))->select()[0];
                        $list[$i] = $l;
                        $list[$i]['sele'] = $se;
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
                }

                $sem = M('Semester');
                $se4 = $sem->where(array('id'=>$m['gp']))->select()[0];
                $y = '';
                if($se4['sep_half']==0) $y='上学期';else $y='下学期';

                $list1[$j]['semester_field'] = $se4['year'].'-'.$y;
                $list1[$j]['SeleData'] = $list;
            }
        }*/

        $this->list1 = $treturn_data;
        $this->display();

        //var_dump($list1);
    }
	
	
	
	public function myScore()
	{


		$user_id = session('admin_user')[0]['id'];
        $sm = M('Selection');
		

	$list1 = $sm->where(array('status'=>1,'step'=>2,'student_id'=>$user_id))->group('gp')->select();

        if(!empty($list1))
        {
            foreach($list1 as $j=>$m)
            {
                $list = $sm->where(array('status'=>1,'step'=>2,'student_id'=>$user_id,'gp'=>$m['gp']))->select();

				$listfuck = array();
                if(!empty($list))
                {
                    foreach($list as $i=>$se)
                    {
$cm = M('Course');
                        
                        $l = $cm->where(array('id'=>$se['course_id']))->select()[0];
                        $listfuck[$i] = $l;
                        $listfuck[$i]['sele'] = $se;
						
						
						//获取成绩
						$model = M('Score');
						$score = $model->where(array('courseid'=>$se['course_id'],'userid'=>$user_id))->select()[0];
						if($score){
							$listfuck[$i]['score_plus'] = $score['score'];
						}else{
							$listfuck[$i]['score_plus'] = '没有上传成绩';
						}
						
                        //课程性质
                        $c_m = M('Category');
                        $listfuck[$i]['cate_field'] = $c_m->where(array('id'=>$l['category']))->select()[0]['category_name'];

                        //任课教师
                        $c_m = M('User');
                        $listfuck[$i]['teacher_field'] = $c_m->where(array('id'=>$l['teacher_id']))->select()[0]['username'];
                        //年级
                        $c_m = M('Year');
                        $listfuck[$i]['year_field'] = $c_m->where(array('id'=>$l['year']))->select()[0]['year'];

                        //学年 学期
                        $c_m = M('Semester');
                        $se = $c_m->where(array('id'=>$l['semester']))->select()[0];
                        $x = '';
                        if($se['sep_half']==0) $x='上学期';else $x='下学期';
                        $listfuck[$i]['semester_field'] = $se['year'].'-'.$x;

                        //上课时间 周
                        $c_m = M('Week');
                       $listfuck[$i]['week_field'] = $c_m->where(array('id'=>$l['the_time1']))->select()[0]['week_name'];

                        //上课时间 周
                        $c_m = M('Time');
                        $listfuck[$i]['time_field'] = $c_m->where(array('id'=>$l['the_time2']))->select()[0]['item_name'];

                        //上课教室
                        $c_m = M('Room');
                        $listfuck[$i]['room_field'] = $c_m->where(array('id'=>$l['room_id']))->select()[0]['room_name'];

                        //统计已选课人数
                        $cm=M('Selection');
                        $se_list = $cm->where(array('course_id'=>$l['id'],'status'=>1))->select();
                        $listfuck[$i]['selection'] = count($se_list);

                    }
                }

                $sem = M('Semester');
                $se4 = $sem->where(array('id'=>$m['gp']))->select()[0];
                $y = '';
                if($se4['sep_half']==0) $y='上学期';else $y='下学期';

                $list1[$j]['semester_field'] = $se4['year'].'-'.$y;
                $list1[$j]['SeleData'] = $listfuck;
            }
        }
		
	//	var_dump($list1[0]['SeleData']);
		 $this->list1 = $list1;
        $this->display();
		
	}

    public function delete()
    {
        $sm = M('Selection');
        $sm->where(array('id'=>I('get.id')))->delete();
        redirect(U('CourseControl/Plane'),1,'删除成功');
        die();
    }

    public function delete2()
    {
        $sm = M('Selection');
        $sm->where(array('id'=>I('get.id')))->delete();
        redirect(U('CourseControl/My'),1,'退课成功');
        die();
    }

    public function submit()
    {
        $sm = M('Selection');
        $data['step'] = 2;
        $sm->where(array('id'=>I('get.id')))->save($data);
        redirect(U('CourseControl/Plane'),1,'选课成功');
        die();
    }

    public function Collection()
    {
        $obj = M('Course');

        $condition = array('status'=>1);

        $category = I('post.category');
        $year = I('post.year');
        $semester = I('post.semester');
        $teacher = I('post.teacher_id');
        $room = I('post.room_id');
        $week = I('post.the_time1');
        $time = I('post.the_time2');
        if(!empty($category))
        {
            $condition['category'] = $category;
        }
        if(!empty($year))
        {
            $condition['year'] = $year;
        }
        if(!empty($semester))
        {
            $condition['semester'] = $semester;
        }
        if(!empty($teacher))
        {
            $condition['teacher_id'] = $teacher;
        }
        if(!empty($room))
        {
            $condition['room_id'] = $room;
        }
        if(!empty($week))
    {
        $condition['the_time1'] = $week;
    }
        if(!empty($time))
        {
            $condition['the_time2'] = $time;
        }



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

        $obj = M('Category');
        $this->list1 = $obj->where(array('status'=>1))->select();
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


    public function upload()
    {
        if($_POST)
        {
            if (!empty($_FILES['thumb']['name'])) {

                $upload = new \Think\Upload(); // 实例化上传类
                $upload->maxSize = 3145728; // 设置附件上传大小
                $upload->exts = array('doc', 'docx', 'xls', 'xlsx'); // 设置附件上传类型
                $dir = 'Uploads/system/';
                $upload->rootPath = './' . $dir; // 设置附件上传根目录
                $upload->savePath = ''; // 设置附件上传（子）目录
                // 上传文件
                $info = $upload->upload();
                if (!$info) { // 上传错误提示错误信息
                     $this->error($upload->getError());

                } else { // 上传成功
                    $file = $dir . $info['thumb']['savepath'] . $info['thumb']['savename'];
                    $sid = I('post.sid');
                   // echo $sid;exit;
                    $m = M('Selection');
                    $m->create();
                    $m->where(array('id'=>$sid))->save(array('doc'=>$file));
                }
            }

            redirect(U('CourseControl/MyScore'),1,'上传成功');
        }else{
            $this->sid = I('get.id');
            $this->display();
        }
    }


    public function upload2()
    {
        if($_POST)
        {
            if (!empty($_FILES['thumb']['name'])) {

                $upload = new \Think\Upload(); // 实例化上传类
                $upload->maxSize = 3145728; // 设置附件上传大小
                $upload->exts = array('doc', 'docx', 'xls', 'xlsx'); // 设置附件上传类型
                $dir = 'Uploads/system/';
                $upload->rootPath = './' . $dir; // 设置附件上传根目录
                $upload->savePath = ''; // 设置附件上传（子）目录
                // 上传文件
                $info = $upload->upload();
                if (!$info) { // 上传错误提示错误信息
                    $this->error($upload->getError());

                } else { // 上传成功
                    $file = $dir . $info['thumb']['savepath'] . $info['thumb']['savename'];
                    $sid = I('post.sid');
                    // echo $sid;exit;
                    $m = M('Selection');
                    $m->create();
                    $m->where(array('id'=>$sid))->save(array('doc'=>$file));
                }
            }

            redirect(U('CourseControl/MyScore'),1,'上传成功');
        }else{
            $this->sid = I('get.id');
            $this->display();
        }
    }
}