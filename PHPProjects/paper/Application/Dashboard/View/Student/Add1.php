<include file="Public/header" />
<div class="page-content">
    <div class="content container">
        <div class="row">
            <div class="col-lg-12">
                <h2 class="page-title">控制中心 <small>>添加学生.</small></h2>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-8">
                <div class="widget">
                    <div class="widget-header"> <i class="icon-plus"></i>
                        <h3>添加学生</h3>
                    </div>
                    <div class="widget-content">
                        <div class="body">
                            <form data-validate="parsley" method="post" novalidate="" class="form-horizontal label-left" id="form" action="{:U('Student/AddStudent')}">
                                <fieldset>

                                    <div class="control-group">
                                        <div class="col-md-3">
                                            <label for="college" class="control-label">学号</label>
                                        </div>
                                        <div class="col-md-9">
                                            <div class="form-group">
                                                <input type="text" class="col-sm-6 col-xs-12" name="username" id="username">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <div class="col-md-3">
                                            <label for="" class="control-label">密码</label>
                                        </div>
                                        <div class="col-md-9">
                                            <div class="form-group">
                                                <input type="password" class="col-sm-6 col-xs-12" name="password" id="password">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <div class="col-md-3">
                                            <label for="" class="control-label">确认密码</label>
                                        </div>
                                        <div class="col-md-9">
                                            <div class="form-group">
                                                <input type="password" class="col-sm-6 col-xs-12" name="password2" id="password2">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <div class="col-md-3">
                                            <label for="" class="control-label">姓名</label>
                                        </div>
                                        <div class="col-md-9">
                                            <div class="form-group">
                                                <input  type="text" name="realname" class="col-sm-6 col-xs-12" />
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
                                                    <option value="1">男</option>
                                                    <option value="2">女</option>
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
                                                        <option value="{$vo.id}">{$vo.year}</option>
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
                                                    <volist name="data" id="vo">
                                                        <option value="{$vo.id}">{$vo.college_name}</option>
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
                                                    <option value="">==Please Select==</option>
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

    var html = "<option value=''>==Please Select==</option>";
    $(document).ready(function(){

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

        $("#nav>li").removeClass("current");
        $("#nav>li#menu_5").addClass("current");

        $("#postBtn").click(function(e){
            e.preventDefault();
            var username = $("#username").val();
            var password = $("#password").val();
            var password2 = $("#password2").val();
            var realname = $("#realname").val();
            var major = $("#major").val();
            var vclass = $("#class").val();
            if(username==""||password==""||password2==""||realname==""||major==""||vclass=="")
            {
                $("#msg").html("表单不能为空");
                return;
            }
            if(password!=password2)
            {
                $("#msg").html("两次输入的密码不一致");
                return;
            }

            $("#form").submit();
        });
    });

</script>
