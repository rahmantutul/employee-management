<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;

class FrontendController extends Controller
{
    public function company(){
        Paginator::useBootstrap();
        $title="ALL COMPANIES";
        $companies=Company::paginate(8);
        // dd($companies);
        return view('frontend/pages/company')->with(compact('companies','title'));
    }
     public function employee(){
        $title="ALL EMPLOYEES";
        $employees=Employee::with('company')->paginate(8);
        
        // dd($employees);
        return view('frontend/pages/employee')->with(compact('employees','title'));
    }
    public function related($id){
        $title="OUR EMPLOYEES";
        $employees=Employee::where('company_id',$id)->paginate(8);
        // dd($employees);
        return view('frontend/pages/related-employees')->with(compact('employees','title'));
    }
    public function company_search(){
        $title="ALL COMPANIES";
        $search = $_REQUEST['search'];
        $companies = Company::where('name','like','%'.$search.'%')->paginate(7);
        return view('frontend/pages/company')->with(compact('companies','title'));
    }
    public function employee_search(){
        $title="ALL EMPLOYEES";
        $search = $_REQUEST['search'];
        $employees = Employee::where('first_name','like','%'.$search.'%')->paginate(7);
        return view('frontend/pages/employee')->with(compact('employees','title'));
       
    }
}
