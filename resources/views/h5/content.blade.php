
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>{{$message->mes_title}}</title>
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

<body ontouchstart style="background-color: #f8f8f8;">
<div class="weui-header" style="background-color: #accbee;">
    <div class="weui-header-left"> <a href="javascript:window.history.back();" class="icon icon-109 f-white">返回</a> </div>
    <h1 class="weui-header-title"></h1>
</div>
<div class="weui-weixin">
    <div class="weui-weixin-ui">
        <!--页面开始-->
        <div class="weui-weixin-page">
            <h2 class="weui-weixin-title">{{$message->mes_title}}</h2>
            <div class="weui-weixin-info"><!--meta-->
                <em class="weui-weixin-em" >{{$message->created_at}}</em>
            </div><!--meta结束-->

            <div class="weui-weixin-content"><!--内容-->
                {{$message->mes_title}}
            </div><!--内容结束-->

            <div class="weui-weixin-tools"><!--工具条-->
                <div class="weui-weixin-read">阅读<span id="readnum">{{$message->mes_view}}</span>
            </div><!--工具条结束-->
        </div>
    </div>
</div>
</body>
</html>
