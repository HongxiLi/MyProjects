<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <title><?php echo ($configuration[0]["title"]); ?>-后台管理中心</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="http://127.0.0.1:9058//Public/admin/css/bootstrap.css" rel="stylesheet" media="screen">
    <link href="http://127.0.0.1:9058//Public/admin/css/thin-admin.css" rel="stylesheet" media="screen">
    <link href="http://127.0.0.1:9058//Public/admin/css/font-awesome.css" rel="stylesheet" media="screen">
    <link href="http://127.0.0.1:9058//Public/admin/style/style.css" rel="stylesheet">
    <link href="http://127.0.0.1:9058//Public/admin/style/dashboard.css" rel="stylesheet">
    <link href="http://127.0.0.1:9058//Public/admin/css/demo_table.css" rel="stylesheet">
    <link href="http://127.0.0.1:9058//Public/admin/assets/jquery-easy-pie-chart/jquery.easy-pie-chart.css" rel="stylesheet" type="text/css" media="screen"/>
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="http://127.0.0.1:9058//Public/admin/assets/js/html5shiv.js"></script>
    <script src="http://127.0.0.1:9058//Public/admin/assets/js/respond.min.js"></script>
    <![endif]-->

</head>
<body>
<div class="container">
    <div class="top-navbar header b-b"> <a data-original-title="Toggle navigation" class="toggle-side-nav pull-left" href="javascript:;"><i class="icon-reorder"></i> </a>
        <div class="brand pull-left" style="min-width: 350px;">
            <a href="<?php echo U('Index/Index');?>">
                <i class="icon icon-dashboard"></i>
                <?php echo ($configuration[0]["title"]); ?>
            </a>
        </div>
        <ul class="nav navbar-nav navbar-right  hidden-xs">
            <li class="dropdown user  hidden-xs">
                <a data-toggle="dropdown" class="dropdown-toggle" href="javascript:;"> <i class="icon-male"></i> <span class="username"><?php echo ($_SESSION['admin_user'][0]['username']); ?></span> <i class="icon-caret-down small"></i> </a>
                <ul class="dropdown-menu">
                    <li><a href="<?php echo U('User/Profile');?>"><i class="icon-user"></i> 个人信息</a></li>
                    <li><a href="<?php echo U('User/Password');?>"><i class=" icon-info-sign"></i> 修改密码</a></li>
                    <li class="divider"></li>
                    <li><a href="<?php echo U('User/Quit');?>"><i class="icon-key"></i> 退出</a></li>
                </ul>
            </li>
        </ul>
        <div class="pull-right">
<!--            <img src="" alt="" width="40" height="32" style="margin-top: 10px;" id="tod"/>-->
        </div>
    </div>
