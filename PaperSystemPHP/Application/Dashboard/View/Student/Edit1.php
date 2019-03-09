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
                            <form data-validate="parsley" method="post" novalidate="" class="form-horizontal label-left" id="form" action="{:U('Student/UpdateStudent')}">
                                <fieldset>

                                    <div class="control-group">
                                        <div class="col-md-3">
                                            <label for="college" class="control-label">学号</label>
                                        </div>
                                        <div class="col-md-9">
                                            <div class="form-group">
                                                <input READONLY type="text" class="col-sm-6 col-xs-12" name="username" id="username" value="{$data[0].username}">
                                                <input type="hidden" name="id" value="{$data[0].id}"/>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="control-group">
                                        <div class="col-md-3">
                                            <label for="" class="control-label">姓名</label>
                                        </div>
                                        <div class="col-md-9">
                                            <div class="form-group">
                                                <input  type="text" name="realname" class="col-sm-6 col-xs-12" value="{$data[0].realname}" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <div class="col-md-3">
                                            <label for="" class="control-label">性别</label>
                                        </div>
                                        <div class="col-md-9">
                                            <div class="form-group">
                                                <select name="sex" class="form-control" id="">
                                                    <option <if condition="$data[0]['sex'] eq 1">selected</if> value="1">男</option>
                                                    <option <if condition="$data[0]['sex'] eq 2">selected</if> value="2">女</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <div class="col-md-3">
                                            <label for="" class="control-label">年级</label>
                                        </div>
                                        <div class="col-md-9">
                                            <div class="form-group">
                                                <select name="year" class="form-control" id="">
                                                    <volist name="data2" id="vo">
                                                        <option <if condition="$vo['id'] eq $data[0]['year']">selected</if> value="{$vo.id}">{$vo.year}</option>
                                                    </volist>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="control-group">
                                        <div class="col-md-3">
                                            <label for="" class="control-label">学院</label>
                                        </div>
                                        <div class="col-md-9">
                                            <div class="form-group">
                                                <select name="college" class="form-control" id="college">
                                                    <volist name="data1" id="vo">
                                                        <option <if condition="$vo['id'] eq $data[0]['college']">selected</if> value="{$vo.id}">{$vo.college_name}</option>
                                                    </volist>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <div class="col-md-3">
                                            <label for="" class="control-label">专业</label>
                                        </div>
                                        <div class="col-md-9">
                                            <div class="form-group">
                                                <select name="major" class="form-control" id="major">
                                                    <volist name="data3" id="vo">
                                                        <option <if condition="$vo['id'] eq $data[0]['major']">selected</if> value="{$vo.id}">{$vo.major_name}</option>
                                                    </volist>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <div class="col-md-3">
                                            <label for="" class="control-label">班级</label>
                                        </div>
                                        <div class="col-md-9">
                                            <div class="form-group">
                                                <select name="class" class="form-control" id="class">
                                                    <volist name="data4" id="vo">
                                                        <option <if condition="$vo['id'] eq $data[0]['class']">selected</if> value="{$vo.id}">{$vo.class_name}</option>
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
    var html = "<option value=''>==Please Select==</option>";
    $(document).ready(function(){


        $("#nav>li").removeClass("current");
        $("#nav>li#menu_5").addClass("current");

        $("#college").change(function(){
            $("#class").html(html);
            $("#major").html(html);
            var college = $(this).val();
            $.get("/admin.php/Json/Major/?id="+college,function(data){
                $("#major").html(data);
            });
        });

        $("#major").change(function(){
            var major = $(this).val();
            var college =  $("#college").val();
            $.get("/admin.php/Json/MyClass/?mid="+major+"&cid="+college,function(data){
                $("#class").html(data);
            });
        });
    });

</script>
