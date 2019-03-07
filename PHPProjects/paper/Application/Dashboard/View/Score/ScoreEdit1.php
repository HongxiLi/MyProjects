<include file="Public/header" />
  <div class="page-content">
    <div class="content container">
      <div class="row">
        <div class="col-lg-12">
          <h2 class="page-title">Dashboard <small>>更新数据.</small></h2>
        </div>
      </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="widget">
                    <div class="widget-header"> <i class="icon-plus"></i>
                        <h3>更新数据</h3>
                    </div>
                    <div class="widget-content">
                        <div class="body">
                            <form data-validate="parsley" method="post" novalidate="" class="form-horizontal label-left" id="form" action="{:U('Score/UpdateScore')}" enctype="multipart/form-data">
                                <fieldset>

                                    <div class="control-group">
                                        <div class="col-md-3">
                                            <label for="" class="control-label">分数</label>
                                        </div>
                                        <div class="col-md-9">
                                            <div class="form-group">
                                             <input type="number" min="0" max="100" name="score" value="{$sc.score}">
                                             <input type="hidden" name="id" value="{$sc.id}">
                                            </div>
                                        </div>
                                    </div>
                                    

                                    <div class="control-group">
                                        <span id="msg" style="color: #c00">
                                        </span>
                                    </div>
                                </fieldset>
                                <div class="form-actions">
                                    <button id="postBtn" class="btn btn-primary" type="submit">更新</button>
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
