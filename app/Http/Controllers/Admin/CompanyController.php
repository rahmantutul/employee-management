<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Company;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Carbon;
use Intervention\Image\Facades\Image;

class CompanyController extends Controller
{
   public function index(){
       $title= 'COMPANIES';
       $companies= Company::get();
       return view('backend/pages/companies/index')->with(compact('title','companies'));
   }

   public function add_company(Request $request){
       $title= 'ADD COMPANY';
       $companies=Company::all();
       if($request->isMethod('Post')){
            
            $data= $request->all();
            $request->validate([
                'name' => 'required',
                'email' => 'required|email|unique:admins',
                'website' => 'required',
                'logo'=>'required'
            ]);

            if($request->hasFile('logo'))
            {

             $image=$request->file('logo');
             $imageName= rand(11111, 99999).'.'.$image->getClientOriginalExtension();;
             $companyImage = Image::make($image)->resize(100,100)->stream();
             Storage::disk('public')->put('/'.$imageName,$companyImage);
            }else{
                $imageName= "default.png";
            }
            $company = New Company;
            $company->name=$data['name'];
            $company->email=$data['email'];
            $company->website=$data['website'];
            $company->status=1;
            $company->logo=$imageName;
            $company->save();
            Toastr::success('New company added! :)','Success');
            return redirect('admin/company');die;
        }
     
      return view('backend.pages.companies.add')->with(compact('title','companies'));
   }

   public function edit_company(Request $request, $id){
        $title= 'EDIT COMPANY';
        $company=Company::find($id);
       if($request->isMethod('Post')){
            $data=$request->all();
            $request->validate([
                'name' => 'required',
                'email' => 'required|email|unique:admins',
                'website' => 'required',
            ]);

            if($request->hasFile('logo'))
            {

             $image=$request->file('logo');
             $imageName= rand(11111, 99999).'.'.$image->getClientOriginalExtension();;
             if($company['logo']!='default.png'){
                if(Storage::disk('public')->exists('/'.$company['logo']))
                {
                Storage::disk('public')->delete('/'.$company['logo']);
                }
             }
            
             $companyImage = Image::make($image)->resize(100,100)->stream();
             Storage::disk('public')->put('/'.$imageName,$companyImage);
            }else{
                $imageName= $company->logo;
            }
            $company->name=$data['name'];
            $company->email=$data['email'];
            $company->website=$data['website'];
            $company->status=1;
            $company->logo=$imageName;
            $company->save();
            Toastr::success('Info updated! :)','Success');
            return redirect('admin/company');die;
        }
     
      return view('backend.pages.companies.edit')->with(compact('title','company'));
   }
    public function delete($id){
        $data= Company::find($id);
        //   dd($data);
          if($data['logo']!='default.png'){
            if(Storage::disk('public')->exists('/'.$data['logo']))
            {
            Storage::disk('public')->delete('/'.$data['logo']);
            }
        }
        $data->employees()->delete();
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
            company::where('id',$data['company_id'])->update(['status'=>$status]);
            return response()->json(['status'=>$status, 'id'=>$data['company_id']]);
        }
    }
}

