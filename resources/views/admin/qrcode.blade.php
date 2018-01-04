<!--_meta 作为公共模版分离出去-->
<!DOCTYPE HTML>
<html>
<head>
	<meta charset="utf-8">
	<meta name="renderer" content="webkit|ie-comp|ie-stand">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
	<meta http-equiv="Cache-Control" content="no-siteapp" />
	<!--[if lt IE 9]>
	<script type="text/javascript" src="{{asset('admin/lib/html5.js')}}"></script>
	<script type="text/javascript" src="{{asset('admin/lib/respond.min.js')}}"></script>
	<![endif]-->
	<link rel="stylesheet" type="text/css" href="{{asset('admin/static/h-ui/css/H-ui.min.css')}}" />
	<link rel="stylesheet" type="text/css" href="{{asset('admin/static/h-ui.admin/css/H-ui.admin.css')}}" />
	<link rel="stylesheet" type="text/css" href="{{asset('admin/lib/Hui-iconfont/1.0.8/iconfont.css')}}" />
	<link rel="stylesheet" type="text/css" href="{{asset('admin/static/h-ui.admin/skin/default/skin.css')}}" id="skin" />
	<link rel="stylesheet" type="text/css" href="{{asset('admin/static/h-ui.admin/css/style.css')}}" />
	<!--[if IE 6]>
	<script type="text/javascript" src="http://lib.h-ui.net/DD_belatedPNG_0.0.8a-min.js" ></script>
	<script>DD_belatedPNG.fix('*');</script>
	<![endif]-->
	<!--/meta 作为公共模版分离出去-->

	<title>座位预约系统后台管理</title>
	<style type="text/css">
		.layui-layer-content{
			text-align: center;
		}
	</style>
</head>
<body>
<!--_header 作为公共模版分离出去-->
<header class="navbar-wrapper">
	<div class="navbar navbar-fixed-top">
		<div class="container-fluid cl"> <a class="logo navbar-logo f-l mr-10 hidden-xs" href="javascript:;">座位预约系统后台管理</a> <a class="logo navbar-logo-m f-l mr-10 visible-xs" href="javascript:;">座位预约系统后台管理</a>
			<span class="logo navbar-slogan f-l mr-10 hidden-xs">v1.0</span>
			<a aria-hidden="false" class="nav-toggle Hui-iconfont visible-xs" href="javascript:;">&#xe667;</a>
			<nav id="Hui-userbar" class="nav navbar-nav navbar-userbar hidden-xs">
				<ul class="cl">
					<li>超级管理员</li>
					<li class="dropDown dropDown_hover"> <a href="#" class="dropDown_A">admin <i class="Hui-iconfont">&#xe6d5;</i></a>
						<ul class="dropDown-menu menu radius box-shadow">
							<li><a href="javascript:;" onClick="myselfinfo()">修改密码</a>
							<li><a href="#">退出</a></li>
						</ul>
					</li>
					<li id="Hui-skin" class="dropDown right dropDown_hover"> <a href="javascript:;" class="dropDown_A" title="换肤"><i class="Hui-iconfont" style="font-size:18px">&#xe62a;</i></a>
						<ul class="dropDown-menu menu radius box-shadow">
							<li><a href="javascript:;" data-val="default" title="默认（黑色）">默认（黑色）</a></li>
							<li><a href="javascript:;" data-val="blue" title="蓝色">蓝色</a></li>
							<li><a href="javascript:;" data-val="green" title="绿色">绿色</a></li>
							<li><a href="javascript:;" data-val="red" title="红色">红色</a></li>
							<li><a href="javascript:;" data-val="yellow" title="黄色">黄色</a></li>
							<li><a href="javascript:;" data-val="orange" title="橙色">橙色</a></li>
						</ul>
					</li>
				</ul>
			</nav>
		</div>
	</div>
</header>
<!--/_header 作为公共模版分离出去-->

