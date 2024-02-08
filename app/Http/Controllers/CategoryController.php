<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    //for create category
    public function create(){
        return view('admin.createCategory');
    }
    // for create cateory for data
    public function createCategory(Request $request){
        // validation
        $this->vali($request);
        // create data
        $data=$this->dataArrange($request);
        Category::create($data);
        // return back
        return back()->with(['success'=>'your create data is success...']);
    }
    // for category list
    public function list(){
        // get data from database with paginate
        $data=Category::paginate(3);
        return view('admin.categoryList',compact('data'));
    }
    // for edit btn
    public function edit($id){
        $data=Category::where('id',$id)->first();
        return view('admin.categoryEdit',compact('data'));
    }
    // for update btn
    public function update($id,Request $request){
        // validation
        $this->vali($request);
        // dataArrange
        $data=$this->dataArrange($request);
        // update data
        Category::where('id',$id)->update($data);
        // return
        return redirect()->route('category.list')->with(['success'=>'your update data is success...']);
    }
    // for delete btn
    public function delete($id){
        Category::where('id',$id)->delete();
        return redirect()->route('category.list')->with(['success'=>'your data delete is succss...']);
    }
    // for private functon validation
    private function vali($request){
        $rules=[
            'categoryName'=>'required',
            'categoryDescription'=>'required',
        ];
        $messages=[
            'categoryName.required'=>'Enter category name',
            'categoryDescription.required'=>'Fill description',
        ];
        Validator::make($request->all(),$rules,$messages)->validate();
    }
    // for dataArrange
    private function dataArrange($request){
        return[
            'name'=>$request->categoryName,
            'description'=>$request->categoryDescription,
        ];
    }
}
