<include file="Public/header" />

  <!-- content start -->
  <div class="admin-content">

    <div class="am-cf am-padding">
      <div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">首页</strong> / <small>学院/专业/班级</small></div>
    </div>

    <div class="am-g" style="padding: 10px;border: 1px solid #ddd;margin-left: 15px;margin-right: 15px;">
      <div class="am-u-sm-12">
        <div class="am-cf " style="padding-bottom: 10px;">
          <div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">专业数据</strong> / <small>添加</small></div>
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


              <form  data-validate="parsley" method="post" novalidate="" class="am-form" id="form" action="{:U('Major/AddMajor')}">


                <div class="am-g am-margin-top-sm">
                  <div class="am-u-sm-2 am-text-right">
                    <label for="college" class="control-label">专业名称</label>
                  </div>
                  <div class="am-u-sm-4 am-u-end">
                    <input type="text" class="col-sm-6 col-xs-12" name="major_name" id="major_name">
                  </div>
                </div>



                <div class="am-g am-margin-top-sm">
                  <div class="am-u-sm-2 am-text-right">
                    <label for="college" class="control-label">所属学院</label>
                  </div>
                  <div class="am-u-sm-4 am-u-end">
                    <select class="form-control col-sm-6 col-xs-12" name="college" id="">
                      <volist name="data" id="vo">
                        <option value="{$vo.id}">{$vo.college_name}</option>
                      </volist>
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

  $(document).ready(function(){
    $("#postBtn").click(function(e){
      e.preventDefault();
      var major_name = $("#major_name").val();
      if(major_name=="")
      {
        $("#msg").html("表单不能为空");
        return;
      }
      $("#form").submit();
    });
  });

</script>