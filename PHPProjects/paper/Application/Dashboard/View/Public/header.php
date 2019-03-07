<!doctype html>
<html class="no-js">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>控制面板-{$configuration[0].title}</title>
    <meta name="description" content="{$configuration[0].title}">
    <meta name="keywords" content="{$configuration[0].title}">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta name="renderer" content="webkit">
    <meta http-equiv="Cache-Control" content="no-siteapp" />
    <link rel="icon" type="image/png" href="__PUBLIC__/1011/assets/i/favicon.png">
    <link rel="stylesheet" href="__PUBLIC__/1011/assets/css/amazeui.min.css"/>
    <link rel="stylesheet" href="__PUBLIC__/1011/assets/css/admin.css">

    <style>
        .pagination{padding: 7px 10px;}
        .num{padding: 8px 10px;}
    </style>

</head>
<body>
<!--[if lte IE 9]>
<p class="browsehappy">你正在使用<strong>过时</strong>的浏览器，Amaze UI 暂不支持。 请 <a href="http://browsehappy.com/" target="_blank">升级浏览器</a>
    以获得更好的体验！</p>
<![endif]-->

<header class="am-topbar admin-header">
    <div class="am-topbar-brand">
        <strong>控制面板</strong> <small>{$configuration[0].title}</small>
    </div>

    <button class="am-topbar-btn am-topbar-toggle am-btn am-btn-sm am-btn-success am-show-sm-only" data-am-collapse="{target: '#topbar-collapse'}"><span class="am-sr-only">导航切换</span> <span class="am-icon-bars"></span></button>

    <div class="am-collapse am-topbar-collapse" id="topbar-collapse">

        <ul class="am-nav am-nav-pills am-topbar-nav am-topbar-right admin-header-list">
            <li><a href="{:U('Message/Recevied')}"><span class="am-icon-envelope-o"></span> 收件箱 <span class="am-badge am-badge-warning"></span></a></li>
            <li class="am-dropdown" data-am-dropdown>
                <a class="am-dropdown-toggle" data-am-dropdown-toggle href="javascript:;">
                    <span class="am-icon-users"></span> {$_SESSION['admin_user'][0]['username']} <span class="am-icon-caret-down"></span>
                </a>
                <ul class="am-dropdown-content">
                    <li><a href="{:U('User/Profile')}"><span class="am-icon-user"></span> 用户资料</a></li>
                    <li><a href="{:U('User/Password')}"><span class="am-icon-cog"></span> 密码设置</a></li>
                    <li><a href="{:U('User/Quit')}"><span class="am-icon-power-off"></span> 安全退出</a></li>
                </ul>
            </li>
            <li><a href="javascript:;" id="admin-fullscreen"><span class="am-icon-arrows-alt"></span> <span class="admin-fullText">开启全屏</span></a></li>
        </ul>
    </div>
</header>

<div class="am-cf admin-main">
    <!-- sidebar start -->
    <div class="admin-sidebar">
        <ul class="am-list admin-sidebar-list">
            <li><a href="{:U('Index/Index')}"><span class="am-icon-home"></span> 首页</a></li>

            <?php
            if(!empty($menu))
            {
                foreach($menu as $i=>$m) {
                    ?>

                    <li class="admin-parent">
                        <a class="am-cf" data-am-collapse="{target: '#collapse-nav<?php echo $i;?>'}">
                            <span class="am-icon-th"></span> <?php echo $m['menu_name'];?>
                            <span class="am-icon-angle-right am-fr am-margin-right"></span>
                        </a>
                        <?php
                        if(!empty($m['sub']))
                        {
                            ?>
                            <ul class="am-list am-collapse admin-sidebar-sub am-in " id="collapse-nav<?php echo $i;?>">
                                <?php foreach($m['sub'] as $j=>$me){ ?>

                                    <li><a href="<?php echo $me['href'];?>" class="am-cf">
                                            <span class="am-icon-file"></span> <?php echo $me['menu_name'];?>
                                            <span class="am-icon-point am-fr am-margin-right admin-icon-yellow">

                </span>
                                        </a>
                                    </li>


                                <?php }?>
                            </ul>

                        <?php }?>
                    </li>


                    <?php
                }}
            ?>

            <li class="admin-parent">
                <a class="am-cf" data-am-collapse="{target: '#collapse-navBOX'}">
                    <span class="am-icon-th"></span> 站内信
                    <span class="am-icon-angle-right am-fr am-margin-right"></span>
                </a>
                <ul class="am-list am-collapse admin-sidebar-sub am-in " id="collapse-navBOX">

                    <li><a href="{:U('Message/Send')}" class="am-cf">
                            <span class="am-icon-file"></span>
                            写信息
                            <span class="am-icon-point am-fr am-margin-right admin-icon-yellow">
                </span>
                        </a>


                    </li>
                    <li><a href="{:U('Message/Sended')}" class="am-cf">
                            <span class="am-icon-file"></span>
                            发件箱
                            <span class="am-icon-point am-fr am-margin-right admin-icon-yellow">
                </span>
                        </a>
                    </li>

                    <li><a href="{:U('Message/Recevied')}" class="am-cf">
                            <span class="am-icon-file"></span>
                            收件箱
                            <span class="am-icon-point am-fr am-margin-right admin-icon-yellow">
                </span>
                        </a>
                    </li>

                </ul>
            </li>


            <li class="admin-parent">
                <a class="am-cf" data-am-collapse="{target: '#collapse-navBOX2'}">
                    <span class="am-icon-th"></span> 公告/留言板
                    <span class="am-icon-angle-right am-fr am-margin-right"></span>
                </a>
                <ul class="am-list am-collapse admin-sidebar-sub am-in " id="collapse-navBOX2">

                    <li><a href="{:U('Notice/Index')}" class="am-cf">
                            <span class="am-icon-file"></span>
                            公告
                            <span class="am-icon-point am-fr am-margin-right admin-icon-yellow">
                </span>
                        </a>
                    </li>
                    <li><a href="{:U('Board/Index')}" class="am-cf">
                            <span class="am-icon-file"></span>
                            留言板
                            <span class="am-icon-point am-fr am-margin-right admin-icon-yellow">
                </span>
                        </a>
                    </li>

                </ul>
            </li>

            <li><a href="{:U('User/Quit')}"><span class="am-icon-sign-out"></span> 注销</a></li>
        </ul>

<!--        <div class="am-panel am-panel-default admin-sidebar-panel">-->
<!--            <div class="am-panel-bd">-->
<!--                <p><span class="am-icon-bookmark"></span> 公告</p>-->
<!--                <p>时光静好，与君语；细水流年，与君同。—— </p>-->
<!--            </div>-->
<!--        </div>-->

        <div class="am-panel am-panel-default admin-sidebar-panel">
            <div class="am-panel-bd">
                <p><span class="am-icon-tag"></span> Tips</p>
                <p>欢迎您使用本系统!</p>
            </div>
        </div>
    </div>
    <!-- sidebar end -->