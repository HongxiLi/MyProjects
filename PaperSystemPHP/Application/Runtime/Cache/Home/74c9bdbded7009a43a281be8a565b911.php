<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8" />
    <title><?php echo $configuration['title'];?></title>
    <meta name="keywords" content="<?php echo $configuration['keywords'];?>"/>
    <meta name="description" content="<?php echo $configuration['description'];?>"/>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <!--[if lte IE 8]><script src="/Public/home/assets/js/ie/html5shiv.js"></script><![endif]-->
    <link rel="stylesheet" href="/Public/home/assets/css/main.css" />
    <!--[if lte IE 8]><link rel="stylesheet" href="/Public/home/assets/css/ie8.css" /><![endif]-->
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


<link rel="stylesheet" href="/Public/home/assets/waterfall.css">

</div>
</div>

<!-- Main -->
<div id="main-wrapper">
    <div class="container">
        <div class="row">
            <div class="12u">
                <div id="container"></div>
            </div>
        </div>
        <div class="row">
            <div class="12u">

                <!-- Blog -->
                <section>
                    <header class="major">
                        <h2>
                            <?php echo $shop['shop_name'];?></h2>
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
<script src="/Public/home/assets/js/jquery.min.js"></script>
<script src="/Public/home/assets/js/jquery.dropotron.min.js"></script>
<script src="/Public/home/assets/js/skel.min.js"></script>
<script src="/Public/home/assets/js/skel-viewport.min.js"></script>
<script src="/Public/home/assets/js/util.js"></script>
<!--[if lte IE 8]><script src="/Public/home/assets/js/ie/respond.min.js"></script><![endif]-->
<script src="/Public/home/assets/js/main.js"></script>

</body>
</html>
<script type="text/x-handlebars-template" id="waterfall-tpl">
    {{#result}}
    <div class="item">
        <img onclick="GoTo('{{image}}',{{productId}})" src="{{image}}" style="min-height: 150px" width="{{width}}" height="{{height}}" />
        <p> {{productName}}</p>
    </div>
    {{/result}}
</script>
<script src="/Public/home/js/libs/handlebars/handlebars.js"></script>
<script src="/Public/home/js/libs/jquery.easing.js"></script>
<script src="/Public/home/js/waterfall.min.js"></script>
<script>
    $('#container').waterfall({
        itemCls: 'item',
        colWidth: 350,
        gutterWidth: 15,
        gutterHeight: 15,
        checkImagesLoaded: false,
        isAnimated: true,
        animationOptions: {
        },
        path: function(page) {
            return '/index.php/index/gallery/page=' + page;
        }
    });
    function GoTo(url,productId)
    {
        window.location.href = "/index.php/Index/ViewProduct/?id="+productId;
    }
</script>
<script>
    $(document).ready(function() {
        $("#MainNav>li").removeClass("current");
        $("#MainNav>li#Home").addClass("current");
    });
</script>