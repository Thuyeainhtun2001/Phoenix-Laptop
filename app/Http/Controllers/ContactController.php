<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ContactController extends Controller
{
    //for contact
    public function contact(Request $request)
    {
        // for validation
        $this->vali($request);
        // for data Arrage
        $data = $this->dataArrange($request);
        Contact::create($data);
        return back()->with(['success' => 'your contact data is success and waiting for our response later. Thank Your']);
    }
    // for contact list
    public function contactList(){
        $data = Contact::paginate(10);
        return view('admin.contactList',compact('data'));
    }
    // for detail
    public function contactListDetail($id){
        $data = Contact::where('id',$id)->first();
        return view('admin.contactListDetail',compact('data'));
    }
    // for delete
    public function contactListDelete($id){
        Contact::where('id',$id)->delete();
        return redirect()->route('contactList')->with(['success'=>'delete contact data is successs....']);
    }
    // validatiion
    private function vali($request)
    {
        $rules = [
            'name' => 'required|string',
            'email' => 'required|email',
            'message' => 'required',
        ];
        $messages = [
            'name.required' => 'Please Enter your name',
            'email.required' => 'Fill your email',
            'email.email' => "accept email formalt only",
            'message.required' => "Fill your message",
        ];
        Validator::make($request->all(), $rules, $messages)->validate();
    }
    // dataArrange
    private function dataArrange($request)
    {
        return [
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'message' => $request->message,
        ];
    }
}
