<include file="Public/header" />

  <!-- content start -->
  <div class="admin-content">

    <div class="am-cf am-padding">
      <div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">首页</strong> / <small>毕设题目/成绩数据</small></div>
    </div>

    <div class="am-g" style="padding: 10px;border: 1px solid #ddd;margin-left: 15px;margin-right: 15px;">
      <div class="am-u-sm-12">
        <div class="am-cf " style="padding-bottom: 10px;">
          <div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">毕设题目</strong> / <small>添加</small></div>
        </div>
        <div class="am-g">
          <div class="am-u-md-6 am-cf">
            <div class="am-fl am-cf">
              <div class="am-btn-toolbar am-fl">
                <div class="am-btn-group am-btn-group-xs">
                  <button onclick=javascript:window.location.href="{:U('CT/TM')}"; type="button" class="am-btn am-btn-default"><span class="am-icon-bug"></span> 返回</button>
                </div>


              </div>
            </div>
          </div>

        </div>
        <div class="am-g">
          <div class="am-u-sm-12">


              <form  data-validate="parsley" method="post" novalidate="" class="am-form" id="form" action="{:U('Course/AddCourse')}">


                <fieldset>

                  <div class="control-group">
                    <div class="col-md-3">
                      <label for="" class="control-label">题目名称</label>
                    </div>
                    <div class="col-md-9">
                      <div class="form-group">
                        <input style="width: 250px" type="text" class="col-sm-6 col-xs-12" name="course_name" id="title">
                      </div>
                    </div>
                  </div>
                  <div class="control-group">
                    <div class="col-md-3">
                      <label for="" class="control-label">题目编号</label>
                    </div>
                    <div class="col-md-9">
                      <div class="form-group">
                        <input style="width: 150px" type="text"  name="code" id="thumb"/>
                      </div>
                    </div>
                  </div>
                  <div class="control-group">
                    <div class="col-md-3">
                      <label for="" class="control-label">起止周</label>
                    </div>
                    <div class="col-md-9">
                      <div class="form-group">
                        <select name="start" style="width:150px;" class="form-control" id="">
                          <option value="第一周">第一周</option>
                          <option value="第二周">第二周</option>
                          <option value="第三周">第三周</option>
                          <option value="第四周">第四周</option>
                          <option value="第五周">第五周</option>
                          <option value="第六周">第六周</option>
                          <option value="第七周">第七周</option>
                          <option value="第八周">第八周</option>
                          <option value="第九周">第九周</option>
                          <option value="第十周">第十周</option>
                          <option value="第十一周">第十一周</option>
                          <option value="第十二周">第十二周</option>
                          <option value="第十三周">第十三周</option>
                          <option value="第十四周">第十四周</option>
                          <option value="第十五周">第十五周</option>
                          <option value="第十六周">第十六周</option>
                          <option value="第十七周">第十七周</option>
                        </select>

                        <select style="width:150px;" class="form-control" name="end" id="">
                          <option value="第一周">第一周</option>
                          <option value="第二周">第二周</option>
                          <option value="第三周">第三周</option>
                          <option value="第四周">第四周</option>
                          <option value="第五周">第五周</option>
                          <option value="第六周">第六周</option>
                          <option value="第七周">第七周</option>
                          <option value="第八周">第八周</option>
                          <option value="第九周">第九周</option>
                          <option value="第十周">第十周</option>
                          <option value="第十一周">第十一周</option>
                          <option value="第十二周">第十二周</option>
                          <option value="第十三周">第十三周</option>
                          <option value="第十四周">第十四周</option>
                          <option value="第十五周">第十五周</option>
                          <option value="第十六周">第十六周</option>
                          <option value="第十七周">第十七周</option>
                        </select>
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
                            <option value="{$vo.id}">{$vo.category_name}</option>
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
                        <input style="width: 50px" type="text"  name="score" id="score"/>
                      </div>
                    </div>
                  </div>
                  <div class="control-group">
                    <div class="col-md-3">
                      <label for="" class="control-label">容量（人）</label>
                    </div>
                    <div class="col-md-9">
                      <div class="form-group">
                        <input style="width: 50px" type="text"  name="max_num" id="max_num"/>
                      </div>
                    </div>
                  </div>
                  <div class="control-group">
                    <div class="col-md-3">
                      <label for="" class="control-label">指导教师</label>
                    </div>
                    <div class="col-md-9">
                      <div class="form-group">
                        <!--<select disabled style="width: 45%;" class="form-control" name="teacher_id" id="teacher_id">
                                                    <volist name="list2" id="vo" >
                                                        <option <?php
                        if(session('admin_user')[0]['id']==$vo['id']) echo 'selected';
                        ?> value="{$vo.id}">{$vo.username}</option>
                                                    </volist>
                                                </select>-->
                        <input style="width: 100px" type="text" readonly value="<?php echo session('admin_user')[0]['username'];?>"/>
                        <input type="hidden" name="teacher_id" value="<?php echo session('admin_user')[0]['id'];?>"/>
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
                            <option value="{$vo.id}">{$vo.year}</option>
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
                            <option value="{$vo.id}">{$vo.year}-
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
                            <option value="{$vo.id}">{$vo.week_name}</option>
                          </volist>
                        </select>

                        <select style="width: 150px;" class="form-control" name="the_time2" id="the_time2">
                          <volist name="list6" id="vo">
                            <option value="{$vo.id}">{$vo.item_name}</option>
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
                            <option value="{$vo.id}">{$vo.room_name}</option>
                          </volist>
                        </select>
                      </div>
                    </div>
                  </div>

                  <div class="control-group">

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

  $(document).ready(function(){

    $("#postBtn").click(function(e){
      e.preventDefault();
      $("#form").submit();
    });
  });

</script>