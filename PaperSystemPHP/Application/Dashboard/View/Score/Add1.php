<include file="Public/header" />
  <div class="page-content">
    <div class="content container">
      <div class="row">
        <div class="col-lg-12">
          <h2 class="page-title">Dashboard <small>>添加数据.</small></h2>
        </div>
      </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="widget">
                    <div class="widget-header"> <i class="icon-plus"></i>
                        <h3>添加数据</h3>
                    </div>
                    <div class="widget-content">
                        <div class="body">
                            <form data-validate="parsley" method="post" novalidate="" class="form-horizontal label-left" id="form" action="{:U('Score/AddScore')}" enctype="multipart/form-data">
                                <fieldset>

                                    <div class="control-group">
                                        <div class="col-md-3">
                                            <label for="" class="control-label">课程名称</label>
                                        </div>
                                        <div class="col-md-9">
                                            <div class="form-group">
                                              <select style="width: 45%;" class="form-control" name="course" id="courseId">
                                                    <volist name="list" id="vo">
                                                        <option value="{$vo.id}">{$vo.course_name}</option>
                                                        </volist>
                                                </select>


<a href="javascript:;" target="_blank" class="btn btn-danger" id="downloadBtn">选择课程下载对应模板</a>                                                
                                            </div>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <div class="col-md-3">
                                            <label for="" class="control-label">Excel成绩文件</label>
                                        </div>
                                        <div class="col-md-9">
                                            <div class="form-group">
                                                <input type="file"  name="file" id="fileExcel"/>
                                            </div>
                                        </div>
                                    </div>
									

                                    <div class="control-group">
                                        <span id="msg" style="color: #c00">
                                        </span>
                                    </div>
                                </fieldset>
                                <div class="form-actions">
                                    <button id="postBtn" class="btn btn-primary" type="submit">开始导入</button>
                                    <button id="cancelBtn" class="btn btn-default" type="button">取消</button>
                                </div>
                            </form>
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




$("#downloadBtn").click(function(){
	var courseId = $("#courseId").val();
	$(this).attr("href","/admin.php/Score/Download/?id="+courseId);
	$(this).click();
});



        $("#nav>li").removeClass("current");
        $("#nav>li#menu_2").addClass("current");

        $("#postBtn").click(function(e){
            e.preventDefault();
            $("#form").submit();
        });
    });

</script>
