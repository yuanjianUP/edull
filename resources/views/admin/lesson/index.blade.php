<!DOCTYPE HTML>
<html>
<head>
	<meta charset="utf-8">
	<meta name="renderer" content="webkit|ie-comp|ie-stand">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
	<meta http-equiv="Cache-Control" content="no-siteapp" />
	<!--[if lt IE 9]>
	<script type="text/javascript" src="{{asset('admins')}}/lib/html5shiv.js"></script>
	<script type="text/javascript" src="{{asset('admins')}}/lib/respond.min.js"></script>
	<![endif]-->
	<link rel="stylesheet" type="text/css" href="{{asset('admins')}}/static/h-ui/css/H-ui.min.css" />
	<link rel="stylesheet" type="text/css" href="{{asset('admins')}}/static/h-ui.admin/css/H-ui.admin.css" />
	<link rel="stylesheet" type="text/css" href="{{asset('admins')}}/lib/Hui-iconfont/1.0.8/iconfont.css" />
	<link rel="stylesheet" type="text/css" href="{{asset('admins')}}/static/h-ui.admin/skin/default/skin.css" id="skin" />
	<link rel="stylesheet" type="text/css" href="{{asset('admins')}}/static/h-ui.admin/css/style.css" />
	<!--[if IE 6]>
	<script type="text/javascript" src="{{asset('admins')}}/lib/DD_belatedPNG_0.0.8a-min.js" ></script>
	<script>DD_belatedPNG.fix('*');</script>
	<![endif]-->
	<title>用户管理</title>
</head>
<body>
<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 用户中心 <span class="c-gray en">&gt;</span> 用户管理 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
<div class="page-container">
	<div class="text-c"> 日期范围：
		<input type="text" onfocus="WdatePicker({ maxDate:'#F{$dp.$D(\'datemax\')||\'%y-%M-%d\'}' })" id="datemin" class="input-text Wdate" style="width:120px;">
		-
		<input type="text" onfocus="WdatePicker({ minDate:'#F{$dp.$D(\'datemin\')}',maxDate:'%y-%M-%d' })" id="datemax" class="input-text Wdate" style="width:120px;">
		<input type="text" class="input-text" style="width:250px" placeholder="输入课程部分名称" id="title" name="">
		<button type="submit" class="btn btn-success radius" id="searchLesson" name=""><i class="Hui-iconfont">&#xe665;</i> 搜课时</button>
	</div>
	<div class="cl pd-5 bg-1 bk-gray mt-20"> <span class="l"><a href="javascript:;" onclick="datadel()" class="btn btn-danger radius"><i class="Hui-iconfont">&#xe6e2;</i> 批量删除</a> <a href="javascript:;" onclick="lesson_add()" class="btn btn-primary radius"><i class="Hui-iconfont">&#xe600;</i> 添加课时</a></span> <span class="r">共有数据：<strong>88</strong> 条</span> </div>
	<div class="mt-20">
		<table class="table table-border table-bordered table-hover table-bg table-sort">
			<thead>
			<tr class="text-c">
				<th width="25"><input type="checkbox" name="" value=""></th>
				<th width="40">ID</th>
				<th width="150">课时名称</th>
				<th width="80">课程名称</th>
				<th width="80">专业名称</th>
				<th width="50">讲师名称</th>
				<th width="">播放视频</th>
				<th width="130">缩略图</th>
				<th width="70">状态</th>
				<th width="100">操作</th>
			</tr>
			</thead>
			<tbody>

			</tbody>
		</table>
	</div>
</div>
<!--_footer 作为公共模版分离出去-->
<script type="text/javascript" src="{{asset('admins')}}/lib/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript" src="{{asset('admins')}}/lib/layer/2.4/layer.js"></script>
<script type="text/javascript" src="{{asset('admins')}}/static/h-ui/js/H-ui.min.js"></script>
<script type="text/javascript" src="{{asset('admins')}}/static/h-ui.admin/js/H-ui.admin.js"></script> <!--/_footer 作为公共模版分离出去-->

