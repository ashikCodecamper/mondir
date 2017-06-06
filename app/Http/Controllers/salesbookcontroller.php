<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Salebook;
class salesbookcontroller extends Controller
{
    public function salebook(){
        $inv =DB::table('booksales')->max('id');;
        $customers = DB::select('SELECT id,temple_name from customers');
        $books = DB::table('books')
        ->join('bookpurchases', 'books.id', '=', 'bookpurchases.book_id')
        ->select('books.id','books.book_name', 'bookpurchases.sales_price')
         ->get();
        return view('stock.salebooks',['customers'=>$customers,'books'=>$books,'inv'=>$inv]);
    }

     public function addsalebook(Request $request){
        $salebook = new Salebook;
        //mix value with sales_price|Id
            $arr =$request->book_id;
            $recvId =[];
            foreach($arr as $ar) {
            $exp=explode('|',$ar);
            array_push($recvId,$exp[1]);
            };
        // form data collection
         $salebook->customer_id = $request->input('customer_id');
        $salebook->book_id =$request->input('book_id[0]');
         $salebook->pcs = $request->input('pcs[0]');
         $salebook->total_amount = $request->total_amount;
         $salebook->due_amount = $request->total_amount - $request->rcv_amount;
         $salebook->rcv_amount = $request->rcv_amount;
         $salebook->cheque_num = $request->cheque_num;
         $salebook->inv_num = $request->inv_num;

       $salebook->save();
        
        return "created succesfully";
    }
}
