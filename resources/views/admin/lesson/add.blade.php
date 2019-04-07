<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<meta name="renderer" content="webkit|ie-comp|ie-stand">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
<meta http-equiv="Cache-Control" content="no-siteapp" />
<!--[if lt IE 9]>
<!--<script type="text/javascript" src="{{asset('admins')}}/lib/html5shiv.js"></script>-->
<!--<script type="text/javascript" src="{{asset('admins')}}/lib/respond.min.js"></script>-->
<![endif]-->
	<link rel="stylesheet" type="text/css" href="{{asset('admins')}}/static/h-ui/css/H-ui.min.css" />
	<link rel="stylesheet" type="text/css" href="{{asset('admins')}}/static/h-ui.admin/css/H-ui.admin.css" />
	<link rel="stylesheet" type="text/css" href="{{asset('admins')}}/lib/Hui-iconfont/1.0.8/iconfont.css" />
	<link rel="stylesheet" type="text/css" href="{{asset('admins')}}/static/h-ui.admin/skin/default/skin.css" id="skin" />
	<link href="{{asset('admins')}}/lib/webuploader/0.1.5/webuploader.css" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" type="text/css" href="{{asset('admins')}}/static/h-ui.admin/css/style.css" />
<!--[if IE 6]>
<![endif]-->
<title>添加管理员 - 管理员管理 - H-ui.admin v3.1</title>
<meta name="keywords" content="H-ui.admin v3.1,H-ui网站后台模版,后台模版下载,后台管理系统模版,HTML后台模版下载">
<meta name="description" content="H-ui.admin v3.1，是一款由国人开发的轻量级扁平化网站后台模板，完全免费开源的网站后台管理系统模版，适合中小型CMS后台系统。">
</head>
<body>
<article class="page-container">
	<form class="form form-horizontal" id="form-admin-add">
		{{csrf_field()}}
	<div class="row cl">
		<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>课时名称：</label>
		<div class="formControls col-xs-8 col-sm-9">
			<input type="text" class="input-text" value="" placeholder="" id="lesson_name" name="lesson_name">
		</div>
	</div>
	<div class="row cl">
		<label class="form-label col-xs-4 col-sm-3">所属课程：</label>
		<div class="formControls col-xs-8 col-sm-9"> <span class="select-box" style="width:150px;">
			<select class="select" name="course_id" size="1">
				<option value="0">选择课程</option>
				@foreach($course as $v)
				<option value="{{$v->id}}">{{$v->course_name}}</option>
				@endforeach
			</select>
			</span> </div>
	</div>
	<div class="row cl">
		<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>封面图：</label>
		<div class="formControls col-xs-8 col-sm-9">
			<!--上传图片成功后的预览区域-->
			<div id="fileList" class="uploader-list"></div>
			<input type="text" class="input-text" name="lesson_img" id="cover_img" />
			<div id='a' style="">
				<div class="b" style="width: 700px">
					<div class="sr-only" style="width: 0%"></div>
				</div>
			</div>
			<!--上传按钮-->
			<div id="filePicker">选择图片</div>

		</div>
	</div>
	<div class="row cl">
		<label class="form-label col-xs-4 col-sm-3">视频：</label>
		<div class="formControls col-xs-8 col-sm-9">
			<input type="text" class="input-text" name="video_address" id="video_address" />
			<div id="a2">
				<div class="b2" style="width: 700px">
					<div class="sr-only" style="width: 0%"></div>
				</div>
			</div>
			<!--上传按钮-->
			<div id="filePicker2">选择视频</div>
		</div>
	</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>讲师名称：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" class="input-text" value="" placeholder="" id="teacher_name" name="teacher_name">
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>课时长度：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" class="input-text" value="" placeholder="" id="lesson_length" name="lesson_length">
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>状态：</label>
			<div class="formControls col-xs-8 col-sm-9 skin-minimal">
				<div class="radio-box">
					<input name="status" type="radio" value="1" id="sex-1" checked>
					<label for="sex-1">启用</label>
				</div>
				<div class="radio-box">
					<input type="radio" id="sex-2" name="status" value="0">
					<label for="sex-2">停用</label>
				</div>
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3">描述：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<textarea name="lesson_desc" cols="" rows="" class="textarea"  placeholder="说点什么...100个字符以内" dragonfly="true" onKeyUp="$.Huitextarealength(this,100)"></textarea>
				<p class="textarea-numberbar"><em class="textarea-length">0</em>/100</p>
			</div>
		</div>
		<div class="row cl">
			<div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-3">
				<input class="btn btn-primary radius" type="submit" value="&nbsp;&nbsp;提交&nbsp;&nbsp;">
			</div>
		</div>
	</form>
</article>

<!--_footer 作为公共模版分离出去-->
<script type="text/javascript" src="{{asset('admins')}}/lib/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript" src="{{asset('admins')}}/lib/layer/2.4/layer.js"></script>
<script type="text/javascript" src="{{asset('admins')}}/static/h-ui/js/H-ui.min.js"></script>
<script type="text/javascript" src="{{asset('admins')}}/static/h-ui.admin/js/H-ui.admin.js"></script> <!--/_footer 作为公共模版分离出去-->

<!--请在下方写此页面业务相关的脚本-->
<script type="text/javascript" src="{{asset('admins')}}/lib/jquery.validation/1.14.0/jquery.validate.js"></script>
<script type="text/javascript" src="{{asset('admins')}}/lib/jquery.validation/1.14.0/validate-methods.js"></script>
<script type="text/javascript" src="{{asset('admins')}}/lib/jquery.validation/1.14.0/messages_zh.js"></script>
<script type="text/javascript" src="{{asset('admins')}}/lib/webuploader/0.1.5/webuploader.min.js"></script>

