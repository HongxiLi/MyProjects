<include file="Public/header" />

  <!-- content start -->
  <div class="admin-content">

    <div class="am-cf am-padding">
      <div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">首页</strong> / <small>系统日志</small></div>
    </div>

    <div class="am-g" style="padding: 10px;border: 1px solid #ddd;margin-left: 15px;margin-right: 15px;">
      <div class="am-u-sm-12">
        <div class="am-cf " style="padding-bottom: 10px;">
          <div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">系统日志</strong> / <small>日志数据</small></div>
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


              <form  data-validate="parsley" method="post" novalidate="" class="am-form" id="form" action="{:U('Year/AddYear')}">

                <table cellpadding="0" cellspacing="0" border="0" class="am-table am-table-striped am-table-hover table-main" id="tableData">
                  <thead>
                  <tr>
                    <th>编号</th>
                    <th>事件名称</th>
                    <th>用户</th>
                    <th class="">Controller</th>
                    <th>Method</th>
                    <th class="hidden-xs">时间</th>
                    <th class="center">操作</th>
                  </tr>
                  </thead>
                  <tbody>
                  <volist name="data" id="vo">
                    <tr class="gradeX">
                      <td>{$vo.id}</td>
                      <td class="hidden-xs">
                        <a href="javascript:;" target="_blank">
                          {$vo.event_name}
                        </a>
                      </td>
                      <td class="hidden-xs">
                        <a href="javascript:;" target="_blank">
                          {$vo.user}
                        </a>
                      </td>
                      <td class="hidden-xs">
                        <a href="javascript:;" target="_blank">
                          {$vo.c}
                        </a>
                      </td>
                      <td class="hidden-xs">
                        <a href="javascript:;" target="_blank">
                          {$vo.m}
                        </a>
                      </td>

                      <td class="hidden-xs">
                        {$vo.created|date="Y-m-d H:i",###}</td>
                      <td class="center">
                        <a class="deleteBtn" href="{:U('Log/Delete?id='.$vo['id'].'')}">
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




              </form>

              <hr>
          </div>

        </div>
      </div>
    </div>


  </div>
  <!-- content end -->

</div>
<include file="Public/footer" />