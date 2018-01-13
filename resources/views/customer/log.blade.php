<!DOCTYPE html>
<html lang="en">
<head>
    <!-- start: Meta -->
    <meta charset="utf-8">
    <title>茂源车库</title>
    <meta name="description" content="Bootstrap Metro Dashboard">
    <meta name="author" content="macp">
    <meta name="keyword" content="Metro, Metro UI, Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
    <!-- end: Meta -->

    <!-- start: Mobile Specific -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- end: Mobile Specific -->

    <!-- start: CSS -->
    <link id="bootstrap-style" href="{{ asset('/static/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('/static/css/bootstrap-responsive.min.css') }}" rel="stylesheet">
    <link id="base-style" href="{{ asset('/static/css/style.css') }}" rel="stylesheet">
    <link id="base-style-responsive" href="{{ asset('/static/css/style-responsive.css') }}" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800&subset=latin,cyrillic-ext,latin-ext' rel='stylesheet' type='text/css'>
    <!-- end: CSS -->

    <!-- The HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <link id="ie-style" href="/static/css/ie.css" rel="stylesheet">
    <![endif]-->

    <!--[if IE 9]>
    <link id="ie9style" href="/static/css/ie9.css" rel="stylesheet">
    <![endif]-->

    <!-- start: Favicon -->
    <link rel="shortcut icon" href="/static/img/favicon.ico">
    <!-- end: Favicon -->
</head>
<style type="text/css">
    .statistics {
        font-size: 30px;
        position: absolute;
        top: 50px;
        right: 130px;
    }
</style>
@section('content')
    <div class="row-fluid ">
        <div class="span6">
            <div class="box-header">
                <h2><i class="halflings-icon white align-justify"></i><span class="break"></span>记录列表</h2>
            </div>
            <div class="box-content">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th>车库名称</th>
                        <th>简介</th>
                        <th>创建时间</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($lists as $list)
                        <tr>
                            <td>{{$list->name}}</td>
                            <td class="center">
                                <span class="label label-success">{{$list->introduction}}</span>
                            </td>
                            <td class="center"><a href="{{ url('customer/detail', 1) }}">{{$list->created_at}}</a></td>
                        </tr>
                    @endforeach
                    {{--<tr>--}}
                        {{--<td>一号车库</td>--}}
                        {{--<td class="center">--}}
                            {{--<span class="label label-success">启用</span>--}}
                        {{--</td>--}}
                        {{--<td class="center"><a href="{{ url('customer/detail', 1) }}">查看</a></td>--}}
                    {{--</tr>--}}
                    {{--<tr>--}}
                        {{--<td>二号车库</td>--}}
                        {{--<td class="center">--}}
                            {{--<span class="label label-important">禁用</span>--}}
                        {{--</td>--}}
                        {{--<td class="center"><a href="{{ url('customer/detail', 2) }}">查看</a></td>--}}
                    {{--</tr>--}}
                    {{--<tr>--}}
                        {{--<td>Dennis Ji</td>--}}
                        {{--<td class="center">--}}
                            {{--<span class="label">维修</span>--}}
                        {{--</td>--}}
                        {{--<td class="center"><a href="{{ url('customer/detail', 3) }}">查看</a></td>--}}
                    {{--</tr>--}}
                    {{--<tr>--}}
                        {{--<td>Dennis Ji</td>--}}
                        {{--<td class="center">--}}
                            {{--<span class="label label-warning">忙碌</span>--}}
                        {{--</td>--}}
                        {{--<td class="center"><a href="{{ url('customer/detail', 4) }}">查看</a></td>--}}
                    {{--</tr>--}}
                    {{--<tr>--}}
                        {{--<td>Dennis Ji</td>--}}
                        {{--<td class="center">--}}
                            {{--<span class="label label-success">启用</span>--}}
                        {{--</td>--}}
                        {{--<td class="center"><a href="{{ url('customer/detail', 5) }}">查看</a></td>--}}
                    {{--</tr>--}}
                    </tbody>
                </table>
            </div>
        </div><!--/span-->
    </div><!--/row-->

