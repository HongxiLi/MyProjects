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
                            <form data-validate="parsley" method="post" novalidate="" class="form-horizontal label-left" id="form" action="{:U('Teacher/UpdateTeacher')}">
                                <fieldset>

                                    <div class="control-group">
                                        <div class="col-md-3">
                                            <label for="college" class="control-label">工号</label>
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
                                            <label for="" class="control-label">职称</label>
                                        </div>
                                        <div class="col-md-9">
                                            <div class="form-group">
                                                <select name="zc" class="form-control" id="">
                                                    <option <if condition="'教授' eq $data[0]['zc']">selected</if> value="教授">教授</option>
                                                    <option <if condition="'副教授' eq $data[0]['zc']">selected</if> value="副教授">副教授</option>
                                                    <option <if condition="'助教' eq $data[0]['zc']">selected</if> value="助教">助教</option>
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
        $("#nav>li#menu_6").addClass("current");


    });

</script>
