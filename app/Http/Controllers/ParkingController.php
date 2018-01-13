<?php

namespace App\Http\Controllers;

use App\Parking;
use App\Part;
use App\Services\CommonHelper;
use Illuminate\Http\Request;

class ParkingController extends Controller
{
    public function index()
    {
        if (auth()->user()->role_id == 2) {
            $list = Parking::whereIn('id', explode(',', auth()->user()->parks))->get();
        } else {
            $list = Parking::where([])->get();
        }
        return view('parking.index', compact('list'));
    }

    public function create()
    {
        return view('parking.add');
    }

    public function store(Request $request)
    {
        $data = $request->except(['_token']);

//        $rs = $this->__createParking($data);

//        if (!$rs->Success) {
//            return redirect()->back()->with(['flag' => 'error', 'msg' => $rs->Message]);
//        }

        Parking::create($data);

        return redirect('parking')->with(['flag' => 'success', 'msg' => '添加成功']);
    }

    public function detail($id)
    {
        try {
            $data = Parking::whereId($id)->firstOrFail();
        } catch (\Exception $e) {
            return redirect()->back()->with(['flag' => 'error', 'msg' => '获取数据失败']);
        }

        return view('parking.detail', compact('data'));
    }

    public function edit($id, Request $request)
    {
        try {
            $data = Parking::whereId($id)->firstOrFail();
        } catch (\Exception $e) {
            return redirect()->back()->with(['flag' => 'error', 'msg' => '获取数据失败']);
        }

        return view('parking.edit', compact('data'));
    }

    public function update($id, Request $request)
    {
        $data = $request->except(['_token']);
        Parking::whereId($id)->update($data);

        return redirect('parking')->with(['flag' => 'success', 'msg' => '编辑成功']);
    }

    public function destory($id)
    {
        Parking::whereId($id)->delete();
        return redirect('parking')->with(['flag' => 'success', 'msg' => '删除成功']);
    }

    public function parts($id)
    {
        $data = Parking::find($id);
        $list = Part::where('park_id', $id)->orderBy('id', 'ASC')->get();
        return view('parts.index', compact('list', 'data'));
    }

    public function policy($id)
    {
        $data = Part::find($id);
        return view('parking.policy', compact('data'));
    }

    public function doPolicy(Request $request, $id)
    {
        $data = $request->except(['_token']);
        $park_id = array_pull($data, 'park_id');
        Part::whereId($id)->update($data);

        return redirect('parking/part/' .$park_id)->with(['flag' => 'success', 'msg' => '操作成功']);
    }

    public function policies($id)
    {
        $data = Parking::find($id);
        $list = Part::where('park_id', $id)->orderBy('id', 'ASC')->get();
        return view('parts.policies', compact('list', 'data'));
    }

    /**
     * 编辑车库维保单
     * @param $id
     */
    public function editPolicy($id)
    {
        $data = Part::find($id);
        return view('parking.policy.edit', compact('data'));
    }

    /**
     * 更新车库维保单
     * @param $id
     */
    public function updatePolicy(Request $request, $id)
    {
        $data = $request->except(['_token']);
        $park_id = array_pull($data, 'park_id');
        Part::whereId($id)->update($data);

        return redirect('parking/part/' . $park_id)->with(['flag' => 'success', 'msg' => '更新成功']);
    }

    /**
     * 删除车库维保单
     * @param $id
     */
    public function deletePolicy($id)
    {
        Part::whereId($id)->delete();
        return redirect()->back()->with(['flag' => 'success', 'msg' => '删除成功']);
    }

    private function __createParking($data)
    {
        $url = config('outerapi.url') . '/createCarPort';
        $rs = CommonHelper::curl_post($url, $data);

        return json_decode($rs);
    }

    private function __editParking($data)
    {
        $url = config('outerapi.url') . '/createCarPort';
        $rs = CommonHelper::curl_post($url, $data);

        return json_decode($rs);
    }

}
