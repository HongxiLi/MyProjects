<include file="Public/header" />

<!-- content start -->
<div class="admin-content">

  <div class="am-cf am-padding">
    <div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">首页</strong> / <small>公告信息</small></div>
  </div>

  <div class="am-g" style="padding: 10px;border: 1px solid #ddd;margin-left: 15px;margin-right: 15px;">
    <div class="am-u-sm-12">
      <div class="am-cf " style="padding-bottom: 10px;">
        <div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">公告信息</strong> / <small>公告列表</small></div>
      </div>
      <div class="am-g">
        <div class="am-u-md-6 am-cf">
          <div class="am-fl am-cf">
            <div class="am-btn-toolbar am-fl">
              <div class="am-btn-group am-btn-group-xs">

                <?php if(session('admin_user')[0]['type']!=1)
                { ?>

                <button onclick=javascript:window.location.href="{:U('Notice/Add')}"; type="button" class="am-btn am-btn-default"><span class="am-icon-bug"></span> 添加公告</button>

                <?php } ?>


              </div>


            </div>
          </div>
        </div>

      </div>
      <div class="am-g">
        <div class="am-u-sm-12">


          <form  data-validate="parsley" method="post" novalidate="" class="am-form" id="form" action="{:U('Message/AddMsg')}">

            <table cellpadding="0" cellspacing="0" border="0" class="am-table am-table-striped am-table-hover table-main" id="tableData">
              <thead>
              <tr>
                <th>编号</th>
                <th class="">标题</th>
                <th class="hidden-xs">内容</th>
                <th class="hidden-xs">发布时间</th>
              </tr>
              </thead>
              <tbody>
              <volist name="list" id="vo">
                <tr class="gradeX">
                  <td>{$vo.id}</td>
                  <td class="">
                      {$vo.title}
                  </td>
                  <td class="">{$vo.content}</td>
                  <td class="hidden-xs">
                    {$vo.created|date="Y-m-d H:i",###}</td>
                  
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