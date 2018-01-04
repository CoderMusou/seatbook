<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>预约排行</title>
    <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=0">
    <link rel="stylesheet" href="{{asset('h5/css/weui.css')}}"/>
    <link rel="stylesheet" href="{{asset('h5/css/weui2.css')}}"/>
    <link rel="stylesheet" href="{{asset('h5/css/weui3.css')}}"/>
    <link rel="stylesheet" href="{{asset('h5/css/normalize3.0.2.min.css')}}"/>
    <link rel="stylesheet" href="{{asset('h5/css/css.css')}}"/>
    <script src="{{asset('h5/js/zepto.min.js')}}"></script>
    <script>
        $(function(){

        });
    </script>
    <style type="text/css">
        #ranking{
            top: 13%;
            height: 80%;
        }
        #ranking_title{
            width: 90%;
            left: 5%;
        }
    </style>
</head>
<body ontouchstart class="page-bg">
<div class="weui-header" style="background-color: #accbee;">
    <div class="weui-header-left"> <a href="javascript:window.history.back();" class="icon icon-109 f-white">返回</a> </div>
    <h1 class="weui-header-title">预约排行</h1>
</div>
<section id="ranking"> <span id="ranking_title">排名　　　昵称　　预约时长</span>
    <section id="ranking_list">
        @foreach($ranks as $k => $v)
        {{--<section class="box cur">--}}
        <section class="box">
            <section class="col_1" title="{{$k+1}}">{{$k+1}}</section>
            <section class="col_2"><img src="{{$v->headimgurl}}"  /></section>
            <section class="col_3">{{$v->nickname}}</section>
            <section class="col_4">{{floor($v->second/3600)}}</section>
        </section>
            @endforeach
    </section>
    <span id="play_game">我的排行：{{$rank}}</span> </section>
</body>
</html>