</div>
<div class="wrapper">
    <div class="left-nav">
        <div id="side-nav">
            <ul id="nav">
                <li class="current"> <a href="<?php echo U('Index/Index');?>">
                        <i class="icon-dashboard"></i> Dashboard </a> </li>

                <?php
 if(!empty($menu)) { foreach($menu as $i=>$m){ ?>
                        <li style="<?php if($i==0) echo 'display:none'; ?>" id="menu_<?php echo $i;?>">
                            <a href="javascript:;">
                                <i class="icon-th"></i>
                                <?php echo $m['menu_name'];?>
                                <i class="arrow icon-angle-left"></i>
                            </a>
                            <?php
 if(!empty($m['sub'])) { ?>
                            <ul class="sub-menu">
                                <?php foreach($m['sub'] as $j=>$me){ ?>
                                <li> <a href="<?php echo $me['href'];?>">
                                        <i class="icon-angle-right"></i>
                                        <?php echo $me['menu_name'];?> </a> </li>
                                <?php }?>
                            </ul>
                        <?php }?>
                        </li>
                <?php
 } } ?>
            </ul>
        </div>
    </div>
  <div class="page-content">
    <div class="content container">
      <div class="row">
        <div class="col-lg-12">
          <h2 class="page-title">控制中心 <small>>产品列表.</small></h2>
        </div>
      </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="widget">
                    <div class="widget-header"> <i class="icon-table"></i>
                        <h3>产品列表</h3>
                    </div>
                    <div class="widget-content">
                        <form action="<?php echo U('Shop/Data');?>" method="post">
                            <div class="row " style="padding: 15px;">
                                <div class="form-inline">
                                    <div class="form-group" style="">
                                        <label for="">所属店铺</label>
                                        <select  class="form-control" name="shop_id" id="parent">
                                                <option value="">==请选择==</option>
                                            <?php if(is_array($list2)): $i = 0; $__LIST__ = $list2;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo["id"]); ?>"><?php echo ($vo["shop_name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for=""></label> <br/>
                                        <button style="margin-top: 3px;" class="btn btn-danger">搜索</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <table cellpadding="0" cellspacing="0" border="0" class="display" id="tableData">
                            <thead>
                            <tr>
                                <th>编号</th>
                                <th class="">产品名称</th>
                                <th class="hidden-xs">所属店铺</th>
                                <th class="hidden-xs">负责人</th>
                                <th class="hidden-xs">二维码</th>
                                <th class="hidden-xs">跳转URL</th>
                                <th class="center">操作</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr class="gradeX">
                                    <td><?php echo ($vo["id"]); ?></td>
                                    <td class=""><?php echo ($vo["product"]["product_name"]); ?></td>
                                    <td class=""><?php echo ($vo["shop"]["shop_name"]); ?></td>
                                    <td class=""><?php echo ($vo["master"]); ?></td>
                                    <td class="hidden-xs">
                                        <a href="http://127.0.0.1:9058//<?php echo ($vo["qrcode"]); ?>" target="_blank">
                                            <img width="80" height="45" src="http://127.0.0.1:9058//<?php echo ($vo["qrcode"]); ?>" alt=""/>
                                        </a>
                                    </td>

                                    <td class="hidden-xs">
                                        <?php echo ($vo["product"]["url"]); ?></td>
                                    <td class="center">

                                        <a class="deleteBtn" href="<?php echo U('Shop/DeleteLocal?id='.$vo['id'].'');?>">
                                            <i class="icon-trash"></i>
                                        </a>
                                    </td>
                                </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                            </tbody>
                            </table>
                        <div class="pagination">
                            <?php echo $page;?>
                        </div>

                    </div>
                </div>
            </div>
        </div>

    </div>
  </div>
</div>

<div class="bottom-nav footer"> 2015 &copy; Shop UED Management System. </div>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="http://127.0.0.1:9058//Public/admin/js/jquery.js"></script>
<script src="http://127.0.0.1:9058//Public/admin/js/bootstrap.min.js"></script>
<script type="text/javascript" src="http://127.0.0.1:9058//Public/admin/js/smooth-sliding-menu.js"></script>
<script class="include" type="text/javascript" src="http://127.0.0.1:9058//Public/admin/javascript/jquery191.min.js"></script>
<script class="include" type="text/javascript" src="http://127.0.0.1:9058//Public/admin/javascript/jquery.jqplot.min.js"></script>

<script src="http://127.0.0.1:9058//Public/admin/assets/jquery-easy-pie-chart/jquery.easy-pie-chart.js" type="text/javascript"></script>
<script src="http://127.0.0.1:9058//Public/admin/assets/sparkline/jquery.sparkline.js" type="text/javascript"></script>
<script src="http://127.0.0.1:9058//Public/admin/assets/sparkline/jquery.customSelect.min.js" ></script>
<script src="http://127.0.0.1:9058//Public/admin/assets/sparkline/sparkline-chart.js"></script>
<script src="http://127.0.0.1:9058//Public/admin/assets/sparkline/easy-pie-chart.js"></script>


