<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Carbon;
use Intervention\Image\Facades\Image;

class AdminController extends Controller
{
    public function login(Request $request){
        if($request->isMethod('post')){
            $data= $request->all();
            $request->validate([
                'email' => 'required|email',
                'password' => 'required',
            ]);
            if(Auth::guard('admin')->attempt(['email' => $data['email'], 'password' => $data['password']])){
                Toastr::success('Welcome to dashboard! :)','Success');
                 return redirect('admin/dashboard');die;
            }else{
                Toastr::error('Incorrect Email and password! :)','Error!');
                return redirect()->back();die;
            }

        }
        return view('backend.pages.login');
    }
    public function logout(){
        Auth::guard('admin')->logout();
        Toastr::success('Your logged out! :)','Success!');
        return redirect('/admin');die;
    }

    public function register(Request $request){
        if($request->isMethod('Post')){
            
            $data= $request->all();
            $request->validate([
                'name' => 'required|regex:/^[a-zA-Z]+$/u|max:255|unique:users,name,',
                'email' => 'required|email:rfc,dns',
                'password' => 'required|min:8',
                'email' => 'required|email|unique:admins'
            ], [
                'name.required' => 'Name is required',
                'name.regex' => 'Letters only',
                'password.required' => 'Password is required',
                'password.min' => 'Minimum  8 digit of password'
            ]);

            if($request->hasFile('image'))
            {

             $userCount = Admin::where('email', $data['email']);
             $image=$request->file('image');
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
            $admin = New Admin;
            $admin->name=$data['name'];
            if ($userCount->count()>0) {
               return back()->with('error', 'Email exist!.');
                return redirect('admin/register');
            } else {
                 $admin->email=$data['email'];
            }
             $admin->image=$imageName;
             $admin->password=bcrypt($data['password']);
            $admin->save();
            Toastr::success('Registration complete! :)','Success');
            return redirect('/admin/dashboard');die;
        }
        return view('backend.pages.register');
    }

    public function dashboard(){
        $title= 'Employee-Management/Admin';
        return view('backend.pages.index')->with(compact('title'));die;
    }
}
