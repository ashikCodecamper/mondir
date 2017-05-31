<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class salesbookcontroller extends Controller
{
    public function salebook(){
        $customers = DB::select('select id,temple_name from customers');
        $books = DB::select('select book_id,sales_price from bookpurchases');
        return view('stock.salebooks',['customers'=>$customers,'books'=>$books]);
    }

     public function addsalebook(Request $request){
        
    }
}
