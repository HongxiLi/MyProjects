<include file="Public/header" />
  <div class="page-content">
    <div class="content container">
      <div class="row">
        <div class="col-lg-12">
          <h2 class="page-title">控制中心 <small>>个人资料更改.</small></h2>
        </div>
      </div>
        <div class="row">
            <div class="col-lg-8">
                <div class="widget">
                    <div class="widget-header"> <i class="icon-user"></i>
                        <h3>个人资料更新</h3>
                    </div>
                    <div class="widget-content">
                        <div class="body">
                            <form data-validate="parsley" method="post" novalidate="" class="form-horizontal label-left" id="user-form" action="{:U('User/updateProfile')}">

                                <fieldset>
                                    <div class="control-group">
                                        <div class="col-md-3">
                                            <label for="prefix" class="control-label">账号</label>
                                        </div>
                                        <div class="col-md-9">
                                            <div class="form-group">
                                                <input type="text" class="col-sm-6 col-xs-12" name="prefix" id="prefix" readonly value="{$vo.username}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <div class="col-md-3">
                                            <label for="realname" class="control-label">真实姓名 </label>
                                        </div>
                                        <div class="col-md-9">
                                            <div class="form-group">
                                                <input type="text" value="{$vo.realname}" class="col-xs-12 parsley-validated" required="" name="realname" id="realname">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <div class="col-md-3">
                                            <label for="sex" class="control-label">性别 </label>
                                        </div>
                                        <div class="col-md-9">
                                            <div class="form-group">
                                                <select name="sex" id="sex" class="form-control">
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
                                                <input type="email" value="{$vo.email}" name="email" class="col-xs-12" id="email">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <div class="col-md-3">
                                            <label class="control-label">电话</label>
                                        </div>
                                        <div class="col-md-9">
                                            <div class="form-group">
                                                <input type="text" value="{$vo.tel}" name="tel" class="col-xs-12" id="tel">
                                            </div>
                                        </div>
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
