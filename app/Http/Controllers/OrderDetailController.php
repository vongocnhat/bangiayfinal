<?php

namespace App\Http\Controllers;

use App\OrderDetail;
use Illuminate\Http\Request;

class OrderDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        //        
        $orderdetails = OrderDetail::all();
        return view('quanly.orderdetail.index', ['orderdetails' => $orderdetails]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('quanly.orderdetail.create');
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
        $orderdetail = new OrderDetail;
        $orderdetail->fill($request->all());
        $orderdetail->save();
        return redirect()->route('orderdetail.index')->with('notify', 'Added Order Detail: '.$request->Name.' Successfully');
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
        $products = Product::where('IdOrderDetail', $id)->get();
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
        $orderdetail = OrderDetail::findorfail($id);
        return view('quanly.orderdetail.edit',['orderdetail' => $orderdetail]);
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
        $orderdetail = OrderDetail::findorfail($id);
        $orderdetail->fill($request->all());
        $orderdetail->save();
        return redirect()->route('orderdetail.index')->with('notify', 'Edited Order Detail: '.$request->Name.' Successfully');
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
        $orderdetail = OrderDetail::findorfail($id);
        $Name = $orderdetail->Name;        
        $orderdetail->delete();
        return redirect()->route('orderdetail.index')->with('notify', 'Deleted Order Detail: '.$Name.' Successfully');
    }
}
