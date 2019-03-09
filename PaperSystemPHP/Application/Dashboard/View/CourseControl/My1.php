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
<style type="text/css">
.table#myCourse tr td.bold,.table#myCourse tr th{font-weight:bold;font-size:16px;}
</style>

<?php
if(!empty($list1))
{
    foreach($list1 as $i=>$l)
    {
        ?>
        <div class="widget">
            <div class="widget-header"> <i class="icon-table"></i>
                <h3><?php echo $l[0]['semester'];?> 课程表</h3>
            </div>
            <div class="widget-content">

                <table id="myCourse" cellpadding="0" cellspacing="0" border="0" class="table table-bordered">
                    <thead>
                    <tr>
                        <th style="font-size:17px;">星期\时间</th>
                        <th class="">第一大节（8:00-9:45）</th>
                        <th class="hidden-xs">第二大节（10:00-12:00）</th>
                        <th class="hidden-xs">第三大节（14:00-15:45）</th>
                        <th>第四大节（16:00-17:00）</th>
                        <th class="hidden-xs">第五大节（19:00-21:00）</th>                    
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    foreach($l[1] as $m=>$vo){
                    ?>
                        <tr class="gradeX">
                            <td class="bold"><?php echo $vo[0]['week_name'];?></td>
                            <td class=""><?php if($vo[1][0]){ echo $vo[1][0]['teacher'].'-'.$vo[1][0]['course_name'].'['.$vo[1][0]['room_field'].']'.'<br>（'.$vo[1][0]['start'].'-'.$vo[1][0]['ehd'].'）';}else{ echo '--';}?></td>
                            <td class=""><?php if($vo[1][1]){ echo $vo[1][1]['teacher'].'-'.$vo[1][1]['course_name'].'['.$vo[1][1]['room_field'].']'.'<br>（'.$vo[1][1]['start'].'-'.$vo[1][1]['ehd'].'）';}else{ echo '--';}?></td>
                            <td class=""><?php if($vo[1][2]){ echo $vo[1][2]['teacher'].'-'.$vo[1][2]['course_name'].'['.$vo[1][2]['room_field'].']'.'<br>（'.$vo[1][2]['start'].'-'.$vo[1][2]['ehd'].'）';}else{ echo '--';}?></td>
                            <td>
                                <?php if($vo[1][3]){ echo $vo[1][3]['teacher'].'-'.$vo[1][3]['course_name'].'['.$vo[1][3]['room_field'].']'.'<br>（'.$vo[1][3]['start'].'-'.$vo[1][3]['ehd'].'）';}else{ echo '--';}?>
                            </td>
                            <td class="">
							<?php if($vo[1][4]){ echo $vo[1][4]['teacher'].'-'.$vo[1][4]['course_name'].'['.$vo[1][4]['room_field'].']'.'<br>（'.$vo[1][4]['start'].'-'.$vo[1][4]['ehd'].'）';}else{ echo '--';}?>
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
        $("#nav>li#menu_0").addClass("current");


    });

</script>

<script>    
        $(".left-nav").fadeOut();
</script>