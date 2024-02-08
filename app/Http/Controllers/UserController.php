<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    // for profile
    public function profile(){
        return view('profile');
    }
    // for profile eidt
    public function edit(Request $request){
        // validation
        $this->vali($request);
        // data Arrange
        $data=$this->dataArrange($request);
        // for image
        if ($request->hasFile('image')) {
           $dbImg=User::where('id',Auth::user()->id)->value('image');
           if($dbImg != NULL){
            Storage::delete('public/profile/'.$dbImg);
           }
           $imgName=uniqid().$request->file('image')->getClientOriginalName();
           $request->file('image')->storeAs('public/profile/',$imgName);
           $data['image']=$imgName;
        }
        // update
        User::where('id',Auth::user()->id)->update($data);
        return back()->with(['success'=>'your update data is success..']);
    }
    // for password change
    public function password(Request $request){
        // validation for password chagne
        $this->valiPassword($request);
        // hash password
        $dbData=User::where('id',Auth::user()->id)->first();
        $dbPassword=$dbData->password;
        if(Hash::check($request->oldPassword,$dbPassword)){
            $newPw=Hash::make($request->newPassword);
            User::where('id',Auth::user()->id)->update(['password'=>$newPw]);
            // logout
            Auth::guard('web')->logout();
            return redirect()->route('login')->with(['success'=>'your password change is success']);
        }else{
            return back()->with(['error'=>'your password change is failed..']);
        }
    }
    // private function for password change validation
    private function valiPassword($request){
        $rules=[
            'oldPassword'=>'required',
            'newPassword'=>'required|different:oldPassword',
            'cmPassword'=>'required|same:newPassword',
        ];
        $messages=[
            'oldPassword.required'=>'Please enter your old password',
            'newPassword.required'=>'Write your new password',
            'cmPassword.required'=>'Rewrite your new pasword',
        ];
        Validator::make($request->all(),$rules,$messages)->validate();
    }
    // privat function for validation
    private function vali($request){
        $rules=[
            'image'=>'required|image|mimes:jpg,jpng,png',
            'name'=>'required|string',
            'gender'=>'required',
            'age'=>'required',
            'phone'=>'required',
        ];
        $messages=[
            'image.image'=>'Select your image',
            'image.mimes'=>'Jpg, Jpng, Png type only',
            'name.required'=>'Fill your name',
            'gender.required'=>'Fill your gender',
            'age.required'=>'Fill your age',
            'phone.required'=>'Fill your phone',
        ];
        Validator::make($request->all(),$rules,$messages)->validate();
    }
    // for dataArrang
    private function dataArrange($request){
        return [
            'name'=>$request->name,
            'gender'=>$request->gender,
            'age'=>$request->age,
            'phone'=>$request->phone,
            'address'=>$request->address,
        ];
    }
}
