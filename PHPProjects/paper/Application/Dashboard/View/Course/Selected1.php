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
                                <th class="">学生姓名</th>
                                <th class="hidden-xs">选课时间</th>
                                <th class="center">状态</th>
                            </tr>
                            </thead>
                            <tbody>
                            <volist name="list" id="vo">
                                <tr class="gradeX">
                                    <td>{$vo.id}</td>
                                    <td class=""><?php echo $vo['stu']['username'];?></td>
                                    <td class="hidden-xs">
                                        {$vo.created|date="Y-m-d H:i",###}</td>
                                    <td class="center">
                                        <?php
                                        if($vo['step']==1)
                                        {?>
<span style="color: #c00">预选</span>
                                        <?php }else{?>
                                            <span style="color: #0063DC">已选</span>
                                        <?php }
                                        ?>
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
        $("#nav>li#menu_0").addClass("current");


    });

</script>