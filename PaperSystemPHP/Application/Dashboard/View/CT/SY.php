<include file="Public/header" />

  <!-- content start -->
  <div class="admin-content">

    <div class="am-cf am-padding">
      <div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">首页</strong> / <small>年级/学期</small></div>
    </div>

    <div class="am-g" style="padding: 10px;border: 1px solid #ddd;margin-left: 15px;margin-right: 15px;">
      <div class="am-u-sm-12">
        <div class="am-cf " style="padding-bottom: 10px;">
          <div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">年级数据</strong> / <small>表格</small></div>
        </div>
        <div class="am-g">
          <div class="am-u-md-6 am-cf">
            <div class="am-fl am-cf">
              <div class="am-btn-toolbar am-fl">
                <div class="am-btn-group am-btn-group-xs">
                  <button onclick=javascript:window.location.href="{:U('Year/Add')}"; type="button" class="am-btn am-btn-default"><span class="am-icon-plus"></span> 新增</button>
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
                  <th class="">年级名称</th>
                  <th class="hidden-xs">添加时间</th>
                  <th class="center">操作</th>
                </tr>
                </thead>
                <tbody>
                <volist name="list" id="vo">
                  <tr class="gradeX">
                    <td>{$vo.id}</td>
                    <td class="hidden-xs">
                      <a href="javascript:;" target="_blank">
                        {$vo.year}
                      </a>
                    </td>

                    <td class="hidden-xs">
                      {$vo.created|date="Y-m-d H:i",###}</td>
                    <td class="center">
                      <a href="{:U('Year/Edit?id='.$vo['id'].'')}">
                        <span class="am-icon-pencil-square-o"></span>
                      </a>

                      |
                      <a class="deleteBtn" href="{:U('Year/Delete?id='.$vo['id'].'')}">
                        <span class="am-icon-trash-o"></span>
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



    <div class="am-g" style="padding: 10px;border: 1px solid #ddd;margin-left: 15px;margin-right: 15px;">
      <div class="am-u-sm-12">
        <div class="am-cf " style="padding-bottom: 10px;">
          <div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">学期数据</strong> / <small>表格</small></div>
        </div>
        <div class="am-g">
          <div class="am-u-md-6 am-cf">
            <div class="am-fl am-cf">
              <div class="am-btn-toolbar am-fl">
                <div class="am-btn-group am-btn-group-xs">
                  <button onclick=javascript:window.location.href="{:U('Semester/Add')}"; type="button" class="am-btn am-btn-default"><span class="am-icon-plus"></span> 新增</button>
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
                  <th class="">学年名称</th>
                  <th>学期</th>
                  <th class="hidden-xs">添加时间</th>
                  <th class="center">操作</th>
                </tr>
                </thead>
                <tbody>
                <volist name="list2" id="vo">
                  <tr class="gradeX">
                    <td>{$vo.id}</td>
                    <td class="hidden-xs">
                      <a href="javascript:;" target="_blank">
                        {$vo.year}
                      </a>
                    </td>
                    <td class="hidden-xs">
                      <a href="javascript:;" target="_blank">
                        {$vo.sep}
                      </a>
                    </td>


                    <td class="hidden-xs">
                      {$vo.created|date="Y-m-d H:i",###}</td>
                    <td class="center">
                      <a href="{:U('Semester/Edit?id='.$vo['id'].'')}">
                        <span class="am-icon-pencil-square-o"></span>
                      </a>

                      |
                      <a class="deleteBtn" href="{:U('Semester/Delete?id='.$vo['id'].'')}">
                        <span class="am-icon-trash-o"></span>
                      </a>
                    </td>
                  </tr>
                </volist>
                </tbody>
              </table>

              <div class="pagination">
                <?php echo $page2;?>
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