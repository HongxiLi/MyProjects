<include file="Public/header" />
  <div class="page-content">
    <div class="content container">
      <div class="row">
        <div class="col-lg-12">
          <h2 class="page-title">控制中心 <small>>编辑数据.</small></h2>
        </div>
      </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="widget">
                    <div class="widget-header"> <i class="icon-plus"></i>
                        <h3>编辑数据</h3>
                    </div>
                    <div class="widget-content">
                        <div class="body">
                            <form data-validate="parsley" method="post" novalidate="" class="form-horizontal label-left" id="form" action="{:U('Course/UpdateCourse')}" enctype="multipart/form-data">
                                <fieldset>

                                    <div class="control-group">
                                        <div class="col-md-3">
                                            <label for="" class="control-label">课程名称</label>
                                        </div>
                                        <div class="col-md-9">
                                            <div class="form-group">
                                                <input type="text" class="col-sm-6 col-xs-12" value="{$data.course_name}" name="course_name" id="title">
                                                <input type="hidden" name="id" value="{$data.id}"/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <div class="col-md-3">
                                            <label for="" class="control-label">课程编号</label>
                                        </div>
                                        <div class="col-md-9">
                                            <div class="form-group">
                                                <input type="text"  name="code"  value="{$data.code}" id="code"/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <div class="col-md-3">
                                            <label for="" class="control-label">课程性质</label>
                                        </div>
                                        <div class="col-md-9">
                                            <div class="form-group">
                                                <select style="width: 45%;" class="form-control" name="category" id="parent">
                                                    <volist name="list" id="vo">
                                                        <option <if condition="$vo.id eq $data['category']">selected</if> value="{$vo.id}">{$vo.category_name}</option>
                                                        </volist>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <div class="col-md-3">
                                            <label for="" class="control-label">学分</label>
                                        </div>
                                        <div class="col-md-9">
                                            <div class="form-group">
                                                <input type="text" value="{$data.score}"  name="score" id="score"/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <div class="col-md-3">
                                            <label for="" class="control-label">容量（人）</label>
                                        </div>
                                        <div class="col-md-9">
                                            <div class="form-group">
                                                <input type="text" value="{$data.max_num}"   name="max_num" id="max_num"/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <div class="col-md-3">
                                            <label for="" class="control-label">任课教师</label>
                                        </div>
                                        <div class="col-md-9">
                                            <div class="form-group">
                                                <select style="width: 45%;" class="form-control" name="teacher_id" id="teacher_id">
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
                                                <select style="width: 45%;" class="form-control" name="year" id="year">
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
                                                <select style="width: 45%;" class="form-control" name="semester" id="semester">
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
                                            <label for="" class="control-label">上课时间</label>
                                        </div>
                                        <div class="col-md-9">
                                            <div class="form-group">
                                                <select style="width: 45%;" class="form-control" name="the_time1" id="the_time1">
                                                    <volist name="list5" id="vo">
                                                        <option <if condition="$vo.id eq $data['the_time1']">selected</if> value="{$vo.id}">{$vo.week_name}</option>
                                                    </volist>
                                                </select>

                                                <select style="width: 45%;" class="form-control" name="the_time2" id="the_time2">
                                                    <volist name="list6" id="vo">
                                                        <option <if condition="$vo.id eq $data['the_time2']">selected</if> value="{$vo.id}">{$vo.item_name}</option>
                                                    </volist>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="control-group">
                                        <div class="col-md-3">
                                            <label for="" class="control-label">上课教室</label>
                                        </div>
                                        <div class="col-md-9">
                                            <div class="form-group">
                                                <select style="width: 45%;" class="form-control" name="room_id" id="room_id">
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
                                <div class="form-actions">
                                    <button id="postBtn" class="btn btn-primary" type="submit">提交</button>
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
<script>

    $(document).ready(function(){



        $("#nav>li").removeClass("current");
        $("#nav>li#menu_0").addClass("current");

        $("#postBtn").click(function(e){
            e.preventDefault();
            $("#form").submit();
        });
    });

</script>
