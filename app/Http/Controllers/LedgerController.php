<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Ledger;

class LedgerController extends Controller
{
    public function led()
    {
        return view('accounts.addledger');
    }
    public function addled(Request $request)
    {
        $ledger= new Ledger;
    }
}
