<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>首 页</title>
    <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=0">
    <link rel="stylesheet" href="{{asset('h5/css/weui.css')}}"/>
    <link rel="stylesheet" href="{{asset('h5/css/weui2.css')}}"/>
    <link rel="stylesheet" href="{{asset('h5/css/weui3.css')}}"/>
    <script src="{{asset('h5/js/zepto.min.js')}}"></script>
    <script src="{{asset('h5/js/select.js')}}"></script>
    <script>
        $(function(){
            $('#qr-code').click(function(){
                $('#qr').fadeIn();
            });
            @if($book_status['code'] == 1)
            $('#part').click(function () {
                $.post(
                        '/topart/{{$book_status['book_id']}}',
                        {_token: '{{csrf_token()}}'},
                        function(result){
                            if(result.status == "0"){
                                $.toast(result.msg);
                                $(".nav-box span").text("暂离");
                                window.location=location;
                            }else if(result.status == "1"){
                                $.toast("失败", "cancel");
                            }
                        });
            });
            @endif
            @if($book_status['code'] == 1 || $book_status['code'] == 2)
            $('#leave').click(function () {
                $.post(
                        '/toleave/{{$book_status['book_id']}}',
                        {_token: '{{csrf_token()}}'},
                        function(result){
                            if(result.status == "0"){
                                $.toast(result.msg);
                                $(".nav-box span").text("无预约");
                                window.location=location;
                            }else if(result.status == "1"){
                                $.toast("失败", "cancel");
                            }
                        });
            });
            @endif
        });
    </script>
</head>
<body ontouchstart style="background-image: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);">
<div class="weui-img-box">
    <div class="weui-img" style="background-image:url('{{asset('h5/images/library.jpg')}}');height: 250px;padding: 0;"></div>
    <div class="weui-img-masker" style="text-align: center;">
        <!-- 头像 -->
        <a href="{{url('/user')}}">
            <div class="weui-avatar-circle" style="margin:50px 0 30px 0;">
                <img class="weui-avatar-url" src="{{$user->headimgurl}}">
                <img class="weui-avatar-status" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABQAAAAUCAYAAACNiR0NAAAABHNCSVQICAgIfAhkiAAAAAlwSFlzAAALEgAACxIB0t1+/AAAABx0RVh0U29mdHdhcmUAQWRvYmUgRmlyZXdvcmtzIENTNui8sowAAAKvSURBVDiNjdVLbFRVHAbw373z6GNqC1oMomzsjLKwJipuTHxsTAWVsHGjYtQdbKpSXZC4cuEjPlhhmhhNICbsjCQkNbgwGNBElIRxQewQiBiIDRTLY1qnM3NdnLmd6WC1J7k5yTnn++53v/P/fzdKksQqxr7WvOv/DmZXWB9DL/J40fXKVhIGSnfhAGpYwDfdwOhfFG7VqB72189EeWaPU/ko7BR3c+sjJDXWPESm/xkc/i/CHpT9+mZJ5RNyQyRNsgNht36dKGZxjpHXGP1wGve31IK4Y96Ok2a+Lfl9P30byN4SSKNMeHJDYa1vA+f3M3OkhJMtbNypcMzi3JTT73D+AHGOaCV7E+rXiHuC+o072PQ2uaEtmEoV9rla5sxeMr0rkyVNGguMvE7PeuJswFwtB46OT05k+sMnidpKdPqbsDjLvXuConveon4jYDL9KWCJ8BWXjwYFKbhZozHfWouoXeLucUbGqV3m7CSZPpIGl47Cy6mH+9yo7PT9EwEYxTTr3PceSUR5PHi28SUe/Cy86IdtXPmR3FqSehDw6HcUip/ebFazTs867nyOuJfcAH8c5IHJsP/Lq8weIz/cYcmSNVGMXQrFQ4oToc7iHAsXODbG339yx3YePhjKprybi18tJ6tfozhBoXgIO1MPPzf8WIsfmQJzpzj+NNVzYe239zk3SX7d8suKMgw/Dl/Q7uVIoxo6IO2K3BqqZ/npedY/G9ovf1uXP0nANKrS8kgVzhscDTfYmG8bnR0MCqc/IFvQLinhTGMhYAZHA4d2p8TYhnfNHNnkxAuhwJfed9PNBbLNX3L7k6exB1+j2R0OvTilPFFyZu9qwqGCUR3hsHJ8XTlBnMbXx2Gn+EaIr2aNtZtXFV/peMqygJ3eAgZKU5YH7FQ3cCXC7rHqX8A/NW4G8HFjBmAAAAAASUVORK5CYII=">
            </div>
        </a>
        <!-- 三个列表：可预约、已违约 -->
        <div class="weui-flex" style="height: 80px;">
            <div class="weui-flex-item" style="border-right: 1px #fff solid"><a href="{{url('/room')}}"><span style="font-size: 22px;color: #fff;">可预约</span><p style="font-size: 32px; color: #3dffe8;">{{$count}}</p></a></div>
            <div class="weui-flex-item"><a href="{{url('/book')}}"><span style="font-size: 22px;color: #fff;">已违约</span><p style="font-size: 32px; color: #ff545e;">{{$count2['count']}}</p></a></div>
        </div>
    </div>
