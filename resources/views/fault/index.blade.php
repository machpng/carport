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
                    <h2><i class="halflings-icon white user"></i><span class="break"></span>记录列表</h2>
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
                            <th>发送时间</th>
                            <th>故障码</th>
                            <th>车库名称</th>
                            <th>维修员</th>
                            <th>电话号码</th>
                            <th>内容</th>
                        </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>2017-06-14 11:00:43</td>
                                <td>R2017061437489489</td>
                                <td>第一车库</td>
                                <td>朱欢</td>
                                <td>15210097900</td>
                                <td>第一车库发生故障，故障码：R2017061437489489</td>
                            </tr>
                            <tr>
                                <td>2017-08-20 17:35:18</td>
                                <td>R2017082013212233</td>
                                <td>第二车库</td>
                                <td>王鑫华</td>
                                <td>13678861934</td>
                                <td>第二车库发生故障，故障码：R2017082013212233</td>
                            </tr>
                            <tr>
                                <td>2017-09-14 09:19:10</td>
                                <td>R2017091427974397</td>
                                <td>第三车库</td>
                                <td>吕博</td>
                                <td>15600987139</td>
                                <td>第三车库发生故障，故障码：R2017091427974397</td>
                            </tr>
                            <tr>
                                <td>2017-09-15 17:35:43</td>
                                <td>R2017091512342011</td>
                                <td>第四车库</td>
                                <td>小龙</td>
                                <td>18834520988</td>
                                <td>第四车库发生故障，故障码：R2017091512342011</td>
                            </tr>
                            <tr>
                                <td>2017-10-11 16:43:34</td>
                                <td>20171011234293588</td>
                                <td>第五车库</td>
                                <td>王颖</td>
                                <td>13434521188</td>
                                <td>第五车库发生故障，故障码：20171011234293588</td>
                            </tr>
                            <tr>
                                <td>2017-10-13 17:22:11</td>
                                <td>20171013123429353</td>
                                <td>第六车库</td>
                                <td>王颖</td>
                                <td>15609870909</td>
                                <td>第六车库发生故障，故障码：20171013123429353</td>
                            </tr>
                            <tr>
                                <td>2017-10-13 20:23:43</td>
                                <td>R2017101323429673</td>
                                <td>第七车库</td>
                                <td>李勇</td>
                                <td>13334521376</td>
                                <td>第七车库发生故障，故障码：R2017101323429673</td>
                            </tr>
                            <tr>
                                <td>2017-10-14 09:31:13</td>
                                <td>R2017101412342974</td>
                                <td>第八车库</td>
                                <td>孙祥</td>
                                <td>18937867985</td>
                                <td>第八车库发生故障，故障码：R2017101412342974</td>
                            </tr>
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