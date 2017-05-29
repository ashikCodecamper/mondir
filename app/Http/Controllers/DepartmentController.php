<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Department;

class DepartmentController extends Controller
{
    public function dep()
    {
        return view('accounts.addnewdep');
    }
    public function adddep(Request $request)
    {
        $dept = new Department;
        $dept->dep_name = $request->dep_name;
        $dept->op_bal=$request->op_bal;
        $dept->save();
        return Redirect::to(route('dep'));
    }
}
