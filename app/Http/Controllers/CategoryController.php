<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use App\ProductDetail;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        //        
        $categories = Category::all();
        return view('quanly.category.index', ['categories' => $categories]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('quanly.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate($request, 
            [                
                'Name' => 'unique:customers'
            ],
            [
                'Name.unique' => 'Name already exists'            
            ]);
        $category = new Category;
        $category->fill($request->all());
        $category->save();
        return redirect()->route('category.index')->with('notify', 'Added Category: '.$request->Name.' Successfully');
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
        $products = Product::where('IdCategory', $id)->get();
        return view('quanly.product.index', ['products' => $products]);
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
        $category = Category::findorfail($id);
        return view('quanly.category.edit',['category' => $category]);
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
        $this->validate($request, 
            [                
                'Name' => 'unique:customers,Name,'.$id
            ],
            [
                'Name.unique' => 'Name already exists'            
            ]);
        $category = Category::findorfail($id);
        $category->fill($request->all());
        $category->save();
        return redirect()->route('category.index')->with('notify', 'Edited Category: '.$request->Name.' Successfully');
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
        //delete product
        $products = Product::where('IdCategory', $id)->get();
        //delete product detail
        foreach ($products as $product)
        {
            $productdetails = ProductDetail::where('IdProduct', $product->id)->get();
            foreach ($productdetails as $productdetail)
            {
                $productdetail->delete();
            }
            $product->delete();
        }
        $category = Category::findorfail($id);
        $Name = $category->Name;        
        $category->delete();
        return redirect()->route('category.index')->with('notify', 'Deleted Category: '.$Name.' Successfully');
    }

    public function jqueryvalidate($id, $Name)
    {        
        $categories = Category::where('id', '<>' ,$id)->where('Name', $Name)->count();
        if($categories > 0)
            echo "This name is already in the list of categories
";
        else
            echo "";
    }
}
