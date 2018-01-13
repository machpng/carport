<!DOCTYPE html>
<html lang="en">
<head>
    <!-- start: Meta -->
    <meta charset="utf-8">
    <title>车库实时监测</title>
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
            <h2><i class="halflings-icon white align-justify"></i><span class="break"></span>车库列表</h2>
        </div>
        <div class="box-content">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>车库名称</th>
                    <th>车库地址</th>
                    <th>车位数量</th>
                    <th>剩余车位数量</th>
                    <th>状态</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>一号车库</td>
                    <td class="center">山东省青岛市城阳区sdfsf</td>
                    <td class="center">10</td>
                    <td class="center">5</td>
                    <td class="center">
                        <span class="label label-success">启用</span>
                    </td>
                    <td class="center"><a href="{{ url('customer/go', 1) }}">去这里</a></td>
                </tr>
                <tr>
                    <td>二号车库</td>
                    <td class="center">山东省青岛市市南区adasdsad</td>
                    <td class="center">100</td>
                    <td class="center">30</td>
                    <td class="center">
                        <span class="label label-important">禁用</span>
                    </td>
                    <td class="center"><a href="{{ url('customer/go', 2) }}">去这里</a></td>
                </tr>
                <tr>
                    <td>Dennis Ji</td>
                    <td class="center">山东省青岛市市南区aqrquirqr</td>
                    <td class="center">50</td>
                    <td class="center">10</td>
                    <td class="center">
                        <span class="label">维修</span>
                    </td>
                    <td class="center"><a href="{{ url('customer/go', 3) }}">去这里</a></td>
                </tr>
                <tr>
                    <td>Dennis Ji</td>
                    <td class="center">山东省青岛市市南区lfoasjfk</td>
                    <td class="center">80</td>
                    <td class="center">10</td>
                    <td class="center">
                        <span class="label label-warning">忙碌</span>
                    </td>
                    <td class="center"><a href="{{ url('customer/go', 4) }}">去这里</a></td>
                </tr>
                <tr>
                    <td>Dennis Ji</td>
                    <td class="center">山东省青岛市市南区afafafasf</td>
                    <td class="center">20</td>
                    <td class="center">2</td>
                    <td class="center">
                        <span class="label label-success">启用</span>
                    </td>
                    <td class="center"><a href="{{ url('customer/go', 5) }}">去这里</a></td>
                </tr>
                </tbody>
            </table>
        </div>
    </div><!--/span-->
</div><!--/row-->

