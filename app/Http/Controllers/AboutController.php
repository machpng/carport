<?php

namespace App\Http\Controllers;

use App\About;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index()
    {
        $data = About::find(1);

        return view('about.index', compact('data'));
    }

    public function update(Request $request)
    {
        $data = $request->except(['_token']);

        About::whereId(1)->update($data);

        return redirect()->back()->with(['flag' => 'success', 'msg' => '编辑 成功','data' => $data]);
    }
}
