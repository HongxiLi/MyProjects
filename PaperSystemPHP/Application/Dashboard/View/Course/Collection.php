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
                                        <a href="{:U('Course/Edit?id='.$vo['id'].'')}">
                                            <i class="icon-edit"></i>
                                        </a>
                                        |
                                        <?php
                                        if(($vo['selection'])>0)
                                        {
                                        ?>
                                        <a href="{:U('Course/Selected?id='.$vo['id'].'')}">
                                            <i class="icon-info"></i>
                                        </a>
                                        |
                                        <?php }?>
                                        <a class="deleteBtn" href="{:U('Course/Delete?id='.$vo['id'].'')}">
                                            <i class="icon-trash"></i>
                                        </a>
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