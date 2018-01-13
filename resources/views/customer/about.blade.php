<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0,user-scalable=0">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="format-detection" content="telephone=no">

    <title>index</title>
    <link href="{{ asset('front/css/bootstrap.min.css?v=3.3.6') }}" rel="stylesheet">
    <link href="{{ asset('front/css/font-awesome.css?v=4.4.0') }}" rel="stylesheet">

    <link href="{{ asset('front/css/animate.css') }}" rel="stylesheet">
    <link href="{{ asset('front/css/style.css?v=4.1.0') }}" rel="stylesheet">
    <style type="text/css">
        @font-face {
            font-family: 'icomoon';
            src:url('/fonts/icomoon.eot?rretjt');
            src:url('/fonts/icomoon.eot?#iefixrretjt') format('embedded-opentype'),
            url('/fonts/icomoon.woff?rretjt') format('woff'),
            url('/fonts/icomoon.ttf?rretjt') format('truetype'),
            url('/fonts/icomoon.svg?rretjt#icomoon') format('svg');
            font-weight: normal;
            font-style: normal;
        }
        #main_ad .carousel-inner .item{
            background-size: cover; /*让图片覆盖满整个div*/
            background-position: center,center; /*让图片在div里水平垂直居中*/
            background-repeat: no-repeat;
            height: 410px;
        }
        @media (max-width:768px) {
            #main_ad .carousel-inner .item {
                height: auto;
            }
            #main_ad .carousel-inner .item img{
                width: 100%;
            }
        }
        .carousel-indicators{bottom:2px;}
        .content{margin-top:6px;padding:8px;}
    </style>
</head>

<body class="gray-bg">
<div class="wrapper wrapper-content  animated fadeInRight blog">
    <div class="row">
        <div id="myCarousel" class="carousel slide" data-ride="carousel">
            <!-- Indicators -->

            <ol class="carousel-indicators">
                <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                <li data-target="#myCarousel" data-slide-to="1"></li>
                <li data-target="#myCarousel" data-slide-to="2"></li>
                <li data-target="#myCarousel" data-slide-to="3"></li>
            </ol>

            <div class="carousel-inner">
                <div class="item active">
                    <img src="{{ asset('front/img/4.jpg') }}" style="width:100%" data-src=" " alt="">

                </div>
                <div class="item">
                    <img src="{{ asset('front/img/5.jpg') }}" style="width:100%" data-src="" alt="">

                </div>
                <div class="item">
                    <img src="{{ asset('front/img/6.jpg') }}" style="width:100%" data-src="" alt="">

                </div>
                <div class="item">
                    <img src="{{ asset('front/img/7.jpg') }}" style="width:100%" data-src="" alt="">

                </div>
            </div>
            <!--<a class="left carousel-control" href="#myCarousel" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a>
            <a class="right carousel-control" href="#myCarousel" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>-->
        </div>
    </div>
    <div class="row content">
        <h3>公司简介</h3>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 青岛茂源金属集团有限公司成立于1997年，注册资金5300万元，总资产5亿元，拥有两个工业园，共占地40余万平米。主要经营房地产，智能立体车库，各种钢架结构产品（国家一级资质），压力容器（A2级），压力管道（GB1,GB2,GC2,GB(PE)),太阳能热水器系列（家电下乡中标品牌），散热器系列（中国十大品牌、国家免检产品），起重机械（门式，桥式，悬臂式），以及各种钣金产品的加工制作。

        2008年茂源集团斥巨资进入立体停车行业，经过多年的发展，目前已成为行业内领军品牌。

        公司现拥有九大类五十多个品种的机械式停车设备。拥有发明专利5项，实用新型专利216项，并参与起草《升降横移类停车位生产制造》、《停车设备安装与维护》《平面移动类停车位生产制造》《机械式停车设备操作使用规范》等多个国家标准，是全国起重机械标准化技术委员会停车设备工作组成员单位。公司自主研发的AGV智能取车系统在行业内具有绝对的领先地位。公司连续三年成为机械停车设备行业全国销售三强企业。2016年茂源机械车库实现销售额逾四亿元，出口国家达到40多个，业绩名列行业前茅。

        公司始终以树立品牌为目标，注重管理，重视质量，看重信誉，凭借着优秀的队伍、精良的设备、先进的工艺、一流的标准、严格的管理、完善的服务赢得客户的信赖，产品畅销世界各国，并得到海内外广大客商的一致好评。
    </div>
</div>
<script type="text/javascript">

</script>
<script src="{{ asset('front/script/jquery-1.9.1.min.js?v=2.1.4') }}"></script>
<script src="{{ asset('front/script/bootstrap.min.js?v=3.3.6') }}"></script>


</body>

</html>
