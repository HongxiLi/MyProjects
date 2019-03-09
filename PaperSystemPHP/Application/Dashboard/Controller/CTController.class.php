<?php
namespace Dashboard\Controller;

use Think\Controller;

class CTController extends CommonController
{

    public function index()
    {
        /*学院*/
        $obj = M('College');
        $condition = array('status'=>1);
        $p_count = $obj->where($condition)->count();
        $Page       = new \Think\Page($p_count,10);// 实例化分页类 传入总记录数和每页显示的记录数(25)
        $show       = $Page->show();// 分页显示输出
        $list = $obj->where($condition)->order('created')->limit($Page->firstRow.','.$Page->listRows)->select();
        $this->page = $show;// 赋值分页输出
        $this->list = $list;
        /*学院*/

        /*专业*/
        $obj = M('Major');
        $condition = array('status'=>1);
        $p_count = $obj->where($condition)->count();
        $Page       = new \Think\Page($p_count,10);// 实例化分页类 传入总记录数和每页显示的记录数(25)
        $show       = $Page->show();// 分页显示输出
        $list = $obj->where($condition)->order('created')->limit($Page->firstRow.','.$Page->listRows)->select();
        $this->page2 = $show;// 赋值分页输出

        if(!empty($list))
        {
            foreach($list as $i=>$l)
            {
                $mb = M('College');
                $col = $mb->where(array('id'=>$l['college_id']))->select()[0];
                $list[$i]['col'] = $col['college_name'];
            }
        }
        $this->list2 = $list;
        /*专业*/

        /*班级*/
        $obj = M('Class');
        $condition = array('status'=>1);
        $p_count = $obj->where($condition)->count();
        $Page       = new \Think\Page($p_count,10);// 实例化分页类 传入总记录数和每页显示的记录数(25)
        $show       = $Page->show();// 分页显示输出
        $list = $obj->where($condition)->order('created')->limit($Page->firstRow.','.$Page->listRows)->select();
        $this->page3 = $show;// 赋值分页输出

        if(!empty($list))
        {
            foreach($list as $i=>$l)
            {
                $mb = M('College');
                $col = $mb->where(array('id'=>$l['college_id']))->select()[0];
                $list[$i]['col'] = $col['college_name'];

                $mb = M('Major');
                $col = $mb->where(array('id'=>$l['major_id']))->select()[0];
                $list[$i]['maj'] = $col['major_name'];
            }
        }
        $this->list3 = $list;
        /*班级*/



        $this->display();
    }


    public function SY()
    {
        /*YEAR年级*/
        $obj = M('Year');
        $condition = array('status'=>1);
        $p_count = $obj->where($condition)->count();
        $Page       = new \Think\Page($p_count,10);// 实例化分页类 传入总记录数和每页显示的记录数(25)
        $show       = $Page->show();// 分页显示输出
        $list = $obj->where($condition)->order('created')->limit($Page->firstRow.','.$Page->listRows)->select();
        $this->page = $show;// 赋值分页输出
        $this->list = $list;
        /*年级*/


        /*学期*/
        $obj = M('Semester');
        $condition = array('status'=>1);
        $p_count = $obj->where($condition)->count();
        $Page       = new \Think\Page($p_count,10);// 实例化分页类 传入总记录数和每页显示的记录数(25)
        $show       = $Page->show();// 分页显示输出
        $list = $obj->where($condition)->order('created')->limit($Page->firstRow.','.$Page->listRows)->select();
        $this->page2 = $show;// 赋值分页输出

        if(!empty($list))
        {
            foreach($list as $i=>$l)
            {
                if($l['sep_half'])
                {
                    $list[$i]['sep'] = '下学期';
                }else{
                    $list[$i]['sep'] = '上学期';
                }
            }
        }
        $this->list2 = $list;
        /*学期*/

        $this->display();
    }


    public function USER()
    {
        /*学生*/
        $obj = M('User');
        $condition = array('status'=>1,'type'=>1);
        $p_count = $obj->where($condition)->count();
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

        $this->list = $list;
        /*学生*/


        /*教师*/
        $obj = M('User');
        $condition = array('status'=>1,'type'=>2);
        $p_count = $obj->where($condition)->count();
        $Page       = new \Think\Page($p_count,10);// 实例化分页类 传入总记录数和每页显示的记录数(25)
        $show       = $Page->show();// 分页显示输出
        $list = $obj->where($condition)->order('created')->limit($Page->firstRow.','.$Page->listRows)->select();
        $this->page2 = $show;// 赋值分页输出
        if(!empty($list))
        {
            foreach($list as $i=>$l)
            {
                $mb = M('College');
                $col = $mb->where(array('id'=>$l['college']))->select()[0];
                $list[$i]['col'] = $col['college_name'];
            }
        }
        $this->list2 = $list;
        /*教师*/

        /*管理员*/
        $obj = M('User');
        $condition = array('status'=>1,'type'=>3);
        $p_count = $obj->where($condition)->count();
        $Page       = new \Think\Page($p_count,10);// 实例化分页类 传入总记录数和每页显示的记录数(25)
        $show       = $Page->show();// 分页显示输出
        $list = $obj->where($condition)->order('created')->limit($Page->firstRow.','.$Page->listRows)->select();
        $this->page3 = $show;// 赋值分页输出
        $this->list3 = $list;
        /*管理员*/


        $this->display();
    }


    public function MAIN()
    {
        /*毕设分类*/
        $obj = M('Category');
        $condition = array('status'=>1);
        $p_count = $obj->where($condition)->count();
        $Page       = new \Think\Page($p_count,10);// 实例化分页类 传入总记录数和每页显示的记录数(25)
        $show       = $Page->show();// 分页显示输出
        $list = $obj->where($condition)->order('id ASC')->limit($Page->firstRow.','.$Page->listRows)->select();
        $this->page = $show;// 赋值分页输出
        $this->list = $list;
        /*毕设分类*/


        /*指导教室*/
        $obj = M('Room');
        $condition = array('status'=>1);
        $p_count = $obj->where($condition)->count();
        $Page       = new \Think\Page($p_count,10);// 实例化分页类 传入总记录数和每页显示的记录数(25)
        $show       = $Page->show();// 分页显示输出
        $list = $obj->where($condition)->order('id ASC')->limit($Page->firstRow.','.$Page->listRows)->select();
        $this->page2 = $show;// 赋值分页输出
        $this->list2 = $list;
        /*指导教室*/


        $this->display();
    }


    public function CR173()
    {
        /*毕设课程*/
        $obj = M('Course');
        $condition = array('status'=>1);
        $p_count = $obj->where($condition)->count();
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
        $this->list = $list;
        /*毕设课程*/
        $this->display();
    }

    public function TM()
    {
        /*毕设题目*/
        $obj = M('Course');
        $condition = array('status'=>1,'teacher_id'=>session('admin_user')[0]['id']);
        $p_count = $obj->where($condition)->count();
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
        $this->list = $list;
        /*毕设题目*/
        $this->display();
    }


    public function SC()
    {

        $obj = M('Course');
        $condition = array('status'=>1,'teacher_id'=>session('admin_user')[0]['id']);
        $p_count = $obj->where($condition)->count();
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
        $this->list = $list;

        $this->display();
    }

}