<!--_menu 作为公共模版分离出去-->
<aside class="Hui-aside">
	<div class="menu_dropdown bk_2">
		<dl id="menu-article">
			<dt><i class="Hui-iconfont">&#xe616;</i> 座位管理<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
			<dd>
				<ul>
					<li><a href="{{url('manager/room')}}" title="教室管理">教室管理</a></li>
					<li><a href="{{url('manager/seat')}}" title="座位管理">座位管理</a></li>
				</ul>
			</dd>
		</dl>
		<dl id="menu-member">
			<dt><i class="Hui-iconfont">&#xe60d;</i> 用户管理<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
			<dd>
				<ul>
					<li><a href="{{url('manager/user')}}" title="用户列表">用户列表</a></li>
					<li><a href="{{url('manager/user/breach')}}" title="违约的用户">违约的用户</a></li>
				</ul>
			</dd>
		</dl>
		<dl id="menu-product">
			<dt><i class="Hui-iconfont">&#xe620;</i> 预约管理<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
			<dd>
				<ul>
					<li><a href="{{url('manager/book')}}" title="当前预约列表">当前预约列表</a></li>
					<li><a href="{{url('manager/book/expire')}}" title="已过期预约列表">已过期预约列表</a></li>
				</ul>
			</dd>
		</dl>
		<dl id="menu-comments">
			<dt><i class="Hui-iconfont">&#xe622;</i> 通知管理<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
			<dd>
				<ul>
					<li><a href="{{url('manager/msg')}}" title="通知列表">通知列表</a></li>
					<li><a href="{{url('manager/msg/add')}}" title="发布通知">发布通知</a></li>
				</ul>
			</dd>
		</dl>
		<dl id="menu-tongji">
			<dt><i class="Hui-iconfont">&#xe61a;</i> 系统统计<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
			<dd>
				<ul>
					<li><a href="charts-1.html" title="折线图">折线图</a></li>
					<li><a href="charts-2.html" title="时间轴折线图">时间轴折线图</a></li>
					<li><a href="charts-3.html" title="区域图">区域图</a></li>
					<li><a href="charts-4.html" title="柱状图">柱状图</a></li>
					<li><a href="charts-5.html" title="饼状图">饼状图</a></li>
					<li><a href="charts-6.html" title="3D柱状图">3D柱状图</a></li>
					<li><a href="charts-7.html" title="3D饼状图">3D饼状图</a></li>
				</ul>
			</dd>
		</dl>
		<dl id="menu-system">
			<dt><i class="Hui-iconfont">&#xe62e;</i> 系统管理<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
			<dd style="display: block;">
				<ul>
					<li class="current"><a href="{{url('manager/sys/qrcode')}}" title="签到二维码">签到二维码</a></li>
					<li><a href="{{url('manager/sys/set')}}" title="系统设置">系统设置</a></li><!-- 预约规则等 -->
					<li><a href="{{url('manager/sys/pwd')}}" title="修改管理密码">修改管理密码</a></li>
				</ul>
			</dd>
		</dl>
	</div>
</aside>
<div class="dislpayArrow hidden-xs"><a class="pngfix" href="javascript:void(0);" onClick="displaynavbar(this)"></a></div>
<!--/_menu 作为公共模版分离出去-->

<section class="Hui-article-box">
	<nav class="breadcrumb"><i class="Hui-iconfont"></i> 首页
		<a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
	<div class="panel panel-primary" style="margin: 20px;">
		<div class="panel-header"> 签到二维码</div>
		<div class="panel-body" style="text-align: center;">

			<div align="center" id="qrcode"></div><br>
			{{--<input class="btn btn-primary size-M radius" onclick="qrcode()" type="button" value="点击放大">--}}
		</div>
	</div>
</section>

<!--_footer 作为公共模版分离出去-->
<script type="text/javascript" src="{{asset('admin/lib/jquery/1.9.1/jquery.min.js')}}"></script>
<script type="text/javascript" src="{{asset('admin/lib/layer/2.4/layer.js')}}"></script>
<script type="text/javascript" src="{{asset('admin/static/h-ui/js/H-ui.js')}}"></script>
<script type="text/javascript" src="{{asset('admin/static/h-ui.admin/js/H-ui.admin.page.js')}}"></script>
<script src="{{asset('admin/lib/jquery.qrcode.min.js')}}"></script>
<!--/_footer /作为公共模版分离出去-->

<!--请在下方写此页面业务相关的脚本-->
<script type="text/javascript">
	{{--function qrcode(){--}}
		{{--layer.open({--}}
			{{--type: 1,--}}
			{{--title: '签到二维码',--}}
			{{--shadeClose: true,--}}
			{{--shade: false,--}}
			{{--maxmin: true, //开启最大化最小化按钮--}}
			{{--area: ['893px', '600px'],--}}
			{{--content: '<img src="{{asset('admin/temp/qrcode.jpg')}}" class="thumbnail" style="margin:0 auto 20px;height:90%;">'--}}
		{{--});--}}
	{{--}--}}
    $(function(){
        qrcode();
    });
    function timest() {
        var tmp = Date.parse( new Date() ).toString();
        tmp = tmp.substr(0,10);
        return tmp;
    }
	function qrcode() {
        $('#qrcode').html("");
        $('#qrcode').qrcode({
            text: timest(),
            height: 350,
            width: 350
        })
    }
    window.setInterval("qrcode()",10000);
</script>
<!--/请在上方写此页面业务相关的脚本-->

<!--此乃百度统计代码，请自行删除-->
<script>
	var _hmt = _hmt || [];
	(function() {
		var hm = document.createElement("script");
		hm.src = "https://hm.baidu.com/hm.js?080836300300be57b7f34f4b3e97d911";
		var s = document.getElementsByTagName("script")[0];
		s.parentNode.insertBefore(hm, s);
	})();
</script>
<!--/此乃百度统计代码，请自行删除-->
</body>
</html>