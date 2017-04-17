<?php

namespace App\Http\Controllers;

use App\Product;
use App\ProductDetail;
use App\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //        
        $products = Product::all();
        return view('quanly.product.index', ['products' => $products]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $categories = Category::all();
        return view('quanly.product.create', ['categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product = new Product;
        $product->fill($request->all());       
        $product->save();
        return redirect()->route('product.index')->with('notify', 'Added Product: '.$request->Name.' Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $productdetails = ProductDetail::where('IdProduct', $id)->get();
        return view('quanly.productdetail.index', ['productdetails' => $productdetails]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $product = Product::findorfail($id);
        $categories = Category::all();
        return view('quanly.product.edit',['product' => $product, 'categories' => $categories]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //        
        $product = new Product;
        $product = Product::findorfail($id);
        $product->fill($request->all());
        $product->save();
        return redirect()->route('product.index')->with('notify', 'Edited Product: '.$request->Name.' Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $product = Product::findorfail($id);
        $Name = $product->Name;
        $product->delete();
        return redirect()->route('product.index')->with('notify', 'Deleted Product: '.$Name.' Successfully');
    }

    public function jqueryvalidate($id, $Name)
    {        
        $products = Product::where('id', '<>' ,$id)->where('Name', $Name)->count();
        if($products > 0)
            echo "This name is already in the list of products";
        else
            echo "";
    }
}
