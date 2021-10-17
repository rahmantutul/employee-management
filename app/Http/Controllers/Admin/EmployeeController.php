<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\Employee;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Carbon;
use Intervention\Image\Facades\Image;
use Dompdf\Dompdf;
class EmployeeController extends Controller
{
   public function index(){
       Paginator::useBootstrap();
       $title= 'Employees';
       $employees= Employee::paginate(7);
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
                'email' => 'unique:employees,email',
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
                $imageName= 'default.png';
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
                'email' => 'unique:employees,email,'.$employee->id,
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

    public function export_report($id){
        $title='REPORT';
        $employeeData= Company::find($id);
        $employees=Employee::where('company_id',$employeeData->id)->get();
        $output='<!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, nitial-scale=1.0">
                <meta http-equiv="X-UA-Compatible" content="ie=edge">
                <title>Document</title>
            <link rel="stylesheet" href="'.asset('backend/vendors/mdi/css/materialdesignicons.min.css').'">
                <link rel="stylesheet" href="'. asset('backend/vendors/base/vendor.bundle.base.css').'">
                <link rel="stylesheet" href="'. asset('backend/vendors/datatables.net-bs4/dataTables.bootstrap4.css').'">
                <link rel="stylesheet" href="'. asset('backend/css/style.css').'">
                <link rel="shortcut icon" href="'.asset('backend/images/favicon.png').'"/>
            </head>
            <body>
            <div class="col-lg-12 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                            <h4 class="card-title">Employees Table</h4>
                            <h2 style="justify-content:center"> <b> EMPLOYEES OF '. $employeeData["name"].' </b>('.$employees->count().')</h2>
                            <div class="table-responsive">
                                <table class="table table-striped">
                                <thead>
                                    <tr>
                                    <th>
                                        Name
                                    </th>
                                    <th>
                                        Company
                                    </th>
                                    <th>
                                        City
                                    </th>
                                    <th>
                                        Joining Date
                                    </th>
                                    </tr>
                                </thead>
                                <tbody>';
                                    foreach ($employees as $employee){
                                        $output.='<tr>
                                            <td>
                                             '.$employee['first_name'].' '. $employee['last_name'].'
                                            </td>
                                            <td>
                                            '.$employeeData['name'].'
                                            </td>
                                            <td>
                                            '.$employee['city'].'
                                            </td>
                                            <td>
                                            '.$employee['join_date'].'
                                            </td>
                                        </tr>';
                                    }
                                    $output.='</tbody>
                        </table>
                        </div>
                    </div>
                    </div>
                </div>
            </body>
            </html>';
        $dompdf = new Dompdf();
        $dompdf->loadHtml($output);

        // (Optional) Setup the paper size and orientation
        $dompdf->setPaper('A4', 'landscape');

        // Render the HTML as PDF
        $dompdf->render();

        // Output the generated PDF to Browser
        $dompdf->stream();
        return view('backend.pages.pdf-formate')->with(compact('employeeData','employees','title'));
    }
}
