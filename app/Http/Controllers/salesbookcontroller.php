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
        $addbook = new Salebook;
        //mix value with sales_price|Id
        $bookmix =$request->book_id; 
        $bookId =explode("|", $bookmix[0]);
        $bookid = (int) $bookId[1];
        // form data collection
        $addbook->customer_id = $request->customer_id;
        $addbook->book_id = $bookid ;
        $addbook->pcs = $request->pcs;
        $addbook->total_amount = $request->total_amount;
        $addbook->due_amount = $request->total_amount - $request->rcv_amount;
        $addbook->rcv_amount = $request->rcv_amount;
        $addbook->cheque_num = $request->cheque_num;
        $addbook->inv_num = $request->inv_num;

        return ['book_id'=>$bookmix,'pcs'=>$addbook->pcs];
    }
}
