<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title></title>
    <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=0">
    <link rel="stylesheet" href="{{asset('h5/css/weui.css')}}"/>
    <link rel="stylesheet" href="{{asset('h5/css/weui2.css')}}"/>
    <link rel="stylesheet" href="{{asset('h5/css/weui3.css')}}"/>
    <script src="{{asset('h5/js/zepto.min.js')}}"></script>
    <script src="{{asset('h5/js/echarts.common.min.js')}}"></script>
    <script>
        $(function(){
        });
    </script>
</head>

<body ontouchstart class="page-bg">
<div class="weui-header" style="background-color: #accbee;">
    <div class="weui-header-left"> <a href="javascript:window.history.back();" class="icon icon-109 f-white">返回</a> </div>
    <h1 class="weui-header-title">预约统计</h1>
</div>
<div class="weui_panel weui_panel_access" style="background: none;height: 90%;">
    <div class="weui_panel_bd" style="height: 80%;">
        <div class="weui_media_box weui_media_text" style="height: 50%;">
            <div id="main" style="width: 100%;height:100%;"></div>
        </div>
        <div class="weui_media_box weui_media_text" style="height: 50%;">
            <div id="main2" style="width: 100%;height:100%;"></div>
        </div>
    </div>
</div>
<script type="text/javascript">
    var myChart = echarts.init(document.getElementById('main'));
    option = {
        title: {
            text: '每日统计',
            subtext: '显示最近一周去图书馆的时长'
        },
        color: ['#3398DB'],
        tooltip : {
            trigger: 'axis',
            axisPointer : {            // 坐标轴指示器，坐标轴触发有效
                type : 'shadow'        // 默认为直线，可选为：'line' | 'shadow'
            }
        },
        grid: {
            left: '3%',
            right: '4%',
            bottom: '3%',
            containLabel: true
        },
        xAxis : [
            {
                type : 'category',
                data : ['{!! $day !!}'],
                axisTick: {
                    alignWithLabel: true
                }
            }
        ],
        yAxis : [
            {
                type : 'value'
            }
        ],
        series : [
            {
                name:'当日时长',
                type:'bar',
                barWidth: '60%',
                data:[{!! $day_count !!}]
            }
        ]
    };
    myChart.setOption(option);
    var myChart2 = echarts.init(document.getElementById('main2'));
    option = {
        title: {
            text: '每月统计',
            subtext: '显示最近半年去图书馆的次数'
        },
        color: ['#3398DB'],
        tooltip : {
            trigger: 'axis',
            axisPointer : {            // 坐标轴指示器，坐标轴触发有效
                type : 'shadow'        // 默认为直线，可选为：'line' | 'shadow'
            }
        },
        grid: {
            left: '3%',
            right: '4%',
            bottom: '3%',
            containLabel: true
        },
        xAxis : [
            {
                type : 'category',
                data : ['{!! $month !!}'],
                axisTick: {
                    alignWithLabel: true
                }
            }
        ],
        yAxis : [
            {
                type : 'value'
            }
        ],
        series : [
            {
                name:'当月次数',
                type:'bar',
                barWidth: '60%',
                data:[{!! $month_count !!}]
            }
        ]
    };
    myChart2.setOption(option);
</script>
</body>
</html>
