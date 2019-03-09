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
          <div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">学生数据</strong> / <small>导入SQL文件</small></div>
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


              <form enctype="multipart/form-data" data-validate="parsley" method="post" novalidate="" class="am-form" id="form" action="{:U('Student/ImportStudent')}">




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
                      示例SQL语句。每句用分号隔开.
                      type字段表示用户类型，1=>学生|2=>教师|3=>管理员
                      <br/> password <br/>
                      md5(C('pwd_salt').$password); 密码是Common/config/config.php中的pwd_salt和真实密码的md5值
                      INSERT INTO c_user(username,password,type)
                      VALUES('student','23261fedd0be3b50006c8c8eeff1505e',1);
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