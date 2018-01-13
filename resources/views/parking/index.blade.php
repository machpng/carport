@extends('layouts.master')
@section('content')
    <div id="content" class="span10">

        <ul class="breadcrumb">
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
                    <h2><i class="halflings-icon white user"></i><span class="break"></span>车库管理</h2>
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
                            <th>名称</th>
                            <th>车位数量</th>
                            <th>省份</th>
                            <th>城市</th>
                            <th>地区</th>
                            <th>详细地址</th>
                            <th>状态</th>
                            <th>添加时间</th>
                            <th>操作</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($list as $data)
                            <tr>
                                <td>{{ $data->name }}</td>
                                <td class="center">{{ $data->number }}</td>
                                <td class="center">{{ $data->province }}</td>
                                <td class="center">{{ $data->city }}</td>
                                <td class="center">{{ $data->area }}</td>
                                <td class="center">{{ $data->address }}</td>
                                <td class="center">{{ $data->state == 1 ? '启用' : '禁用'  }}</td>
                                <td class="center">{{ $data->created_at->format('Y-m-d') }}</td>
                                <td class="center">
                                    @if (auth()->user()->role_id == 1)
                                        <a class="btn btn-success" href="{{ url('parking/detail', $data->id) }}">
                                            <i class="halflings-icon white zoom-in"></i>
                                        </a>
                                        <a class="btn btn-info" href="{{ url('parking/edit', $data->id) }}">
                                            <i class="halflings-icon white edit"></i>
                                        </a>
                                        <a class="btn btn-warning" href="{{ url('parking/part', $data->id) }}">
                                            <i class="halflings-icon white wrench"></i>
                                        </a>
                                        <a href="{{ url('parking/destory', $data->id) }}" class="btn btn-danger"  onclick="alert('确定要删除吗')">
                                            <i class="halflings-icon white trash"></i>
                                        </a>
                                    @else
                                        <a class="btn btn-warning" href="{{ url('parking/part', $data->id) }}">
                                            <i class="halflings-icon white wrench"></i>
                                        </a>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div><!--/span-->

        </div><!--/row-->
    </div>
    <div class="modal fade" id="destory" tabindex="-1" role="dialog" aria-labelledby="myModalLabe">
        <div class="modal-dialog" role="document">
            <form action="{{ url('parking/destory') }}" method="POST">
                <div class="modal-content">
                    <div class="modal-header">
                        删除信息
                    </div>
                    <div class="modal-body">
                        <p>确定要删除该信息吗？</p>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">确定</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
@section('js')
<script>
    $(function(){
        $('#destory').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget);
            var id = button.data('aaa');
            console.info(id);
            var url = "/parking/destory/" + id;
            var modal = $(this);
            modal.find('form').attr("action", url);
        })
    });
</script>
@endsection