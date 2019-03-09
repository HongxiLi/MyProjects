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
                            <form data-validate="parsley" method="post" novalidate="" class="form-horizontal label-left" id="form" action="{:U('Student/ImportStudentExcel')}" enctype="multipart/form-data">
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

                                            <a class="btn btn-primary" href="{:U('DownLoad/StImportTpl')}" target="_blank">下载模板</a>
                                            <br/> <br/>
                                            示例Excel格式. <br/>
                                            <table class="table table-bordered">
                                                <tr>
                                                    <th>学号</th>
                                                    <th>密码</th>
                                                    <th>姓名</th>
                                                    <th>性别(1为男2为女)</th>
                                                </tr>
                                                <tr>
                                                    <td>2015145245</td>
                                                    <th>123</th>
                                                    <th>张东方</th>
                                                    <th>1</th>
                                                </tr>
                                            </table>
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
