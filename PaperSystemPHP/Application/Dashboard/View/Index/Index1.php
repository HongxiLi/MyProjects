<include file="Public/header" />
  <div class="page-content">
    <div class="content container">
      <div class="row">
        <div class="col-lg-12">
          <h2 class="page-title">控制中心 <small>Welcome.</small></h2>
        </div>
      </div>
      <div class="row">

      </div>
      <div class="row">
        <div class="col-lg-12">
           <div class="widget-container">
            <div class="panel-body">
                <table class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>服务器</th>
                        <th>Php 版本</th>
                        <th>Mysql 版本</th>
                    </tr>
                    </thead>
                    <tbody>

                    <tr class=" ">
                        <td>Apache/2.4.9 </td>
                        <td> PHP/5.5.12</td>
                        <td>MySql 5.0</td>
                    </tr>
                    <tr>
                        <th colspan="3">
                            服务器 Ip
                        </th>
                    </tr>
                    <tr>
                        <td colspan="3">
                           __ROOT__
                        </td>
                    </tr>
                    <tr>
                        <th colspan="3">
                           加载的模块
                        </th>
                    </tr>
                    <tr>
                        <?php
                        $modules = apache_get_modules();
                        if(!empty($modules)){
                        ?>
                    <tr>
                        <td>
                            <?php echo count($modules);?> 个模块
                        </td>
                        <td colspan="2">
                            <?php
                            foreach($modules as $i=>$m){
                                ?>

                                <?php echo $m;?> |
                            <?php
                            }
                            ?>
                        </td>
                        <?php
                        }
                        ?>
                    </tr>
                    </tbody>
                </table>
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
        $.post("{:U('Json/Index')}",function(data){
            //console.log(data);return;
            var jsonWether = JSON.parse(data);
            console.log(jsonWether);
            $("#cityName").html(jsonWether.weatherinfo.city);
            $("#wt").html(jsonWether.weatherinfo.weather);
            $("#weather").html(jsonWether.weatherinfo.temp2+"~"+jsonWether.weatherinfo.temp1);
            var wt = jsonWether.weatherinfo.img1;
            var wtArr = wt.split(".");
            //console.log(wtArr);
            var realPath = wtArr[0]+"0"+"."+wtArr[1];

            var wt = jsonWether.weatherinfo.img2;
            var wtArr = wt.split(".");

            var realPath2 = wtArr[0]+"0"+"."+wtArr[1];
            $("#tod").attr("src","http://www.weather.com.cn/m/i/icon_weather/42x30/"+realPath2);
            $("#tq").attr("src","http://www.weather.com.cn/m/i/icon_weather/42x30/"+realPath);
        });
    });

</script>