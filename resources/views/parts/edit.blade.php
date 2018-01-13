@extends('layouts.master')
@section('content')
    <div id="content" class="span10">

        <ul class="breadcrumb">
            <li>
                <i class="icon-home"></i>
                <a href="index.html">首页</a>
                <i class="icon-angle-right"></i>
            </li>
            <li>
                <i class="icon-edit"></i>
                <a href="#">添加维保部件</a>
            </li>
        </ul>

        <div class="row-fluid">
            <div class="box span12">
                <div class="box-header" data-original-title>
                    <h2><i class="halflings-icon white edit"></i><span class="break"></span>添加维保部件</h2>
                </div>
                <div class="box-content">
                    @if(Session::has('flag'))
                        <div class="alert alert-{{ session('flag') }}">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            <strong>{{ session('msg') }}</strong>
                        </div>
                    @endif
                    <form class="form-horizontal" action="{{ url('part/update', $data->id) }}" method="POST">
                        {{ csrf_field() }}
                        <fieldset>
                            <div class="control-group">
                                <label class="control-label" for="focusedInput">部件名称</label>
                                <div class="controls">
                                    <input class="input-xlarge focused" type="text" name="name" value="{{ $data->name }}">
                                </div>
                            </div>
                            <div class="control-group hidden-phone">
                                <label class="control-label" for="textarea2">维保内容</label>
                                <div class="controls">
                                    <textarea class="cleditor" id="textarea2" rows="3" name="content">{!! $data->content !!}</textarea>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="focusedInput">部件总寿命（次）</label>
                                <div class="controls">
                                    <input class="input-xlarge focused" type="text" name="totalnum" value="{{ $data->totalnum }}">
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="focusedInput">维保周期（月）</label>
                                <div class="controls">
                                    <input class="input-xlarge focused" type="text" name="maintain" value="{{ $data->maintain }}">
                                </div>
                            </div>
                            <div class="form-actions">
                                <button type="submit" class="btn btn-primary">提交</button>
                                <button type="reset" class="btn">取消</button>
                            </div>
                        </fieldset>
                    </form>

                </div>
            </div><!--/span-->

        </div><!--/row-->

    </div><!--/.fluid-container-->
@endsection
