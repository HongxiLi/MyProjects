<include file="Public/header" />

  <!-- content start -->
  <div class="admin-content">

    <div class="am-cf am-padding">
      <div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">首页</strong> / <small>站内信</small></div>
    </div>

    <div class="am-g" style="padding: 10px;border: 1px solid #ddd;margin-left: 15px;margin-right: 15px;">
      <div class="am-u-sm-12">
        <div class="am-cf " style="padding-bottom: 10px;">
          <div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">站内信</strong> / <small>发件箱</small></div>
        </div>
        <div class="am-g">
          <div class="am-u-md-6 am-cf">
            <div class="am-fl am-cf">
              <div class="am-btn-toolbar am-fl">
                <div class="am-btn-group am-btn-group-xs">
                  <button onclick=javascript:window.location.href="{:U('Message/Send')}"; type="button" class="am-btn am-btn-default"><span class="am-icon-plus"></span> 写信息</button>
                </div>


              </div>
            </div>
          </div>

        </div>
        <div class="am-g">
          <div class="am-u-sm-12">
            <form class="am-form">



              <table cellpadding="0" cellspacing="0" border="0" class="am-table am-table-striped am-table-hover table-main" id="tableData">
                <thead>
                <tr>
                  <th>编号</th>
                  <th class="">主题</th>
                  <th class="hidden-xs">收件人</th>
                  <th class="hidden-xs">发送时间</th>
                  <th class="hidden-xs">状态</th>
                </tr>
                </thead>
                <tbody>
                <volist name="list" id="vo">
                  <tr class="gradeX">
                    <td>{$vo.id}</td>
                    <td class="">
                      <a href="{:U('Message/View')}?id={$vo.id}">
                        {$vo.title}
                      </a>
                    </td>
                    <td class="">{$vo.to.username}</td>
                    <td class="hidden-xs">
                      {$vo.created|date="Y-m-d H:i",###}</td>
                    <td>
                      <?php if($vo['readed']) echo '已阅';else echo '未阅';?>


                      |

                      <a href="{:U('Message/View')}?id={$vo.id}">
                        [查看]
                      </a>
                    </td>
                  </tr>
                </volist>
                </tbody>
              </table>
              <div class="pagination">
                <?php echo $page;?>
              </div>




              <hr>

            </form>
          </div>

        </div>
      </div>
    </div>










  </div>
  <!-- content end -->

</div>
<include file="Public/footer" />