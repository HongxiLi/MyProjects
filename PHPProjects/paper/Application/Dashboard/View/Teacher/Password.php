<include file="Public/header" />

  <!-- content start -->
  <div class="admin-content">

    <div class="am-cf am-padding">
      <div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">首页</strong> / <small>学生/教师/管理员</small></div>
    </div>

    <div class="am-g" style="padding: 10px;border: 1px solid #ddd;margin-left: 15px;margin-right: 15px;">
      <div class="am-u-sm-12">
        <div class="am-cf " style="padding-bottom: 10px;">
          <div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">教师数据</strong> / <small>重置密码</small></div>
        </div>
        <div class="am-g">
          <div class="am-u-md-6 am-cf">
            <div class="am-fl am-cf">
              <div class="am-btn-toolbar am-fl">
                <div class="am-btn-group am-btn-group-xs">
                  <button onclick=javascript:window.location.href="{:U('CT/USER')}"; type="button" class="am-btn am-btn-default"><span class="am-icon-bug"></span> 返回</button>
                </div>


              </div>
            </div>
          </div>

        </div>
        <div class="am-g">
          <div class="am-u-sm-12">


              <form  data-validate="parsley" method="post" novalidate="" class="am-form" id="form" action="{:U('Teacher/UpdatePassword')}">


                <div class="control-group">
                  <div class="col-md-3">
                    <label for="" class="control-label">当前用户</label>
                  </div>
                  <div class="col-md-9">
                    <div class="form-group">
                      <p>{$data[0].username}</p>
                    </div>
                  </div>
                </div>

                <div class="control-group">
                  <div class="col-md-3">
                    <label for="" class="control-label">输入新密码</label>
                  </div>
                  <div class="col-md-9">
                    <div class="form-group">
                      <input STYLE="width: 250px;" type="password" class="col-sm-6 col-xs-12"  name="password" id="password">
                      <input type="hidden" name="id" value="{$data[0].id}"/>
                    </div>
                  </div>
                </div>
                <div class="control-group">
                  <div class="col-md-3">
                    <label for="" class="control-label">确认新密码</label>
                  </div>
                  <div class="col-md-9">
                    <div class="form-group">
                      <input STYLE="width: 250px;" type="password" class="col-sm-6 col-xs-12"  name="password2" id="password2">
                    </div>
                  </div>
                </div>


                <div class="am-g am-margin-top-sm">
                  <div class="am-u-sm-2 am-text-right">
                     <span id="msg" style="color: #c00">
                       请认真填写表单
                     </span>
                  </div>
                  <div class="am-u-sm-4 am-u-end">
                    <button id="postBtn" class="am-btn am-btn-primary am-btn-xs" type="submit">更新</button>
                    <button id="cancelBtn" class="am-btn am-btn-primary am-btn-xs" type="button">取消</button>
                  </div>
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
<include file="Public/footer" />



<script>

  $(document).ready(function(){

    $("#postBtn").click(function(e){
      e.preventDefault();
      var password = $("#password").val();
      var password2 = $("#password2").val();
      if(password==""||password2=="")
      {
        $("#msg").html("表单不能为空");
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
