<include file="Public/header" />

  <!-- content start -->
  <div class="admin-content">

    <div class="am-cf am-padding">
      <div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">首页</strong> / <small>毕设题目/成绩数据</small></div>
    </div>

    <div class="am-g" style="padding: 10px;border: 1px solid #ddd;margin-left: 15px;margin-right: 15px;">
      <div class="am-u-sm-12">
        <div class="am-cf " style="padding-bottom: 10px;">
          <div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">成绩数据</strong> / <small>列表信息</small></div>
        </div>
        <div class="am-g">
          <div class="am-u-md-6 am-cf">
            <div class="am-fl am-cf">
              <div class="am-btn-toolbar am-fl">
                <div class="am-btn-group am-btn-group-xs">
                  <button onclick=javascript:window.history.back(-1); type="button" class="am-btn am-btn-default"><span class="am-icon-bug"></span> 返回</button>
                </div>


              </div>
            </div>
          </div>

        </div>
        <div class="am-g">
          <div class="am-u-sm-12">


              <form  data-validate="parsley" method="post" novalidate="" class="am-form" id="form" action="{:U('Course/UpdateCourse')}">


                <table cellpadding="0" cellspacing="0" border="0" class="am-table am-table-striped am-table-hover table-main" id="tableData">
                  <thead>
                  <tr>
                    <th>编号</th>
                    <th>学生</th>
                    <th class="">题目</th>
                    <th>论文</th>
                    <th>成绩</th>
                    <th class="center">操作</th>
                  </tr>
                  </thead>
                  <tbody>
                  <volist name="list" id="vo">
                    <tr class="gradeX">
                      <td>{$vo.id}</td>
                      <td>{$vo.user.username}/{$vo.user.realname}</td>
                      <td class="">{$vo.course.course_name}</td>
                      <td>
                        <?php
                        if(empty($vo['sele']['doc']))
                        {
                          ?>
                          <span style="color: #c00">没有上传</span>

                         

                        <?php } else{ ?>
                          <a href="/<?php echo $vo['sele']['doc'];?>">
                            [查看]
                          </a>


                        <?php }?>
                      </td>

                      <td class="">{$vo.score}</td>




                      <td class="center">
                        <a href="{:U('Score/ScoreEdit?id='.$vo['id'].'')}">

                          [ <span class="am-icon-pencil-square-o"></span>
                          修改]
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
<script>

  $(document).ready(function(){

    $("#postBtn").click(function(e){
      e.preventDefault();
      $("#form").submit();
    });
  });

</script>