<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head lang="en">
  <meta charset="UTF-8">
  <title>用户登录-在线论文管理系统</title>
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
  <meta name="format-detection" content="telephone=no">
  <meta name="renderer" content="webkit">
  <meta http-equiv="Cache-Control" content="no-siteapp" />
  <link rel="alternate icon" type="image/png" href="http://127.0.0.1:9005//Public/1011/assets/i/favicon.png">
  <link rel="stylesheet" href="http://127.0.0.1:9005//Public/1011/assets/css/amazeui.min.css"/>
  <script src="http://127.0.0.1:9005//Public/1011/assets/js/jquery.min.js"></script>
  <style>
    .header {
      text-align: center;
    }
    .header h1 {
      font-size: 200%;
      color: #333;
      margin-top: 30px;
    }
    .header p {
      font-size: 14px;
    }
    #msg{display: none;}
  </style>
</head>
<body>
<div class="header"> 
  <hr />
</div>
<div class="am-g">
  <div class="am-u-lg-6 am-u-md-8 am-u-sm-centered">
    <h3>登录</h3>
    <hr>
    <div class="am-btn-group">
      <a href="javascript:;" class="am-btn am-btn-secondary am-btn-sm">
        <i class="am-icon-login am-icon-sm"></i>
        登录到控制面板
      </a>
      <a id="msg" href="javascript:;" style="color: #c00" class="am-btn am-btn-success am-btn-sm">

      </a>
    </div>
    <br>
    <br>

    <form id="form" method="post" action="<?php echo U('User/DoLogin/');?>" class="am-form">
      <label for="username">账号:</label>
      <input type="text" name="username" id="username" value="">
      <br>
      <label for="password">密码:</label>
      <input type="password" name="password" id="password" value="">
      <br>
<p style="color: #c00">
  <?php echo ($msg); ?>
</p>

      <br>
      <label for="remember-me">
        <input checked id="remember-me" type="checkbox">
        记住密码
      </label>
      <br />
      <div class="am-cf">
        <input id="postBtn" type="submit" name="" value="登 录" class="am-btn am-btn-primary am-btn-sm am-fl">
        <input type="reset" name="" value="重置 ^_^? " class="am-btn am-btn-default am-btn-sm am-fr">
      </div>
    </form>
    <hr>
    <p>© 2016 版权所有.</p>
  </div>
</div>
</body>

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
</html>