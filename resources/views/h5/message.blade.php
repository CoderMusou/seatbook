<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>通知中心</title>
    <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=0">
    <link rel="stylesheet" href="{{asset('h5/css/weui.css')}}"/>
    <link rel="stylesheet" href="{{asset('h5/css/weui2.css')}}"/>
    <link rel="stylesheet" href="{{asset('h5/css/weui3.css')}}"/>
    <script src="{{asset('h5/js/zepto.min.js')}}"></script>
    <script>
        $(function(){
        });
    </script>
</head>
<body ontouchstart class="page-bg">
<div class="weui-header" style="background-color: #accbee;">
    <div class="weui-header-left"> <a href="javascript:window.history.back();" class="icon icon-109 f-white">返回</a> </div>
    <h1 class="weui-header-title">通知中心</h1>
</div>
<div class="weui_cells" style="margin-top: 0;">
    @foreach($messageList as $v)
        <a href="{{url('/msg/'.$v->mes_id)}}" style="color: #000;">
    <div class="weui_cell">
        <div class="weui_cell_bd weui_cell_primary">
            <p style="overflow: hidden; text-overflow: ellipsis; display: -webkit-box; -webkit-box-orient: vertical; -webkit-line-clamp: 1;">{{$v->mes_title}}</p>
        </div>
        <div class="weui_cell_ft" style="font-size: 12px;">
            {{$v->updated_at}}
        </div>
    </div>
        </a>
        @endforeach
</div>
</body>
</html>
