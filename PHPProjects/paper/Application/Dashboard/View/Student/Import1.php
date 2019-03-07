<include file="Public/header" />
<div class="page-content">
    <div class="content container">
        <div class="row">
            <div class="col-lg-12">
                <h2 class="page-title">控制中心 <small>>导入学生.</small></h2>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-8">
                <div class="widget">
                    <div class="widget-header"> <i class="icon-plus"></i>
                        <h3>导入学生</h3>
                    </div>
                    <div class="widget-content">
                        <div class="body">
                            <form data-validate="parsley" method="post" novalidate="" class="form-horizontal label-left" id="form" action="{:U('Student/ImportStudent')}" enctype="multipart/form-data">
                                <fieldset>

                                    <div class="control-group">
                                        <div class="col-md-3">
                                            <label for="college" class="control-label">选择文件</label>
                                        </div>
                                        <div class="col-md-9">
                                            <div class="form-group">
                                                <input type="file" name="file" required/>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="control-group">
                                        <div class="col-md-8">
                                            示例SQL语句。每句用分号隔开. <br/> password <br/>
                                            md5(C('pwd_salt').$password); 密码是Common/config/config.php中的pwd_salt和真实密码的md5值
                                            INSERT INTO c_user(username,password,type)
                                            VALUES('student','23261fedd0be3b50006c8c8eeff1505e',1);
                                        </div>
                                    </div>

                                    <div class="control-group">
                                        <span id="msg" style="color: #c00">

                                        </span>
                                    </div>
                                </fieldset>
                                <div class="form-actions">
                                    <button id="postBtn" class="btn btn-primary" type="submit">提交</button>
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
