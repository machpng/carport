<?php

namespace App\Http\Controllers;

use App\Parking;
use App\Services\CommonHelper;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pakings = Parking::all();

        return view('home',compact('pakings'));
    }

    public function upload(Request $request)
    {
        // 判断文件是否存在
        if (!$request->hasFile('file')) {
            return response()->json(['rs' => false, 'msg' => '文件不存在']);
        }

        // 获取上传的图片
        $file = $request->file('file');

        // 判断上传的文件是否有效
        if (!$file->isValid()) {
            return response()->json(['rs' => false, 'msg' => '无效的文件']);
        }

        // 存储文件
        $path = CommonHelper::uploadFile($file, 'stuff');

        if ($path) {
            return response()->json(['rs' => true, 'msg' => '上传成功', 'data' => ['path' => '/uploads/'.$path]]);
        } else {
            return response()->json(['rs' => false, 'msg' => '上传失败']);
        }

    }

    public function test()
    {
        return view('templet.test');
    }
}
