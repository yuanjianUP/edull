
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

    <link rel="stylesheet" href="{{asset('home')}}/css/page-learing-pay.css" />
<!--头部导航-->
<header>
    <div class=" learingHeader">
        <nav class="navbar container">
            <div class="navbar-left"><img src="{{asset('home')}}/img/asset-logoIco.png" alt=""></div>
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
<!--主体内容-->
<div class="container">
    <div class="learing-pay">
        <div class="tit">
            商品已成功加入购物车！</div>
        <div class="pay-list">
            <div class="row">
                <div class="col-lg-2"><img src="./img/20170609100236593a01bc1fd9a.jpg" alt=""></div>
                <div class="col-lg-9">
                    <p>名称：无所不能的jQuery <em>北京大学</em></p>
                    <p>描述：现在各种应用开发已经不能离开jquery</p>
                </div>
                <div class="col-lg-1">￥598.09</div>
                <p>
                    <a href="#" class="btn btn-default" style="display:inline;">查看课程详情</a>
                    <a href="" class="btn btn-primary" style="display:inline;">去购物车结算</a>
                </p>
            </div>
        </div>

    </div>
</div>


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
