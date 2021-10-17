<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use ProtoneMedia\LaravelCrossEloquentSearch\Search;

class SearchController extends Controller
{
    public function searchCompany(Request $request){
   $term=$_REQUEST['term'];
    $title= "SEARCH RESULT";
    // dd($term);
    $companies=Search::addMany([
    [Company::class, ['name', 'website','email']],
    ]) 
    ->orderByDesc()
    ->paginate(8)
    ->get($term);
    return view('backend/pages/companies/index')->with(compact('companies','title'));
    
}
public function searchEmployee(){
    $term=$_REQUEST['term'];
    $title= "SEARCH RESULT";
    // dd($term);
    $employees=Search::addMany([
    [Employee::class, ['first_name', 'last_name','phone','email']],
    ])
     ->orderByDesc()
    ->paginate(10)
    ->get($term);
    return view('backend/pages/employee/index')->with(compact('employees','title'));
}
}
