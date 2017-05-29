<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Book;

class BookController extends Controller
{
    public function book()
    {
        return view('stock.addbook');
    }
    public function addbook(Request $request){
        $book = new Book;
        $book->book_name = $request->book_name;
        $book->writer=$request->writer;
        $book->origin=$request->origin;
        $book->opn_pcs=$request->opn_pcs;
        $book->save();
        return Redirect::to(route('book'));
    }
}