<!--请在下方写此页面业务相关的脚本-->
<script type="text/javascript" src="{{asset('admins')}}/lib/My97DatePicker/4.8/WdatePicker.js"></script>
<script type="text/javascript" src="{{asset('admins')}}/lib/datatables/1.10.0/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="{{asset('admins')}}/lib/laypage/1.2/laypage.js"></script>
<script type="text/javascript">
    $(function(){
        //给搜索课时按钮绑定事件
        $("#searchLesson").click(function(){
            //触发什么呢？让dataTable插件重新ajax请求，并且携带搜索条件；
            mytable.api().ajax.reload();

        });
        //给dataTable插件一个名称；
        mytable = $('.table-sort').dataTable({
            "lengthMenu": [ [2, 3, 5], ['二条','三条','五条'] ],
            "paging":true,
            "info":true,
            "searching":false,
            "ordering":true,
            "order":[[1,'desc']],
            "stateSave":false,
            "columnDefs": [{
                "targets": [0,3,4,9],
                "orderable": false
            }],
            "processing":true,
            "serverSide": true,
            "ajax": {
                "url": "{{url('admin/lesson/index')}}",
                "type": "POST",
                'headers': { 'X-CSRF-TOKEN' : '{{ csrf_token() }}' },
                data:function(data){
                    data.title = $("#title").val();
                    data.datemin = $("#datemin").val();
                    data.datemax = $("#datemax").val();
                }
            },
            "columns": [
                {'data':'a',"defaultContent": "复选框"},
                {'data':'id'},
                {'data':'lesson_name'},
                {'data':'course.course_name'},
                {'data':'course.profession.profession_name'},
                {'data':'teacher_name'},
                {'data':'a',"defaultContent": ""},
                {'data':'a',"defaultContent": ""},
                {'data':'status'},
                {'data':'a',"defaultContent": "操作"},
            ],
            "createdRow":function(row,data,dataIndex){
                $(row).addClass('text-c');//添加class属性；
                $(row).find("td:eq(0)").html('<input type="checkbox" value="'+data.id+'" name="">');
                if(data.status==1){
                    //启用状态
                    $(row).find('td:eq(8)').html('<span class="label label-success radius">已启用</span>');
                    var str = '<a style="text-decoration:none" onClick="admin_stop()" href="javascript:;" title="停用"><i class="Hui-iconfont">&#xe631;</i></a>';
                }else {
                    //停用状态
                    $(row).find('td:eq(8)').html('<span class="label radius">已停用</span>');
                    var str = '<a style="text-decoration:none" onClick="admin_start()" href="javascript:;" title="启用"><i class="Hui-iconfont">&#xe615;</i></a>';
                }
                //最后一列
                $(row).find("td:eq(9)").html(str+'<a title="修改" href="javascript:;" onclick="lesson_edit('+data.id+')" class="ml-5" style="text-decoration:none"><i class="Hui-iconfont">&#xe6df;</i></a> <a title="删除" href="javascript:;" onclick="lesson_del(this,'+data.id+')" class="ml-5" style="text-decoration:none"><i class="Hui-iconfont">&#xe6e2;</i></a>');
                //填充按钮
                $(row).find("td:eq(6)").html('<input onclick="play('+data.id+')" class="btn btn-success-outline radius" type="button" value="播放">');
                var imgs = "<img width='120' src='"+data.cover_img+"'/>";
                $(row).find("td:eq(7)").html(imgs);
            }
        });

    });
    //批量删除
    function datadel(){
        //选择删除数据的id;
        var ids = [];//用于存储id值
        $("input:checked").each(function(){
            ids.push($(this).val());
        });
        if(ids.length<1){
            layer.msg('您至少得选择一个吧',{icon:5,time:1000});
            return '';
        }
        //ajax提交数据
        $.ajax({
            type:'post',
            url:'{{url("admin/lesson/datadel")}}',
            data:{ids:ids,'_token':'{{csrf_token()}}'},
            success:function(msg){
                if(msg.info==1){
                    //删除成功了
                    layer.msg('批量删除成功',{icon:6,time:1000});
                    //重新让dataTable插件做一个请求
                    mytable.api().ajax.reload();
                }else {
                    layer.msg('批量删除失败',{icon:5,time:1000});
                }
            }
        });
    }
    //播放视频
    function play(id){
        //弹出一个新层，在新层里面播放；
        layer_show('播放','{{url("admin/lesson/play")}}/'+id,780);
    }
    /*课时-添加*/
    function lesson_add(){
        //layer_show实现弹窗效果的一个函数（h-ui.admin模板中定义的函数）；
        //第一个参数 提示文字
        //第二个参数 加载页面的地址（此处写路由，因为laravel里面是通过访问路由来加载页面的）
        //第三个参数 窗口的宽度
        //第四个参数 窗口的高度
        //layer_show(title,url,w,h);
        layer_show('添加课时','{{url("admin/lesson/add")}}',1000);
    }
    /*用户-查看*/
    function member_show(title,url,id,w,h){
        layer_show(title,url,w,h);
    }
    /*用户-停用*/
    function member_stop(obj,id){
        layer.confirm('确认要停用吗？',function(index){
            $.ajax({
                type: 'POST',
                url: '',
                dataType: 'json',
                success: function(data){
                    $(obj).parents("tr").find(".td-manage").prepend('<a style="text-decoration:none" onClick="member_start(this,id)" href="javascript:;" title="启用"><i class="Hui-iconfont">&#xe6e1;</i></a>');
                    $(obj).parents("tr").find(".td-status").html('<span class="label label-defaunt radius">已停用</span>');
                    $(obj).remove();
                    layer.msg('已停用!',{icon: 5,time:1000});
                },
                error:function(data) {
                    console.log(data.msg);
                },
            });
        });
    }

    /*用户-启用*/
    function member_start(obj,id){
        layer.confirm('确认要启用吗？',function(index){
            $.ajax({
                type: 'POST',
                url: '',
                dataType: 'json',
                success: function(data){
                    $(obj).parents("tr").find(".td-manage").prepend('<a style="text-decoration:none" onClick="member_stop(this,id)" href="javascript:;" title="停用"><i class="Hui-iconfont">&#xe631;</i></a>');
                    $(obj).parents("tr").find(".td-status").html('<span class="label label-success radius">已启用</span>');
                    $(obj).remove();
                    layer.msg('已启用!',{icon: 6,time:1000});
                },
                error:function(data) {
                    console.log(data.msg);
                },
            });
        });
    }
    /*课时-修改*/
    function lesson_edit(id){
        layer_show('修改课时','{{url("admin/lesson/update")}}/'+id,1000);
    }
    /*密码-修改*/
    function change_password(title,url,id,w,h){
        layer_show(title,url,w,h);
    }
    /*课时-删除*/
    function lesson_del(obj,id){
        layer.confirm('确认要删除吗？',function(index){
            $.ajax({
                type: 'POST',
                url: '{{url("admin/lesson/del")}}',
                data:{id:id,'_token':'{{csrf_token()}}'},
                dataType: 'json',
                success: function(msg){
                    if(msg.info==1){
                        //删除成功了
                        //删除掉被删除的行
                        $(obj).parents("tr").remove();
                        //删除提示
                        layer.msg('已删除!',{icon:6,time:1000});
                    }
                },
                error:function(data) {
                    console.log(data.msg);
                },
            });
        });
    }
</script>
</body>
</html>