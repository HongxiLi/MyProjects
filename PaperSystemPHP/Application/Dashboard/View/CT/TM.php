<include file="Public/header" />

  <!-- content start -->
  <div class="admin-content">

    <div class="am-cf am-padding">
      <div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">首页</strong> / <small>毕设题目</small></div>
    </div>

    <div class="am-g" style="padding: 10px;border: 1px solid #ddd;margin-left: 15px;margin-right: 15px;">
      <div class="am-u-sm-12">
        <div class="am-cf " style="padding-bottom: 10px;">
          <div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">毕设题目</strong> / <small>表格</small></div>
        </div>
        <div class="am-g">
          <div class="am-u-md-6 am-cf">
            <div class="am-fl am-cf">
              <div class="am-btn-toolbar am-fl">
                <div class="am-btn-group am-btn-group-xs">
                  <button onclick=javascript:window.location.href="{:U('Course/Add')}"; type="button" class="am-btn am-btn-default"><span class="am-icon-plus"></span> 新增</button>
                </div>


              </div>
            </div>
          </div>

        </div>
        <div class="am-g">
          <div class="am-u-sm-12">
            <form class="am-form">



              <table cellpadding="0" cellspacing="0" border="0" class="am-table am-table-striped am-table-hover table-main" id="tableData">
                <thead>
                <tr>
                  <th>编号</th>
                  <th class="">题目</th>
                  <th class="hidden-xs">性质</th>
                  <th class="hidden-xs">权重</th>
                  <th>学年/学期</th>
                  <th class="hidden-xs">指导教师</th>
                  <th class="hidden-xs">指导时间</th>
                  <th class="hidden-xs">指导地点</th>
                  <th>组员</th>
                  <th>小组信息/成绩</th>
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

                    <td>
                      <?php
                      if(($vo['selection'])>0)
                      {
                        ?>
                        [<a href="{:U('Course/Selected?id='.$vo['id'].'')}">
                        小组成员]
                      </a>
                        |
                      <?php }?>
                      <a href="{:U('Score/ScoreList?id='.$vo['id'].'')}">
                        [ <i class="icon icon-list"></i>  成绩数据]
                      </a>

                      | <a href="{:U('Score/Export?id='.$vo['id'].'')}">
                        [ <i class="icon icon-arrow-right"></i>  成绩导出]
                      </a>

                    </td>

                    <td class="center">
                      <a href="{:U('Course/Edit?id='.$vo['id'].'')}">
                        <span class="am-icon-pencil-square-o"></span>
                      </a>
                      |





                      <a class="deleteBtn" href="{:U('Course/Delete?id='.$vo['id'].'')}">
                        <i class="am-icon-trash-o"></i>
                      </a>
                    </td>
                  </tr>
                </volist>
                </tbody>
              </table>
              <div class="pagination">
                <?php echo $page;?>
              </div>




              <hr>

            </form>
          </div>

        </div>
      </div>
    </div>










  </div>
  <!-- content end -->

</div>
<include file="Public/footer" />