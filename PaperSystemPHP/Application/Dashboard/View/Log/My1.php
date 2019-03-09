<include file="Public/header" />
  <div class="page-content">
    <div class="content container">
      <div class="row">
        <div class="col-lg-12">
          <h2 class="page-title">控制中心 <small>>LOG列表.</small></h2>
        </div>
      </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="widget">
                    <div class="widget-header"> <i class="icon-table"></i>
                        <h3>LOG列表</h3>
                    </div>
                    <div class="widget-content">

                        <table cellpadding="0" cellspacing="0" border="0" class="display" id="tableData">
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
        $("#nav>li:last-child").addClass("current");


    });

</script>