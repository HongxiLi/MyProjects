<include file="Public/header" />

  <!-- content start -->
  <div class="admin-content">

    <div class="am-cf am-padding">
      <div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">首页</strong> / <small>欢迎使用</small></div>
    </div>

    <ul class="am-avg-sm-1 am-avg-md-4 am-margin am-padding am-text-center admin-content-list ">
      <li><a href="javascript:;" class="am-text-success"><span class="am-icon-btn am-icon-file-text"></span><br/>论文<br/>{$slist}</a></li>
      <li><a href="javascript:;" class="am-text-warning"><span class="am-icon-btn am-icon-briefcase"></span><br/>小组<br/>{$clist}</a></li>
      <li><a href="javascript:;" class="am-text-danger"><span class="am-icon-btn am-icon-recycle"></span><br/>访问数<br/>{$configuration[0].count}</a></li>
      <li><a href="javascript:;" class="am-text-secondary"><span class="am-icon-btn am-icon-user-md"></span><br/>用户数<br/>{$ulist}</a></li>
    </ul>

    <div class="am-g">
      <div class="am-u-sm-12">
        <table class="am-table am-table-bd am-table-striped admin-content-table">
          <thead>
          <tr>
            <th>服务器</th>
            <th>PHP 版本</th>
            <th>MYSQL 版本</th>
          </tr>
          </thead>
          <tbody>

          <tr class=" ">
            <td>APACHE/2.4.9 </td>
            <td> PHP/5.5.12</td>
            <td>MYSQL 5.0</td>
          </tr>
          <tr>
            <th colspan="3">
              服务器 IP
            </th>
          </tr>
          <tr>
            <td colspan="3">
              __ROOT__
            </td>
          </tr>
          <tr>
            <th colspan="3">
              加载的模块
            </th>
          </tr>
          <tr>
            <?php
            $modules = apache_get_modules();
            if(!empty($modules)){
            ?>
          <tr>
            <td>
              <?php echo count($modules);?> 个模块
            </td>
            <td colspan="2">
              <?php
              foreach($modules as $i=>$m){
                ?>

                <?php echo $m;?> |
                <?php
              }
              ?>
            </td>
            <?php
            }
            ?>
          </tr>
          </tbody>
        </table>
      </div>
    </div>


  </div>
  <!-- content end -->

</div>
<include file="Public/footer" />