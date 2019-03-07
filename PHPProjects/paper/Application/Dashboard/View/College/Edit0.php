<include file="Public/header" />
<div class="page-content">
    <div class="content container">
        <div class="row">
            <div class="col-lg-12">
                <h2 class="page-title">控制中心 <small>>编辑数据.</small></h2>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-8">
                <div class="widget">
                    <div class="widget-header"> <i class="icon-edit"></i>
                        <h3>编辑数据</h3>
                    </div>
                    <div class="widget-content">
                        <div class="body">
                            <form data-validate="parsley" method="post" novalidate="" class="form-horizontal label-left" id="form" action="{:U('College/UpdateCollege')}">
                                <fieldset>

                                    <div class="control-group">
                                        <div class="col-md-3">
                                            <label for="college" class="control-label">学院名称</label>
                                        </div>
                                        <div class="col-md-9">
                                            <div class="form-group">
                                                <input type="text" class="col-sm-6 col-xs-12" name="college_name" id="college_name" value="{$data[0].college_name}">
                                                <input type="hidden" name="id" value="{$data[0].id}"/>
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

                                </div>                            </form>
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
        $("#nav>li#menu_0").addClass("current");

        $("#postBtn").click(function(e){
            e.preventDefault();
            var college_name = $("#college_name").val();
            if(college_name=="")
            {
                $("#msg").html("表单不能为空");
                return;
            }

            $("#form").submit();
        });
    });

</script>
