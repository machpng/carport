<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserStoreRequest;
use App\Parking;
use App\Part;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $list = User::where([])->paginate(15, ['id', 'username', 'mobile', 'email', 'role_id', 'created_at']);

        return view('user.index', compact('list'));
    }

    public function add()
    {
        $parks = Parking::all(['name', 'id']);
        return view('user.add', compact('parks'));
    }

    public function store(UserStoreRequest $request)
    {
        $data = $request->except(['_token']);

        if ($data['role_id'] != 2) {
            $data = array_except($data, ['parks']);
        } else {
            $data['parks'] = implode(',', $data['parks']);
        }

        User::create($data);

        return redirect('user')->with(['flag' => 'success', 'msg' => '添加成功']);
    }

    public function edit($id)
    {
        $data = User::find($id);
        return view('user.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->except(['_token']);

        $user = User::find($id);

        if (!Hash::check($data['old_password'], $user->password)) {
            return redirect()->back()->with(['flag' => 'error', 'msg' => '密码错误']);
        }

        $user->password = $data['password'];
        $user->save();

        return redirect('user')->with(['flag' => 'success', 'msg' => '密码修改成功']);
    }

    public function destory($id, Request $request)
    {
        User::whereId($id)->delete();

        return redirect('user')->with(['flag' => 'success', 'msg' => '删除成功']);
    }
}
