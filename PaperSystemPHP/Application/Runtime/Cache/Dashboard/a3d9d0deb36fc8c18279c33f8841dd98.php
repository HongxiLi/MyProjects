<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html class="no-js">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>控制面板-<?php echo ($configuration[0]["title"]); ?></title>
    <meta name="description" content="<?php echo ($configuration[0]["title"]); ?>">
    <meta name="keywords" content="<?php echo ($configuration[0]["title"]); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta name="renderer" content="webkit">
    <meta http-equiv="Cache-Control" content="no-siteapp" />
    <link rel="icon" type="image/png" href="http://127.0.0.1:9005//Public/1011/assets/i/favicon.png">
    <link rel="stylesheet" href="http://127.0.0.1:9005//Public/1011/assets/css/amazeui.min.css"/>
    <link rel="stylesheet" href="http://127.0.0.1:9005//Public/1011/assets/css/admin.css">

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
        <strong>控制面板</strong> <small><?php echo ($configuration[0]["title"]); ?></small>
    </div>

    <button class="am-topbar-btn am-topbar-toggle am-btn am-btn-sm am-btn-success am-show-sm-only" data-am-collapse="{target: '#topbar-collapse'}"><span class="am-sr-only">导航切换</span> <span class="am-icon-bars"></span></button>

    <div class="am-collapse am-topbar-collapse" id="topbar-collapse">

        <ul class="am-nav am-nav-pills am-topbar-nav am-topbar-right admin-header-list">
            <li><a href="<?php echo U('Message/Recevied');?>"><span class="am-icon-envelope-o"></span> 收件箱 <span class="am-badge am-badge-warning"></span></a></li>
            <li class="am-dropdown" data-am-dropdown>
                <a class="am-dropdown-toggle" data-am-dropdown-toggle href="javascript:;">
                    <span class="am-icon-users"></span> <?php echo ($_SESSION['admin_user'][0]['username']); ?> <span class="am-icon-caret-down"></span>
                </a>
                <ul class="am-dropdown-content">
                    <li><a href="<?php echo U('User/Profile');?>"><span class="am-icon-user"></span> 用户资料</a></li>
                    <li><a href="<?php echo U('User/Password');?>"><span class="am-icon-cog"></span> 密码设置</a></li>
                    <li><a href="<?php echo U('User/Quit');?>"><span class="am-icon-power-off"></span> 安全退出</a></li>
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
            <li><a href="<?php echo U('Index/Index');?>"><span class="am-icon-home"></span> 首页</a></li>

            <?php
 if(!empty($menu)) { foreach($menu as $i=>$m) { ?>

                    <li class="admin-parent">
                        <a class="am-cf" data-am-collapse="{target: '#collapse-nav<?php echo $i;?>'}">
                            <span class="am-icon-th"></span> <?php echo $m['menu_name'];?>
                            <span class="am-icon-angle-right am-fr am-margin-right"></span>
                        </a>
                        <?php
 if(!empty($m['sub'])) { ?>
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
 }} ?>

            <li class="admin-parent">
                <a class="am-cf" data-am-collapse="{target: '#collapse-navBOX'}">
                    <span class="am-icon-th"></span> 站内信
                    <span class="am-icon-angle-right am-fr am-margin-right"></span>
                </a>
                <ul class="am-list am-collapse admin-sidebar-sub am-in " id="collapse-navBOX">

                    <li><a href="<?php echo U('Message/Send');?>" class="am-cf">
                            <span class="am-icon-file"></span>
                            写信息
                            <span class="am-icon-point am-fr am-margin-right admin-icon-yellow">
                </span>
                        </a>


                    </li>
                    <li><a href="<?php echo U('Message/Sended');?>" class="am-cf">
                            <span class="am-icon-file"></span>
                            发件箱
                            <span class="am-icon-point am-fr am-margin-right admin-icon-yellow">
                </span>
                        </a>
                    </li>

                    <li><a href="<?php echo U('Message/Recevied');?>" class="am-cf">
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

                    <li><a href="<?php echo U('Notice/Index');?>" class="am-cf">
                            <span class="am-icon-file"></span>
                            公告
                            <span class="am-icon-point am-fr am-margin-right admin-icon-yellow">
                </span>
                        </a>
                    </li>
                    <li><a href="<?php echo U('Board/Index');?>" class="am-cf">
                            <span class="am-icon-file"></span>
                            留言板
                            <span class="am-icon-point am-fr am-margin-right admin-icon-yellow">
                </span>
                        </a>
                    </li>

                </ul>
            </li>

            <li><a href="<?php echo U('User/Quit');?>"><span class="am-icon-sign-out"></span> 注销</a></li>
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

  <!-- content start -->
  <div class="admin-content">

    <div class="am-cf am-padding">
      <div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">首页</strong> / <small>系统日志</small></div>
    </div>

    <div class="am-g" style="padding: 10px;border: 1px solid #ddd;margin-left: 15px;margin-right: 15px;">
      <div class="am-u-sm-12">
        <div class="am-cf " style="padding-bottom: 10px;">
          <div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">系统日志</strong> / <small>我的操作记录</small></div>
        </div>
        <div class="am-g">
          <div class="am-u-md-6 am-cf">
            <div class="am-fl am-cf">
              <div class="am-btn-toolbar am-fl">
                <div class="am-btn-group am-btn-group-xs">
                  <button onclick=javascript:window.location.href="<?php echo U('Index/Index');?>"; type="button" class="am-btn am-btn-default"><span class="am-icon-bug"></span> 返回</button>
                </div>


              </div>
            </div>
          </div>

        </div>
        <div class="am-g">
          <div class="am-u-sm-12">


              <form  data-validate="parsley" method="post" novalidate="" class="am-form" id="form" action="<?php echo U('Year/AddYear');?>">

                <table cellpadding="0" cellspacing="0" border="0" class="am-table am-table-striped am-table-hover table-main" id="tableData">
                  <thead>
                  <tr>
                    <th>编号</th>
                    <th>事件名称</th>
                    <th>用户</th>
                    <th class="">Controller</th>
                    <th>Method</th>
                    <th class="hidden-xs">时间</th>
                    <th class="center">操作</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr class="gradeX">
                      <td><?php echo ($vo["id"]); ?></td>
                      <td class="hidden-xs">
                        <a href="javascript:;" target="_blank">
                          <?php echo ($vo["event_name"]); ?>
                        </a>
                      </td>
                      <td class="hidden-xs">
                        <a href="javascript:;" target="_blank">
                          <?php echo ($vo["user"]); ?>
                        </a>
                      </td>
                      <td class="hidden-xs">
                        <a href="javascript:;" target="_blank">
                          <?php echo ($vo["c"]); ?>
                        </a>
                      </td>
                      <td class="hidden-xs">
                        <a href="javascript:;" target="_blank">
                          <?php echo ($vo["m"]); ?>
                        </a>
                      </td>

                      <td class="hidden-xs">
                        <?php echo (date("Y-m-d H:i",$vo["created"])); ?></td>
                      <td class="center">
                        <a class="deleteBtn" href="<?php echo U('Log/Delete?id='.$vo['id'].'');?>">
                          <i class="am-icon-trash-o"></i>
                        </a>
                      </td>
                    </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                  </tbody>
                </table>

                <div class="pagination">
                  <?php echo $page;?>
                </div>




              </form>

              <hr>
          </div>

        </div>
      </div>
    </div>


  </div>
  <!-- content end -->

</div>

<footer>
    <hr>
    <p class="am-padding-left">© 2016 <?php echo ($configuration[0]["title"]); ?> - <?php echo ($configuration[0]["copyright"]); ?>.</p>
</footer>

<!--[if lt IE 9]>
<script src="http://libs.baidu.com/jquery/1.11.1/jquery.min.js"></script>
<script src="http://cdn.staticfile.org/modernizr/2.8.3/modernizr.js"></script>
<script src="http://127.0.0.1:9005//Public/1011/assets/js/polyfill/rem.min.js"></script>
<script src="http://127.0.0.1:9005//Public/1011/assets/js/polyfill/respond.min.js"></script>
<script src="http://127.0.0.1:9005//Public/1011/assets/js/amazeui.legacy.js"></script>
<![endif]-->

<!--[if (gte IE 9)|!(IE)]><!-->
<script src="http://127.0.0.1:9005//Public/1011/assets/js/jquery.min.js"></script>
<script src="http://127.0.0.1:9005//Public/1011/assets/js/amazeui.min.js"></script>
<!--<![endif]-->
<script src="http://127.0.0.1:9005//Public/1011/assets/js/app.js"></script>


<script>

    $(document).ready(function(){


        $("#cancelBtn").click(function(){
            window.location.href = "<?php echo U('Index/Index');?>";
        });

       

        $("a.deleteBtn").click(function(){
            return confirm("确定要删除此条目吗?");
        });
        $("img").each(function(){
            var src = $(this).attr("src");
           // console.log(src);
            if(src==""||src=="/")
            {
                $(this).attr("src","http://127.0.0.1:9005//Public/public/images/no.jpg");
                //$(this);
            }
        });
    } );
</script>
<script>
    $("#collapse").click(function(){
        $(".left-nav").slideToggle();
    });
</script>

</body>
</html>