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
            <a href="#">账号管理</a>
        </li>
    </ul>

    <div class="row-fluid">
        <div class="box span12">
            <div class="box-header" data-original-title>
                <h2><i class="halflings-icon white edit"></i><span class="break"></span>编辑账号</h2>
            </div>
            <div class="box-content">
                @if (count($errors) > 0)
                    <div class="alert alert-warning">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <strong>{{ $errors->first() }}</strong>
                    </div>
                @elseif(Session::has('flag'))
                    <div class="alert alert-{{ session('flag') }}">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <strong>{{ session('msg') }}</strong>
                    </div>
                @endif
                <form class="form-horizontal" action="{{ url('user/update', $data->id) }}" method="POST">
                    {{ csrf_field() }}
                    <fieldset>
                        <div class="control-group">
                            <label class="control-label" for="typeahead">用户名</label>
                            <div class="controls">
                                <input class="input-xlarge focused" type="text" value="{{ $data->username }}" readonly>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="typeahead">旧密码</label>
                            <div class="controls">
                                <input class="input-xlarge focused" type="password" name="old_password">
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="typeahead">新密码</label>
                            <div class="controls">
                                <input class="input-xlarge focused" type="password" name="password">
                            </div>
                        </div>
                        <div class="form-actions">
                            <button type="submit" class="btn btn-primary">保存</button>
                            <button type="reset" class="btn">取消</button>
                        </div>
                    </fieldset>
                </form>

            </div>
        </div><!--/span-->

    </div><!--/row-->
    </div>
@endsection