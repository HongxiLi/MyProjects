<include file="Public/header" />

  <!-- content start -->
  <div class="admin-content">

    <div class="am-cf am-padding">
      <div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">首页</strong> / <small>数据维护</small></div>
    </div>

    <div class="am-g" style="padding: 10px;border: 1px solid #ddd;margin-left: 15px;margin-right: 15px;">
      <div class="am-u-sm-12">
        <div class="am-cf " style="padding-bottom: 10px;">
          <div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">数据维护</strong> / <small>备份/恢复</small></div>
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


                <div class="col-lg-12">
                  <div class="widget">
                    <div class="widget-header"> <i class="icon-table"></i>

                      <h3></h3>

                      <a href="/admin.php/Database/Bak" class="am-btn am-btn-primary am-btn-xs">
                        备份
                      </a>
                      <a href="/admin.php/Database/Index" class="btn btn-default">
                        <i class="icon icon-refresh"></i>
                      </a>
                    </div>
                    <div class="widget-content">

                      <table cellpadding="0" cellspacing="0" border="0" class="am-table am-table-striped am-table-hover table-main" >
                        <thead>
                        <tr>
                          <th>编号</th>
                          <th>路径</th>
                          <th class="hidden-xs">备份时间</th>
                          <th class="center">操作</th>
                        </tr>
                        </thead>
                        <tbody>
                        <volist name="list" id="vo">
                          <tr class="gradeX">
                            <td>{$vo.id}</td>
                            <td class="hidden-xs">
                              <a href="javascript:;" target="_blank">
                                {$vo.path}
                              </a>
                            </td>

                            <td class="hidden-xs">
                              {$vo.created|date="Y-m-d H:i",###}</td>
                            <td class="center">
                              <a href="{:U('Database/Recovery?id='.$vo['id'].'')}">
                                <i class="am-icon-refresh"></i>
                              </a>

                              |
                              <a class="deleteBtn" href="{:U('Database/Delete?id='.$vo['id'].'')}">
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
                    </div>
                  </div>
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