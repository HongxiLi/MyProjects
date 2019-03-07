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
          <div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">学生数据</strong> / <small>导入EXCEL文件</small></div>
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


              <form enctype="multipart/form-data" data-validate="parsley" method="post" novalidate="" class="am-form" id="form" action="{:U('Student/ImportStudentExcel')}">




                <fieldset>

                  <div class="control-group">
                    <div class="col-md-3">
                      <label for="college" class="control-label">选择文件</label>
                    </div>
                    <div class="col-md-9">
                      <div class="form-group">
                        <input type="file" name="file" required/>
                      </div>
                    </div>
                  </div>

                  <div class="control-group">
                    <div class="col-md-8">

                      <a class="btn btn-primary" href="{:U('DownLoad/StImportTpl')}" target="_blank">下载模板</a>
                      <br/> <br/>
                      示例Excel格式. <br/>
                      <table class="am-table am-table-striped am-table-hover table-main">
                        <tr>
                          <th>学号</th>
                          <th>密码</th>
                          <th>姓名</th>
                          <th>性别(1为男2为女)</th>
                        </tr>
                        <tr>
                          <td>2015145245</td>
                          <th>123</th>
                          <th>张东方</th>
                          <th>1</th>
                        </tr>
                      </table>
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