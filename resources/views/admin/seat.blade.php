<!--_meta 作为公共模版分离出去-->
<!DOCTYPE HTML>
<html>
<head>
	<meta charset="utf-8">
	<meta name="renderer" content="webkit|ie-comp|ie-stand">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
	<meta http-equiv="Cache-Control" content="no-siteapp" />
	<link rel="Bookmark" href="favicon.ico" >
	<link rel="Shortcut Icon" href="favicon.ico" />
	<!--[if lt IE 9]>
	<script type="text/javascript" src="{{asset('admin/lib/html5.js')}}"></script>
	<script type="text/javascript" src="{{asset('admin/lib/respond.min.js')}}"></script>
	<![endif]-->
	<link rel="stylesheet" type="text/css" href="{{asset('admin/static/h-ui/css/H-ui.min.css')}}" />
	<link rel="stylesheet" type="text/css" href="{{asset('admin/static/h-ui.admin/css/H-ui.admin.css')}}" />
	<link rel="stylesheet" type="text/css" href="{{asset('admin/lib/Hui-iconfont/1.0.8/iconfont.css')}}" />
	<link rel="stylesheet" type="text/css" href="{{asset('admin/static/h-ui.admin/skin/default/skin.css')}}" id="skin" />
	<link rel="stylesheet" type="text/css" href="{{asset('admin/static/h-ui.admin/css/style.css')}}" />
	<link rel="stylesheet" type="text/css" href="{{asset('admin/lib/zTree/v3/css/zTreeStyle/zTreeStyle.css')}}" />
	<!--[if IE 6]>
	<script type="text/javascript" src="http://lib.h-ui.net/DD_belatedPNG_0.0.8a-min.js" ></script>
	<script>DD_belatedPNG.fix('*');</script>
	<![endif]-->
	<!--/meta 作为公共模版分离出去-->

	<title>座位预约系统后台管理</title>
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
			<dd style="display: block;">
				<ul>
					<li><a href="{{url('manager/room')}}" title="教室管理">教室管理</a></li>
					<li class="current"><a href="{{url('manager/seat')}}" title="座位管理">座位管理</a></li>
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
			<dd>
				<ul>
					<li><a href="{{url('manager/sys/qrcode')}}" title="签到二维码">签到二维码</a></li>
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
	<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 座位管理 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
	<div class="Hui-article">
		<div class="pos-a" style="width:150px;left:0;top:0; bottom:0; height:100%; border-right:1px solid #e5e5e5; background-color:#f5f5f5">
			<ul id="treeDemo" class="ztree">
			</ul>
		</div>
		<div style="margin-left:150px;">
			<div class="pd-20">
				<div class="cl pd-5 bg-1 bk-gray mt-20">
					<span class="l">
					<a href="javascript:;" onclick="datadel()" class="btn btn-danger radius"><i class="Hui-iconfont">&#xe6e2;</i> 批量删除</a>
					<a class="btn btn-primary radius" onclick="product_add('添加座位','product-add.html')" href="javascript:;"><i class="Hui-iconfont">&#xe600;</i> 添加座位</a>
					<a class="btn btn-primary radius" onclick="product_add('批量添加','product-add.html')" href="javascript:;"><i class="Hui-iconfont">&#xe600;</i> 批量添加</a>
					</span>
					<span class="r">共有数据：<strong>54</strong> 条</span>
				</div>
				<div class="mt-20">
					<table class="table table-border table-bordered table-bg table-hover table-sort">
						<thead>
						<tr class="text-c">
							<th width="40"><input name="" type="checkbox" value=""></th>
							<th width="40">ID</th>
							<th width="60">座位号</th>
							<th width="100">当前状态</th>
							<th width="100">操作</th>
						</tr>
						</thead>
						<tbody>
						<tr class="text-c va-m">
							<td><input name="" type="checkbox" value=""></td>
							<td>001</td>
							<td class="text-l">123456</td>
							<td class="td-status"><span class="label label-success radius">已被预约</span></td>
							<td class="td-manage"><a style="text-decoration:none" onClick="product_stop(this,'10001')" href="javascript:;" title="下架"><i class="Hui-iconfont">&#xe6de;</i></a> <a style="text-decoration:none" class="ml-5" onClick="product_edit('产品编辑','product-add.html','10001')" href="javascript:;" title="编辑"><i class="Hui-iconfont">&#xe6df;</i></a> <a style="text-decoration:none" class="ml-5" onClick="product_del(this,'10001')" href="javascript:;" title="删除"><i class="Hui-iconfont">&#xe6e2;</i></a></td>
						</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</section>
