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
                                <th class="">课程名称</th>
                                <th class="hidden-xs">学分</th>
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
        $("#nav>li#menu_2").addClass("current");


    });

</script>