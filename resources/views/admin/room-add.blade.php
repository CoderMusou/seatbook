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
    <link rel="stylesheet" type="text/css" href="{{asset('admin/lib/webuploader/0.1.5/webuploader.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('admin/style.css')}}" />
    <title>添加教室</title>
</head>
<body>
<div class="page-container">
    <form action="" method="post" class="form form-horizontal" id="form-article-add">
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>名称：</label>
            <div class="formControls col-xs-8 col-sm-9">
                <input type="text" class="input-text" value="" placeholder="" id="" name="">
            </div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>上级：</label>
            <div class="formControls col-xs-8 col-sm-9"> <span class="select-box">
        <select name="" class="select" onchange="selectChange()">
          <option value="0">添加馆区</option>
            @foreach($level as $v)
                <option value="{{$v['room_id']}}" level="{{$v['room_level']}}">{{$v['_room_name']}}</option>
            @endforeach
        </select>
        </span> </div>
        </div>
        <div class="row cl" id="room_img" style="display: none;">
            <label class="form-label col-xs-4 col-sm-2">教室平面图：</label>
            <div class="formControls col-xs-8 col-sm-9">
                <div class="uploader-thum-container">
                    <label id="browse" class="uploadImg">
                        <input type="file" />
                        <span>教室平面图</span>
                    </label>
                    <img id="thumb_img" />
                    <input type="hidden" id="tic_img"  value="" />
                </div>
            </div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-2">描述：</label>
            <div class="formControls col-xs-8 col-sm-9">
                <textarea name="" cols="" rows="" class="textarea"  placeholder="说点什么...最少输入10个字符" datatype="*10-100" dragonfly="true" nullmsg="备注不能为空！" onKeyUp="textarealength(this,200)"></textarea>
                <p class="textarea-numberbar"><em class="textarea-length">0</em>/200</p>
            </div>
        </div>
        <div class="row cl">
            <div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-2">
                <button onClick="article_save_submit();" class="btn btn-primary radius" type="submit"><i class="Hui-iconfont">&#xe632;</i> 添加</button>
                <button onClick="layer_close();" class="btn btn-default radius" type="button">&nbsp;&nbsp;取消&nbsp;&nbsp;</button>
            </div>
        </div>
    </form>
</div>
<!--_footer 作为公共模版分离出去-->
<script type="text/javascript" src="{{asset('admin/lib/jquery/1.9.1/jquery.min.js')}}"></script>
<script type="text/javascript" src="{{asset('admin/lib/layer/2.4/layer.js')}}"></script>
<script type="text/javascript" src="{{asset('admin/static/h-ui/js/H-ui.js')}}"></script>
<script type="text/javascript" src="{{asset('admin/static/h-ui.admin/js/H-ui.admin.page.js')}}"></script>
<!--/_footer /作为公共模版分离出去-->

<!--请在下方写此页面业务相关的脚本-->
<script type="text/javascript" src="{{asset('admin/lib/jquery.validation/1.14.0/jquery.validate.js')}}"></script>
<script type="text/javascript" src="{{asset('admin/lib/jquery.validation/1.14.0/validate-methods.js')}}"></script>
<script type="text/javascript" src="{{asset('admin/lib/jquery.validation/1.14.0/messages_zh.js')}}"></script>
<script src="{{asset('admin/lib/plupload/js/plupload.full.min.js')}}"></script>
<script src="{{asset('admin/lib/plupload/js/i18n/zh_CN.js')}}"></script>
<script type="text/javascript">
    $(function(){
        var uploader = new plupload.Uploader({
            browse_button : 'browse', //用此id触发对象
            url : '{{url('manager/upload')}}', //上传到php页面进行处理
            flash_swf_url : '{{asset('man/lib/plupload/js/Moxie.swf')}}',
            silverlight_xap_url : '{{asset('man/lib/plupload/js/Moxie.xap')}}',
            filters: {
                mime_types : [ //限制上传文件的类型 图片/视频
                    { title : "Image files", extensions : "jpg,gif,png" }
                ],
                max_file_size : '2000kb' //最大只能上传20000kb的文件
            },
            multipart_params: {
                '_token': '{{csrf_token()}}'
            }
        });
        //使用init()方法进行初始化
        uploader.init();
        //绑定各种事件，实现所需功能
        uploader.bind('FilesAdded',function(uploader,files){
            uploader.start();
        });
        uploader.bind('FileUploaded',function(uploader,file,obj){
            $('#thumb_img').attr('src','/'+obj.response);
            $('#tic_img').val(obj.response);
            $('#tic_img').next().attr("class", "").text("");
        });

        uploader.bind('Error',
            function (up, err) { layer.msg("文件上传失败,错误信息: "
                + err.message, {icon: 5})});
    });

    function selectChange() {
        var flag = $("select").find('option:selected').attr("level");
        if (flag == 2){
            $("#room_img").css("display", "block");
        }else {
            $("#room_img").css("display", "none");
        }
    }
</script>
</body>
</html>