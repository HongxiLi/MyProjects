<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <title>接口测试</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="http://127.0.0.1:9058/Public/admin/css/bootstrap.css" rel="stylesheet" media="screen">
    <style>
        body,html{background: #333;}
        .container{background: #fff;}
        .row{padding: 25px;}
        #result{background: #fff;border-radius: 5px;padding: 10px;}
    </style>
</head>
<html>
<body>
<div class="container" style="margin-top: 15px;padding: 15px;margin-bottom: 15px;">
    <div class="header">
        <h1>接口在线测试</h1>
    </div>
    <div class="row" >
        <div class="alert alert-info">项：浏览&扫描事件</div>
        <dl>
            <dt>参数</dt>
            <dd>
                请求方式：GET
            </dd>
            <dd>
                @shop_id  店铺ID
            </dd>
            <dd>
                @product_id 产品ID
            </dd>
            <dd>
                @event_type 事件类型(1浏览详情 2扫码二维码)
            </dd>
            <dd>
                请求地址:
                    http://127.0.0.1:9058/api.php/index/eventRecord
            </dd>
        </dl>
    </div>
    <div class="row">
        <form action="<?php echo U('Index/eventRecord');?>" id="form">
            <div class="form-group">
                <label for="">店铺</label> <br/>
                <select style="width: 45%;" class="form-control" name="shop_id" id="shop">
                    <option value="">==请选择==</option>
                    <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo["id"]); ?>"><?php echo ($vo["shop_name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                </select>
            </div>
            <div class="form-group">
                <label for="">产品</label> <br/>
                <select class="form-control" name="product_id" id="productId">
                    <option value="">==请选择==</option>
                </select>
                <input type="hidden" value="get" id="method"/>
            </div>
            <div class="form-group">
                <label for="">事件类型</label> <br/>
                <select class="form-control" name="event_type" id="">
                    <option value="1">浏览产品详情</option>
                    <option value="2">扫码产品二维码</option>
                </select>
            </div>
            <div class="form-group">
                <button id="postBtn" class="btn btn-lg btn-success">提交</button>
            </div>
        </form>
    </div>

    <div class="row alert-info">
        <pre>Return:
        </pre>
        <pre>
        <div id="result"></div>
            </pre>
    </div>
</div>
<script src="http://127.0.0.1:9058/Public/admin/js/jquery.js"></script>
</body>
</html>

<script>
    $(document).ready(function(){



        $("#shop").change(function(){
            var shopId = $(this).val();
            if(shopId!="")
            {
                $.get("/api.php/debug/getProduct/?id="+shopId,function(data){
                    $("#productId").html(data);
                });
            }
        });

        $("#postBtn").click(function(e){
            e.preventDefault();

            $.ajax({
                type: $("#method").val(),
                url: $("#form").attr("action"),
                data: $("#form").serialize(),
                dataType: "text",
                success: function(data){
                    $("#result").empty();
                    //alert(111)
                    console.log(data);
                    $("#result").html(data+"");
                },
                error:function(data){
                    console.log(data);
                    $("#result").empty();
                    $("#result").html(data);
                }
            });
        });
    });
</script>