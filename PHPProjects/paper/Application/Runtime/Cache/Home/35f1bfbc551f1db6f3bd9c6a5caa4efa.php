<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8" />
    <title><?php echo $configuration['title'];?></title>
    <meta name="keywords" content="<?php echo $configuration['keywords'];?>"/>
    <meta name="description" content="<?php echo $configuration['description'];?>"/>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <!--[if lte IE 8]><script src="http://127.0.0.1:9058/Public/home/assets/js/ie/html5shiv.js"></script><![endif]-->
    <link rel="stylesheet" href="http://127.0.0.1:9058/Public/home/assets/css/main.css" />
    <!--[if lte IE 8]><link rel="stylesheet" href="http://127.0.0.1:9058/Public/home/assets/css/ie8.css" /><![endif]-->
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


</div>
</div>

<!-- Main -->
<div id="main-wrapper">
    <div class="container">
        <div class="row">
            <a href="<?php echo U('Index/Index');?>">
                <i class="icon icon-arrow-left"></i>
                << Back
            </a>
        </div>
        <div class="row">
            <div class="12u 12u(mobile)">
                <!-- Content -->
                <article class="box post">
                    <header >
                        <h2 style="text-align: center;"><?php echo $product['product_name'];?></h2>
                    </header>
                    <div class="row" style="margin: 0 auto;margin-top: -46px;">
                        <a target="_blank" href="http://127.0.0.1:9058/<?php echo $product['thumb'];?>" class="image featured" style="width: 89%;margin: 0 auto;">
                            <img src="http://127.0.0.1:9058/<?php echo $product['thumb'];?>" alt="" style="max-height: 350px;width: 100%;margin: 0 auto;border: 1px solid #333;padding: 3px;">
                        </a>
                    </div>
                    <section>
                        <header>
                            <h3></h3>
                        </header>
                        <p style="margin:0 auto;margin-top: 46px;width: 50%;height: 50%;">
                            <a target="_blank" href="http://127.0.0.1:9058/<?php echo $qr['qrcode'];?>" class="image featured">
                                <img src="http://127.0.0.1:9058/<?php echo $qr['qrcode'];?>" alt="" style="width:100%;height: 100%;">
                            </a>
                        </p>
                    </section>
                    <section>
                        <header>
                            <h3>详情介绍</h3>
                        </header>
                        <p>
                            <?php echo html_entity_decode($product['content']);?>
                        </p>
                    </section>
                </article>

            </div>

        </div>
        <div class="row">
            <div class="12u">

                <!-- Blog -->
                <section>
                    <header class="major">
                        <h2><?php echo $shop['shop_name'];?></h2>
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
<script src="http://127.0.0.1:9058/Public/home/assets/js/jquery.min.js"></script>
<script src="http://127.0.0.1:9058/Public/home/assets/js/jquery.dropotron.min.js"></script>
<script src="http://127.0.0.1:9058/Public/home/assets/js/skel.min.js"></script>
<script src="http://127.0.0.1:9058/Public/home/assets/js/skel-viewport.min.js"></script>
<script src="http://127.0.0.1:9058/Public/home/assets/js/util.js"></script>
<!--[if lte IE 8]><script src="http://127.0.0.1:9058/Public/home/assets/js/ie/respond.min.js"></script><![endif]-->
<script src="http://127.0.0.1:9058/Public/home/assets/js/main.js"></script>

</body>
</html>
<script>
    $(document).ready(function() {
        $("#MainNav>li").removeClass("current");
        $("#MainNav>li#Home").addClass("current");
    });
</script>