<style type="text/css">
	.ztree li span.button.pIcon01_ico_open{margin-right:2px; background: url({{asset('admin/temp/1_open.png')}}) no-repeat scroll 0 0 transparent; vertical-align:top; *vertical-align:middle}
	.ztree li span.button.pIcon01_ico_close{margin-right:2px; background: url({{asset('admin/temp/1_close.png')}}) no-repeat scroll 0 0 transparent; vertical-align:top; *vertical-align:middle}
	.ztree li span.button.pIcon02_ico_open, .ztree li span.button.pIcon02_ico_close{margin-right:2px; background: url({{asset('admin/temp/2.png')}}) no-repeat scroll 0 0 transparent; vertical-align:top; *vertical-align:middle}
	.ztree li span.button.icon_ico_docu{margin-right:2px; background: url({{asset('admin/temp/3.png')}}) no-repeat scroll 0 0 transparent; vertical-align:top; *vertical-align:middle}
</style>

<!--_footer 作为公共模版分离出去-->
<script type="text/javascript" src="{{asset('admin/lib/jquery/1.9.1/jquery.min.js')}}"></script>
<script type="text/javascript" src="{{asset('admin/lib/layer/2.4/layer.js')}}"></script>
<script type="text/javascript" src="{{asset('admin/static/h-ui/js/H-ui.js')}}"></script>
<script type="text/javascript" src="{{asset('admin/static/h-ui.admin/js/H-ui.admin.page.js')}}"></script>
<!--/_footer /作为公共模版分离出去-->

