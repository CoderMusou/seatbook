<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>预约座位</title>
    <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=0">
    <link rel="stylesheet" href="{{asset('h5/css/weui.css')}}"/>
    <link rel="stylesheet" href="{{asset('h5/css/weui2.css')}}"/>
    <link rel="stylesheet" href="{{asset('h5/css/weui3.css')}}"/>
    <script src="{{asset('h5/js/zepto.min.js')}}"></script>
    <script src="{{asset('h5/js/select.js')}}"></script>
    <script src="{{asset('h5/js/picker.js')}}"></script>
    <script src="{{asset('h5/js/pinchzoom.min.js')}}"></script>
    <script>
        $(function(){
            $("#d1").select({
                title: "请选择座位号",
                items: [{!! $str !!}],
                onChange: function(d) {
                }
            });
            $("#d2").select({
                title: "请选择日期",
                items: [
                        @if(time() < strtotime(date("Y-m-d").' 22:00:00'))
                    {
                        title:'{{date("Y-m-d",time())}}',
                        value:1
                    },
                        @endif
                    {
                        title:'{{date("Y-m-d",strtotime("+1 day"))}}',
                        value:2
                    }
                ],
                onChange: function(d) {
                    if(d.values==1){
                        $("#d3").select({
                            title: "请选择时间段",
                            items: [
                                @if(time() < strtotime(date("Y-m-d").' 07:00:00'))
                                {
                                    title:'07:00-22:00',
                                    value:'{{strtotime(date("Y-m-d").' 07:00:00')}}'
                                },
                                @else
                                {
                                    title:'{{date("H:i",time())}}-22:00',
                                    value:'{{time()}}'
                                },
                                @endif
                            ],
                            onChange: function(d) {
                                $('#time').val(d.values);
                            }
                        });
                    }else{
                        $("#d3").select({
                            title: "请选择时间段",
                            items: [
                                {
                                    title:'07:00-22:00',
                                    value:'{{strtotime(date("Y-m-d",strtotime("+1 day")).' 07:00:00')}}'
                                }
                            ],
                            onChange: function(d) {
                                $('#time').val(d.values);
                            }
                        });
                    }
                }
            });
            $('#p1').click(function () {
                $.post(
                        '/tobook',
                        {
                            seat_id:$('#d1').val(),
                            start_time:$('#time').val(),
                            _token: '{{csrf_token()}}'
                        },
                        function(result){
                            if(result.status == "0"){
                                $.toast(result.msg);
                                window.location.href='/';
                            }else if(result.status == "1"){
                                $.toast(result.msg, "cancel");
                            }
                        });
            });
            $('div.pinch-zoom').each(function () {
                new RTP.PinchZoom($(this), {});
            });
            $('.open-popup').on('click', function(){
                $('div.pinch-zoom-container').css('height', $(document).height()-48);
            });

        });
    </script>
    <style type="text/css">
        div.pinch-zoom,div.pinch-zoom img{
            width: 100%;
            -webkit-user-drag: none;
        }
        div.page{
            margin: 0;
            position: relative;
            text-align: left;
        }
        div.pinch-zoom {
            position: relative;
        }
        div.pinch-zoom a{
            color: white;
            position: absolute;
            bottom: 10px;
            right: 10px;
            text-decoration: none;
            background: #333;
            padding: 3px;
            font-size: 11px;
        }

        div.pinch-zoom div.description {
            position: absolute;
            top: 500px;
            left: 210px;
        }

        div.pinch-zoom div.description h1{
            font-size: 40px;
            margin: 0;
            margin-bottom: 10px;
        }
        div.pinch-zoom div.description p{
            margin: 0;
        }

    </style>
</head>
<body ontouchstart class="page-bg" style="background-image: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);">
<div class="weui-header" style="background-color: #accbee;">
    <div class="weui-header-left"> <a href="javascript:window.history.back();" class="icon icon-109 f-white">返回</a> </div>
    <h1 class="weui-header-title">预约座位</h1>
</div>
<div class="weui_cells weui_cells_my">
<div class="weui_cell">
    <div class="weui_cell_bd weui_cell_primary">
        <p>座位分布图</p>
    </div>
    <div class="weui_cell_ft">点击可放大</div>
</div>
</div>
<a href="javascript:;" class="open-popup" data-target="#popup">
    <img src="{{asset($room_img)}}" class="img-border img-max img-radius img-seat">
</a>



<div class="weui_cells weui_cells_form " style="background-color: unset;">
    <div class="weui_cell">
        <div class="weui_cell_hd"><label for="" class="weui_label">座位:</label></div>
        <div class="weui_cell_bd weui_cell_primary">
            <input class="weui_input" type="text" value="" id='d1'/>
        </div>
    </div>
    <div class="weui_cell">
        <div class="weui_cell_hd"><label for="" class="weui_label">选择日期:</label></div>
        <div class="weui_cell_bd weui_cell_primary">
            <input class="weui_input" type="text" value="" id='d2'/>
        </div>
    </div>
    <div class="weui_cell">
        <div class="weui_cell_hd"><label for="" class="weui_label">选择时间段:</label></div>
        <div class="weui_cell_bd weui_cell_primary">
            <input class="weui_input" type="text" value="" id='d3'/>
            <input class="weui_input" type="hidden" value="" id='time'/>
        </div>
    </div>
</div>
<p class='page-bd-15' style="margin-top: 1.17647059em;"><a href="javascript:;" class="weui_btn weui_btn_popup close-popup" id="p1">选 座 位</a></p>

<div id="popup" class="weui-popup-container" style="background-image: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);">
    <div class="weui-popup-modal">
        <div class="weui-header" style="background-color: #accbee;">
            <h1 class="weui-header-title">座位分布图</h1>
            <div class="weui-header-right"><a href="javascript:;" class="icon icon-73 f-white close-popup" style="font-size: 24px;"></a></div>
        </div>
        <div class="page">
            <div class="pinch-zoom">

                <img src="{{asset($room_img)}}"/>
            </div>
        </div>
    </div>
</div>
</body>
</html>