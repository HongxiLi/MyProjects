<include file="Public/header" />

  <!-- content start -->
  <div class="admin-content">

    <div class="am-cf am-padding">
      <div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">首页</strong> / <small>个人资料</small></div>
    </div>

    <div class="am-g" style="padding: 10px;border: 1px solid #ddd;margin-left: 15px;margin-right: 15px;">
      <div class="am-u-sm-12">
        <div class="am-cf " style="padding-bottom: 10px;">
          <div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">登录用户</strong> / <small>资料更新</small></div>
        </div>
        <div class="am-g">
          <div class="am-u-md-6 am-cf">
            <div class="am-fl am-cf">
              <div class="am-btn-toolbar am-fl">
                <div class="am-btn-group am-btn-group-xs">
                  <button onclick=javascript:window.location.href="{:U('Index/Index')}"; type="button" class="am-btn am-btn-default"><span class="am-icon-bug"></span> 返回</button>
                </div>


              </div>
            </div>
          </div>

        </div>
        <div class="am-g">
          <div class="am-u-sm-12">


              <form  data-validate="parsley" method="post" novalidate="" class="am-form" id="form" action="{:U('User/updateProfile')}">


                <fieldset>
                  <div class="control-group">
                    <div class="col-md-3">
                      <label for="prefix" class="control-label">账号</label>
                    </div>
                    <div class="col-md-9">
                      <div class="form-group">
                        <input style="width: 250px;" type="text" class="col-sm-6 col-xs-12" name="prefix" id="prefix" readonly value="{$vo.username}">
                      </div>
                    </div>
                  </div>
                  <div class="control-group">
                    <div class="col-md-3">
                      <label for="realname" class="control-label">真实姓名 </label>
                    </div>
                    <div class="col-md-9">
                      <div class="form-group">
                        <input style="width: 250px;" type="text" value="{$vo.realname}" class="col-xs-12 parsley-validated" required="" name="realname" id="realname">
                      </div>
                    </div>
                  </div>
                  <div class="control-group">
                    <div class="col-md-3">
                      <label for="sex" class="control-label">性别 </label>
                    </div>
                    <div class="col-md-9">
                      <div class="form-group">
                        <select style="width: 50px;" name="sex" id="sex" class="form-control">
                          <option <if condition="($vo.sex eq 1)"> selected </if> value="1">男</option>
                          <option <if condition="($vo.sex eq 2)"> selected </if> value="2">女</option>
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="control-group">
                    <div class="col-md-3">
                      <label class="control-label" for="email">邮箱</label>
                    </div>
                    <div class="col-md-9">
                      <div class="form-group">
                        <input style="width: 250px;" type="email" value="{$vo.email}" name="email" class="col-xs-12" id="email">
                      </div>
                    </div>
                  </div>
                  <div class="control-group">
                    <div class="col-md-3">
                      <label class="control-label">电话</label>
                    </div>
                    <div class="col-md-9">
                      <div class="form-group">
                        <input style="width: 250px;" type="text" value="{$vo.tel}" name="tel" class="col-xs-12" id="tel">
                      </div>
                    </div>
                  </div>
                </fieldset>


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