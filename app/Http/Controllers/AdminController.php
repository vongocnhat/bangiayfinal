<?php

namespace App\Http\Controllers;

use App\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use MyApp\Http\Middleware\GlobalConfig;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        //
        $admins = Admin::all();
        return view('quanly.admin.index')->with('admins', $admins);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('quanly.admin.create');
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
                'User' => 'unique:admins',
            ],
            [
                'User.unique' => 'User already exists',
            ]);
        $admin = new Admin;
        $admin->fill($request->except('password'));
        $admin->password = bcrypt($request->password);
        $admin->save();
        return redirect(route('admin.index'))->with('notify', 'Added Admin: '.$admin->User.' Successfully');
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
        $admin = Admin::findorfail($id);
        return view('quanly.admin.edit')->with('admin', $admin);
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
                'User' => 'unique:admins,User,'.$id
            ],
            [
                'User.unique' => 'User already exists',
            ]);
        $admin = Admin::findorfail($id);
        $admin->fill($request->except('password'));
        if($request->password != "")
            $admin->password = bcrypt($request->password);
        $admin->save();
        return redirect(route('admin.index'))->with('notify', 'Edited Admin: '.$admin->User.' Successfully');
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
        $admin = Admin::findorfail($id);
        $User = $admin->User;
        $admin->delete();
        return redirect(route('admin.index'))->with('notify', 'Deleted Admin: '.$User.' Successfully');
    }

    public function getLogin()
    {
        return view('quanly.layoutadmin.loginadmin');
    }

    public function postLogin(Request $request)
    {
        if(Auth::guard('admins')->attempt(['User'=>$request->User, 'password'=>$request->password, 'IsActive' => 1]))
        {
            return redirect(route('product.index'));
        }
        else
        {
            return redirect()->back()->withInput()->with('notify','User Or Password Not Correct Or User Blocking');
        }
    }

    public function logout()
    {
        Auth::guard('admins')->logout();
        return redirect('quanly');
    }
}
