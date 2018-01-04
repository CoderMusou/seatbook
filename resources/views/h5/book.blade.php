<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>我的预约</title>
    <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=0">
    <link rel="stylesheet" href="{{asset('h5/css/weui.css')}}"/>
    <link rel="stylesheet" href="{{asset('h5/css/weui2.css')}}"/>
    <link rel="stylesheet" href="{{asset('h5/css/weui3.css')}}"/>
    <script src="{{asset('h5/js/zepto.min.js')}}"></script>
    <script>
        $(function(){
            $.toptips('<span class="icon icon-91"></span> 往左拖动可取消预约','info');
            $('#tabbar').tab({defaultIndex:0,activeClass:"tab-check"});
            $('div#tabbar').css('height', $(document).height()-93);
        });
        function dels(id){
            $.confirm("您确定要取消吗?", "确认取消?", function() {
                $.post(
                        '/cancel/'+id,
                        {_token: '{{csrf_token()}}'},
                        function(result){
                            if(result.status == "0"){
                                $.toast(result.msg);
                                window.location=location;
                            }else if(result.status == "1"){
                                $.toast("取消失败", "cancel");
                            }
                        });
            }, function() {
                //取消操作
            });
        }
    </script>
</head>
<body ontouchstart class="page-bg">
<div class="weui-header" style="background-color: #accbee;">
    <div class="weui-header-left"> <a href="javascript:window.history.back();" class="icon icon-109 f-white">返回</a> </div>
    <h1 class="weui-header-title">我的预约</h1>
</div>
<div class="weui_tab" id="tabbar">
    <div class="weui_navbar">
        <a href="#nav1" class="weui_navbar_item">
            预约情况
        </a>
        <a href="#nav2" class="weui_navbar_item">
            违约情况
        </a>
    </div>
    <div class="weui_tab_bd">
        <div id="nav1" class="weui_tab_bd_item scroll weui_tab_bd_item_active">
            @foreach($books as $v)
                @if($v->book_status == 0)
            <div class="weui_cell slidelefts border-b">
                <div class="weui_cell_bd weui_cell_primary"  style="padding-left:0">
                    <div class="weui_media_bd">
                        <p><span class="icon icon-69"></span> <span>座位：</span>{{$v->room_desc.'-'.$v->seat_name}}</p>
                        <p><span class="icon icon-106"></span> <span>预约时段：</span>{{date('m-d H:i', $v->start_time).'~'.date('m-d H:i', $v->end_time)}}</p>
                        <span class="weui-badge" style="background-color:purple;margin-left: 5px;position: absolute;right: 5px;top: 30px;">可取消</span>
                    </div>
                </div>
                <div class="slideleft">
                    <span class="bg-red f-white dels" onclick="dels({{$v->book_id}})" style="background-color:purple;">取消预约</span>
                </div>
            </div>
                    @else
                        <div class="weui_cell border-b" style="background-color: #fff;">
                            <div class="weui_cell_primary"  style="padding-left:0">
                                <div class="weui_media_bd">
                                    <p><span class="icon icon-69"></span> <span>座位：</span>{{$v->room_desc.'-'.$v->seat_name}}</p>
                                    <p><span class="icon icon-106"></span> <span>预约时段：</span>{{date('m-d H:i', $v->start_time).'~'.date('m-d H:i', $v->end_time)}}</p>
                                    <span class="weui-badge" style="background-color:{{$book_color[$v->book_status]}};margin-left: 5px;position: absolute;right: 5px;top: 30px;">{{$book_status[$v->book_status]}}</span>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
        </div>
        <div id="nav2" class="weui_tab_bd_item scroll">
            @foreach($expire_books as $v)
            <div class="weui_cell border-b">
                <div class="weui_cell_primary"  style="padding-left:0">
                    <div class="weui_media_bd">
                        <p><span class="icon icon-69"></span> <span>座位：</span>{{$v->room_desc.'-'.$v->seat_name}}</p>
                        <p><span class="icon icon-106"></span> <span>预约时段：</span>{{date('m-d H:i', $v->start_time).'~'.date('m-d H:i', $v->end_time)}}</p>
                    </div>
                </div>
            </div>
                @endforeach
        </div>
    </div>
</div>
<script src="{{asset('h5/js/slideleft.js')}}"></script>
</body>
</html>
