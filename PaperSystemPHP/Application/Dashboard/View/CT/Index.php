<include file="Public/header" />

  <!-- content start -->
  <div class="admin-content">

    <div class="am-cf am-padding">
      <div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">首页</strong> / <small>学院/专业/班级</small></div>
    </div>

    <div class="am-g" style="padding: 10px;border: 1px solid #ddd;margin-left: 15px;margin-right: 15px;">
      <div class="am-u-sm-12">
        <div class="am-cf " style="padding-bottom: 10px;">
          <div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">学院数据</strong> / <small>表格</small></div>
        </div>
        <div class="am-g">
          <div class="am-u-md-6 am-cf">
            <div class="am-fl am-cf">
              <div class="am-btn-toolbar am-fl">
                <div class="am-btn-group am-btn-group-xs">
                  <button onclick=javascript:window.location.href="{:U('College/Add')}"; type="button" class="am-btn am-btn-default"><span class="am-icon-plus"></span> 新增</button>
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
                  <th class="">学院名称</th>
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
                        {$vo.college_name}
                      </a>
                    </td>

                    <td class="hidden-xs">
                      {$vo.created|date="Y-m-d H:i",###}</td>
                    <td class="center">
                      <a href="{:U('College/Edit?id='.$vo['id'].'')}">
                        <span class="am-icon-pencil-square-o"></span>
                      </a>

                      |
                      <a class="deleteBtn" href="{:U('College/Delete?id='.$vo['id'].'')}">
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
          <div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">专业数据</strong> / <small>表格</small></div>
        </div>
        <div class="am-g">
          <div class="am-u-md-6 am-cf">
            <div class="am-fl am-cf">
              <div class="am-btn-toolbar am-fl">
                <div class="am-btn-group am-btn-group-xs">
                  <button onclick=javascript:window.location.href="{:U('Major/Add')}"; type="button" class="am-btn am-btn-default"><span class="am-icon-plus"></span> 新增</button>
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
                  <th>专业名称</th>
                  <th class="">学院名称</th>
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
                        {$vo.major_name}
                      </a>
                    </td>
                    <td class="hidden-xs">
                      <a href="javascript:;" target="_blank">
                        {$vo.col}
                      </a>
                    </td>

                    <td class="hidden-xs">
                      {$vo.created|date="Y-m-d H:i",###}</td>
                    <td class="center">
                      <a href="{:U('Major/Edit?id='.$vo['id'].'')}">
                        <span class="am-icon-pencil-square-o"></span>
                      </a>

                      |
                      <a class="deleteBtn" href="{:U('Major/Delete?id='.$vo['id'].'')}">
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



    <div class="am-g" style="padding: 10px;border: 1px solid #ddd;margin-left: 15px;margin-right: 15px;">
      <div class="am-u-sm-12">
        <div class="am-cf " style="padding-bottom: 10px;">
          <div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">班级数据</strong> / <small>表格</small></div>
        </div>
        <div class="am-g">
          <div class="am-u-md-6 am-cf">
            <div class="am-fl am-cf">
              <div class="am-btn-toolbar am-fl">
                <div class="am-btn-group am-btn-group-xs">
                  <button onclick=javascript:window.location.href="{:U('Class/Add')}"; type="button" class="am-btn am-btn-default"><span class="am-icon-plus"></span> 新增</button>
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
                  <th>班级名称</th>
                  <th>专业名称</th>
                  <th class="">学院名称</th>
                  <th class="hidden-xs">添加时间</th>
                  <th class="center">操作</th>
                </tr>
                </thead>
                <tbody>
                <volist name="list3" id="vo">
                  <tr class="gradeX">
                    <td>{$vo.id}</td>
                    <td class="hidden-xs">
                      <a href="javascript:;" target="_blank">
                        {$vo.class_name}
                      </a>
                    </td>
                    <td class="hidden-xs">
                      <a href="javascript:;" target="_blank">
                        {$vo.maj}
                      </a>
                    </td>
                    <td class="hidden-xs">
                      <a href="javascript:;" target="_blank">
                        {$vo.col}
                      </a>
                    </td>

                    <td class="hidden-xs">
                      {$vo.created|date="Y-m-d H:i",###}</td>
                    <td class="center">
                      <a href="{:U('Class/Edit?id='.$vo['id'].'')}">
                        <span class="am-icon-pencil-square-o"></span>
                      </a>

                      |
                      <a class="deleteBtn" href="{:U('Class/Delete?id='.$vo['id'].'')}">
                        <span class="am-icon-trash-o"></span>
                      </a>
                    </td>
                  </tr>
                </volist>
                </tbody>
              </table>

              <div class="pagination">
                <?php echo $page3;?>
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