<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
    <title>学号绑定</title>
    <link rel="stylesheet" href="{{asset('h5/css/bind.css')}}"/>
    <link rel="stylesheet" href="{{asset('h5/css/weui.css')}}"/>
    <link rel="stylesheet" href="{{asset('h5/css/weui2.css')}}"/>
    <link rel="stylesheet" href="{{asset('h5/css/weui3.css')}}"/>
</head>
<body>
<div id="login"></div>
<div class="login_bg">
    <div id="title">
        <p>学号绑定</p>
    </div>
    <form>
        <div class="userName">
            <lable>学&nbsp;&nbsp;&nbsp;号：</lable>
            <input type="text" id="user_num" placeholder="请输入学号" pattern="[0-9]{6,16}" required/>
        </div>
        <div class="passWord">
            <lable>密&nbsp;&nbsp;&nbsp;码：</lable>
            <input type="password" id="user_pass" placeholder="请输入密码" pattern="[0-9A-Za-z]{6,25}" required/>
        </div>
        <div class="choose_box">
            密码默认为：123456
        </div>
        <button class="login_btn" type="button">登&nbsp;&nbsp;录</button>
    </form>
    <div class="other_login">
        <div class="other"></div>
        <span>使用事项</span>
        <div class="other"></div>
    </div>
    <div class="msg">
        当前微信未绑定学号，须输入学号密码进行绑定，如绑定后仍进入此页面请联系管理员。
    </div>
</div>
<script src="{{asset('h5/js/zepto.min.js')}}"></script>
<script>
    $(function(){
        $('.login_btn').click(function () {
            $.post(
                '/user/bind',
                {user_num: $('#user_num').val(), user_pass: $('#user_pass').val(),_token: '{{csrf_token()}}'},
                function(result){
                    if(result.status == "0"){
                        $.toast(result.msg);
                        window.location.href='{{$_SESSION['target_url']}}';
                    }else if(result.status == "1"){
                        $.toast("学号或密码<br>不正确", "cancel");
                    }
                }
            );
        });
    });
</script>
</body>
</html>