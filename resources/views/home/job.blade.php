
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>深信国检珠宝检测鉴定中心</title>
    <meta name="keywords" content="中金国检金银珠宝检验检测中心">
    <link rel="stylesheet" href="{{asset('images/style.css')}}" type="text/css">
</head>
<body style="">
<div class="topBg">
    <div class="top">
        <p class="topL"><font face="微软雅黑">欢迎访问深信国检珠宝检测鉴定中心网站！</font></p>
    </div>
</div>
<div class="logoBg">
    <div class="logoBox">
        <font face="微软雅黑">
            <a class="logo" href="http://www.zjs100.com/" style="background: url(images/topimg2.png) no-repeat 0 0;
    text-indent: -999px;
    overflow: hidden;"></a>
        </font>
        <div class="biaozhi"><font face="微软雅黑"><img src="{{asset('images/midimg.png')}}" width="463" height="115" alt=""></font></div>
    </div>
</div>
<div class="menuBg">
    <div class="menuBox">
        <ul class="menu">
            <li class="menuLi"><font face="微软雅黑"><a class="menu_a" href="/">首页</a></font></li>
            <li class="menuLi"><font face="微软雅黑"><a class="menu_a" href="/intro">中心简介</a></font></li>
            <li class="menuLi"><font face="微软雅黑"><a class="menu_a" href="/service">服务指南</a></font></li>
            <li class="menuLi"><font face="微软雅黑"><a class="menu_a" href="/jew">珠宝常识</a></font></li>
            <li class="menuLi"><font face="微软雅黑"><a class="menu_a" href="/job">人才招聘</a></font></li>
            <li class="menuLi"><font face="微软雅黑"><a class="menu_a" href="/advice">意见反馈</a></font></li>
            <li class="menuLi"><font face="微软雅黑"><a class="menu_a" href="/about">联系我们</a></li>
        </ul>
    </div>
</div>
</font>
<style>
    .flexslider {
        margin: 0px auto 0px;
        position: relative;
        width: 100%;
        height: 350px;
        overflow: hidden;

    }

    .flexslider .slides li {
        width: 100%;
        height: 100%;
    }

    .flex-direction-nav a {
        width: 70px;
        height: 70px;
        line-height: 99em;
        overflow: hidden;
        margin: -35px 0 0;
        display: block;
        position: absolute;
        top: 50%;
        z-index: 10;
        cursor: pointer;
        opacity: 0;
        filter: alpha(opacity=0);
        -webkit-transition: all .3s ease;
        border-radius: 35px;
    }

    .flex-direction-nav .flex-next {
        background-position: 0 -70px;
        right: 0;
    }

    .flex-direction-nav .flex-prev {
        left: 0;
    }

    .flexslider:hover .flex-next {
        opacity: 0.8;
        filter: alpha(opacity=25);
    }

    .flexslider:hover .flex-prev {
        opacity: 0.8;
        filter: alpha(opacity=25);
    }

    .flexslider:hover .flex-next:hover,
    .flexslider:hover .flex-prev:hover {
        opacity: 1;
        filter: alpha(opacity=50);
    }

    .flex-control-nav {
        width: 100%;
        position: absolute;
        bottom: 10px;
        text-align: center;
    }

    .flex-control-nav li {
        margin: 0 2px;
        display: inline-block;
        zoom: 1;
        *display: inline;
    }

    .flex-control-paging li a {
        display: block;
        height: 16px;
        overflow: hidden;
        text-indent: -99em;
        width: 16px;
        cursor: pointer;
    }

    .flex-control-paging li a.flex-active,
    .flex-control-paging li.active a {
        background-position: 0 0;
    }

    .flexslider .slides a img {
        width: 100%;
        height: 350px;
        display: block;
    }
</style>

<font face="微软雅黑">

    <!-- 轮播广告 -->
</font>
<div id="banner_tabs" class="flexslider">
    <ul class="slides">
        <li style="position: absolute; left: 0px; top: 0px; display: list-item;">
            <font face="微软雅黑"><a href="#">
                    <img width="100%" height="350" style="background: url(images/1-161125133Z1117.jpg) no-repeat center;" src="{{asset('images/alpha.png')}}">
                </a>
            </font>
        </li><li style="position: absolute; left: 0px; top: 0px; display: none;">
            <font face="微软雅黑"><a href="#">
                    <img width="100%" height="350" style="background: url(images/1-161124164606219.png) no-repeat center;" src="{{asset('images/alpha.png')}}">
                </a>
            </font>
        </li><li style="position: absolute; left: 0px; top: 0px; display: none;">
            <font face="微软雅黑"><a href="#">
                    <img width="100%" height="350" style="background: url(images/1-161124164155518.png) no-repeat center;" src="{{asset('images/alpha.png')}}">
                </a>
            </font>
        </li>
    </ul>
    <ul class="flex-direction-nav">
        <li><font face="微软雅黑"></font></li>
        <li><font face="微软雅黑"></font></li>
    </ul>
</div>
<font face="微软雅黑">
    <script src="{{asset('images/jquery-1.10.2.min.js')}}"></script>
    <script src="{{asset('images/slider.js')}}"></script>
    <script type="text/javascript">
        $(function() {
            var bannerSlider = new Slider($('#banner_tabs'), {
                time: 3000,
                delay: 400,
                event: 'hover',
                auto: true,
                mode: 'fade',
                controller: $('#bannerCtrl'),
                activeControllerCls: 'active'
            });
            $('#banner_tabs .flex-prev').click(function() {
                bannerSlider.prev()
            });
            $('#banner_tabs .flex-next').click(function() {
                bannerSlider.next()
            });
        })
    </script>

</font>

<div class="clear"></div>

<div class="link" style="width: 1200px; height: 267px">
    <div class="titleBox">
        <div class="title_l"><font face="微软雅黑">人才招聘 <span>/ Job</span></font></div>
        <div class="title_r"></div></div>
    <div class="linkBox">
        <font size="3">
            <b>&nbsp;人才招聘：</b></font><font size="2"><br><br>
        </font>
        <font size="2">
            <b>&nbsp;目前尚无人才招聘信息!<br><br>
                <p>&nbsp;</p>
                <p>&nbsp;</p>
                <p>&nbsp;</p>
                <p>&nbsp;</p>
                <p>&nbsp;</p>
                <p>&nbsp;</p>
                <p>&nbsp;</p>
                <p>&nbsp;</p>
                <p>&nbsp;</p>
                <p>&nbsp;</p>
                <p>&nbsp;</p>
                <p><br>
    </div>



    <div class="footer">
        <div class="footerBox2">
            <p><font face="微软雅黑">2020-2030 深信国检珠宝检测鉴定中心 版权所有 联系地址:深圳市罗湖区水贝二路泊林花园6栋4楼3AD</font></p>
        </div>
    </div>
    <script language="javascript">
        function mygo1()
        {
            var strNo = document.getElementById("txtNo").value + "new";
            window.location="result.htm?" + strNo;
        }

        function mygo2()
        {
            var strNo = document.getElementById("txtNo").value;
            window.location="result.htm?" + strNo;
        }
    </script>
</body></html>
