<include file="Public/header" />
<style>
  .col-sm-6{width: 150px;}
</style>

  <!-- content start -->
  <div class="admin-content">

    <div class="am-cf am-padding">
      <div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">首页</strong> / <small>学生/教师/管理员</small></div>
    </div>

    <div class="am-g" style="padding: 10px;border: 1px solid #ddd;margin-left: 15px;margin-right: 15px;">
      <div class="am-u-sm-12">
        <div class="am-cf " style="padding-bottom: 10px;">
          <div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">学生数据</strong> / <small>添加</small></div>
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


              <form  data-validate="parsley" method="post" novalidate="" class="am-form" id="form" action="{:U('Student/AddStudent')}">




                <fieldset>

                  <div class="control-group">
                    <div class="col-md-3">
                      <label for="college" class="control-label">学号</label>
                    </div>
                    <div class="col-md-9">
                      <div class="form-group">
                        <input style="width: 252px;" type="text" class="col-sm-6 col-xs-12" name="username" id="username">
                      </div>
                    </div>
                  </div>
                  <div class="control-group">
                    <div class="col-md-3">
                      <label for="" class="control-label">密码</label>
                    </div>
                    <div class="col-md-9">
                      <div class="form-group">
                        <input style="width: 202px;" type="password" class="col-sm-6 col-xs-12" name="password" id="password">
                      </div>
                    </div>
                  </div>
                  <div class="control-group">
                    <div class="col-md-3">
                      <label for="" class="control-label">确认密码</label>
                    </div>
                    <div class="col-md-9">
                      <div class="form-group">
                        <input  style="width: 202px;" type="password" class="col-sm-6 col-xs-12" name="password2" id="password2">
                      </div>
                    </div>
                  </div>
                  <div class="control-group">
                    <div class="col-md-3">
                      <label for="" class="control-label">姓名</label>
                    </div>
                    <div class="col-md-9">
                      <div class="form-group">
                        <input style="width: 202px;" type="text" name="realname" class="col-sm-6 col-xs-12" />
                      </div>
                    </div>
                  </div>
                  <div class="control-group">
                    <div class="col-md-3">
                      <label for="" class="control-label">性别</label>
                    </div>
                    <div class="col-md-9">
                      <div class="form-group">
                        <select style="width: 152px;" name="sex" class="form-control" id="">
                          <option value="1">男</option>
                          <option value="2">女</option>
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="control-group">
                    <div class="col-md-3">
                      <label for="" class="control-label">年级</label>
                    </div>
                    <div class="col-md-9">
                      <div class="form-group">
                        <select style="width: 152px;" name="year" class="form-control" id="">
                          <volist name="data2" id="vo">
                            <option value="{$vo.id}">{$vo.year}</option>
                          </volist>
                        </select>
                      </div>
                    </div>
                  </div>

                  <div class="control-group">
                    <div class="col-md-3">
                      <label for="" class="control-label">学院</label>
                    </div>
                    <div class="col-md-9">
                      <div class="form-group">
                        <select style="width: 252px;" name="college" class="form-control" id="college">
                          <volist name="data" id="vo">
                            <option value="{$vo.id}">{$vo.college_name}</option>
                          </volist>
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="control-group">
                    <div class="col-md-3">
                      <label for="" class="control-label">专业</label>
                    </div>
                    <div class="col-md-9">
                      <div class="form-group">
                        <select style="width: 252px;" name="major" class="form-control" id="major">
                          <option value="">==Please Select==</option>
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="control-group">
                    <div class="col-md-3">
                      <label for="" class="control-label">班级</label>
                    </div>
                    <div class="col-md-9">
                      <div class="form-group">
                        <select style="width: 252px;" name="class" class="form-control" id="class">
                          <option value="">==Please Select==</option>
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="control-group">
                                        <span id="msg" style="color: #c00">

                                        </span>
                  </div>
                </fieldset>


                <div class="am-g am-margin-top-sm">
                  <div class="am-u-sm-2 am-text-right">
                     <span id="msg" style="color: #c00">
                       请认真填写表单
                     </span>
                  </div>
                  <div class="am-u-sm-4 am-u-end">
                    <button id="postBtn" class="am-btn am-btn-primary am-btn-xs" type="submit">添加</button>
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

  var html = "<option value=''>==Please Select==</option>";
  $(document).ready(function(){

    $("#college").change(function(){
      $("#class").html(html);
      $("#major").html(html);
      var college = $(this).val();
      $.get("/admin.php/Json/Major/?id="+college,function(data){
        $("#major").html(data);
      });
    });

    $("#major").change(function(){
      var major = $(this).val();
      var college =  $("#college").val();
      $.get("/admin.php/Json/MyClass/?mid="+major+"&cid="+college,function(data){
        $("#class").html(data);
      });
    });

    $("#postBtn").click(function(e){
      e.preventDefault();
      var username = $("#username").val();
      var password = $("#password").val();
      var password2 = $("#password2").val();
      var realname = $("#realname").val();
      var major = $("#major").val();
      var vclass = $("#class").val();
      if(username==""||password==""||password2==""||realname==""||major==""||vclass=="")
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