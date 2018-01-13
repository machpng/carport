@extends('layouts.master')
@section('css')
    <style>
        @media print {
            .noprint { display: none;color:green }
        }
    </style>
@endsection
@section('content')
    <div id="content" class="span10">

        <ul class="breadcrumb noprint">
            <li>
                <i class="icon-home"></i>
                <a href="index.html">首页</a>
                <i class="icon-angle-right"></i>
            </li>
            <li><a href="#">列表</a></li>
        </ul>

        <div class="row-fluid">
            <div class="box span12">
                <div class="box-header" data-original-title>
                    <h2><i class="halflings-icon white user"></i><span class="break"></span>{{ $data->name }} -
                        维保部件|维修员：赵来</h2>
                    <h2><button style="margin-left: 1200px;" onclick="printit()">下载</button></h2>
                </div>
                <div class="box-content">
                    @if(Session::has('flag'))
                        <div class="alert alert-{{ session('flag') }}">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            <strong>{{ session('msg') }}</strong>
                        </div>
                    @endif
                    <table class="table table-striped table-bordered bootstrap-datatable datatable"
                           id="ganburenmianbaio">
                        <thead>
                        <tr>
                            <th>名称</th>
                            <th>检查内容</th>
                            <th>已运行次数</th>
                            <th>部件总寿命</th>
                            <th>上次维保时间</th>
                            <th>下次维保时间</th>
                            <th>当前状态</th>
                            <th>维保操作</th>
                            <th>备注</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($list as $data)
                            @php
                                $flag = '';
                                $next_date = date("Y-m-d", strtotime("+". $data->maintain . " month",strtotime($data->olddate)));
                                if (($data->totalnum  && ($data->totalnum - $data->number < 500))
                                 || (ceil((strtotime($next_date)-time())/86400)) < 3) {
                                    $flag = 'red';
                                }
                            @endphp
                            <tr @if($flag)style="color:red" @endif>
                                <td>{{ $data->name }}</td>
                                <td>{!! $data->content !!}</td>
                                <td>{{ $data->number ? $data->number . '次' : ''}}</td>
                                <td>{{ $data->totalnum ? $data->totalnum . '次' : ''}}</td>
                                <td>{{ date('Y-m-d', strtotime($data->olddate)) }}</td>
                                <td>{{ $next_date }}</td>
                                <td>{{ $data->state == 1 ? '待检' : '已检' }}</td>
                                <td>{{ $data->howdo }}</td>
                                <td>{{ $data->info }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div><!--/span-->

        </div><!--/row-->
    </div>
@endsection
@section('js')
    <script>
        function printit() {
            window.print({iframe: true, prepend: '<br/>'});
        }
    </script>

@endsection