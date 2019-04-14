
<!DOCTYPE html>
<html lang="zh-CN">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="{{asset('home')}}/img/asset-favicon.ico">
    <title>在线教育网</title>


    <link rel="stylesheet" href="{{asset('home')}}/plugins/normalize-css/normalize.css" />
    <link rel="stylesheet" href="{{asset('home')}}/plugins/bootstrap/dist/css/bootstrap.css" />

    <script type="text/javascript" src="{{asset('home')}}/plugins/jquery/dist/jquery.js"></script>
    <script type="text/javascript" src="{{asset('home')}}/plugins/bootstrap/dist/js/bootstrap.js"></script>
</head>

<body>
<!-- 页面头部 -->

    <link rel="stylesheet" href="{{asset('home')}}/css/page-learing-list.css" />
<!--头部导航-->
<header>
    <div class=" learingHeader">
        <nav class="navbar container">
            <div class="navbar-left"><img src="./img/asset-logoIco.png" alt=""></div>
            <div class="navbar-left">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="travel.index.html" target="_blank">首页</a></li>
                    <li><a href="#">课程</a></li>
                    <li><a href="#">职业测评</a></li>
                    <li><a href="#">学习中心</a></li>
                </ul>
            </div>
            <div class="navbar-left"><input type="text" class="input-search" placeholder="输入查询关键词"><input type="submit" class="search-buttom"></div>
            <div class="navbar-right"><a href="#">登录</a><a href="#">注册</a></div>
        </nav>
    </div>
</header>
<div class="container">
    <div class="table-responsive learing-list">
        <table class="table">
            <tr>
                <td class="btn-group" width="40%">名称：{{$course->course_name}}</td>
                <td class="btn-group" width="*">价格：{{$course->course_price}}</td>
            </tr>
            <tr>
                <td class="btn-group" width="40%">专业：{{$course->profession_id}}</td>
                <td class="btn-group" width="*">描述：{{$course->course_desc}}</td>
            </tr>
            <tr>
                <td class="btn-group" width="40%"></td>
                <td class="btn-group" width="*">
                    <a href="{{url('home/cart/add/'.$course->id)}}" class="btn btn-primary">加入购物车</a></td>
            </tr>
        </table>
    </div>
</div>
<div class="container" style="width: 1140px">
    <div class="row">
        <div class="col-lg-9 list-row-left">
            <div class="list-cont-left">
                <div class="tit">
                    <ul class="nav nav-tabs ">
                        <li class="active"><a href="#">推荐</a></li>
                        <li><a href="#">最新</a></li>
                        <li><a href="#">热评</a></li>
                        <div class="page navbar-right">
                            <span class="">1/28</span>
                            <a href="#" class="prev">
                                <</a>
                            <a href="#" class="next">></a>
                        </div>
                    </ul>
                </div>
                <div class="tab-content">
                    <div class="content-list">

                                                <li class="">
                            <img src="{{asset('home')}}/img/201706090930185939fa2acd1a8.jpg" alt="AA">
                            <div class="tit">jQuery选择器的使用 <span>高</span></div>
                            <div>匡霞|史瑞|褚翼</div>
                            <div><a href="" target="_blank">查看详细</a></div>
                        </li>
                                                <li class="">
                            <img src="{{asset('home')}}/img/201706090936055939fb8503fad.jpg" alt="AA">
                            <div class="tit">jQuery中事件的应用 <span>高</span></div>
                            <div>尤瑶|欧桂花</div>
                            <div><a href="" target="_blank">查看详细</a></div>
                        </li>
                                                <li class="">
                            <img src="{{asset('home')}}/img/201706090937005939fbbcaf9c0.jpg" alt="AA">
                            <div class="tit">jQuery封装的Ajax <span>高</span></div>
                            <div>郎丽丽|匡霞|赵兵</div>
                            <div><a href="" target="_blank">查看详细</a></div>
                        </li>
                        
                        <li class="clearfix"></li>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 list-row-rit">
            <div class="list-cont-right">
                <div class="right-box">
                    <div class="tit">猜你喜欢</div>
                    <div class="contList">
                        <li>
                            <img src="./img/widget-1.png" alt="">
                            <p>程序设计语言</p>
                            <p>评分7.4</p>
                        </li>
                        <li>
                            <img src="./img/widget-1.png" alt="">
                            <p>程序设计语言</p>
                            <p>评分7.4</p>
                        </li>
                        <li>
                            <img src="./img/widget-1.png" alt="">
                            <p>程序设计语言</p>
                            <p>评分7.4</p>
                        </li>
                        <li>
                            <img src="./img/widget-1.png" alt="">
                            <p>程序设计语言</p>
                            <p>评分7.4</p>
                        </li>
                        <li>
                            <img src="./img/widget-1.png" alt="">
                            <p>程序设计语言</p>
                            <p>评分7.4</p>
                        </li>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

<!-- 页面 css js -->
<script>
    $('.table .btn').on('click', function() {
        $(this).addClass('active');
        $(this).siblings().removeClass('active');
    })


    $('.list-cont-left .nav-tabs li').on('click', function() {
        $(this).addClass("active").siblings().removeClass('active');
    })
</script>


    <!-- 页面底部 -->

    <!--底部版权-->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-7">
                    <div>
                        <!--<h1 style="display: inline-block">学成网</h1>-->
                        <img src="./img/asset-logoIco.png" alt=""></div>
                    <div>学成网致力于普及中国最好的教育它与中国一流大学和机构合作提供在线课程。</div>
                    <div>© 2017年XTCG Inc.保留所有权利。-沪ICP备15025210号</div>
                    <input type="button" class="btn btn-primary" value="下 载" />
                </div>
                <div class="col-lg-5 row">
                    <dl class="col-lg-4">
                        <dt>关于学成网</dt>
                        <dd>关于</dd>
                        <dd>管理团队</dd>
                        <dd>工作机会</dd>
                        <dd>客户服务</dd>
                        <dd>帮助</dd>
                    </dl>
                    <dl class="col-lg-4">
                        <dt>新手指南</dt>
                        <dd>如何注册</dd>
                        <dd>如何选课</dd>
                        <dd>如何拿到毕业证</dd>
                        <dd>学分是什么</dd>
                        <dd>考试未通过怎么办</dd>
                    </dl>
                    <dl class="col-lg-4">
                        <dt>合作伙伴</dt>
                        <dd>合作机构</dd>
                        <dd>合作导师</dd>
                    </dl>
                </div>
            </div>
        </div>
    </footer>
</body>
</html>
