<include file="Public/header" />

  <!-- content start -->
  <div class="admin-content">

    <div class="am-cf am-padding">
      <div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">首页</strong> / <small>学院/专业/班级</small></div>
    </div>

    <div class="am-g" style="padding: 10px;border: 1px solid #ddd;margin-left: 15px;margin-right: 15px;">
      <div class="am-u-sm-12">
        <div class="am-cf " style="padding-bottom: 10px;">
          <div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">班级数据</strong> / <small>添加</small></div>
        </div>
        <div class="am-g">
          <div class="am-u-md-6 am-cf">
            <div class="am-fl am-cf">
              <div class="am-btn-toolbar am-fl">
                <div class="am-btn-group am-btn-group-xs">
                  <button onclick=javascript:window.location.href="{:U('CT/Index')}"; type="button" class="am-btn am-btn-default"><span class="am-icon-bug"></span> 返回</button>
                </div>


              </div>
            </div>
          </div>

        </div>
        <div class="am-g">
          <div class="am-u-sm-12">


              <form  data-validate="parsley" method="post" novalidate="" class="am-form" id="form" action="{:U('Class/AddClass')}">


                <div class="am-g am-margin-top-sm">
                  <div class="am-u-sm-2 am-text-right">
                    <label for="college" class="control-label">班级名称</label>
                  </div>
                  <div class="am-u-sm-4 am-u-end">
                    <input type="text" class="col-sm-6 col-xs-12" name="class_name" id="class_name">
                  </div>
                </div>



                <div class="am-g am-margin-top-sm">
                  <div class="am-u-sm-2 am-text-right">
                    <label for="college" class="control-label">所属学院</label>
                  </div>
                  <div class="am-u-sm-4 am-u-end">

                    <select class="form-control col-sm-6 col-xs-12" name="college" id="college">
                      <volist name="list" id="vo">
                        <option value="{$vo.id}">{$vo.college_name}</option>
                      </volist>
                    </select>
                  </div>
                </div>

                <div class="am-g am-margin-top-sm">
                  <div class="am-u-sm-2 am-text-right">
                    <label for="college" class="control-label">所属专业</label>
                  </div>
                  <div class="am-u-sm-4 am-u-end">

                    <select class="form-control col-sm-6 col-xs-12" name="major" id="major">
                      <option value="">==Please Select==</option>
                    </select>
                  </div>
                </div>


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
  loadMajor();
  function loadMajor() {
    var college = $("#college").val();
    $.get("/admin.php/Json/Major/?id="+college,function(data){
      $("#major").html(data);
    });
  }

  $(document).ready(function(){
    $("#college").change(function(){
      loadMajor();
    });

    $("#postBtn").click(function(e){
      e.preventDefault();
      var class_name = $("#class_name").val();
      var major = $("#major").val();
      if(class_name==""||major=="")
      {
        $("#msg").html("表单不能为空");
        return;
      }

      $("#form").submit();
    });
  });

</script>
