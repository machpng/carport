@extends('layouts.master')
@section('css')
    <style type="text/css">
        .statistics {
            font-size:60px;
            position:absolute;
            top:50px;
            right: 130px;
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
            <li><a href="#">Tables</a></li>
        </ul>

        <div class="row-fluid">
            <div class="box span12">
                <div class="box-header" data-original-title>
                    <h2><i class="halflings-icon white user"></i><span class="break"></span>账号管理</h2>
                </div>
                <div class="box-content">
                    @if(Session::has('flag'))
                        <div class="alert alert-{{ session('flag') }}">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            <strong>{{ session('msg') }}</strong>
                        </div>
                    @endif
                    <table class="table table-striped table-bordered bootstrap-datatable datatable">
                        <thead>
                        <tr>
                            <th>用户名</th>
                            <th>手机号码</th>
                            <th>电子邮箱</th>
                            <th>添加时间</th>
                            <th>权限</th>
                            <th>状态</th>
                            <th>操作</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($list as $data)
                            <tr>
                                <td>{{ $data->username }}</td>
                                <td>{{ $data->mobile }}</td>
                                <td>{{ $data->email }}</td>
                                <td class="center">{{ $data->created_at->format('Y-m-d') }}</td>
                                <td class="center">{{ $data->role_id == 1 ? '管理员' : '维保人员' }}</td>
                                <td class="center">
                                    <span class="label label-success">启用</span>
                                </td>
                                <td class="center">
                                    <a class="btn btn-info" href="{{ url('user/edit', $data->id) }}">
                                        <i class="halflings-icon white edit"></i>
                                    </a>
                                    <a href="{{ url('user/destory', $data->id) }}" class="btn btn-danger"  onclick="alert('确定要删除吗')">
                                        <i class="halflings-icon white trash"></i>
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div><!--/span-->

        </div><!--/row-->

    </div>
@endsection