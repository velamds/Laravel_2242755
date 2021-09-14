<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Brand;

class ProductController extends Controller
{
    function __construct(){
        $this->middleware('auth');
    }


    function show(){
        // select * from products p join brands b on p.brand_id=b.id;
        $productList = Product::has('brand')->get();
        return view('product/list',['products' => $productList]);
    }

    function delete($id){
        $product = Product::find($id);
        $product->delete();
        //Product::destroy($id);
        return redirect('/products')->with('message','El producto fue borrado');
    }

    function form($id = null){
        $product = new Product();
        $brands = Brand::orderBy('name')->get();
        if($id != null){
            //Select * from products where id=$id
            $product = Product::findOrFail($id); 
        }
        return view('product/form',[
                                    'product'=> $product , 
                                    'brands' => $brands
                                ]);
    }

    function save(Request $request){
        $request->validate(
            [
                'name' => 'required|max:50',
                'cost' => 'required|numeric',
                'price' => 'required|numeric',
                'quantity' => 'required|numeric',
                'brand' => 'required:numeric'
            ]
        );

        $product = new Product();// VO BO Bean

        if(intval($request->id)>0){
            $product = Product::findOrFail($request->id);
        }

        $product->name = $request->name;
        $product->cost = $request->cost;
        $product->price = $request->price;
        $product->quantity = $request->quantity;
        $product->brand_id = $request->brand;

        $product->save(); //Insert//Update into products ...
        
        return redirect('/products')->with('message','El producto fue guardado');
    }
}
