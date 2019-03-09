<include file="Public/header" />

  <!-- content start -->
  <div class="admin-content">

    <div class="am-cf am-padding">
      <div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">首页</strong> / <small>年级/学期</small></div>
    </div>

    <div class="am-g" style="padding: 10px;border: 1px solid #ddd;margin-left: 15px;margin-right: 15px;">
      <div class="am-u-sm-12">
        <div class="am-cf " style="padding-bottom: 10px;">
          <div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">年级数据</strong> / <small>添加</small></div>
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





                <table cellpadding="0" cellspacing="0" border="0" class="display" id="tableData">
                  <thead>
                  <tr>
                    <th>编号</th>
                    <th class="">类别名称</th>
                    <th class="hidden-xs">添加时间</th>
                    <th class="center">操作</th>
                  </tr>
                  </thead>
                  <tbody>
                  <volist name="list" id="vo">
                    <tr class="gradeX">
                      <td>{$vo.id}</td>
                      <td class="">{$vo.category_name}</td>

                      <td class="hidden-xs">
                        {$vo.created|date="Y-m-d H:i",###}</td>
                      <td class="center">
                        <a href="{:U('CourseCategory/Edit?id='.$vo['id'].'')}">
                          <i class="icon-edit"></i>
                        </a>
                        |
                        <a class="deleteBtn" href="{:U('CourseCategory/Delete?id='.$vo['id'].'')}">
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
      var yname = $("#yname").val();
      if(yname=="")
      {
        $("#msg").html("表单不能为空");
        return;
      }
      $("#form").submit();
    });
  });

</script>