<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Stock;
use App\BookPurchase;
class StockController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function customer()
    {
        return view('stock.addcustomer');
    }
     public function addbook()
    {
        return view('stock.addbook');
    }
     public function addnewbook()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function purchasebook()
    {   
        $books = DB::select('select id,book_name from books');
        return view('stock.purchasebook',['books'=>$books]);
    }
    public function addpurchasebook(Request $request)
    {
         $pbook = new BookPurchase;
         $pbook->book_id = $request->book_id;
         $pbook->pcs = $request->pcs; 
         $pbook->purchases_price = $request->purchases_price; 
         $pbook->sales_price = $request->sales_price; 
         $pbook->date = $request->date; 
         $pbook->challan_no = $request->challan_no; 

         $pbook->save();
         return Redirect::to(route('purchasebook'));
    }

  
    public function addcustomer(Request $request)
    {
        $customer = new Stock;
        $customer->temple_name = $request->temple_name;
        $customer->address = $request->address;
        $customer->phone = $request->phone;
        $customer->contact_person = $request->contact_person;
        $customer->openning_bal = $request->openning_bal;
        $customer->save();
        return Redirect::to(route('customer'));
    }
    //sales book 
     public function salebook()
    {   
        $books = DB::select('select id,book_name from books');
        $customers = DB::select('select id,temple_name from customers');
        $price = DB::select('select id,temple_name from customers');
        return view('stock.purchasebook',['books'=>$books]);
    }

}
