
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>中金国检金银珠宝检验检测中心</title>
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
            <a class="logo" href="#" style="background: url({{asset('images/topimg2.png')}}) no-repeat 0 0;
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
        background: url(/templets/default/home_banner2/images/ad_ctr.png) no-repeat;
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
        background: url(/templets/default/home_banner2/images/dot.png) no-repeat 0 -16px;
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
        <div class="title_l"><font face="微软雅黑">中心简介 <span>/ Introduce</span></font></div>
        <div class="title_r"></div></div>
    <div class="linkBox">
        <font size="3">
            <b>&nbsp;中心简介：</b></font><font size="2"><br>
            <b>&nbsp;</b></font><p style="margin: 0px; padding: 0px; font-size: 12px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial; color: rgb(68, 68, 68); font-family: 微软雅黑, arial; background-color: rgb(255, 255, 255); text-indent: 2em; line-height: 2em;">
			<span style="margin: 0px; padding: 0px; font-size: 12px; font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;">
			深信国检珠宝检测鉴定中心</span><span style="margin: 0px; padding: 0px; font-size: 9pt; font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;">是经国家质量技术监督部门按照国家《实验室资质认定评审准则》的严格审查，资质认定合格，取得计量认证证书，可以向社会出具具有证明作用的数据和结果的专业检测、鉴定机构。同时通过中国合格评定国家认可委员会按照国家《检测和校准实验室能力认可准则》严格考核认可，列入国际互认组织的机构之一，出具的检验报告及检测、鉴定证书国际认可。</span></p>
        <p style="margin: 0px; padding: 0px; font-size: 12px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial; color: rgb(68, 68, 68); font-family: 微软雅黑, arial; background-color: rgb(255, 255, 255); text-indent: 2em; line-height: 2em;">
			<span style="margin: 0px; padding: 0px; font-size: 9pt; font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;">
			中心技术力量雄厚，拥有一批经验丰富、专业知识全面的从事贵金属分析、珠宝玉石鉴定、钻石鉴定分级和首饰检测的学士、硕士、博士生、高级工程师和高素质的管理团队；人员均毕业于国家重点专业院校或国外知名学府，并分别取得国内、国际权威机构颁发的CGC国家珠宝玉石注册质检师资格证书、资产评估师（珠宝）执业资格证书、NGTC珠宝鉴定及钻石分级资格证书、GAC珠宝鉴定师资格证书、GIC珠宝鉴定及钻石分级资格证书、英国FGA宝玉石鉴定师证书、美国GIA钻石分级师证书、比利时HRD钻石分级师证书。并在多次国内、国际比对中均取得了较好的成绩。</span></p>
        <p style="margin: 0px; padding: 0px; font-size: 12px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial; color: rgb(68, 68, 68); font-family: 微软雅黑, arial; background-color: rgb(255, 255, 255); text-indent: 2em; line-height: 2em;">
			<span style="margin: 0px; padding: 0px; font-size: 9pt; font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;">
			实验室配备珠宝玉石检测仪器及辅助设备，包括从德国、日本、美国、以色列等国进口的傅里叶红外光谱以、宝石显微镜等。设业务部、检测室及办公室机构部门，主要工作人员均为珠宝专业大专及以上学历并取得相关珠宝鉴定证书，同时获取DGA、GIC、NGTC等海内外珠宝检验师资格，为公正、准确、科学的检测服务提供充分保障。本中心主要从事珠宝玉石鉴定、钻石分级工作，按照检测-研究-教育培训相结合的发展模式，理论联系实际，“服务义乌，放眼全国”，致力于解决珠宝首饰材料检测的各类问题，促进本行业合理、规范、健康发展。</span><font size="2"><b>!<br><br>
        </p>
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
        function mygo()
        {
            var strNo = document.getElementById("txtNo").value;
            window.location="result.htm?" + strNo;
         }
    </script>
</body></html>
