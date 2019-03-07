<include file="Public/header" />

  <!-- content start -->
  <div class="admin-content">

    <div class="am-cf am-padding">
      <div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">首页</strong> / <small>毕设题目/成绩数据</small></div>
    </div>

    <div class="am-g" style="padding: 10px;border: 1px solid #ddd;margin-left: 15px;margin-right: 15px;">
      <div class="am-u-sm-12">
        <div class="am-cf " style="padding-bottom: 10px;">
          <div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">成绩数据</strong> / <small>添加</small></div>
        </div>
        <div class="am-g">
          <div class="am-u-md-6 am-cf">
            <div class="am-fl am-cf">
              <div class="am-btn-toolbar am-fl">
                <div class="am-btn-group am-btn-group-xs">
                  <button onclick=javascript:window.location.href="{:U('CT/SC')}"; type="button" class="am-btn am-btn-default"><span class="am-icon-bug"></span> 返回</button>
                </div>


              </div>
            </div>
          </div>

        </div>
        <div class="am-g">
          <div class="am-u-sm-12">


              <form enctype="multipart/form-data" data-validate="parsley" method="post" novalidate="" class="am-form" id="form" action="{:U('Score/AddScore')}">

                <fieldset>

                  <div class="control-group">
                    <div class="col-md-3">
                      <label for="" class="control-label">课程名称</label>
                    </div>
                    <div class="col-md-9">
                      <div class="form-group">
                        <select style="width: 45%;" class="form-control" name="course" id="courseId">

                          <volist name="list" id="vo">
                            <option value="{$vo.id}">{$vo.course_name}</option>
                          </volist>
                        </select>


                        <a href="javascript:;" target="_blank" class="btn btn-danger" id="downloadBtn">选择课程下载对应模板</a>
                      </div>
                    </div>
                  </div>
                  <div class="control-group">
                    <div class="col-md-3">
                      <label for="" class="control-label">Excel成绩文件</label>
                    </div>
                    <div class="col-md-9">
                      <div class="form-group">
                        <input type="file"  name="file" id="fileExcel"/>
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
                    <button id="postBtn" class="am-btn am-btn-primary am-btn-xs" type="submit">导入</button>
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




    $("#downloadBtn").click(function(){
      var courseId = $("#courseId").val();
      $(this).attr("href","/admin.php/Score/Download/?id="+courseId);
      $(this).click();
    });

    $("#postBtn").click(function(e){
      e.preventDefault();
      $("#form").submit();
    });
  });

</script>