</div>
<!-- 通知栏 -->
<div class="weui_panel" style="margin-top: 0;">
    <div class="weui_media_box weui_media_small_appmsg">
        <div class="weui_cells weui_cells_access" style="background-image: linear-gradient(to top, #dfe9f3 5%, white 50%, #dfe9f3 95%);">
            <a class="weui_cell" href="{{url('/msg/'.$messageNew['mes_id'])}}">
                <div class="weui_cell_hd">
                    <span class="icon icon-52"> </span>
                </div>
                <div class="weui_cell_bd weui_cell_primary">
                    <p style="font-size: 12px;">
                        最新通知：{{$messageNew['mes_title']}}
                    </p>
                </div>
                <span class="weui_cell_ft"></span>
            </a>
        </div>
    </div>
</div>
<!-- 功能宫格 -->
<div class="weui_grids">
    <a href="{{url('/room')}}" class="weui_grid js_grid">
        <div class="weui_grid_icon">
            <img src="{{asset('h5/images/icon_nav_button.png')}}" alt="">
        </div>
        <p class="weui_grid_label">
            马上预约
        </p>
    </a>
    <a href="{{url('/book')}}" class="weui_grid js_grid">
        <div class="weui_grid_icon">
            <img src="{{asset('h5/images/icon_nav_cell.png')}}" alt="">
        </div>
        <p class="weui_grid_label">
            我的预约
        </p>
    </a>
    <a href="{{url('/msg')}}" class="weui_grid js_grid">
        <div class="weui_grid_icon">
            <img src="{{asset('h5/images/icon_nav_toast.png')}}" alt="">
        </div>
        <p class="weui_grid_label">
            通知中心
        </p>
    </a>
    <a href="{{url('/rank')}}" class="weui_grid js_grid">
        <div class="weui_grid_icon">
            <img src="{{asset('h5/images/icon_nav_dialog.png')}}" alt="">
        </div>
        <p class="weui_grid_label">
            预约排行
        </p>
    </a>
    <a href="{{url('/count')}}" class="weui_grid js_grid">
        <div class="weui_grid_icon">
            <img src="{{asset('h5/images/icon_nav_progress.png')}}" alt="">
        </div>
        <p class="weui_grid_label">
            预约统计
        </p>
    </a>
    <a href="javascript:;" class="weui_grid js_grid open-popup" data-target="#popup">
        <div class="weui_grid_icon">
            <img src="{{asset('h5/images/icon_nav_msg.png')}}" alt="">
        </div>
        <p class="weui_grid_label">
            预约规则
        </p>
    </a>
</div>
<nav class="nav-box">
    <ul class="nav-bottom">
        <li class="nav-item">
            <a href="javascript:;" id="part" class="nav clof">暂时离开</a>
        </li>
        <li class="nav-item">
            <a href="javascript:;" id="leave" class="nav">完全签退</a>
        </li>
    </ul>
    <span class="status">
    	{{$book_status['status']}}
    </span>
</nav>
<div class="weui-footer weui-footer-fixed-bottom" style="bottom: 0;font-size: 12px;">
    <p class="weui-footer-links">
        <a href="javascript:;" class="weui-footer-link" id='qr-code'><span class="icon icon-25" style="font-size: 12px;"></span> {{$config['school_name']}}</a>
    </p>
    <p class="weui-footer__text">
        本应用由<a href="javascript:;" style="text-decoration: underline;">Wseek</a>团队提供技术支持
    </p>
</div>
<div id="popup" class="weui-popup-container">
    <div class="weui-popup-modal">
        <div class="weui-header" style="background-color: #accbee;">
            <h1 class="weui-header-title">预约规则</h1>
            <div class="weui-header-right"><a href="javascript:;" class="icon icon-73 f-white close-popup" style="font-size: 24px;"></a></div>
        </div>
        <div class="weui_article" style="font-size: 4vw;">
            {!! $config['book_rule'] !!}
        </div>
    </div>
</div>
<div class="weui_msg_img hide" id='qr'>
    <div class="weui_msg_com">
        <div onclick="$('#qr').fadeOut();" class="weui_msg_close">
            <i class="icon icon-95"></i>
        </div>
        <div class="weui_msg_src">
            <img src="{{asset($config['code_url'])}}">
        </div>
        <p class="weui_msg_comment">
            长按上方二维码关注本校园号
        </p>
    </div>
</div>
</body>
</html>