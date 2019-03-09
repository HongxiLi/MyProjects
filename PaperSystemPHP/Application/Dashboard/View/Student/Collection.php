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
                <div class="widget">
                    <div class="widget-header"> <i class="icon-table"></i>
                        <h3>数据列表</h3>
                        <a href="/admin.php/Student/Import/" class="btn btn-success">导入（SQL模式）</a>
                        <a href="/admin.php/Student/ImportExcel/" class="btn btn-success">导入（Excel模式）</a>
                    </div>
                    <div class="widget-content">

                        <table cellpadding="0" cellspacing="0" border="0" class="display" id="tableData">
                            <thead>
                            <tr>
                                <th>编号</th>
                                <th class="">学号</th>
                                <th class="hidden-xs">姓名</th>
                                <th class="hidden-xs">性别</th>
                                <th class="hidden-xs">年级</th>
                                <th class="hidden-xs">注册时间</th>
                                <th class="center">操作</th>
                            </tr>
                            </thead>
                            <tbody>
                            <volist name="list" id="vo">
                                <tr class="gradeX">
                                    <td>{$vo.id}</td>
                                    <td class="hidden-xs">
                                        <a href="javascript:;" target="_blank">
                                        {$vo.username}
                                            </a>
                                    </td>
                                    <td class="hidden-xs">{$vo.realname}</td>
                                    <td class="hidden-xs">
                                        <?php
                                        if($vo['sex']==1) echo '男';else echo '女';
                                        ?>
                                    </td>
                                    <td class="hidden-xs">{$vo.yr}</td>


                                    <td class="hidden-xs">
                                        {$vo.created|date="Y-m-d H:i",###}</td>
                                    <td class="center">
                                        <a href="{:U('Student/Edit?id='.$vo['id'].'')}">
                                            <i class="icon-edit"></i>
                                        </a>
                                        |
                                       <a href="{:U('Student/Password?id='.$vo['id'].'')}">
                                            <i class="icon-info"></i>
                                        </a>
                                       
|
                                        <a class="deleteBtn" href="{:U('Student/Delete?id='.$vo['id'].'')}">
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
        $("#nav>li#menu_5").addClass("current");


    });

</script>