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


<?php
if(!empty($list1))
{
    foreach($list1 as $i=>$l)
    {
        if(empty($l['SeleData'])) continue;
        ?>
        <div class="widget">
            <div class="widget-header"> <i class="icon-table"></i>
                <h3><?php echo $l['semester_field'];?> 成绩数据</h3>
            </div>
            <div class="widget-content">

                <table cellpadding="0" cellspacing="0" border="0" class="display" >
                    <thead>
                    <tr>
                        <th>编号</th>
                        <th class="">课程名称</th>
                        <th class="hidden-xs">课程性质</th>
                        <th class="hidden-xs">学分</th>
                        <th>学年/学期</th>
                        <th class="hidden-xs">任课教师</th>
                        <th class="hidden-xs">时间</th>
                        <th class="hidden-xs">教室</th>
                        <th class="center">成绩</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    foreach($l['SeleData'] as $m=>$vo){
                    ?>
                        <tr class="gradeX">
                            <td><?php echo $m+1;?></td>
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


                            <td class="center">
{$vo.score_plus}
                              
                            </td>
                        </tr>
                    <?php }?>
                    </tbody>
                </table>
                <div class="pagination">
                    <?php echo $page;?>
                </div>

            </div>
        </div>


    <?php }
}
?>



            </div>
        </div>

    </div>
  </div>
</div>
<include file="Public/footer" />
<script>

    $(document).ready(function(){

        $("#nav>li").removeClass("current");
        $("#nav>li#menu_2").addClass("current");


    });

</script>