<script type="text/javascript">
$(function(){
	$('.skin-minimal input').iCheck({
		checkboxClass: 'icheckbox-blue',
		radioClass: 'iradio-blue',
		increaseArea: '20%'
	});
    //上传图片的代码；
    var uploader = WebUploader.create({
        //选择图片后立即上传；
        auto: true,
        //加载一个插件文件
        swf: '{{asset("admins")}}/lib/webuploader/0.1.5/Uploader.swf',
        // 文件接收服务端(指定某个PHP文件来处理上传的文件，在laravel里面写路由即可，通过路由对应的方法完成上传操作)
        server: '{{url("admin/lesson/uploadimg")}}',
        // 选择文件的按钮。可选。
        // 内部根据当前运行是创建，可能是input元素，也可能是flash.
        //指定id = filePicker的dom元素为上传按钮；
        pick: '#filePicker',

        // 不压缩image, 默认如果是jpeg，文件上传前会压缩一把再上传！
        resize: false,
        // 只允许选择图片文件。
        accept: {
            title: 'Images',
            extensions: 'gif,jpg,jpeg,bmp,png',
            mimeTypes: 'image/*'
        },
        //指定提交时额外添加的一些数据（是post提交，所以laravel框架添加令牌信息）
        formData:{
            '_token':'{{csrf_token()}}'
        }
    });
    //上传成功后处理机制
    uploader.on( 'uploadSuccess', function( file,data ) {
        //data 参数就是服务器端返回的数据
        var imgs = "<img width='100' src='"+data.info+"'/>";
        $("#fileList").html(imgs);
        //滚动条消失
        $("#a .sr-only").hide();
        //上传成功后，把图片路径添加到input框里面；
        $("#cover_img").val(data.info);
        //layer.msg('上传成功');
    });

    //进度条显示；
    uploader.on( 'uploadProgress', function( file, percentage ) {
        //console.log(percentage * 100 + '%');
        $("#a .sr-only").css( 'width', percentage * 100 + '%' );
    });


    //完成上传视频
    //上传图片的代码；
    var uploader2 = WebUploader.create({
        //选择图片后立即上传；
        auto: true,
        //加载一个插件文件
        swf: '{{asset("admins")}}/lib/webuploader/0.1.5/Uploader.swf',
        // 文件接收服务端(指定某个PHP文件来处理上传的文件，在laravel里面写路由即可，通过路由对应的方法完成上传操作)
        server: '{{url("admin/lesson/uploadvideo")}}',
        // 选择文件的按钮。可选。
        // 内部根据当前运行是创建，可能是input元素，也可能是flash.
        //指定id = filePicker2的dom元素为上传按钮；
        pick: '#filePicker2',

        // 不压缩image, 默认如果是jpeg，文件上传前会压缩一把再上传！
        resize: false,

        //指定提交时额外添加的一些数据（是post提交，所以laravel框架添加令牌信息）
        formData:{
            '_token':'{{csrf_token()}}'
        }
    });

    //上传成功后处理机制
    uploader2.on( 'uploadSuccess', function( file,data ) {
        //data 参数就是服务器端返回的数据

        //滚动条消失
        $("#a2 .sr-only").hide();
        //上传成功后，把图片路径添加到input框里面；
        $("#video_address").val(data.info);
        //layer.msg('上传成功');
    });
    //进度条显示；
    uploader2.on( 'uploadProgress', function( file, percentage ) {
        //console.log(percentage * 100 + '%');
        $("#a2 .sr-only").css( 'width', percentage * 100 + '%' );
    });
	$('#form-admin-add').submit(function (event) {
		event.preventDefault();
		var data = $(this).serialize();
		$.ajax({
			url:'{{url("admin/lesson/add")}}',
			type:'post',
			data:data,
			dataType:'json',
			success:function (msg) {
			    console.log(msg)
				if(msg.info==1){
					layer.alert('添加成功',function(){
					    //dataTable插件重启请求
					    parent.mytable.api().ajax.reload();
					    //关闭弹窗
						layer_close();
					})
				}else{
				    layer.msg('添加失败:'+msg.error,{icon:5,time:3000});
				}
            }
		})
    });
	// $("#form-admin-add").validate({
	// 	rules:{
	// 		adminName:{
	// 			required:true,
	// 			minlength:4,
	// 			maxlength:16
	// 		},
	// 		password:{
	// 			required:true,
	// 		},
	// 		password2:{
	// 			required:true,
	// 			equalTo: "#password"
	// 		},
	// 		sex:{
	// 			required:true,
	// 		},
	// 		phone:{
	// 			required:true,
	// 			isPhone:true,
	// 		},
	// 		email:{
	// 			required:true,
	// 			email:true,
	// 		},
	// 		adminRole:{
	// 			required:true,
	// 		},
	// 	},
	// 	onkeyup:false,
	// 	focusCleanup:true,
	// 	success:"valid",
	// 	submitHandler:function(form){
	// 		$(form).ajaxSubmit({
	// 			type: 'post',
	// 			url: "xxxxxxx" ,
	// 			success: function(data){
	// 				layer.msg('添加成功!',{icon:1,time:1000});
	// 			},
    //             error: function(XmlHttpRequest, textStatus, errorThrown){
	// 				layer.msg('error!',{icon:1,time:1000});
	// 			}
	// 		});
	// 		var index = parent.layer.getFrameIndex(window.name);
	// 		parent.$('.btn-refresh').click();
	// 		parent.layer.close(index);
	// 	}
	// });
});
</script>
<!--/请在上方写此页面业务相关的脚本-->
</body>
</html>