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
                    </div>
                    <div class="widget-content">

                        <table cellpadding="0" cellspacing="0" border="0" class="display" id="tableData">
                            <thead>
                            <tr>
                                <th>编号</th>
                                <th class="">账号</th>
                                <th class="hidden-xs">姓名</th>
<!--                                <th class="hidden-xs">擅长位置</th>-->
                                <th class="hidden-xs">电话</th>
<!--                                <th class="hidden-xs">邮箱</th>-->
<!--                                <th class="hidden-xs">区域</th>-->
<!--                                <th class="hidden-xs">年龄</th>-->
                                <th class="hidden-xs">性别</th>
                                <th class="hidden-xs">类型</th>
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

                                    <td class="hidden-xs">{$vo.tel}</td>

                                    <td class="hidden-xs">
                                        <?php
                                        if($vo['sex']==1) echo '男';else echo '女';
                                        ?>
                                    </td>
                                    <td class="hidden-xs">
                                        <?php
                                        if($vo['type']==2) echo '..';
                                        ?>

                                        <?php
                                        if($vo['type']==3) echo '管理员';
                                        ?>
                                    </td>

                                    <td class="hidden-xs">
                                        {$vo.created|date="Y-m-d H:i",###}</td>
                                    <td class="center">
                                       <a href="{:U('Member/Edit?id='.$vo['id'].'')}">
                                            <i class="icon-edit"></i>
                                        </a>
                                       

                                         |
                                        <a class="deleteBtn" href="{:U('Member/Delete?id='.$vo['id'].'')}">
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
        $("#nav>li#menu_7").addClass("current");


    });

</script>