<!--switcher html start-->
<div class="demo_changer active" style="right: 0px;">
    <div class="demo-icon"></div>
    <div class="form_holder">
        <div class="predefined_styles"> <a class="styleswitch" rel="a" href=""><img alt="" src="http://127.0.0.1:9058//Public/admin/images/a.jpg"></a> <a class="styleswitch" rel="b" href=""><img alt="" src="http://127.0.0.1:9058//Public/admin/images/b.jpg"></a> <a class="styleswitch" rel="c" href=""><img alt="" src="http://127.0.0.1:9058//Public/admin/images/c.jpg"></a> <a class="styleswitch" rel="d" href=""><img alt="" src="http://127.0.0.1:9058//Public/admin/images/d.jpg"></a> <a class="styleswitch" rel="e" href=""><img alt="" src="http://127.0.0.1:9058//Public/admin/images/e.jpg"></a> <a class="styleswitch" rel="f" href=""><img alt="" src="http://127.0.0.1:9058//Public/admin/images/f.jpg"></a> <a class="styleswitch" rel="g" href=""><img alt="" src="http://127.0.0.1:9058//Public/admin/images/g.jpg"></a> <a class="styleswitch" rel="h" href=""><img alt="" src="http://127.0.0.1:9058//Public/admin/images/h.jpg"></a> <a class="styleswitch" rel="i" href=""><img alt="" src="http://127.0.0.1:9058//Public/admin/images/i.jpg"></a> <a class="styleswitch" rel="j" href=""><img alt="" src="http://127.0.0.1:9058//Public/admin/images/j.jpg"></a> </div>
    </div>
</div>

<!--switcher html end-->
<script src="http://127.0.0.1:9058//Public/admin/assets/switcher/switcher.js"></script>
<script src="http://127.0.0.1:9058//Public/admin/assets/switcher/moderziner.custom.js"></script>
<link href="http://127.0.0.1:9058//Public/admin/assets/switcher/switcher.css" rel="stylesheet">
<link href="http://127.0.0.1:9058//Public/admin/assets/switcher/switcher-defult.css" rel="stylesheet">
<link rel="alternate stylesheet" type="text/css" href="http://127.0.0.1:9058//Public/admin/assets/switcher/a.css" title="a" media="all" />
<link rel="alternate stylesheet" type="text/css" href="http://127.0.0.1:9058//Public/admin/assets/switcher/b.css" title="b" media="all" />
<link rel="alternate stylesheet" type="text/css" href="http://127.0.0.1:9058//Public/admin/assets/switcher/c.css" title="c" media="all" />
<link rel="alternate stylesheet" type="text/css" href="http://127.0.0.1:9058//Public/admin/assets/switcher/d.css" title="d" media="all" />
<link rel="alternate stylesheet" type="text/css" href="http://127.0.0.1:9058//Public/admin/assets/switcher/e.css" title="e" media="all" />
<link rel="alternate stylesheet" type="text/css" href="http://127.0.0.1:9058//Public/admin/assets/switcher/f.css" title="f" media="all" />
<link rel="alternate stylesheet" type="text/css" href="http://127.0.0.1:9058//Public/admin/assets/switcher/g.css" title="g" media="all" />
<link rel="alternate stylesheet" type="text/css" href="http://127.0.0.1:9058//Public/admin/assets/switcher/h.css" title="h" media="all" />
<link rel="alternate stylesheet" type="text/css" href="http://127.0.0.1:9058//Public/admin/assets/switcher/i.css" title="i" media="all" />
<link rel="alternate stylesheet" type="text/css" href="http://127.0.0.1:9058//Public/admin/assets/switcher/j.css" title="j" media="all" />
<script type="text/javascript" language="javascript" src="http://127.0.0.1:9058//Public/admin/js/jquery.dataTables.js"></script>


<script>

    $(document).ready(function(){

        $("#nav>li").click(function(){
           $("#nav>li").removeClass("current");
            $(this).addClass("current");
        });


        $("#cancelBtn").click(function(){
            window.location.href = "<?php echo U('Index/Index');?>";
        });

        $('#tableData').dataTable( {
            "sPaginationType": "full_numbers"
        } );


        $("a.deleteBtn").click(function(){
            return confirm("确定要删除此条目吗?");
        });
        $("img").each(function(){
            var src = $(this).attr("src");
           // console.log(src);
            if(src==""||src=="/")
            {
                $(this).attr("src","http://127.0.0.1:9058//Public/public/images/no.jpg");
                //$(this);
            }
        });
    } );
</script>

</body>
</html>

<script>

    $(document).ready(function(){

        $("#nav>li").removeClass("current");
        $("#nav>li#menu_4").addClass("current");


    });

</script>