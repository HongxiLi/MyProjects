<include file="Public/header" />

  <!-- content start -->
  <div class="admin-content">

    <div class="am-cf am-padding">
      <div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">首页</strong> / <small>成绩信息</small></div>
    </div>

    <div class="am-g" style="padding: 10px;border: 1px solid #ddd;margin-left: 15px;margin-right: 15px;">
      <div class="am-u-sm-12">
        <div class="am-cf " style="padding-bottom: 10px;">
          <div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">成绩信息</strong> / <small>我的成绩</small></div>
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
<!--                      <h3>--><?php //echo $l['semester_field'];?><!-- 成绩数据</h3>-->
                    </div>
                    <div class="widget-content">

                      <table cellpadding="0" cellspacing="0" border="0" class="am-table am-table-striped am-table-hover table-main" >
                        <thead>
                        <tr>
                          <th>编号</th>
                          <th class="">题目</th>
                          <th class="hidden-xs">题目性质</th>
                          <th class="hidden-xs">权重</th>
                          <th>学年/学期</th>
                          <th class="hidden-xs">指导教师</th>
                          <th class="hidden-xs">指导时间</th>
                          <th class="hidden-xs">指导教室</th>
                          <th>论文</th>
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
                            <td>
                              <?php
                              if(empty($vo['sele']['doc']))
                              {
                              ?>
                                  <span style="color: #c00">没有上传</span>

                                <a href="{:U('CourseControl/Upload')}/?id=<?php echo $vo['sele']['id'];?>">
                                  [上传]
                                </a>

                                  <?php } else{ ?>
                                <a href="/<?php echo $vo['sele']['doc'];?>">
                                  [查看]
                                </a>
                                <a href="{:U('CourseControl/Upload2')}/?id=<?php echo $vo['sele']['id'];?>">
                                  [重新上传]
                                </a>

                                  <?php }?>

                            </td>


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
      var yname = $("#yname").val();
      if(yname=="")
      {
        $("#msg").html("表单不能为空");
        return;
      }
      $("#form").submit();
    });
  });

</script>