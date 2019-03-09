<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <title>接口测试</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="http://qxu1152260207.my3w.com/Public/admin/css/bootstrap.css" rel="stylesheet" media="screen">
    <style>
        body,html{background: #333;}
        .container{background: #fff;}
        .row{padding: 25px;}
        #result{background: #fff;border-radius: 5px;padding: 10px;}
    </style>
</head>
<html>
<body>
<div class="container" style="margin-top: 15px;padding: 15px;margin-bottom: 15px;">
    <div class="header">
        <h1>接口在线测试</h1>
    </div>
    <div class="row" >
        <div class="alert alert-info">项：用户登录</div>
        <dl>
            <dt>参数</dt>
            <dd>
                请求方式：POST
            </dd>
            <dd>
                @username 用户名
            </dd>
            <dd>
                @password 密码
            </dd>
            <dd>
                请求地址:
                    http://qxu1152260207.my3w.com/api.php/index/userlogin
            </dd>
        </dl>
    </div>
    <div class="row">
        <form action="<?php echo U('Index/UserLogin');?>" id="form">
            <div class="form-group">
                <label for="">用户名</label> <br/>
                <input type="text" name="username" placeholder="UserName"/>
            </div>
            <div class="form-group">
                <label for="">密码</label> <br/>
                <input type="password" name="password" placeholder="Password"/>
                <input type="hidden" value="post" id="method"/>
            </div>
            <div class="form-group">
                <button id="postBtn" class="btn btn-lg btn-success">提交</button>
            </div>
        </form>
    </div>

    <div class="row alert-info">
        <pre>Return:
        </pre>
        <pre>
        <div id="result"></div>
            </pre>
    </div>
</div>
<script src="http://qxu1152260207.my3w.com/Public/admin/js/jquery.js"></script>
</body>
</html>

<script>
    $(document).ready(function(){

        $("#postBtn").click(function(e){
            e.preventDefault();

            $.ajax({
                type: $("#method").val(),
                url: $("#form").attr("action"),
                data: $("#form").serialize(),
                dataType: "text",
                success: function(data){
                    $("#result").empty();
                    //alert(111)
                    console.log(data);
                    $("#result").html(data+"");
                },
                error:function(data){
                    console.log(data);
                    $("#result").empty();
                    $("#result").html(data);
                }
            });
        });
    });
</script>