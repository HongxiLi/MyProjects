<include file="Public/header" />

  <!-- content start -->
  <div class="admin-content">

    <div class="am-cf am-padding">
      <div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">首页</strong> / <small>毕设题目/成绩数据</small></div>
    </div>

    <div class="am-g" style="padding: 10px;border: 1px solid #ddd;margin-left: 15px;margin-right: 15px;">
      <div class="am-u-sm-12">
        <div class="am-cf " style="padding-bottom: 10px;">
          <div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">毕设题目</strong> / <small>更新</small></div>
        </div>
        <div class="am-g">
          <div class="am-u-md-6 am-cf">
            <div class="am-fl am-cf">
              <div class="am-btn-toolbar am-fl">
                <div class="am-btn-group am-btn-group-xs">
                  <button onclick=javascript:window.location.href="{:U('CT/CR173')}"; type="button" class="am-btn am-btn-default"><span class="am-icon-bug"></span> 返回</button>
                </div>


              </div>
            </div>
          </div>

        </div>
        <div class="am-g">
          <div class="am-u-sm-12">


              <form  data-validate="parsley" method="post" novalidate="" class="am-form" id="form" action="{:U('Course/UpdateCourse')}">


                <fieldset>

                  <div class="control-group">
                    <div class="col-md-3">
                      <label for="" class="control-label">题目</label>
                    </div>
                    <div class="col-md-9">
                      <div class="form-group">
                        <input style="width: 250px;" type="text" class="col-sm-6 col-xs-12" value="{$data.course_name}" name="course_name" id="title">
                        <input type="hidden" name="id" value="{$data.id}"/>
                      </div>
                    </div>
                  </div>
                  <div class="control-group">
                    <div class="col-md-3">
                      <label for="" class="control-label">题目编号</label>
                    </div>
                    <div class="col-md-9">
                      <div class="form-group">
                        <input style="width: 250px;" type="text"  name="code"  value="{$data.code}" id="code"/>
                      </div>
                    </div>
                  </div>
                  <div class="control-group">
                    <div class="col-md-3">
                      <label for="" class="control-label">题目性质</label>
                    </div>
                    <div class="col-md-9">
                      <div class="form-group">
                        <select style="width: 150px;" class="form-control" name="category" id="parent">
                          <volist name="list" id="vo">
                            <option <if condition="$vo.id eq $data['category']">selected</if> value="{$vo.id}">{$vo.category_name}</option>
                          </volist>
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="control-group">
                    <div class="col-md-3">
                      <label for="" class="control-label">权重</label>
                    </div>
                    <div class="col-md-9">
                      <div class="form-group">
                        <input style="width: 50px;" type="text" value="{$data.score}"  name="score" id="score"/>
                      </div>
                    </div>
                  </div>
                  <div class="control-group">
                    <div class="col-md-3">
                      <label for="" class="control-label">小组成员数限制</label>
                    </div>
                    <div class="col-md-9">
                      <div class="form-group">
                        <input style="width: 50px;" type="text" value="{$data.max_num}"   name="max_num" id="max_num"/>
                      </div>
                    </div>
                  </div>
                  <div class="control-group">
                    <div class="col-md-3">
                      <label for="" class="control-label">指导教师</label>
                    </div>
                    <div class="col-md-9">
                      <div class="form-group">
                        <select style="width: 150px;" class="form-control" name="teacher_id" id="teacher_id">
                          <volist name="list2" id="vo">
                            <option <if condition="$vo.id eq $data['teacher_id']">selected</if> value="{$vo.id}">{$vo.username}</option>
                          </volist>
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
                        <select style="width: 150px;" class="form-control" name="year" id="year">
                          <volist name="list3" id="vo">
                            <option <if condition="$vo.id eq $data['year']">selected</if> value="{$vo.id}">{$vo.year}</option>
                          </volist>
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="control-group">
                    <div class="col-md-3">
                      <label for="" class="control-label">学期</label>
                    </div>
                    <div class="col-md-9">
                      <div class="form-group">
                        <select style="width: 150px;" class="form-control" name="semester" id="semester">
                          <volist name="list4" id="vo">
                            <option <if condition="$vo.id eq $data['semester']">selected</if> value="{$vo.id}">{$vo.year}-
                            <?php
                            if($vo['sep_half']==0) echo '上学期';else echo '下学期';
                            ?></option>
                          </volist>
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="control-group">
                    <div class="col-md-3">
                      <label for="" class="control-label">指导时间</label>
                    </div>
                    <div class="col-md-9">
                      <div class="form-group">
                        <select style="width: 150px;" class="form-control" name="the_time1" id="the_time1">
                          <volist name="list5" id="vo">
                            <option <if condition="$vo.id eq $data['the_time1']">selected</if> value="{$vo.id}">{$vo.week_name}</option>
                          </volist>
                        </select>

                        <select style="width: 150px;" class="form-control" name="the_time2" id="the_time2">
                          <volist name="list6" id="vo">
                            <option <if condition="$vo.id eq $data['the_time2']">selected</if> value="{$vo.id}">{$vo.item_name}</option>
                          </volist>
                        </select>
                      </div>
                    </div>
                  </div>

                  <div class="control-group">
                    <div class="col-md-3">
                      <label for="" class="control-label">指导教室</label>
                    </div>
                    <div class="col-md-9">
                      <div class="form-group">
                        <select style="width: 150px;" class="form-control" name="room_id" id="room_id">
                          <volist name="list7" id="vo">
                            <option <if condition="$vo.id eq $data['room_id']">selected</if> value="{$vo.id}">{$vo.room_name}</option>
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
<script>

  $(document).ready(function(){

    $("#postBtn").click(function(e){
      e.preventDefault();
      $("#form").submit();
    });
  });

</script>