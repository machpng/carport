<?php

namespace App\Http\Controllers;

use App\Parking;
use App\Part;
use Illuminate\Http\Request;

class PartController extends Controller
{
    public function add()
    {
        $parks = Parking::all(['id', 'name']);
        return view('parts.add', compact('parks'));
    }

    public function store(Request $request)
    {
        try {
            $data = $request->except(['_token']);
            $data['number'] = rand(100, 500);
            $data['howdo'] = '待检';
            Part::create($data);
        } catch (\Exception $e) {
            return redirect()->back()->with(['flag' => 'error', 'msg' => '添加失败']);
        }

        return redirect()->back()->with(['flag' => 'success', 'msg' => '添加成功']);
    }

    public function edit($id)
    {
        $data = Part::whereId($id)->first();
        return view('part.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        try {
            $data = $request->except(['_token']);
            Part::whereId($id)->upadte($data);
        } catch (\Exception $e) {
            return redirect()->back()->with(['flag' => 'error', 'msg' => '编辑失败']);
        }

        return redirect()->route('parts')->with(['flag' => 'success', 'msg' => '编辑成功']);
    }

    public function parking()
    {
        return redirect()->route('parking');
    }
}
