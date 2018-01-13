<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FaultController extends Controller
{
    /**
     * 故障记录列表
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('fault.index');
    }
}