<!--请在下方写此页面业务相关的脚本-->
<script type="text/javascript" src="{{asset('admin/lib/My97DatePicker/4.8/WdatePicker.js')}}"></script>
<script type="text/javascript" src="{{asset('admin/lib/datatables/1.10.0/jquery.dataTables.min.js')}}"></script>
<script type="text/javascript" src="{{asset('admin/lib/laypage/1.2/laypage.js')}}"></script>
<script type="text/javascript" src="{{asset('admin/lib/zTree/v3/js/jquery.ztree.all-3.5.min.js')}}"></script>
<script type="text/javascript">
	var setting = {
		data: {
			simpleData: {
				enable: true
			}
		}
	};

	var zNodes =[
		{ id:1, pId:0, name:"图书北馆", open:true, iconSkin:"pIcon01"},
		{ id:11, pId:1, name:"一层", iconSkin:"pIcon02"},
		{ id:21, pId:11, name:"101", iconSkin:"icon"},
		{ id:22, pId:11, name:"102", iconSkin:"icon"},
		{ id:23, pId:11, name:"102", iconSkin:"icon"},
		{ id:12, pId:1, name:"二层", iconSkin:"pIcon02"},
		{ id:24, pId:12, name:"201", iconSkin:"icon"},
		{ id:25, pId:12, name:"202", iconSkin:"icon"},
		{ id:26, pId:12, name:"202", iconSkin:"icon"},
		{ id:13, pId:1, name:"三层", iconSkin:"pIcon02"},
		{ id:27, pId:13, name:"201", iconSkin:"icon"},
		{ id:28, pId:13, name:"202", iconSkin:"icon"},
		{ id:29, pId:13, name:"202", iconSkin:"icon"},
		{ id:2, pId:0, name:"真知馆", open:true, iconSkin:"pIcon01"},
		{ id:14, pId:2, name:"一层", iconSkin:"pIcon02"},
		{ id:30, pId:14, name:"201", iconSkin:"icon"},
		{ id:31, pId:14, name:"202", iconSkin:"icon"},
		{ id:32, pId:14, name:"202", iconSkin:"icon"},
		{ id:15, pId:2, name:"二层", iconSkin:"pIcon02"},
		{ id:33, pId:15, name:"201", iconSkin:"icon"},
		{ id:34, pId:15, name:"202", iconSkin:"icon"},
		{ id:35, pId:15, name:"202", iconSkin:"icon"},
		{ id:16, pId:2, name:"三层", iconSkin:"pIcon02"},
		{ id:36, pId:16, name:"201", iconSkin:"icon"},
		{ id:37, pId:16, name:"202", iconSkin:"icon"},
		{ id:38, pId:16, name:"202", iconSkin:"icon"}
	];

	$(document).ready(function(){
		$.fn.zTree.init($("#treeDemo"), setting, zNodes);
	});
	$('.table-sort').dataTable({
		"aaSorting": [[ 1, "desc" ]],//默认第几个排序
		"bStateSave": true,//状态保存
		"searching": false,
		"lengthChange": false,
		"aoColumnDefs": [
			{"orderable":false,"aTargets":[0,4]}// 制定列不参与排序
		]
	});
	/*图片-添加*/
	function product_add(title,url){
		var index = layer.open({
			type: 2,
			title: title,
			content: url
		});
		layer.full(index);
	}
	/*图片-查看*/
	function product_show(title,url,id){
		var index = layer.open({
			type: 2,
			title: title,
			content: url
		});
		layer.full(index);
	}
	/*图片-审核*/
	function product_shenhe(obj,id){
		layer.confirm('审核文章？', {
					btn: ['通过','不通过'],
					shade: false
				},
				function(){
					$(obj).parents("tr").find(".td-manage").prepend('<a class="c-primary" onClick="product_start(this,id)" href="javascript:;" title="申请上线">申请上线</a>');
					$(obj).parents("tr").find(".td-status").html('<span class="label label-success radius">已发布</span>');
					$(obj).remove();
					layer.msg('已发布', {icon:6,time:1000});
				},
				function(){
					$(obj).parents("tr").find(".td-manage").prepend('<a class="c-primary" onClick="product_shenqing(this,id)" href="javascript:;" title="申请上线">申请上线</a>');
					$(obj).parents("tr").find(".td-status").html('<span class="label label-danger radius">未通过</span>');
					$(obj).remove();
					layer.msg('未通过', {icon:5,time:1000});
				});
	}
	/*图片-下架*/
	function product_stop(obj,id){
		layer.confirm('确认要下架吗？',function(index){
			$(obj).parents("tr").find(".td-manage").prepend('<a style="text-decoration:none" onClick="product_start(this,id)" href="javascript:;" title="发布"><i class="Hui-iconfont">&#xe603;</i></a>');
			$(obj).parents("tr").find(".td-status").html('<span class="label label-defaunt radius">已下架</span>');
			$(obj).remove();
			layer.msg('已下架!',{icon: 5,time:1000});
		});
	}

	/*图片-发布*/
	function product_start(obj,id){
		layer.confirm('确认要发布吗？',function(index){
			$(obj).parents("tr").find(".td-manage").prepend('<a style="text-decoration:none" onClick="product_stop(this,id)" href="javascript:;" title="下架"><i class="Hui-iconfont">&#xe6de;</i></a>');
			$(obj).parents("tr").find(".td-status").html('<span class="label label-success radius">已发布</span>');
			$(obj).remove();
			layer.msg('已发布!',{icon: 6,time:1000});
		});
	}
	/*图片-申请上线*/
	function product_shenqing(obj,id){
		$(obj).parents("tr").find(".td-status").html('<span class="label label-default radius">待审核</span>');
		$(obj).parents("tr").find(".td-manage").html("");
		layer.msg('已提交申请，耐心等待审核!', {icon: 1,time:2000});
	}
	/*图片-编辑*/
	function product_edit(title,url,id){
		var index = layer.open({
			type: 2,
			title: title,
			content: url
		});
		layer.full(index);
	}
	/*图片-删除*/
	function product_del(obj,id){
		layer.confirm('确认要删除吗？',function(index){
			$(obj).parents("tr").remove();
			layer.msg('已删除!',{icon:1,time:1000});
		});
	}

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