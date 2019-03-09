<include file="Public/header" />
<div class="page-content">
    <div class="content container">
        <div class="row">
            <div class="col-lg-12">
                <h2 class="page-title">控制中心 <small>>系统信息.</small></h2>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-8">
                <div class="widget">
                    <div class="widget-header"> <i class="icon-plus"></i>
                        <h3>系统信息</h3>
                    </div>
                    <div class="widget-content">
                        <div class="body">
                            <form data-validate="parsley" method="post" novalidate="" class="form-horizontal label-left" id="form" action="{:U('Setting/UpdateSetting')}" enctype="multipart/form-data">
                                <fieldset>

                                    <div class="control-group">
                                        <div class="col-md-3">
                                            <label for="" class="control-label">站点名称</label>
                                        </div>
                                        <div class="col-md-9">
                                            <div class="form-group">
                                                <input type="text" class="col-sm-6 col-xs-12" name="title" id="title" value="{$data[0].title}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <div class="col-md-3">
                                            <label for="" class="control-label">站点LOGO（203*49）</label>
                                        </div>
                                        <div class="col-md-9">
                                            <div class="form-group">
                                                <a href="__ROOT__/{$data[0].logo}" target="_blank">
                                                    <img width="120" height="120" src="__ROOT__/{$data[0].logo}" alt=""/>
                                                </a>
                                                <input type="hidden" name="old_thumb" value="{$data[0].logo}"/>
                                                <input type="file" name="thumb" id="thumb"/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <div class="col-md-3">
                                            <label for="" class="control-label">地址</label>
                                        </div>
                                        <div class="col-md-9">
                                            <div class="form-group">
                                                <input type="text" class="col-sm-6 col-xs-12" name="address" id="address" value="{$data[0].address}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="control-group" style="display: none">
                                        <div class="col-md-3">
                                            <label for="" class="control-label">城市代码</label>
                                        </div>
                                        <div class="col-md-9">
                                            <div class="form-group">
                                                <input type="text" class="col-sm-6 col-xs-12" name="code" id="code" value="{$data[0].code}">
                                                （可以到
                                                [<a href="http://www.cnblogs.com/wf225/p/4090737.html" target="_blank">点此处</a>]
                                                查找城市代码）
                                            </div>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <div class="col-md-3">
                                            <label for="" class="control-label">电话</label>
                                        </div>
                                        <div class="col-md-9">
                                            <div class="form-group">
                                                <input type="text" class="col-sm-6 col-xs-12" name="tel" id="tel" value="{$data[0].tel}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <div class="col-md-3">
                                            <label for="" class="control-label">联系邮箱</label>
                                        </div>
                                        <div class="col-md-9">
                                            <div class="form-group">
                                                <input type="text" class="col-sm-6 col-xs-12" name="email" id="email" value="{$data[0].email}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <div class="col-md-3">
                                            <label for="" class="control-label">负责人</label>
                                        </div>
                                        <div class="col-md-9">
                                            <div class="form-group">
                                                <input type="text" class="col-sm-6 col-xs-12" name="master" id="master" value="{$data[0].master}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <div class="col-md-3">
                                            <label for="" class="control-label">传真</label>
                                        </div>
                                        <div class="col-md-9">
                                            <div class="form-group">
                                                <input type="text" class="col-sm-6 col-xs-12" name="fax" id="fax" value="{$data[0].fax}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <div class="col-md-3">
                                            <label for="" class="control-label">微博</label>
                                        </div>
                                        <div class="col-md-9">
                                            <div class="form-group">
                                                <input type="text" class="col-sm-6 col-xs-12" name="weibo" id="weibo" value="{$data[0].weibo}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <div class="col-md-3">
                                            <label for="" class="control-label">微信</label>
                                        </div>
                                        <div class="col-md-9">
                                            <div class="form-group">
                                                <input type="text" class="col-sm-6 col-xs-12" name="weixin" id="weixin" value="{$data[0].weixin}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <div class="col-md-3">
                                            <label for="" class="control-label">网址</label>
                                        </div>
                                        <div class="col-md-9">
                                            <div class="form-group">
                                                <input type="text" class="col-sm-6 col-xs-12" name="url" id="url" value="{$data[0].url}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <div class="col-md-3">
                                            <label for="" class="control-label">备案信息</label>
                                        </div>
                                        <div class="col-md-9">
                                            <div class="form-group">
                                                <input type="text" class="col-sm-6 col-xs-12" name="icp" id="icp" value="{$data[0].icp}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <div class="col-md-3">
                                            <label for="" class="control-label">版权信息</label>
                                        </div>
                                        <div class="col-md-9">
                                            <div class="form-group">
                                                <input type="text" class="col-sm-6 col-xs-12" name="copyright" id="copyright" value="{$data[0].copyright}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <div class="col-md-3">
                                            <label for="" class="control-label">访客数</label>
                                        </div>
                                        <div class="col-md-9">
                                            <div class="form-group">
                                                <input readonly type="text" class="col-sm-6 col-xs-12" name="count" id="count" value="{$data[0].count}">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="control-group">
                                        <div class="col-md-3">
                                            <label for="" class="control-label">站点描述</label>
                                        </div>
                                        <div class="col-md-9">
                                            <div class="form-group">
                                                <textarea name="description" id="" cols="60" rows="10">
                                                    {$data[0].description}
                                                </textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <div class="col-md-3">
                                            <label for="" class="control-label">站点关键字</label>
                                        </div>
                                        <div class="col-md-9">
                                            <div class="form-group">
                                                <textarea name="keywords" id="" cols="60" rows="10">
                                                    {$data[0].keywords}
                                                </textarea>
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
        $("#nav>li#menu_10").addClass("current");
    });

</script>
