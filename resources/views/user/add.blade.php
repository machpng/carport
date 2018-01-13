@extends('layouts.master')
@section('css')
    <link rel="stylesheet" href="/css/select2.min.css">
@endsection
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
                <h2><i class="halflings-icon white edit"></i><span class="break"></span>添加账号</h2>
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
                <form class="form-horizontal" action="{{ url('user/store') }}" method="POST">
                    {{ csrf_field() }}
                    <fieldset>
                        <div class="control-group">
                            <label class="control-label" for="typeahead">用户名</label>
                            <div class="controls">
                                <input class="input-xlarge focused" type="text" name="username">
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="typeahead">密码</label>
                            <div class="controls">
                                <input class="input-xlarge focused" type="password" name="password">
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="typeahead">权限</label>
                            <div class="controls">
                                <select name="role_id">
                                    <option value="1">管理人员</option>
                                    <option value="2">维保人员</option>
                                </select>
                            </div>
                        </div>
                        <div class="control-group" id="maintain">
                            <label class="control-label" for="selectError1">维保车库</label>
                            <div class="controls">
                                <select class="chzn-done select2" name="parks[]">
                                    @foreach($parks as $park)
                                    <option value="{{ $park->id }}">{{ $park->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="typeahead">联系方式</label>
                            <div class="controls">
                                <input class="input-xlarge focused" type="text" name="mobile">
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="typeahead">电子邮箱</label>
                            <div class="controls">
                                <input class="input-xlarge focused" type="email" name="email">
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
@section('js')
    <script src="/js/select2.min.js"></script>
    <script>
        $(function () {
            $(".select2").select2({
                multiple : true
            });
            $('#maintain').hide();
            $("select[name=role_id]").on('change', function () {
                if ($(this).val() == 2) {
                    $('#maintain').show();
                } else {
                    $('#maintain').hide();
                }
            });
        });
    </script>
@endsection