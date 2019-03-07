<include file="Public/header" />
  <div class="page-content">
    <div class="content container">
      <div class="row">
        <div class="col-lg-12">
          <h2 class="page-title">控制中心 <small>>修改密码.</small></h2>
        </div>
      </div>
        <div class="row">
            <div class="col-lg-8">
                <div class="widget">
                    <div class="widget-header"> <i class=" icon-key"></i>
                        <h3>修改密码</h3>
                    </div>
                    <div class="widget-content">
                        <div class="body">
                            <form data-validate="parsley" method="post" novalidate="" class="form-horizontal label-left" id="form" action="{:U('User/updatePassword')}">

                                <fieldset>
                                    <div class="control-group">
                                        <div class="col-md-3">
                                            <label for="password" class="control-label">输入新密码</label>
                                        </div>
                                        <div class="col-md-9">
                                            <div class="form-group">
                                                <input type="password" class="col-sm-6 col-xs-12" name="password" id="password">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <div class="col-md-3">
                                            <label for="password2" class="control-label">确认密码 </label>
                                        </div>
                                        <div class="col-md-9">
                                            <div class="form-group">
                                                <input type="password" class="col-sm-6 col-xs-12" required="" name="password2" id="password2">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <span id="msg" style="color: #c00">

                                        </span>
                                    </div>
                                </fieldset>
                                <div class="form-actions">
                                    <button id="postBtn" class="btn btn-primary" type="submit">更新</button>
                                    <button id="cancelBtn" class="btn btn-default" type="button">取消</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
  </div>
</div>
<include file="Public/footer" />
<script>

    $(document).ready(function(){

        $("#postBtn").click(function(e){
            e.preventDefault();
            var password = $("#password").val();
            var password2 = $("#password2").val();
            if(password==""||password2=="")
            {
                $("#msg").html("请输入密码");
                return;
            }
            if(password!=password2)
            {
                $("#msg").html("两次输入的密码不一致");
                return;
            }
            $("#form").submit();
        });
    });

</script>
