@extends('layouts.master')
@section('css')
    <style type="text/css">
        .statistics {
            font-size:60px;
            position:absolute;
            top:50px;
            right: 100px;
        }
        .timerstatis {
            font-size:30px;
            position:absolute;
            top:50px;
            right: 30px;
        }
        @media only screen and (max-width: 1199px) and (min-width: 980px){
            #content.global-width{
                width:100%;
                padding: 20px;
                margin: 0px;
                margin-left: 0px !important;
            }
        }
        @media only screen and (max-width: 979px) and (min-width: 768px) {
            #content.global-width {
                width: 100%;
                padding: 22px;
                margin: 0px 0px;
                margin-left: 0% !important;
            }
        }
        @media (min-width: 1200px){
            .row-fluid .span11.global-width {width: 100%;}
            .row-fluid [class*="span"].global-width {
                             margin-left:0%;
                         }
        }
        @media (min-width: 1200px){
            #content.global-width {
                width: 100%;margin-left: 0%!important
            }
        }
    </style>
@endsection
@section('content')
    <div id="content" class="span10">
        <ul class="breadcrumb">
            <li>
                <i class="icon-home"></i>
                <a href="index.html">Home</a>
                <i class="icon-angle-right"></i>
            </li>
            <li><a href="{{ url('/') }}">首页</a></li>
            <button id="fullScreen" style="float: right;margin-top: 5px">全屏</button>
        </ul>
        <div class="row-fluid">
            <div class="span3 statbox purple" onTablet="span6" onDesktop="span3">
                <div class="boxchart">4,6,7,2,0,4,2,4,8,2,3,3,2</div>
                <div class="statistics">14</div>
                <div class="title">CarPort</div>
                <div class="footer">
                    <a href="#">车库数量</a>
                </div>
            </div>
            <div class="span3 statbox green" onTablet="span6" onDesktop="span3">
                <div class="boxchart">1,2,6,4,2,8,2,4,5,3,1,7,5</div>
                <div class="statistics">823</div>
                <div class="title">Parking</div>
                <div class="footer">
                    <a href="#">总车位数量</a>
                </div>
            </div>
            <div class="span3 statbox blue" onTablet="span6" onDesktop="span3">
                <div class="boxchart">2,3,6,4,1,4,5,8,9,6,3,2,2</div>
                <div class="statistics" id="percent">61.2</div>
                <div class="title">percent</div>
                <div class="footer">
                    <a href="#">车位使用率</a>
                </div>
            </div>
            <div class="span3 statbox yellow" onTablet="span6" onDesktop="span3">
                <div class="timerstatis timer-simple-seconds" datetime="{{ date('Y-m-d', strtotime('2017-9-25')) }}">
                    <span class="day">0</span>天
                    <span class="hour">00</span>时
                    <span class="minute">00</span>分
                    <span class="second">00</span>秒
                </div>
                <div class="footer">
                    <a href="#">运行时长</a>
                </div>
            </div>
        </div>

        <div class="row-fluid">
            <div class="span8 widget blue" onTablet="span7" onDesktop="span8">
                <div id="stats-chart2"  style="height:282px" ></div>
            </div>

            <div class="sparkLineStats span4 widget green" onTablet="span5" onDesktop="span4">
                <ul class="unstyled">
                    <li><span class="sparkLineStats3"></span>
                        Pageviews:
                        <span class="number">781</span>
                    </li>
                    <li><span class="sparkLineStats4"></span>
                        Pages / Visit:
                        <span class="number">2,19</span>
                    </li>
                    <li><span class="sparkLineStats5"></span>
                        Avg. Visit Duration:
                        <span class="number">00:02:58</span>
                    </li>
                    <li><span class="sparkLineStats6"></span>
                        Bounce Rate: <span class="number">59,83%</span>
                    </li>
                    <li><span class="sparkLineStats7"></span>
                        % New Visits:
                        <span class="number">70,79%</span>
                    </li>
                    <li><span class="sparkLineStats8"></span>
                        % Returning Visitor:
                        <span class="number">29,21%</span>
                    </li>

                </ul>

                <div class="clearfix"></div>

            </div>
        </div>
        <div class="row-fluid hideInIE8 circleStats">
            @foreach($pakings as $k => $paking)
                <a href="{{ url('parking/detail', $paking->id) }}">
                    <div class="span2" onTablet="span4" onDesktop="span2">
                        <div class="circleStatsItemBox">
                            <div class="header">{{ $paking->name }}</div>
                            <span class="percent">percent</span>
                            <div class="circleStat">
                                <input type="text" value="50" class="whiteCircle" />
                            </div>
                            <div class="footer">
                                <span class="count">
                                    <span class="number numerator">100</span>
                                </span>
                                <span class="sep"> / </span>
                                <span class="value">
                                    <span class="number denominator">{{ $paking->number }}</span>
                                </span>
                            </div>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
    </div>
@endsection
@section('js')
    <script src="{{ asset('js/timer.js') }}"></script>
    <script>
        $(function() {
            $(".circleStatsItemBox").each(function(){
                var arr = ['yellow', 'blue', 'green', 'red', 'purple','orange'];
                var color = getRandom(arr);
                $(this).addClass(color);
            });

            window.setInterval(plusAndSub, 15000);

            $('#fullScreen').on('click', function() {
                $('#content').addClass('global-width');
                var content = document.getElementById('content');
                fullScreen(content);
            });

            $(document).keydown(function (event) {
                if (event.keyCode == 122 || event.keyCode == 27) {
                    if ($('#content').hasClass('global-width')) {
                        $('#content').removeClass('global-width')
                    } else {
                        $('#content').addClass('global-width')
                    }
                }
            });
        });

        function plusAndSub(){
            var percent = $('#percent');
            var val = percent.text() * 100;
            var arr;
            if (val == 10000) {
                arr = ['b'];
            } else if (val >= 9800) {
                arr = ['a', 'b', 'b', 'b', 'b'];
            } else if (val >= 9500) {
                arr = ['a', 'a', 'b', 'b', 'b'];
            } else {
                arr = ['a', 'a', 'a', 'b', 'b'];
            }

            var m = getRandom(arr);
            switch (m) {
                case 'a':
                    val += 80;
                    break;
                case 'b':
                    val -= 60;
                    break;
            }

            percent.text(val/100);
        }

        function getRandom(arr) {
            var len = arr.length;
            var i = Math.ceil(Math.random() * (len ))%len;
            return arr[i];
        }

        // 全屏
        function fullScreen(el) {
            var rfs = el.requestFullScreen || el.webkitRequestFullScreen || el.mozRequestFullScreen || el.msRequestFullScreen,
                    wscript;

            if(typeof rfs != "undefined" && rfs) {
                rfs.call(el);
                return;
            }

            if(typeof window.ActiveXObject != "undefined") {
                wscript = new ActiveXObject("WScript.Shell");
                if(wscript) {
                    wscript.SendKeys("{F11}");
                }
            }
        }
    </script>
@endsection