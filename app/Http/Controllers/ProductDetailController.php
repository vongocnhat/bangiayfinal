<?php

namespace App\Http\Controllers;

use App\ProductDetail;
use App\Product;
use Illuminate\Http\Request;
use Image;

class ProductDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function index()
    {
        //        
        $productdetails = ProductDetail::all();
        return view('quanly.productdetail.index', ['productdetails' => $productdetails]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $products = Product::all();
        return view('quanly.productdetail.create', ['products' => $products]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $productdetail = new ProductDetail;
        $productdetail->fill($request->all());       
        $productdetail->save();
        $this->checkImage($request, $productdetail, $productdetail->id);
        $productdetail->save();
        return redirect()->route('productdetail.index')->with('notify', 'Added Product Detail: '.$request->Name.' Successfully');
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
        $productdetail = ProductDetail::findorfail($id);
        $products = Product::all();
        return view('quanly.productdetail.edit',['productdetail' => $productdetail, 'products' => $products]);
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
        $productdetail = new ProductDetail;
        $productdetail = ProductDetail::findorfail($id);
        $productdetail->fill($request->all());
        $this->checkImage($request, $productdetail, $id);
        $productdetail->save();
        return redirect()->route('productdetail.index')->with('notify', 'Edited Product Detail: '.$request->Name.' Successfully');
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
        $productdetail = ProductDetail::findorfail($id);
        $Name = $productdetail->Name;
        $productdetail->delete();
        return redirect()->route('productdetail.index')->with('notify', 'Deleted Product Detail: '.$Name.' Successfully');
    }

    private function checkImage($request, $productdetail, $id)
    {
        $Image = $request->txtImage;
        $Image2 = $request->txtImage2;
        $Image3 = $request->txtImage3;
        if($request->hasFile('Image'))
        {
            $Image = $id.'.jpg';
                $imagefile = $request->file('Image');
                
                $destinationPath = 'admin_assets/productimages/';

                $smallimg = Image::make($imagefile->getRealPath());
                $smallimg->resize(80, 80, function ($constraint) {
                    $constraint->aspectRatio();
                })->save($destinationPath.'small/'.'small'.$Image);

                $medium = Image::make($imagefile->getRealPath());
                $medium->resize(250, 250)->save($destinationPath.$Image);

                $largeimg = Image::make($imagefile->getRealPath());
                $largeimg->resize(800, 800, function ($constraint) {
                    $constraint->aspectRatio();
                })->save($destinationPath.'large/'.'large'.$Image);
        }
        if($request->hasFile('Image2'))
        {
            $Image2 = $id.'.2.jpg';
                $imagefile = $request->file('Image2');
                
                $destinationPath = 'admin_assets/productimages/';

                $smallimg = Image::make($imagefile->getRealPath());
                $smallimg->resize(80, 80, function ($constraint) {
                    $constraint->aspectRatio();
                })->save($destinationPath.'small/'.'small'.$Image2);

                $largeimg = Image::make($imagefile->getRealPath());
                $largeimg->resize(800, 800, function ($constraint) {
                    $constraint->aspectRatio();
                })->save($destinationPath.'large/'.'large'.$Image2);
        }
        if($request->hasFile('Image3'))
        {
            $Image3 = $id.'.3.jpg';
                $imagefile = $request->file('Image3');
                
                $destinationPath = 'admin_assets/productimages/';

                $smallimg = Image::make($imagefile->getRealPath());
                $smallimg->resize(80, 80, function ($constraint) {
                    $constraint->aspectRatio();
                })->save($destinationPath.'small/'.'small'.$Image3);

                $largeimg = Image::make($imagefile->getRealPath());
                $largeimg->resize(800, 800, function ($constraint) {
                    $constraint->aspectRatio();
                })->save($destinationPath.'large/'.'large'.$Image3);
        }
        $productdetail->Image = $Image;
        $productdetail->Image2 = $Image2;
        $productdetail->Image3 = $Image3;
    }
}
