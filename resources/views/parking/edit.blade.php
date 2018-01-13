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
                <a href="#">添加车库</a>
            </li>
        </ul>

        <div class="row-fluid">
            <div class="box span12">
                <div class="box-header" data-original-title>
                    <h2><i class="halflings-icon white edit"></i><span class="break"></span>添加车库</h2>
                </div>
                <div class="box-content">
                    <form class="form-horizontal" action="{{ url('parking/update', $data->id) }}" method="POST">
                        {{ csrf_field() }}
                        <fieldset>
                            <div class="control-group">
                                <label class="control-label" for="focusedInput">车库名称</label>
                                <div class="controls">
                                    <input class="input-xlarge focused" type="text" name="name" value="{{ $data->name }}">
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">车位数量</label>
                                <div class="controls">
                                    <input class="input-xlarge focused" type="text" name="number" value="{{ $data->number }}">
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">车库图片</label>
                                <div class="controls">
                                    <a href="javascript:void(0)" id="upload_image">
                                        <img src="{{ asset('/static/img/upload.png') }}" height="118">
                                    </a>
                                    @foreach($data->image as $val)
                                        <a href="javascript:void(0)" class="img-a">
                                            <img src="{{  $val }}" width="118" height="118">
                                            <img class="small-img" src="/static/img/del.png" width="20" height="20">
                                        </a>
                                    @endforeach
                                    <input type="hidden" name="image" value="{{ implode(',', $data->image) }}">
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">车库位置</label>
                                <div class="controls">
                                    <select id="cmbProvince" name="province"></select>
                                    <select id="cmbCity" name="city" ></select>
                                    <select id="cmbArea" name="area"></select>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">详细地址</label>
                                <div class="controls">
                                    <input class="input-xlarge focused" type="text" name="address" value="{{ $data->address }}">
                                </div>
                            </div>
                            <div  class="control-group" id="container">
                            </div>
                            <div class="control-group">
                                <label class="control-label">经度</label>
                                <div class="controls">
                                    <input class="input-xlarge focused" type="text" name="lng" readonly value="{{ $data->lng }}">
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">纬度</label>
                                <div class="controls">
                                    <input class="input-xlarge focused" type="text" name="lat" readonly value="{{ $data->lat }}">
                                </div>
                            </div>
                            <div class="control-group hidden-phone">
                                <label class="control-label" for="textarea2">车库介绍</label>
                                <div class="controls">
                                    <textarea class="cleditor" id="textarea2" rows="3" name="introduction" > {{ $data->introduction }}</textarea>
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
    <script src="{{ asset('/js/cityselect.js') }}"></script>
    <script charset="utf-8" src="http://map.qq.com/api/js?v=2.exp&key={{ env('TENCENT_MAP_KEY') }}"></script>
    <script>
        $(function() {
            var lat = "{{ $data->lat }}";
            var lng = "{{ $data->lng }}";
            init(lat, lng);

            var province = "{{ $data->province }}";
            var city = "{{ $data->city }}";
            var area = "{{ $data->area }}";
            addressInit('cmbProvince', 'cmbCity', 'cmbArea', province, city, area);

            upload_img("upload_image");

            $('input[name=address]').on('blur', function() {
                // 获取省市区的地址
                var province = $('select[name=province]').val();
                var city = $('select[name=city]').val();
                var area = $('select[name=area]').val();

                var address = province + city + area + $(this).val();

                codeAddress(address);
            });
        });

        var geocoder,map,marker = null;
        var init = function(lat, lng) {
            var center = new qq.maps.LatLng(lat,lng);
            map = new qq.maps.Map(document.getElementById('container'),{
                center: center,
                zoom: 15,
            });
            //调用地址解析类
            geocoder = new qq.maps.Geocoder({
                complete : function(result){
                    map.setCenter(result.detail.location);
                    var marker = new qq.maps.Marker({
                        map:map,
                        position: result.detail.location
                    });
                    $('input[name=lng]').val(result.detail.location.lng);
                    $('input[name=lat]').val(result.detail.location.lat);
                }
            });

            qq.maps.event.addListener(map, 'click', function(event) {
                $('input[name=lng]').val(event.latLng.getLng());
                $('input[name=lat]').val(event.latLng.getLat());
            });
        }

        function codeAddress(address) {
            //通过getLocation();方法获取位置信息值
            geocoder.getLocation(address);
        }

        var addressInit = function(_cmbProvince, _cmbCity, _cmbArea, defaultProvince, defaultCity, defaultArea)
        {
            var cmbProvince = document.getElementById(_cmbProvince);
            var cmbCity = document.getElementById(_cmbCity);
            var cmbArea = document.getElementById(_cmbArea);

            function cmbSelect(cmb, str)
            {
                for(var i=0; i<cmb.options.length; i++)
                {
                    if(cmb.options[i].value == str)
                    {
                        cmb.selectedIndex = i;
                        return;
                    }
                }
            }

            function cmbAddOption(cmb, str, obj)
            {
                var option = document.createElement("OPTION");
                cmb.options.add(option);
                option.innerText = str;
                option.value = str;
                option.obj = obj;
            }

            function changeCity()
            {
                cmbArea.options.length = 0;
                if(cmbCity.selectedIndex == -1)return;
                var item = cmbCity.options[cmbCity.selectedIndex].obj;
                for(var i=0; i<item.areaList.length; i++)
                {
                    cmbAddOption(cmbArea, item.areaList[i], null);
                }
                cmbSelect(cmbArea, defaultArea);
            }

            function changeProvince()
            {
                cmbCity.options.length = 0;
                cmbCity.onchange = null;
                if(cmbProvince.selectedIndex == -1)return;
                var item = cmbProvince.options[cmbProvince.selectedIndex].obj;
                for(var i=0; i<item.cityList.length; i++)
                {
                    cmbAddOption(cmbCity, item.cityList[i].name, item.cityList[i]);
                }
                cmbSelect(cmbCity, defaultCity);
                changeCity();
                cmbCity.onchange = changeCity;
            }

            for(var i=0; i<provinceList.length; i++)
            {
                cmbAddOption(cmbProvince, provinceList[i].name, provinceList[i]);
            }

            cmbSelect(cmbProvince, defaultProvince);
            changeProvince();
            cmbProvince.onchange = changeProvince;
        }

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