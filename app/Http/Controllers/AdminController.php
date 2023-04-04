<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\complaint;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $admins = Admin::all();
        return view('cms.admins.index',compact('admins'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $admin = new Admin();
        return view('cms.admins.create', compact('admin'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());

        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' =>'required',
        ]);

        Admin::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' =>Hash::make('password'),
        ]);
        return redirect()->back();

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function show(Admin $admin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function edit($admin)
    {

        $admins = Admin::findorfail($admin);
        return view('cms.admins.edit', compact('admins'));



    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$admin)
    {


        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
        ]);

        $admins=Admin::findorfail($admin);

        $admins->update([
            'name' => $request->name,
            'email' => $request->email,
        ]);
        // dd(11);

        return redirect()->route('admins.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function destroy($admin)
    {
        $adminss = Admin::findOrFail($admin);
        // dd($adminss);
        $adminss->delete();
        return redirect()->back();
}
}
