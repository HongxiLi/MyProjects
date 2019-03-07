<include file="Public/header" />
  <div class="page-content">
    <div class="content container">
      <div class="row">
        <div class="col-lg-12">
          <h2 class="page-title">控制中心 <small>>数据维护.</small></h2>
        </div>
      </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="widget">
                    <div class="widget-header"> <i class="icon-table"></i>
                        <h3>数据维护</h3>
                        <a href="/admin.php/Database/Bak" class="btn btn-success">
                            备份
                        </a>
                        <a href="/admin.php/Database/Index" class="btn btn-default">
                            <i class="icon icon-refresh"></i>
                        </a>
                    </div>
                    <div class="widget-content">

                        <table cellpadding="0" cellspacing="0" border="0" class="display" >
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
                                            <i class="icon-refresh"></i>
                                        </a>

                                         |
                                        <a class="deleteBtn" href="{:U('Database/Delete?id='.$vo['id'].'')}">
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
        $("#nav>li#menu_11").addClass("current");


    });

</script>