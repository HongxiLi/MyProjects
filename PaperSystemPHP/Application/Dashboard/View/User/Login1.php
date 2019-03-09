<!DOCTYPE html>
<html>
<head>
<title>学生成绩管理系统 后台管理登录</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<!-- Bootstrap -->
<link href="__PUBLIC__/admin/css/bootstrap.css" rel="stylesheet" media="screen">
<link href="__PUBLIC__/admin/css/thin-admin.css" rel="stylesheet" media="screen">
<link href="__PUBLIC__/admin/css/font-awesome.css" rel="stylesheet" media="screen">
<link href="__PUBLIC__/admin/style/style.css" rel="stylesheet">



</head>
<body>
<div class="login-logo">
    学生成绩管理系统登录
    </div>

<div class="widget">
<div class="login-content">
  <div class="widget-content" style="padding-bottom:0;">
  <form method="POST" action="{:U('User/DoLogin/')}" class="no-margin" id="form">
                <h3 class="form-title">登录到控制中心</h3>
                
                <fieldset>
                    <div class="form-group no-margin">
                        <label for="username">账号</label>

                        <div class="input-group input-group-lg">
                                <span class="input-group-addon">
                                    <i class="icon-user"></i>
                                </span>
                            <input type="text" placeholder="账号" class="form-control input-lg" id="username" name="username">
                            <input type="hidden" name="form_token" value="{$token}"/>
                        </div>

                    </div>

                    <div class="form-group">
                        <label for="password">密码</label>

                        <div class="input-group input-group-lg">
                                <span class="input-group-addon">
                                    <i class="icon-lock"></i>
                                </span>
                            <input type="password" name="password" placeholder="密码" class="form-control input-lg" id="password">
                        </div>

                    </div>
                </fieldset>
               <div class="form-actions">
				<label class="checkbox">
                    <span style="color: #c00" id="msg">
                        {$msg}
                    </span>
				</label>
				<button id="postBtn" class="btn btn-warning pull-right" type="submit">
				登录 <i class="m-icon-swapright m-icon-white"></i>
				</button>
			</div>
            
            
            </form>
  
  
  </div>
   </div>
</div>








<!-- jQuery (necessary for Bootstrap's JavaScript plugins) --> 
<script src="__PUBLIC__/admin/js/jquery.js"></script>
<script src="__PUBLIC__/admin/js/bootstrap.min.js"></script>



 

<!--switcher html start-->
<div class="demo_changer active" style="right: 0px;">
                <div class="demo-icon"></div>
                <div class="form_holder">
                        

                    <div class="predefined_styles">
                        <a class="styleswitch" rel="a" href=""><img alt="" src="__PUBLIC__/admin/images/a.jpg"></a>	
                        <a class="styleswitch" rel="b" href=""><img alt="" src="__PUBLIC__/admin/images/b.jpg"></a>
                        <a class="styleswitch" rel="c" href=""><img alt="" src="__PUBLIC__/admin/images/c.jpg"></a>
                        <a class="styleswitch" rel="d" href=""><img alt="" src="__PUBLIC__/admin/images/d.jpg"></a>
                        <a class="styleswitch" rel="e" href=""><img alt="" src="__PUBLIC__/admin/images/e.jpg"></a>
                        <a class="styleswitch" rel="f" href=""><img alt="" src="__PUBLIC__/admin/images/f.jpg"></a>
                        <a class="styleswitch" rel="g" href=""><img alt="" src="__PUBLIC__/admin/images/g.jpg"></a>
                        <a class="styleswitch" rel="h" href=""><img alt="" src="__PUBLIC__/admin/images/h.jpg"></a>
                        <a class="styleswitch" rel="i" href=""><img alt="" src="__PUBLIC__/admin/images/i.jpg"></a>
                        <a class="styleswitch" rel="j" href=""><img alt="" src="__PUBLIC__/admin/images/j.jpg"></a>
                    </div>
					                    
                </div>
            </div>
            
            
    <!--switcher html end-->
<script src="__PUBLIC__/admin/assets/switcher/switcher.js"></script>
<script src="__PUBLIC__/admin/assets/switcher/moderziner.custom.js"></script>
<link href="__PUBLIC__/admin/assets/switcher/switcher.css" rel="stylesheet">
<link href="__PUBLIC__/admin/assets/switcher/switcher-defult.css" rel="stylesheet">
<link rel="alternate stylesheet" type="text/css" href="__PUBLIC__/admin/assets/switcher/a.css" title="a" media="all" />
<link rel="alternate stylesheet" type="text/css" href="__PUBLIC__/admin/assets/switcher/b.css" title="b" media="all" />
<link rel="alternate stylesheet" type="text/css" href="__PUBLIC__/admin/assets/switcher/c.css" title="c" media="all" />
<link rel="alternate stylesheet" type="text/css" href="__PUBLIC__/admin/assets/switcher/d.css" title="d" media="all" />
<link rel="alternate stylesheet" type="text/css" href="__PUBLIC__/admin/assets/switcher/e.css" title="e" media="all" />
<link rel="alternate stylesheet" type="text/css" href="__PUBLIC__/admin/assets/switcher/f.css" title="f" media="all" />
<link rel="alternate stylesheet" type="text/css" href="__PUBLIC__/admin/assets/switcher/g.css" title="g" media="all" />
<link rel="alternate stylesheet" type="text/css" href="__PUBLIC__/admin/assets/switcher/h.css" title="h" media="all" />
<link rel="alternate stylesheet" type="text/css" href="__PUBLIC__/admin/assets/switcher/i.css" title="i" media="all" />
<link rel="alternate stylesheet" type="text/css" href="__PUBLIC__/admin/assets/switcher/j.css" title="j" media="all" />


<script>

    $(document).ready(function(){

        $("#postBtn").click(function(e){
            e.preventDefault();
            $("#msg").html("");
            var username = $("#username").val();
            var password = $("#password").val();
            if(username==""||password=="")
            {
                $("#msg").html("账号和密码不能为空!");
                $("#msg").fadeIn();
                return;
            }
            $("#form").submit();
        });
    });

</script>


</body>
</html>
