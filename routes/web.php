<?php
use App\Task;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/invoice', function () {
    return view('stock.invoice');
});
Route::get('/salesbook', function () {
    return view('stock.salebooks');
});

Auth::routes();
//test for axios
Route::get('/bookjson', 'salesbookcontroller@book')->name('bookjson');
Route::get('/home', 'HomeController@index')->name('home');
Route::group(['middleware' => 'auth','prefix' => 'stock'], function ()
{
    Route::get('customer','StockController@customer')->name('customer');
    Route::get('book','BookController@book')->name('book');
    Route::post('addbook','BookController@addbook')->name('addbook');
    Route::get('purchasebook','StockController@purchasebook')->name('purchasebook');
    Route::post('addpurchasebook','StockController@addpurchasebook')->name('addpurchasebook');
    Route::post('addcustomer','StockController@addcustomer')->name('addcustomer');
    // Para controller
    Route::get('para','ParaController@para')->name('para');
    Route::post('addpara','ParaController@addpara')->name('addpara');
    Route::get('purchasepara','ParaController@purchasepara')->name('purchasepara');
    Route::post('addpurchasepara','ParaController@addpurchasepara')->name('addpurchasepara');
   // sales book controller
   Route::get('salebook','Salesbookcontroller@salebook')->name('salebook');
    Route::post('addsalebook','Salesbookcontroller@addsalebook')->name('addsalebook');

});

Route::group(['middleware' => 'auth','prefix' => 'account'], function ()
{
 // Bank Controller
    Route::get('bank','BankController@bank')->name('bank');
    Route::post('addbank','BankController@bank')->name('addbank');
    //Department Controller
    Route::get('dep','DepartmentController@dep')->name('dep');
    Route::post('adddep','DepartmentController@adddep')->name('adddep');
    //Ledger Controller
    Route::get('led','LedgerController@led')->name('led');
    Route::post('addled','LedgerController@addled')->name('addled');
    //Transection Controller
    Route::get('tran','TransectionController@tran')->name('tran');
    Route::post('addtran','TransectionController@addtran')->name('addtran');
});


// example only for demo
Route::get('/tasks/{task_id?}',function($task_id){
    $task = Task::find($task_id);

    return Response::json($task);
});

Route::post('/tasks',function(Request $request){
    $task = Task::create($request->all());

    return Response::json($task);
});

Route::put('/tasks/{task_id?}',function(Request $request,$task_id){
    $task = Task::find($task_id);

    $task->task = $request->task;
    $task->description = $request->description;

    $task->save();

    return Response::json($task);
});

Route::delete('/tasks/{task_id?}',function($task_id){
    $task = Task::destroy($task_id);

    return Response::json($task);
});
Route::get('/addtask', function () {
    $tasks = Task::all();

    return View::make('task')->with('tasks',$tasks);
});