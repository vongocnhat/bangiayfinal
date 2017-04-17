<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $customers = Customer::all();
        return view('quanly.customer.index', ['customers' => $customers]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('quanly.customer.create');
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
                'Email' => 'unique:customers',
                'User' => 'unique:customers',
            ],
            [
                'Email.unique' => 'Email already exists',
                'User.unique' => 'User already exists',
            ]);
        if($request->AccountNumber != '')
        {
            $this->validate($request, 
                [                
                    'AccountNumber' => 'unique:customers'
                ],
                [
                    'AccountNumber.unique' => 'AccountNumber already exists'
                ]);
        }
        $customer = new Customer;
        $customer->fill($request->all());
        $customer->save();
        return redirect()->route('customer.index')->with('notify', 'Added Customer: '.$request->Name.' Successfully');
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
        $customer = Customer::findorfail($id);
        return view('quanly.customer.edit',['customer' => $customer]);
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
                'Email' => 'unique:customers,Email,'.$id,
                'User' => 'unique:customers,User,'.$id                
            ],
            [
                'Email.unique' => 'Email already exists',
                'User.unique' => 'User already exists'
            ]);
        if($request->AccountNumber != '')
        {
            $this->validate($request, 
                [                
                    'AccountNumber' => 'unique:customers,AcountNumber,'.$id
                ],
                [
                    'AccountNumber.unique' => 'AccountNumber already exists'
                ]);
        }
        $customer = Customer::findorfail($id);
        $customer->fill($request->all());
        $customer->save();
        return redirect()->route('customer.index')->with('notify', 'Edited Customer: '.$request->Name.' Successfully');
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
        $customer = Customer::findorfail($id);
        $Name = $customer->Name;
        $customer->delete();
        return redirect()->route('customer.index')->with('notify', 'Deleted Customer: '.$Name.' Successfully');
    }
}
