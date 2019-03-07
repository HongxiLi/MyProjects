<include file="Public/header" />
  <div class="page-content">
    <div class="content container">
      <div class="row">
        <div class="col-lg-12">
          <h2 class="page-title">控制中心 <small>>编辑产品类别.</small></h2>
        </div>
      </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="widget">
                    <div class="widget-header"> <i class="icon-plus"></i>
                        <h3>编辑产品类别</h3>
                    </div>
                    <div class="widget-content">
                        <div class="body">
                            <form data-validate="parsley" method="post" novalidate="" class="form-horizontal label-left" id="form" action="{:U('Room/UpdateRoom')}" enctype="multipart/form-data">
                                <fieldset>

                                    <div class="control-group">
                                        <div class="col-md-3">
                                            <label for="" class="control-label">类别名称</label>
                                        </div>
                                        <div class="col-md-9">
                                            <div class="form-group">
                                                <input type="hidden" name="id" value="{$data.id}"/>
                                                <input value="{$data.room_name}" type="text" class="col-sm-6 col-xs-12" name="title" id="title">
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



        $("#nav>li").removeClass("current");
        $("#nav>li#menu_9").addClass("current");

        $("#postBtn").click(function(e){
            e.preventDefault();
            var title = $("#title").val();
            var url = $("#url").val();
           // var thumb = $("#thumb").val();

            if(title==""||url=="")
            {
                $("#msg").html("表单不能为空");
                return;
            }

            if(url=="http://")
            {
                $("#msg").html("补全URL.");
                return;
            }
            $("#form").submit();
        });
    });

</script>
