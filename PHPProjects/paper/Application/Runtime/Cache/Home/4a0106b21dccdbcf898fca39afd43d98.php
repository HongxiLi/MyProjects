<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8" />
    <title><?php echo $configuration['title'];?></title>
    <meta name="keywords" content="<?php echo $configuration['keywords'];?>"/>
    <meta name="description" content="<?php echo $configuration['description'];?>"/>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <!--[if lte IE 8]><script src="http://127.0.0.1:9003//Public/home/assets/js/ie/html5shiv.js"></script><![endif]-->
    <link rel="stylesheet" href="http://127.0.0.1:9003//Public/home/assets/css/main.css" />
    <!--[if lte IE 8]><link rel="stylesheet" href="http://127.0.0.1:9003//Public/home/assets/css/ie8.css" /><![endif]-->
</head>
<body class="homepage">
<div id="page-wrapper">

    <!-- Header -->
    <div id="header-wrapper">
        <div id="header">
            <!-- Logo -->
            <h1><a href="<?php echo U('Index/Index');?>"><?php
 if(!empty($shop)) echo $shop['shop_name']; else echo $configuration['title'];?></a></h1>
            <!-- Nav -->
            <nav id="nav">
                <ul id="MainNav">
                    <li id="Home" class="current"><a href="<?php echo U('Index/Index');?>">Home</a></li>
                    <?php
 if(empty($_SESSION['f_username'])){ ?>
                        <li id="Login"><a href="<?php echo U('User/Login');?>">登录</a></li>
                    <?php }else{?>
                        <li id="Login"><a href="javascript:;">
                                <i class="icon icon-user">Welcome:</i>
                                <?php echo $_SESSION['f_username'];?></a></li>
                        <li id="Login2"><a href="/index.php/User/Quit"> ::Quit:: </a></li>
                    <?php }?>
                </ul>
            </nav>

        </div>
    </div>

    <!-- Main -->
    <div id="main-wrapper">
        <div class="container">
            <div class="row">
                <div class="12u">

                    <section class="section">
                        <div class="container">
                            <div class="signin-form row-fluid">
                                <!--Sign In-->
                                <div class="span5 offset1">
                                    <div class="box corner-all">
                                        <div class="box-header grd-teal color-white corner-top">
                                            <span>User Login:</span>
                                        </div>
                                        <div class="box-body bg-white">
                                            <form id="sign-in" method="post" action="<?php echo U('User/DoLogin');?>" novalidate="novalidate">
                                                <div class="control-group">
                                                    <label class="control-label">用户名</label>
                                                    <div class="controls">
                                                        <input type="text" class="input-block-level" data-validate="{required: true, messages:{required:'请输入用户名'}}" name="username" id="login_username" autocomplete="off">
                                                    </div>
                                                </div>
                                                <div class="control-group">
                                                    <label class="control-label">密码</label>
                                                    <div class="controls">
                                                        <input type="password" class="input-block-level" data-validate="{required: true, messages:{required:'请输入密码'}}" name="password" id="login_password" autocomplete="off">
                                                    </div>
                                                </div>
                                                <div class="control-group">
                                                               <div class="alert alert-danger" style="color: #c00;padding-top: 14px;">
                                                                   <?php echo $msg;?>
                                                               </div>
                                                </div>
                                                <br/>
                                                <div class="form-actions">
                                                    <input type="submit" class="btn btn-block btn-large btn-primary" value="马上登入">
                                                    <p class="recover-account">发布产品？ <a href="/admin.php/Index/Index" class="link">Admin Dashboard</a></p>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div><!--/Sign In-->

                            </div><!-- /row -->
                        </div><!-- /container -->


                    </section>

                </div>
            </div>
            <div class="row">
                <div class="12u">

                    <!-- Blog -->
                    <section>
                        <header class="major">
                            <h2>
                                <?php $configuration['title'];?></h2>
                        </header>
                    </section>

                </div>
            </div>
        </div>
    </div>

<!-- Footer -->
<div id="footer-wrapper">
    <section id="footer" class="container">
        <div class="row">
            <div class="12u">

                <!-- Copyright -->
                <div id="copyright">
                    <ul class="links">
                        <li>
                            <?php
 echo $configuration['copyright'];?>-
                            Email:<?php echo $configuration['email'];?>-
                            Address:<?php echo $configuration['address'];?>
                        </li>
                    </ul>
                </div>

            </div>
        </div>
    </section>
</div>

</div>

<!-- Scripts -->
<script src="http://127.0.0.1:9003//Public/home/assets/js/jquery.min.js"></script>
<script src="http://127.0.0.1:9003//Public/home/assets/js/jquery.dropotron.min.js"></script>
<script src="http://127.0.0.1:9003//Public/home/assets/js/skel.min.js"></script>
<script src="http://127.0.0.1:9003//Public/home/assets/js/skel-viewport.min.js"></script>
<script src="http://127.0.0.1:9003//Public/home/assets/js/util.js"></script>
<!--[if lte IE 8]><script src="http://127.0.0.1:9003//Public/home/assets/js/ie/respond.min.js"></script><![endif]-->
<script src="http://127.0.0.1:9003//Public/home/assets/js/main.js"></script>

</body>
</html>
<script>
    $(document).ready(function() {
        $("#MainNav>li").removeClass("current");
        $("#MainNav>li#Login").addClass("current");
    });
</script>