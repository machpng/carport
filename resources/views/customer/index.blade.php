
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
    <link href="{{ asset('/front/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('/front/css/font-awesome.min.css') }}" rel="stylesheet">

    <link href="{{ asset('/front/css/animate.css') }}" rel="stylesheet">
    <link href="{{ asset('/front/css/style.css') }}" rel="stylesheet">
    <style type="text/css">
        .ibox-content{height:186px;}
        .col-xs-8{
            padding-right: 6px;
            padding-left: 6px;
        }
        .col-xs-4{
            padding-right: 6px;
            padding-left: 6px;
        }
        .aboutUs{margin:auto;vertical-align:middle;position:relative;top:48%;text-align:center;padding-left:3px;}
        .rowCol,.col-xs-7{height:100%;}
        .col-xs-12{height: 100%;}
        .ibox{margin-bottom: 8px;font-weight:bold;height: 186px;background-color: #ffffff;}
        .fontContent{margin-bottom:0px;text-align:center;}
        .imgarea{height:78%;}
        .map_location{background:url(/front/img/map_location1.png) no-repeat center;}
        .home_gear{background:url(/front/img/home_gear.png) no-repeat center;}
        .dongtai{background:url(/front/img/tennis_people.png) no-repeat center;}
        .newdongtai{background:url(/front/img/sound_recorder.png) no-repeat center;}
        .Local_Contact{background:url(/front/img/Local_Contact.png) no-repeat center;}
    </style>
</head>

<body class="gray-bg">
<div class="wrapper wrapper-content  animated fadeInRight blog">
    <div class="row">
        <a href="{{ url('customer/parking-list') }}">
            <div class="col-xs-8">
                <div class="ibox">
                    <div class="row rowCol">
                        <div class="col-xs-7 map_location"></div>
                        <div class="col-xs-5 aboutUs">
                            车库列表
                        </div>
                    </div>
                </div>
            </div>
        </a>
        <a href="{{ url('customer/ucenter') }}">
            <div class="col-xs-4">
                <div class="ibox">
                    <div class="row imgarea"><div class="col-xs-12 dongtai"></div></div>
                    <div class="row"><div class="col-xs-12 fontContent">会员中心</div></div>
                </div>
            </div>
        </a>

    </div>
    <div class="row">
        <a href="{{ url('customer/product-list') }}">
            <div class="col-xs-4">
                <div class="ibox">
                    <div class="row imgarea">
                        <div class="col-xs-12 home_gear"></div>
                    </div>
                    <div class="row"><div class="col-xs-12 fontContent">产品列表</div></div>
                </div>
            </div>
        </a>
        <a href="{{ url('customer/log-list') }}">
            <div class="col-xs-4">
                <div class="ibox">
                    <div class="row imgarea"><div class="col-xs-12 newdongtai"></div></div>
                    <div class="row"><div class="col-xs-12 fontContent">车库记录</div></div>
                </div>
            </div>
        </a>
        <a href="{{ url('customer/about') }}">
            <div class="col-xs-4">
                <div class="ibox">
                    <div class="row imgarea"><div class="col-xs-12 Local_Contact"></div></div>
                    <div class="row"><div class="col-xs-12 fontContent">关于我们</div></div>
                </div>
            </div>
        </a>
    </div>
</div>

<!-- 全局js -->
<script src="{{ asset('/static/js/jquery-1.9.1.min.js') }}"></script>
<script src="{{ asset('/static/js/bootstrap.min.js') }}"></script>

<!-- 自定义js -->
<!--<script src="script/content.js?v=1.0.0"></script>-->

</body>

</html>
