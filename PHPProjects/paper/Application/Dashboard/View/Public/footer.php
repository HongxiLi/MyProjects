
<footer>
    <hr>
    <p class="am-padding-left">© 2016 {$configuration[0].title} - {$configuration[0].copyright}.</p>
</footer>

<!--[if lt IE 9]>
<script src="http://libs.baidu.com/jquery/1.11.1/jquery.min.js"></script>
<script src="http://cdn.staticfile.org/modernizr/2.8.3/modernizr.js"></script>
<script src="__PUBLIC__/1011/assets/js/polyfill/rem.min.js"></script>
<script src="__PUBLIC__/1011/assets/js/polyfill/respond.min.js"></script>
<script src="__PUBLIC__/1011/assets/js/amazeui.legacy.js"></script>
<![endif]-->

<!--[if (gte IE 9)|!(IE)]><!-->
<script src="__PUBLIC__/1011/assets/js/jquery.min.js"></script>
<script src="__PUBLIC__/1011/assets/js/amazeui.min.js"></script>
<!--<![endif]-->
<script src="__PUBLIC__/1011/assets/js/app.js"></script>


<script>

    $(document).ready(function(){


        $("#cancelBtn").click(function(){
            window.location.href = "{:U('Index/Index')}";
        });

       

        $("a.deleteBtn").click(function(){
            return confirm("确定要删除此条目吗?");
        });
        $("img").each(function(){
            var src = $(this).attr("src");
           // console.log(src);
            if(src==""||src=="/")
            {
                $(this).attr("src","__PUBLIC__/public/images/no.jpg");
                //$(this);
            }
        });
    } );
</script>
<script>
    $("#collapse").click(function(){
        $(".left-nav").slideToggle();
    });
</script>

</body>
</html>
