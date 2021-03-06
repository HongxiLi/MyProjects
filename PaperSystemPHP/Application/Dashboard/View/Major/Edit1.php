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
                            <form data-validate="parsley" method="post" novalidate="" class="form-horizontal label-left" id="form" action="{:U('Major/UpdateMajor')}">
                                <fieldset>

                                    <div class="control-group">
                                        <div class="col-md-3">
                                            <label for="college" class="control-label">专业名称</label>
                                        </div>
                                        <div class="col-md-9">
                                            <div class="form-group">
                                                <input type="text" class="col-sm-6 col-xs-12" name="major_name" id="major_name" value="{$data[0].major_name}">
                                                <input type="hidden" name="id" value="{$data[0].id}"/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <div class="col-md-3">
                                            <label for="college" class="control-label">所属学院</label>
                                        </div>
                                        <div class="col-md-9">
                                            <div class="form-group">
                                                <select class="form-control col-sm-6 col-xs-12" name="college" id="">
                                                    <volist name="list" id="vo">
                                                        <option <if condition="$vo['id'] eq $data[0]['college_id']">selected</if> value="{$vo.id}">{$vo.college_name}</option>
                                                    </volist>
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
        $("#nav>li#menu_1").addClass("current");

        $("#postBtn").click(function(e){
            e.preventDefault();
            var major_name = $("#major_name").val();
            if(major_name=="")
            {
                $("#msg").html("表单不能为空");
                return;
            }

            $("#form").submit();
        });
    });

</script>
