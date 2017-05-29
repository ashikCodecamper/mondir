<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Para;
use App\PurchasePara;

class ParaController extends Controller
{
    public function para()
    {
        return view('stock.addpara');
    }

    public function addpara(Request $request)
    {
        $para = new Para;
        $para->para_name = $request->para_name;
        $para->p_from=$request->p_from;
        $para->origin=$request->origin;
        $para->opn_pcs=$request->opn_pcs;
        $para->save();
        return Redirect::to(route('para'));
    }
    public function purchasepara()
    {   $paras = DB::select('select id,para_name from paras');
        return view('stock.purchasepara',['paras'=>$paras]);
    }
    public function addpurchasepara(Request $request)
    {
        $purchasePara = new PurchasePara;
        $purchasePara->para_id = $request->para_id;
        $purchasePara->pcs = $request->pcs;
        $purchasePara->challan_no = $request->challan_no;
        $purchasePara->date = $request->date;
        $purchasePara->purchases_price = $request->purchases_price;
        $purchasePara->sales_price=$request->sales_price;
        $purchasePara->save();
        $message = "Para Seccessfully Added ";
        return Redirect::to(route('purchasepara'))->withMessage($message);
    }
}
