@extends('layouts.master')
@section('css')
    <style type="text/css">
        .statistics {
            font-size:45px;
            position:absolute;
            top:50px;
            right: 60px;
        }
        .timerstatis {
            font-size:30px;
            position:absolute;
            top:50px;
            right: 30px;
        }
        .statbox .title {
            background:rgba(0,0,0,.2);
            font-size: 16px;
            position:absolute;
            top:10px;
            right: 5px;
        }
        iframe {
            margin-right: 20px;
        }
    </style>
@endsection
@section('content')
    <div id="content" class="span10">
        <ul class="breadcrumb">
            <li>
                <i class="icon-home"></i>
                <a href="{{ url('/') }}">Home</a>
                <i class="icon-angle-right"></i>
            </li>
            <li><a href="#">Dashboard</a></li>
            <a href="{{ url('parking/policies', $data->id) }}"><button class="btn btn-small btn-primary" style="float: right;margin: 5px 10px 0 0">查看维保</button></a>
            <a href="{{ $data->nvrLat }}" target=" _blank"><button class="btn btn-small btn-primary" style="float: right;margin: 5px 10px 0 0">查看车库实时视频</button></a>
        </ul>

        <div class="row-fluid">

            <div class="span2 statbox purple" onTablet="span6" onDesktop="span3">
                <div class="statistics">{{ $data->number }}</div>
                <div class="title">CarPort</div>
                <div class="footer">
                    <a href="#">总车位数</a>
                </div>
            </div>
            <div class="span2 statbox green" onTablet="span6" onDesktop="span3">
                <div class="statistics" id="parking">50</div>
                <div class="title">Parking</div>
                <div class="footer">
                    <a href="#">剩余车位</a>
                </div>
            </div>

            <div class="span3 statbox red" onTablet="span6" onDesktop="span3">
                <div class="timerstatis timer-simple-seconds" datetime="{{ $data->created_at->format('Y-m-d') }}">
                    <span class="day">0</span>天
                    <span class="hour">00</span>时
                    <span class="minute">00</span>分
                    <span class="second">00</span>秒
                </div>
                <div class="footer">
                    <a href="#">运行时长</a>
                </div>
            </div>

            <div class="span2 statbox blue noMargin" onTablet="span6" onDesktop="span3">
                <div class="statistics" id="times">982</div>
                <div class="title">times</div>
                <div class="footer">
                    <a href="#">运行次数</a>
                </div>
            </div>
            <div class="span2 statbox yellow" onTablet="span6" onDesktop="span3">
                <div class="statistics">26</div>
                <div class="title">Duration</div>
                <div class="footer">
                    <a href="#">故障次数</a>
                </div>
            </div>

        </div>

        <iframe width="45%" height="500px" src="http://localhost:8086/WebForm1.aspx?IPStr=192.168.10.170" frameborder="1"></iframe>

        <iframe width="45%" height="500px" src="http://localhost:8086/WebForm1.aspx?IPStr=192.168.10.171" frameborder="1"></iframe>

        <iframe width="45%" height="500px" src="http://localhost:8086/WebForm1.aspx?IPStr=192.168.10.172" frameborder="1"></iframe>

        <iframe width="45%" height="500px" src="http://localhost:8086/WebForm1.aspx?IPStr=192.168.10.173" frameborder="1"></iframe>
    </div>
@endsection
@section('js')
    <script src="{{ asset('js/timer.js') }}"></script>
    <script>
        $(function() {
            var t1 = window.setInterval(plusAndSub, 15000);
            var t2 = window.setInterval(plusTimes, 15000);
        });

        function plusTimes() {

        }

        function plusAndSub() {
            var parking = $('#parking');
            var val = percent.text();
            var max_num = "{{ $data->number }}";
            var arr;
            if (val == max_num) {
                arr = ['b'];
            } else {
                arr = ['a', 'a', 'a', 'b', 'b'];
            }

            var m = getRandom(arr);

            switch (m) {
                case 'a':
                    val += 1;
                    break;
                case 'b':
                    val -= 1;
                    break;
            }
            parking.text(val);
        }

        function getRandom(arr) {
            var len = arr.length;
            var i = Math.ceil(Math.random() * (len ))%len;
            return arr[i];
        }

    </script>
@endsection