<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Transection;

class TransectionController extends Controller
{
     public function tran()
    {
        return view('accounts.addtrans');
    }
    public function addtran(Request $request)
    {
        $tran = new Transection;
        $tran->date = $request->date;
        $tran->tra_num=$request->tra_num;
        $tran->dep_id = $request->dep_id;
        $tran->led_id = $request->led_id;
        $tran->t_type = $request->t_type;
        $tran->b_id = $request->b_id;
        $tran->desc = $request->desc;
        $tran->exp = $request->exp;
        $tran->inc = $request->inc;
        $tran->save();
        return Redirect::to(route('tran'));
    }
}
