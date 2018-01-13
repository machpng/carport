<?php

namespace App\Http\Controllers;

use App\Parking;
use App\Product;
use App\User;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index()
    {
        return view('customer.index');
    }

    // 车库列表
    public function parkingList()
    {
        return view('customer.list');
    }

    public function goParking($id)
    {


       return redirect('https://map.qq.com/nav/drive#routes/page?eword=%E9%9D%92%E5%B2%9B%E6%B5%81%E4%BA%AD%E5%9B%BD%E9%99%85%E6%9C%BA%E5%9C%BA&epointx=120.392602&epointy=36.272842&referer=myapp&key=TNPBZ-OA43K-JQQJF-ARPQL-ZEPN6-NVF3Q&start=120.40065%2C36.247698&dest=120.392602%2C36.272842&sword=%E9%9D%92%E5%B2%9B%E6%B1%BD%E8%BD%A6%E5%8C%97%E7%AB%99');
    }

    //
    public function parkingLog()
    {
        return view('customer.list');
    }

    public function about()
    {
        return view('customer.about');
    }

    public function log()
    {

    }

    public function info()
    {
        // 获取用户信息
        $data = [
            'nickname' => '昵称',
            'mobile' => '',
            'age' => '昵称',
            'image' => '',
            'address' => '当前位置'
        ];

    }

    public function logList()
    {
        //获取车库记录
        $lists = Parking::all();

        return view('customer.log',compact('lists'));
    }

    public function ProductList()
    {
        //获取产品列表
        $lists = Product::all();

        return view('customer.product',compact('lists'));
    }

    public function ucenter()
    {
        $user = User::find(1);
        return view('customer.ucenter',compact('user'));
    }

    public function detail($id)
    {
        $product = Product::find($id);
        return view('customer.detail',compact('product'));
    }
}
