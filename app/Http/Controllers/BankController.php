<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;


class BankController extends Controller
{
    public function bank()
    {
        return view('accounts.addbank');
    }
    public function addbank(Request $request)
    {
        $bank = new App\Bank;
        $bank->bank_name = $request->bank_name;
        $bank->op_bal=$request->op_bal;
        $bank->save();
        return Redirect::to(route('bank'));
    }
}
