<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\Employee;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Carbon;
use Intervention\Image\Facades\Image;

class EmployeeController extends Controller
{
   public function index(){
       $title= 'Employees';
       $employees= Employee::get();
       return view('backend/pages/employee/index')->with(compact('title','employees'));
   }

   public function add_employee(Request $request){
       $title= 'ADD EMPLOYEE';
       $companies=Company::all();
       if($request->isMethod('Post')){
            
            $data= $request->all();
            $request->validate([
                'first_name' => 'required',
                'last_name' => 'required',
                'email' => 'required|email|unique:admins',
                'phone' =>'required|max:11',
                'city'=>'required',
                'company_id'=>'required',
            ]);

            if($request->hasFile('logo'))
            {

             $image=$request->file('logo');
             $imageName= rand(11111, 99999).'.'.$image->getClientOriginalExtension();;

             if(!Storage::disk('public')->exists('images/admin/'))
             {
                Storage::disk('public')->makeDirectory('images/admin/');
             }
             $profileImage = Image::make($image)->resize(100,100)->stream();
             Storage::disk('public')->put('images/admin/'.$imageName,$profileImage);
            }else{
                $imageName= "default.png";
            }
            $employee = New Employee;
            $employee->company_id=$data['company_id'];
            $employee->first_name=$data['first_name'];
            $employee->last_name=$data['last_name'];
            $employee->email=$data['email'];
            $employee->phone=$data['phone'];
            $employee->city=$data['city'];
            $employee->join_date=$data['join_date'];
            $employee->status=1;
            $employee->logo=$imageName;
            $employee->save();
            Toastr::success('New employee added! :)','Success');
            return redirect('admin/employee');die;
        }
     
      return view('backend.pages.employee.add')->with(compact('title','companies'));
   }

   public function edit_employee(Request $request, $id){
        $title= 'EDIT EMPLOYEE';
        $employee=Employee::find($id);
        $companies=Company::all();
       if($request->isMethod('Post')){
            $data=$request->all();
            $request->validate([
                'first_name' => 'required',
                'last_name' => 'required',
                'email' => 'required|email|unique:admins',
                'phone' =>'required|max:11',
                'city'=>'required',
                'company_id'=>'required',
            ]);

            if($request->hasFile('logo'))
            {

             $image=$request->file('logo');
             $imageName= rand(11111, 99999).'.'.$image->getClientOriginalExtension();;

             if(!Storage::disk('public')->exists('images/admin/'))
             {
                Storage::disk('public')->makeDirectory('images/admin/');
             }
              if($employee['logo']!='default.png'){
                if(Storage::disk('public')->exists('images/admin/'.$employee['logo']))
                {
                Storage::disk('public')->delete('images/admin/'.$employee['logo']);
                }
            }
           
             $profileImage = Image::make($image)->resize(100,100)->stream();
             Storage::disk('public')->put('images/admin/'.$imageName,$profileImage);
            }else{
                $imageName= $employee->logo;
            }
            $employee->company_id=$data['company_id'];
            $employee->first_name=$data['first_name'];
            $employee->last_name=$data['last_name'];
            $employee->email=$data['email'];
            $employee->phone=$data['phone'];
            $employee->city=$data['city'];
            $employee->join_date=$data['join_date'];
            $employee->status=1;
            $employee->logo=$imageName;
            $employee->save();
            Toastr::success('Info updated! :)','Success');
            return redirect('admin/employee');die;
        }
     
      return view('backend.pages.employee.edit')->with(compact('title','employee','companies'));
   }
    public function delete($id){
        $data= Employee::find($id);
        if($data['logo']!='default.png'){
            if(Storage::disk('public')->exists('images/admin/'.$data['logo']))
            {
            Storage::disk('public')->delete('images/admin/'.$data['logo']);
            }
        }
       
        $data->delete();
        Toastr::success('Info deleted! :)','Success');
        return redirect()->back();
    }
    public function updateStatus(Request $request){
        if($request->ajax()){
            $data= $request->all();
            if($data['status']=='Active'){
                $status=0;
            }else{
                $status=1;
            }
            Employee::where('id',$data['employee_id'])->update(['status'=>$status]);
            return response()->json(['status'=>$status, 'id'=>$data['employee_id']]);
        }
    }
    public function make_report($id){
        $title='EMPLOYEE REPORT';
        $employeeData= Company::find($id);
        $employees=Employee::where('company_id',$employeeData->id)->get();
        // dd($employees);
        return view('backend.pages.report')->with(compact('employeeData','employees','title'));
    }
}
