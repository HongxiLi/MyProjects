<include file="Public/header" />
  <div class="page-content">
    <div class="content container">
      <div class="row">
        <div class="col-lg-12">
          <h2 class="page-title">控制中心 <small>>数据列表.</small></h2>
        </div>
      </div>
        <div class="row">
            <div class="col-lg-12">


                <div class="widget">
                    <div class="widget-header"> <i class="icon-table"></i>
                        <h3>检索</h3>
                    </div>
                    <div class="widget-content">
                        <form action="" method="post">
                        <table class="table table-bordered" cellpadding="0" cellspacing="0">
                            <thead>
                                <tr>
                                    <td>课程性质</td>
                                    <td>年级</td>
                                    <td>学年/学期</td>
                                    <td>任课教师</td>

                                    <td>地点</td>
                                </tr>
                            <tr>
                                <td>
                                    <select style="" class="form-control" name="category" id="parent">
                                        <option value="">==Select==</option>
                                        <volist name="list1" id="vo">
                                            <option value="{$vo.id}">{$vo.category_name}</option>
                                        </volist>
                                    </select>
                                </td>
                                <td>
                                    <select style="" class="form-control" name="year" id="year">
                                        <option value="">==Select==</option>
                                        <volist name="list3" id="vo">
                                            <option value="{$vo.id}">{$vo.year}</option>
                                        </volist>
                                    </select>
                                </td>
                                <td>
                                    <select style="" class="form-control" name="semester" id="semester">
                                        <option value="">==Select==</option>
                                        <volist name="list4" id="vo">
                                            <option value="{$vo.id}">{$vo.year}-
                                                <?php
                                                if($vo['sep_half']==0) echo '上学期';else echo '下学期';
                                                ?></option>
                                        </volist>
                                    </select>
                                </td>
                                <td>
                                    <select style="" class="form-control" name="teacher_id" id="teacher_id">
                                        <option value="">==Select==</option>
                                        <volist name="list2" id="vo">
                                            <option value="{$vo.id}">{$vo.username}</option>
                                        </volist>
                                    </select>
                                </td>



                                <td>
                                    <select style="" class="form-control" name="room_id" id="room_id">
                                        <option value="">==Select==</option>
                                        <volist name="list7" id="vo">
                                            <option value="{$vo.id}">{$vo.room_name}</option>
                                        </volist>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">星期
                                    <select style="" class="form-control" name="the_time1" id="the_time1">
                                        <option value="">==Select==</option>
                                        <volist name="list5" id="vo">
                                            <option value="{$vo.id}">{$vo.week_name}</option>
                                        </volist>
                                    </select>
                                </td>
                                <td colspan="2">节数
                                    <select style="" class="form-control" name="the_time2" id="the_time2">
                                        <option value="">==Select==</option>
                                        <volist name="list6" id="vo">
                                            <option value="{$vo.id}">{$vo.item_name}</option>
                                        </volist>
                                    </select>
                                </td>
                                <td colspan="2">
                                    <button style="margin-top: 25px;" class="btn btn-success">搜索</button>

                                </td>
                            </tr>
                            </thead>
                        </table>
                        </form>
                        </div>
                    </div>


                <div class="widget">
                    <div class="widget-header"> <i class="icon-table"></i>
                        <h3>数据列表</h3>
                    </div>
                    <div class="widget-content">

                        <table cellpadding="0" cellspacing="0" border="0" class="display" id="tableData">
                            <thead>
                            <tr>
                                <th>编号</th>
                                <th class="">课程名称</th>
                                <th class="hidden-xs">课程性质</th>
                                <th class="hidden-xs">学分</th>
                                <th>学年/学期</th>
                                <th class="hidden-xs">任课教师</th>
                                <th class="hidden-xs">时间</th>
                                <th class="hidden-xs">地点</th>
                                <th>选课</th>
                                <th class="center">操作</th>
                            </tr>
                            </thead>
                            <tbody>
                            <volist name="list" id="vo">
                                <tr class="gradeX">
                                    <td>{$vo.code}</td>
                                    <td class="">{$vo.course_name}</td>
                                    <td class="">{$vo.cate_field}</td>
                                    <td class="">{$vo.score}</td>
                                    <td>
                                        {$vo.semester_field}
                                    </td>
                                    <td class="">{$vo.teacher_field}</td>                                    <td class="hidden-xs">
                                        {$vo.week_field}-{$vo.time_field}</td>
                                    <td class="hidden-xs">
                                        {$vo.room_field}</td>
                                    <td>
                                        <?php
                                        if(($vo['max_num']-$vo['selection'])<10)
                                        {
                                        ?>
                                            <span style="color: #c00">
                                            <?php echo $vo['selection'];?>
                                            </span>/
                                            <?php echo $vo['max_num'];?>
                                        <?php }else{?>
                                            <span style="color: #0063DC">
                                            <?php echo $vo['selection'];?>
                                            </span>/
                                            <?php echo $vo['max_num'];?>
<?php                                         }?>
                                    </td>

                                    <td class="center">
                                        <?php
                                        if(($vo['max_num']-$vo['selection'])>0)
                                        {
                                        ?>
                                            <a href="{:U('CourseControl/Select?id='.$vo['id'].'')}">
                                                <i class="icon icon-check"></i>
                                            </a>
                                        <?php }?>
                                    </td>
                                </tr>
                            </volist>
                            </tbody>
                            </table>
                        <div class="pagination">
                            <?php echo $page;?>
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


    });

</script>