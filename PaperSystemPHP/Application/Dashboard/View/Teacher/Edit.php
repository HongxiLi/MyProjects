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
          <div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">教师数据</strong> / <small>更新资料</small></div>
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


              <form  data-validate="parsley" method="post" novalidate="" class="am-form" id="form" action="{:U('Teacher/UpdateTeacher')}">




                <fieldset>

                  <div class="control-group">
                    <div class="col-md-3">
                      <label for="college" class="control-label">工号</label>
                    </div>
                    <div class="col-md-9">
                      <div class="form-group">
                        <input style="width:250px;" READONLY type="text" class="col-sm-6 col-xs-12" name="username" id="username" value="{$data[0].username}">
                        <input type="hidden" name="id" value="{$data[0].id}"/>
                      </div>
                    </div>
                  </div>

                  <div class="control-group">
                    <div class="col-md-3">
                      <label for="" class="control-label">姓名</label>
                    </div>
                    <div class="col-md-9">
                      <div class="form-group">
                        <input style="width:250px;" type="text" name="realname" class="col-sm-6 col-xs-12" value="{$data[0].realname}" />
                      </div>
                    </div>
                  </div>
                  <div class="control-group">
                    <div class="col-md-3">
                      <label for="" class="control-label">性别</label>
                    </div>
                    <div class="col-md-9">
                      <div class="form-group">
                        <select style="width:50px;" name="sex" class="form-control" id="">
                          <option <if condition="$data[0]['sex'] eq 1">selected</if> value="1">男</option>
                          <option <if condition="$data[0]['sex'] eq 2">selected</if> value="2">女</option>
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="control-group">
                    <div class="col-md-3">
                      <label for="" class="control-label">职称</label>
                    </div>
                    <div class="col-md-9">
                      <div class="form-group">
                        <select style="width:150px;" name="zc" class="form-control" id="">
                          <option <if condition="'教授' eq $data[0]['zc']">selected</if> value="教授">教授</option>
                          <option <if condition="'副教授' eq $data[0]['zc']">selected</if> value="副教授">副教授</option>
                          <option <if condition="'助教' eq $data[0]['zc']">selected</if> value="助教">助教</option>
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
                        <select style="width:150px;" name="college" class="form-control" id="college">
                          <volist name="data1" id="vo">
                            <option <if condition="$vo['id'] eq $data[0]['college']">selected</if> value="{$vo.id}">{$vo.college_name}</option>
                          </volist>
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

