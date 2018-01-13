<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $list = Product::all();
        return view('product.index', compact('list'));
    }

    public function add()
    {
        return view('product.add');
    }

    public function store(Request $request)
    {
        $data = $request->except(['_token']);
        Product::create($data);

        return redirect('product')->with(['flag' => 'success', 'msg' => '添加成功']);
    }

    public function edit($id, Request $request)
    {
        $data = Product::find($id);
        return view('product.edit', compact('data'));
    }

    public function update($id, Request $request)
    {
        $data = $request->except(['_token']);
        Product::whereId($id)->update($data);
        return redirect('product')->with(['flag' => 'success', 'msg' => '编辑成功']);
    }

    public function destory($id)
    {
        Product::whereId($id)->detele();
        return redirect('product')->with(['flag' => 'success', 'msg' => '删除成功']);
    }
}
