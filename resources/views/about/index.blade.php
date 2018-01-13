@extends('layouts.master')
@section('css')
    <style type="text/css">
        #container {
            min-width:323px;
            min-height:367px;
        }
        .img-a{
            position: relative;
            margin-right: 5px;
        }

        .small-img {
            position: absolute;
            right:0px;
            top:-50px;
        }
    </style>
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
                <a href="#">关于我们</a>
            </li>
        </ul>

        <div class="row-fluid">
            <div class="box span12">
                <div class="box-header" data-original-title>
                    <h2><i class="halflings-icon white edit"></i><span class="break"></span>关于我们</h2>
                </div>
                <div class="box-content">
                    @if(Session::has('flag'))
                        <div class="alert alert-{{ session('flag') }}">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            <strong>{{ session('msg') }}</strong>
                        </div>
                    @endif
                    <form class="form-horizontal" action="{{ url('about/update') }}" method="POST">
                        {{ csrf_field() }}
                        <fieldset>
                            <div class="control-group">
                                <label class="control-label" for="focusedInput">企业名称</label>
                                <div class="controls">
                                    <input class="input-xlarge focused" type="text" name="name" value="{{ $data->name or ''}}">
                                </div>
                            </div>

                            <div class="control-group">
                                <label class="control-label" for="focusedInput">联系方式</label>
                                <div class="controls">
                                    <input class="input-xlarge focused" type="text" name="mobile" value="{{ $data->mobile or ''}}" >
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="focusedInput">联系地址</label>
                                <div class="controls">
                                    <input class="input-xlarge focused" type="text" name="address" value="{{ $data->address or ''}}" >
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">企业图片</label>
                                <div class="controls">
                                    <a href="javascript:void(0)" id="upload_image">
                                        <img src="{{ asset('/static/img/upload.png') }}" height="118">
                                    </a>

                                    <input type="hidden" name="image" value="">
                                </div>
                            </div>
                            <div class="control-group hidden-phone">
                                <label class="control-label" for="textarea2">企业简介</label>
                                <div class="controls">
                                    <textarea class="cleditor" id="textarea2" rows="3" name="introduction">{{ $data->introduction or ''}}</textarea>
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
@section('js')

    <script>
        $(function() {
            upload_img("upload_image");
        });

        function upload_img(dom)
        {
            var uploader = new plupload.Uploader({ //实例化一个plupload上传对象
                browse_button : dom,
                url : '/upload',
//                headers: uploadHeader(),
                async: false,
                cache: false,
                contentType: false,
                processData: false,
                multipart_params: {
                    '_token' : '{{ csrf_token() }}',
                },
                flash_swf_url : 'js/Moxie.swf',
                silverlight_xap_url : 'js/Moxie.xap',
                multi_selection: false,
                resize : { width : 800, height : 800, quality : 90 },
                filters: {
                    mime_types : [ //只允许上传图片文件
                        { title : "图片文件", extensions : "jpg,png" }
                    ]
                }
            });

            uploader.init(); //初始化

            //绑定文件添加进队列事件
            uploader.bind('FilesAdded', function(uploader,files) {
                for(var i = 0, len = files.length; i<len; i++){
                    var file_name = files[i].name; //文件名
                    !function(i){
                        previewImage(files[i], function(imgsrc){
                            $('#credit').attr('src', imgsrc);
                        })
                    }(i);
                }

                uploader.start();
            });

            // 上传成功后
            uploader.bind('FileUploaded', function(uploads, files, data) {
                var rs = JSON.parse(data.response);
                if (rs.rs) {
                    var html = "<a href='javascript:void(0)' class='img-a'><img src='"+rs.data.path+" 'width='118' height='118' ><img class='small-img' src='/static/img/del.png' width='20' height='20'></a>";
                    if ($('#'+dom).next('input').val() == '') {
                        $('#' + dom).next('input').val(rs.data.path);
                        $('#' + dom).after(html);
                    } else {
                        var num = $("#"+dom).nextAll('a').length;
                        if (num + 1 > 5) {
                            alert('超过上传数量限制');
                        } else {
                            var val = $('#'+dom).nextAll('input').eq(0).val();
                            $('#'+dom).nextAll('input').eq(0).val(rs.data.path+','+val);
                            $('#'+dom).after(html);
                        }
                    }
                } else {
                    alert(rs.msg);
                }
            });
        }

        function previewImage(file,callback){//file为plupload事件监听函数参数中的file对象,callback为预览图片准备完成的回调函数
            if(!file || !/image\//.test(file.type)) return; //确保文件是图片
            var preloader = new mOxie.Image();
            preloader.onload = function() {
                preloader.downsize( 300, 300 );//先压缩一下要预览的图片,宽300，高300
                var imgsrc = preloader.type=='image/jpeg' ? preloader.getAsDataURL('image/jpeg',80) : preloader.getAsDataURL(); //得到图片src,实质为一个base64编码的数据
                callback && callback(imgsrc); //callback传入的参数为预览图片的url
                preloader.destroy();
                preloader = null;
            };
            preloader.load( file.getSource() );
        }

        //征信授权材料删除
        $(document).on('click','.small-img',function(){
            var subscript = $(this).parent('a').index()-1;
            var paths = $(this).parent('a').nextAll('input[type=hidden]').eq(0).val();

            //判断是否是第一张
            if (paths.indexOf(",") > -1) {
                //后续图片
                paths = paths.split(",");
                paths.splice(subscript,1);
                var data = '';
                $.each(paths,function(k,item) {
                    if (k==0) {
                        data = item;
                    } else {
                        data += ","+item;
                    }
                });
                $(this).parent('a').nextAll('input[type=hidden]').eq(0).val(data);
                $(this).parent('a').remove();
            } else {
                //第一张
                $(this).parent('a').nextAll('input[type=hidden]').eq(0).val('');
                $(this).parent('a').remove();
            }
        });
    </script>
@endsection