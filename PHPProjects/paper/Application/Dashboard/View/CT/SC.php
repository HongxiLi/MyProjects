<include file="Public/header" />

  <!-- content start -->
  <div class="admin-content">

    <div class="am-cf am-padding">
      <div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">首页</strong> / <small>成绩数据</small></div>
    </div>

    <div class="am-g" style="padding: 10px;border: 1px solid #ddd;margin-left: 15px;margin-right: 15px;">
      <div class="am-u-sm-12">
        <div class="am-cf " style="padding-bottom: 10px;">
          <div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">成绩数据</strong> / <small>表格</small></div>
        </div>
        <div class="am-g">
          <div class="am-u-md-6 am-cf">
            <div class="am-fl am-cf">
              <div class="am-btn-toolbar am-fl">
                <div class="am-btn-group am-btn-group-xs">
                  <button onclick=javascript:window.location.href="{:U('Score/Add')}"; type="button" class="am-btn am-btn-default"><span class="am-icon-plus"></span> 成绩录入</button>
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
                  <th class="hidden-xs">权重</th>
                  <th>学年/学期</th>
                  <th class="center">操作</th>
                </tr>
                </thead>
                <tbody>
                <volist name="list" id="vo">
                  <tr class="gradeX">
                    <td>{$vo.code}</td>
                    <td class="">{$vo.course_name}</td>
                    <td class="">{$vo.score}</td>
                    <td>
                      {$vo.semester_field}
                    </td>



                    <td class="center">
                      <a href="{:U('Score/ScoreList?id='.$vo['id'].'')}">
                        [ <i class="icon icon-list"></i>  成绩数据]
                      </a>


                      <a href="{:U('Score/Export?id='.$vo['id'].'')}">
                        [ <i class="icon icon-arrow-right"></i>  成绩导出]
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