<include file="Public/header" />
<div class="page-content">
    <div class="content container">
        <div class="row">
            <div class="col-lg-12">
                <h2 class="page-title">控制中心 <small>>添加数据.</small></h2>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-8">
                <div class="widget">
                    <div class="widget-header"> <i class="icon-plus"></i>
                        <h3>添加数据</h3>
                    </div>
                    <div class="widget-content">
                        <div class="body">
                            <form data-validate="parsley" method="post" novalidate="" class="form-horizontal label-left" id="form" action="{:U('Class/AddClass')}">
                                <fieldset>

                                    <div class="control-group">
                                        <div class="col-md-3">
                                            <label for="college" class="control-label">班级名称</label>
                                        </div>
                                        <div class="col-md-9">
                                            <div class="form-group">
                                                <input type="text" class="col-sm-6 col-xs-12" name="class_name" id="class_name">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <div class="col-md-3">
                                            <label for="college" class="control-label">所属学院</label>
                                        </div>
                                        <div class="col-md-9">
                                            <div class="form-group">
                                                <select class="form-control col-sm-6 col-xs-12" name="college" id="college">
                                                    <volist name="list" id="vo">
                                                            <option value="{$vo.id}">{$vo.college_name}</option>
                                                        </volist>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <div class="col-md-3">
                                            <label for="college" class="control-label">所属班级</label>
                                        </div>
                                        <div class="col-md-9">
                                            <div class="form-group">
                                                <select class="form-control col-sm-6 col-xs-12" name="major" id="major">
                                                    <option value="">==Please Select==</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <span id="msg" style="color: #c00">

                                        </span>
                                    </div>
                                </fieldset>
                                <div class="form-actions">
                                    <button id="postBtn" class="btn btn-primary" type="submit">添加</button>
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



        $("#college").change(function(){
            var college = $(this).val();
            $.get("/admin.php/Json/Major/?id="+college,function(data){
                $("#major").html(data);
            });
        });


        $("#nav>li").removeClass("current");
        $("#nav>li#menu_2").addClass("current");

        $("#postBtn").click(function(e){
            e.preventDefault();
            var class_name = $("#class_name").val();
            var major = $("#major").val();
            if(class_name==""||major=="")
            {
                $("#msg").html("表单不能为空");
                return;
            }

            $("#form").submit();
        });
    });

</script>
