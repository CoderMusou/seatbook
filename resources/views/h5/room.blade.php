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
    <script src="{{asset('h5/js/picker.js')}}"></script>
    <script src="{{asset('h5/js/select.js')}}"></script>
    <script>
        $(function(){
            $("#d1").select({
                title: "选择分馆",
                items: [
                    {!! $room !!}
                ],
                onChange: function(d) {
                    $.post(
                            '/getsub',
                            {
                                pid:d.values,
                                _token: '{{csrf_token()}}'
                            },
                            function(result){
                                d2init(result);
                            });
                }
            });
            function d2init(result) {
                $("#d2").select({
                    title: "选择楼层",
                    items: result,
                    onChange: function(d) {
                        $.post(
                                '/getsub',
                                {
                                    pid:d.values,
                                    _token: '{{csrf_token()}}'
                                },
                                function(result){
                                    d3init(result);
                                });
                    }
                });
            }
            function d3init(result) {
                $("#d3").select({
                    title: "选择教室",
                    items: result,
                    onChange: function (d) {
                        $('.page-bd-15 > a').attr("href","./seat/"+d.values);
                    }
                });
            }
        });
    </script>
</head>
<body ontouchstart class="page-bg" style="background-image: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);">
<div class="weui-header" style="background-color: #accbee;">
    <div class="weui-header-left"> <a href="javascript:window.history.back();" class="icon icon-109 f-white">返回</a> </div>
    <h1 class="weui-header-title">预约座位</h1>
</div>
<div class="weui_cells weui_cells_form " style="background-color: unset;">
    <div class="weui_cell">
        <div class="weui_cell_hd"><label for="" class="weui_label">分馆:</label></div>
        <div class="weui_cell_bd weui_cell_primary">
            <input class="weui_input" type="text" value="" id='d1'/>
        </div>
    </div>
    <div class="weui_cell">
        <div class="weui_cell_hd"><label for="" class="weui_label">楼层:</label></div>
        <div class="weui_cell_bd weui_cell_primary">
            <input class="weui_input" type="text" value="" id='d2'/>
        </div>
    </div>
    <div class="weui_cell">
        <div class="weui_cell_hd"><label for="" class="weui_label">教室:</label></div>
        <div class="weui_cell_bd weui_cell_primary">
            <input class="weui_input" type="text" value="" id='d3'/>
        </div>
    </div>
</div>
<p class='page-bd-15' style="margin-top: 1.17647059em;"><a href="" class="weui_btn weui_btn_popup close-popup" id="p1">选 座 位</a></p>
</body>
</html>
