<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    //for createProduct
    public function createProduct()
    {
        $data = Category::get();
        return view('admin.productCreate', compact('data'));
    }
    // input Produt
    public function inputProduct(Request $request)
    {
        // for validation
        $this->vali($request);
        //    for dataArrange
        $data = $this->dataArrange($request);
        //for image
        if ($request->hasFile('productImage')) {
            $imageName = uniqid() . $request->file('productImage')->getClientOriginalName();
            // store
            $request->file('productImage')->storeAs('/public/products/', $imageName);
            $data['image']=$imageName;
        }
        // create product data
        Product::create($data);
        return back()->with(['success'=>'create product data is success...']);
    }
    // for product list
    public function productList(){
        $data = Product::select('products.*','categories.name as category_name')
                ->leftJoin('categories','categories.id','products.category_id')
                ->paginate(6);
        return view('admin.productList',compact('data'));
    }
    // for product detail
    public function productDetail($id){
        $data = Product::where('id',$id)->first();
        return view('admin.productDetail',compact('data'));
    }
    // for product edit
    public function productEdit($id){
        $productData = Product::where('id',$id)->first();
        $categoryData = Category::get();
        return view('admin.productEdit',compact('productData','categoryData'));
    }
    // for update Product
    public function updateProduct($id, Request $request){
        // validation
        $this->vali($request);
        // dataArrange
        $data = $this->dataArrange($request);
        // for image
        if($request->hasFile('productImage')){
           $dbImage = Product::where('id',$id)->value('image');
           if($dbImage != null){
                Storage::delete('/public/products/'.$dbImage);
           }
           $imageName = uniqid().$request->file('productImage')->getClientOriginalName();
           $request->file('productImage')->storeAs('/public/products/',$imageName);
           $data['image']=$imageName;
        }
        // update
        Product::where('id',$id)->update($data);
        return back()->with(['success'=>'update product data is success...']);
    }
    // for product delete
    public function productDelete($id){
        $dbImage = Product::where('id',$id)->value('image');
        if ($dbImage != null) {
            Storage::delete('/public/products/'.$dbImage);
        }
        Product::where('id',$id)->delete();
        return back()->with(['success'=>'delete product data is success']);
    }
    // for validation
    private function vali($request)
    {
        $rules = [
            'productName' => 'required',
            'productBrand' => 'required',
            'selectProduct' => 'required',
            'productDescription' => 'required',
            'productPrice' => 'required',
            'productImage' => 'required|image|mimes:jpg,png,jpeg',
        ];
        $messages = [
            'productName.required' => 'Fill product name',
            'productBrand.required' => 'Fill product series',
            'selectProduct.required' => 'select product',
            'productDescription.required' => 'fill description',
            'productPrice' => 'enter product price',
            'productImage.required' => 'choose product image',
        ];
        Validator::make($request->all(), $rules, $messages)->validate();
    }
    // for data arrange
    private function dataArrange($request)
    {
        return [
            'category_id' => $request->selectProduct,
            'name' => $request->productName,
            'brand' => $request->productBrand,
            'description' => $request->productDescription,
            'price' => $request->productPrice,
        ];
    }
}
