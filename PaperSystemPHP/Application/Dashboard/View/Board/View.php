<include file="Public/header" />

  <!-- content start -->
  <div class="admin-content">

    <div class="am-cf am-padding">
      <div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">首页</strong> / <small>站内信</small></div>
    </div>

    <div class="am-g" style="padding: 10px;border: 1px solid #ddd;margin-left: 15px;margin-right: 15px;">
      <div class="am-u-sm-12">
        <div class="am-cf " style="padding-bottom: 10px;">
          <div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">站内信</strong> / <small>查看信件</small></div>
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
              <div class="am-g am-margin-top-sm">
                <div class="am-u-sm-2 am-text-right">

                </div>
                <div class="am-u-sm-4 am-u-end">
                  <table class="am-table am-table-striped am-table-hover table-main">
                    <tr>
                      <th>发件人</th>
                      <th>收件人</th>
                      <th>发件时间</th>
                    </tr>
                    <tr>
                      <td>{$vo.from.username}</td>
                      <td>{$vo.to.username}</td>
                      <td>{$vo.created|date="Y-m-d H:i",###}</td>
                    </tr>
                  </table>
                </div>
              </div>

              <div class="am-g am-margin-top-sm">
                <div class="am-u-sm-2 am-text-right">
                  <label for="college" class="control-label">标题</label>
                </div>
                <div class="am-u-sm-4 am-u-end">
                  {$vo.title}
                </div>
              </div>


              <div class="am-g am-margin-top-sm">
                <div class="am-u-sm-2 am-text-right">
                  <label for="college" class="control-label">信息内容</label>
                </div>
                <div class="am-u-sm-4 am-u-end">
                  {$vo.message}
                </div>
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