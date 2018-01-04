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
    <script>
        $(function(){
        });
    </script>
</head>

<body ontouchstart style="background-color: #f8f8f8;">
<div class="weui-header" style="background-color: #accbee;">
    <div class="weui-header-left"> <a href="{{url('/')}}" class="icon icon-109 f-white">返回</a> </div>
    <h1 class="weui-header-title">个人信息</h1>
</div>
<form method="post" action="{{url('/user/submit')}}">
    <input type="hidden" name="_token" value="{{csrf_token()}}">
    <div class="weui_cells weui_cells_form">
        <div class="weui_cell">
            <div class="weui_cell_hd"><label class="weui_label">真实姓名</label></div>
            <div class="weui_cell_bd weui_cell_primary">
                <input class="weui_input" type="text" name="user_name" placeholder="请输入真实姓名" value="{{$user->user_name}}"/>
            </div>
        </div>

        <div class="weui_cell">
            <div class="weui_cell_hd"><label class="weui_label">班级</label></div>
            <div class="weui_cell_bd weui_cell_primary">
                <input class="weui_input" type="text" name="user_class" placeholder="请输入班级" value="{{$user->user_class}}"/>
            </div>
        </div>

        <div class="weui_cell">
            <div class="weui_cell_hd"><label class="weui_label">学号</label></div>
            <div class="weui_cell_bd weui_cell_primary">
                <input class="weui_input" type="number" name="user_num" pattern="[0-9]*" placeholder="请输入学号" value="{{$user->user_num}}"/>
            </div>
        </div>
        <div class="weui_btn_area">
            <input class="weui_btn weui_btn_primary" type="submit" value="修改">
        </div>
    </div>
</form>
</body>
</html>
