<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ProductSQ;
use App\ProductDetail;

class ProductSQController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //        
        $productsqs = ProductSQ::all();
        return view('quanly.productsq.index', ['productsqs' => $productsqs]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $productdetails = ProductDetail::all();
        return view('quanly.productsq.create', ['productdetails' => $productdetails]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $productsq = new ProductSQ;
        $productsq->fill($request->all());       
        $productsq->save();
        return redirect()->route('productsq.index')->with('notify', 'Added ProductSQ: '.$request->IdProductDetail.' Successfully');
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
        $productsq = ProductSQ::findorfail($id);
        $productdetails = ProductDetail::all();
        return view('quanly.productsq.edit',['productsq' => $productsq, 'productdetails' => $productdetails]);
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
        $productsq = new ProductSQ;
        $productsq = ProductSQ::findorfail($id);
        $productsq->fill($request->all());
        $productsq->save();
        return redirect()->route('productsq.index')->with('notify', 'Edited ProductSQ: '.$request->IdProductDetail.' Successfully');
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
        $productsq = ProductSQ::findorfail($id);
        $IdProductDetail = $productsq->IdProductDetail;
        $productsq->delete();
        return redirect()->route('productsq.index')->with('notify', 'Deleted ProductSQ: '.$IdProductDetail.' Successfully');
    }
}
