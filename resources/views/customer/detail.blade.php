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
                <h2><i class="halflings-icon white align-justify"></i><span class="break"></span>产品详情</h2>
            </div>
            <div class="control-group" style="margin-left:10%">
                <label class="control-label" for="focusedInput">产品名称</label>
                <div class="controls">
                    <input class="input-xlarge focused" type="text" name="name" value="{{$product->name or ''}}">
                </div>
            </div>

            <div class="control-group" style="margin-left:10%">
                <label class="control-label">产品图片</label>
                <div class="controls">
                    {{--<a href="javascript:void(0)" id="upload_image">--}}
                        {{--<img src="{{ asset('/static/img/upload.png') }}" height="118">--}}
                    {{--</a>--}}
                    @if($product->image)
                        @foreach($product->image as $val)
                            <a href="javascript:void(0)" class="img-a">
                                <img src="{{  $val }}" width="118" height="118">
                                {{--<img class="small-img" src="/static/img/del.png" width="20" height="20">--}}
                            </a>
                        @endforeach
                    @endif

                    <input type="hidden" name="image" value="">
                </div>
            </div>

            <div class="control-group" style="margin-left:10% ">
                <label class="control-label" for="textarea2">产品介绍</label>
                <div class="controls">
                    <textarea class="cleditor" id="textarea2" rows="3" name="introduction" >{{$product->introduction or ''}}</textarea>
                </div>
            </div>
        </div><!--/span-->
    </div><!--/row-->

