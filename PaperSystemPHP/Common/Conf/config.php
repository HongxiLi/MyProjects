<?php

return array(
	//'配置项'=>'配置值'
    'URL_CASE_INSENSITIVE' => false,
    'DB_TYPE'   => 'mysql', // 数据库类型
    'DB_HOST'   => 'localhost', // 服务器地址
    'DB_NAME'   => 'docmgr', // 数据库名
    'DB_USER'   => 'root', // 用户名
    'DB_PWD'    => '', // 密码
    'DB_PORT'   => 3306, // 端口*
    'DB_PREFIX' => 'c_', // 数据库表前缀
    'TMPL_TEMPLATE_SUFFIX'=>'.php',
    //勿动
    'pwd_salt'  => 'd;lisdhhmj%^&8329djsdkjf09((*',
    'admin_menu'=>array(
        array(
            'menu_name'=>'基础菜单',
            'href'=>'javascript:;',
            'sub'=>array(
                array(
                    'menu_name'=>'学院/专业/班级',
                    'href'=>'/admin.php/CT/Index/'
                ),
                array(
                    'menu_name'=>'年级/学期数据',
                    'href'=>'/admin.php/CT/SY/'
                ),
                array(
                    'menu_name'=>'学生/教师/管理',
                    'href'=>'/admin.php/CT/USER/'
                )
            )
        ),
        array(
            'menu_name'=>'功能菜单',
            'href'=>'javascript:;',
            'sub'=>array(
                array(
                    'menu_name'=>'毕设分类/指导教室',
                    'href'=>"/admin.php/CT/MAIN"
                ),
                array(
                    'menu_name'=>'毕设题目/成绩数据',
                    'href'=>"/admin.php/CT/CR173"
                )
            )
        ),

        array(
            'menu_name'=>'系统菜单',
            'href'=>'javascript:;',
            'sub'=>array(
                array(
                    'menu_name'=>'系统设置',
                    'href'=>"/admin.php/Setting/Index"
                ),
                array(
                    'menu_name'=>'数据维护',
                    'href'=>"/admin.php/Database/Index"
                ),
                array(
                    'menu_name'=>'系统日志',
                    'href'=>"/admin.php/Log/Index"
                ),
                array(
                    'menu_name'=>'操作记录',
                    'href'=>"/admin.php/Log/My"
                )

            )
        ),
    ),
    'teacher_menu'=>array(
        array(
            'menu_name'=>'功能菜单',
            'href'=>'javascript:;',
            'sub'=>array(
                array(
                    'menu_name'=>'毕设题目',
                    'href'=>"/admin.php/CT/TM"
                ),
                array(
                    'menu_name'=>'成绩信息',
                    'href'=>"/admin.php/CT/SC"
                ),
                array(
                    'menu_name'=>'操作日志',
                    'href'=>"/admin.php/Log/My"
                )
            )
        ),

    ),
    'student_menu'=>array(

        array(
            'menu_name'=>'功能菜单',
            'href'=>'javascript:;',
            'sub'=>array(
                array(
                    'menu_name'=>'选题申请',
                    'href'=>"/admin.php/CourseControl/Collection"
                ),
                array(
                    'menu_name'=>'指导计划',
                    'href'=>"/admin.php/CourseControl/My"
                ),
                array(
                    'menu_name'=>'我的成绩',
                    'href'=>"/admin.php/CourseControl/MyScore"
                ),
                array(
                    'menu_name'=>'操作日志',
                    'href'=>"/admin.php/Log/My"
                )
            )
        ),	
    )
);