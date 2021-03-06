﻿<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>空气质量监测</title>
<link rel='icon' href='../images/logo.ico' type=‘image/x-ico’/>
<link rel='stylesheet' type="text/css" href="../css/air.css"/>
<script src="../js/highcharts.js"></script>
<script src="../js/exporting.js"></script>
<script  src="../js/jquery-1.11.3.js"></script>
</head>

<h1><font color=""><img src="../images/logo.jpg" width="30px"></img>空气质量监测</font></h1>
<font size="5px">实时空气质量指数</font>

<select class='DivSelect' name="address">
<option value="jiangsu">新北区</p></option>
<option value="beijing">武进区</option>
<option value="shanghai">钟楼区</option>
<option value="chongqing">天宁区</option>
</select>

<div class="pos" style="float:right">
<?php echo(date('Y-m-d H:i:s'));?> 
星期<?php 
     $a=date('N');

	 echo str_replace(1,"一",str_replace(2,"二",str_replace(3,"三", str_replace(4,"四",str_replace(5,"五",str_replace(6,"六",str_replace(7,"日",$a)))))));
	
    ?>
</div>


<br/><br/>
<body background="../images/sky.jpg" link="green">
<script type="text/javascript">


$(document).ready(function() {
    Highcharts.setOptions({
            global: {
                useUTC: false
            },
            colors:"#08c,#ff5a00,orange".split(","),
            symbols: ["circle","triangle","square"]
        });
  
        var options = {
            chart: {
                renderTo: 'container',
                type: 'spline',
                marginRight: 10,
                events: {
                    load: function() {
                        // set up the updating of the chart each second
                        // var series = this.series[0];
                        $.each(this.series, function(idx, series) {
                            setInterval(function() {
                                var x = (new Date()).getTime(), // current time
                                    y = Math.random();
                                series.addPoint([x, y], true, true);
                            }, 10000*60*3);
                        });
                    }
                }
            },
            title: {
                text: '空气质量指数趋势'
            },
            subtitle: {
                text: " "
            },
            credits: {
                enabled: false
            },
            xAxis: {
                type: 'datetime',
                tickPixelInterval:30
            },
            yAxis: {
                title: {
                text: " "
            },
                startOnTick: true, //为true时，设置min才有效
                min: 0,
                plotLines: [{
                    value: 0,
                    width: 1,
                    color: '#808080'
                }]
            },
            tooltip: {
                formatter: function() {
                    return '<b>' + this.series.name + '</b><br/>' +
                        Highcharts.dateFormat('%Y-%m-%d %H:%M:%S', this.x) + '<br/>' + '<span style="color:#08c">' +
                        Highcharts.numberFormat(this.y, 2) + ' Kbps' + '</span>';
  
                }
            },
            legend: {
                enabled: true
            },
            exporting: {
                enabled: false
            },
            series: [{
                name: 'PM2.5',
                data: (function() {
                    // generate an array of random data
                    var data = [],
                        time = (new Date()).getTime(),
                        i;
  
                    for (i = -25; i <= 0; i++) {
                        data.push({
                            x: time + i * 10000 * 60*6,
                            y: Math.random()*9+1
                        });
                    }
                    return data;
                })()
            }, {
                name: 'PM10',
                data: (function() {
                    // generate an array of random data
                    var data = [],
                        time = (new Date()).getTime(),
						
                        i;
  
                    for (i = -25; i <= 0; i++) {
                        data.push({
                            x: time + i * 10000 * 60*6,
                            y: Math.random()*5+1
                        });
                    }
                    return data;
					    })()
            }, {
                name: 'CO',
                data: (function() {
                    // generate an array of random data
                    var data = [],
                        time = (new Date()).getTime(),
						
                        i;
  
                    for (i = -25; i <= 0; i++) {
                        data.push({
                            x: time + i * 10000 * 60*6,
                            y: Math.random()*20+1
                        });
                    }
                    return data;
                })()
            }]
        };
        chart = new Highcharts.Chart(options);
        });
	
		</script>
<br/>
<div  id="container" style="min-width: 400px; height: 480px; margin: 0 auto; overflow:hidden"></div>
<br/>
<br/>
<div class="end">
<span class="air">&nbsp;&nbsp;<a href="air_Knowledge.php" target="_blank">空气质量指数小常识</a><br/></span>
<span class="emp1"></span>
<span class="pm"><a href="pm_Context.php" target="_blank">PM2.5相关知识</a></span>
<span class="emp2"></span>
<span class="air_monitor"><a href="http://www.shu-ju.net/" target="_blank">PM2.5监测网</a><br/></span><br/><br/><br/>
</div>
</body>
</html>
<?php 
     echo "<br/>";
     for($i=0;$i<22;$i++){
         
         echo "&nbsp";
         
     }
    
     echo "2016 Hohai University·<a href='http://hmi.hhuc.edu.cn/'>人机互动实验室</a> © 版权所有";
?>