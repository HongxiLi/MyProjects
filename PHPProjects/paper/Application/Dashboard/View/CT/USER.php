<include file="Public/header" />

  <!-- content start -->
  <div class="admin-content">

    <div class="am-cf am-padding">
      <div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">首页</strong> / <small>学生/教师/管理员</small></div>
    </div>

    <div class="am-g" style="padding: 10px;border: 1px solid #ddd;margin-left: 15px;margin-right: 15px;">
      <div class="am-u-sm-12">
        <div class="am-cf " style="padding-bottom: 10px;">
          <div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">学生数据</strong> / <small>表格</small></div>
        </div>
        <div class="am-g">
          <div class="am-u-md-6 am-cf">
            <div class="am-fl am-cf">
              <div class="am-btn-toolbar am-fl">
                <div class="am-btn-group am-btn-group-xs">
                  <button onclick=javascript:window.location.href="{:U('Student/Add')}"; type="button" class="am-btn am-btn-default"><span class="am-icon-plus"></span> 新增</button>
                  <button onclick=javascript:window.location.href="{:U('Student/Import')}"; type="button" class="am-btn am-btn-primary"><span class="am-icon-plus"></span> SQL文件方式导入</button>
                  <button onclick=javascript:window.location.href="{:U('Student/ImportExcel')}"; type="button" class="am-btn am-btn-danger"><span class="am-icon-plus"></span> EXCEL文件方式导入</button>
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
                      [<a href="{:U('Student/Password?id='.$vo['id'].'')}">
                        密码
                      </a>]

                      |
                      <a href="{:U('Student/Edit?id='.$vo['id'].'')}">
                        <span class="am-icon-pencil-square-o"></span>
                      </a>



                      |
                      <a class="deleteBtn" href="{:U('Student/Delete?id='.$vo['id'].'')}">
                        <span class="am-icon-trash-o"></span>
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



    <div class="am-g" style="padding: 10px;border: 1px solid #ddd;margin-left: 15px;margin-right: 15px;">
      <div class="am-u-sm-12">
        <div class="am-cf " style="padding-bottom: 10px;">
          <div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">教师数据</strong> / <small>表格</small></div>
        </div>
        <div class="am-g">
          <div class="am-u-md-6 am-cf">
            <div class="am-fl am-cf">
              <div class="am-btn-toolbar am-fl">
                <div class="am-btn-group am-btn-group-xs">
                  <button onclick=javascript:window.location.href="{:U('Teacher/Add')}"; type="button" class="am-btn am-btn-default"><span class="am-icon-plus"></span> 新增</button>
                  <button onclick=javascript:window.location.href="{:U('Teacher/Import')}"; type="button" class="am-btn am-btn-primary"><span class="am-icon-plus"></span> 导入SQL文件</button>
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
                  <th class="">工号</th>
                  <th class="hidden-xs">姓名</th>
                  <th class="hidden-xs">性别</th>
                  <th class="hidden-xs">学院</th>
                  <th class="hidden-xs">职称</th>
                  <th class="hidden-xs">注册时间</th>
                  <th class="center">操作</th>
                </tr>
                </thead>
                <tbody>
                <volist name="list2" id="vo">
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
                    <td class="hidden-xs">{$vo.col}</td>
                    <td class="hidden-xs">{$vo.zc}</td>

                    <td class="hidden-xs">
                      {$vo.created|date="Y-m-d H:i",###}</td>

                    <td class="center">


                      [<a href="{:U('Teacher/Password?id='.$vo['id'].'')}">
                        密码
                      </a>]


                      <a href="{:U('Teacher/Edit?id='.$vo['id'].'')}">
                        <span class="am-icon-pencil-square-o"></span>
                      </a>

                      |
                      <a class="deleteBtn" href="{:U('Teacher/Delete?id='.$vo['id'].'')}">
                        <span class="am-icon-trash-o"></span>
                      </a>
                    </td>
                  </tr>
                </volist>
                </tbody>
              </table>

              <div class="pagination">
                <?php echo $page2;?>
              </div>



              <hr>

            </form>
          </div>

        </div>
      </div>
    </div>



    <div class="am-g" style="padding: 10px;border: 1px solid #ddd;margin-left: 15px;margin-right: 15px;">
      <div class="am-u-sm-12">
        <div class="am-cf " style="padding-bottom: 10px;">
          <div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">管理员数据</strong> / <small>表格</small></div>
        </div>
        <div class="am-g">
          <div class="am-u-md-6 am-cf">
            <div class="am-fl am-cf">
              <div class="am-btn-toolbar am-fl">
                <div class="am-btn-group am-btn-group-xs">
                  <button onclick=javascript:window.location.href="{:U('Member/Add')}"; type="button" class="am-btn am-btn-default"><span class="am-icon-plus"></span> 新增</button>
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
                <volist name="list3" id="vo">
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
                        <span class="am-icon-pencil-square-o"></span>
                      </a>

                      |
                      <a class="deleteBtn" href="{:U('Member/Delete?id='.$vo['id'].'')}">
                        <span class="am-icon-trash-o"></span>
                      </a>
                    </td>
                  </tr>
                </volist>
                </tbody>
              </table>

              <div class="pagination">
                <?php echo $page3;?>
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