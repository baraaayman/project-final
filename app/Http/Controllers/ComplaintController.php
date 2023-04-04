<?php

namespace App\Http\Controllers;

use App\Models\complaint;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ComplaintController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comp = complaint::all();
        return view('cms.complaints.index',compact('comp'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $comp = new complaint();
        return view('cms.complaints.create', compact('comp'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'student_name' => 'required',
            'student_email' => 'required|email',
            'student_university_id' =>'required',
            'title' => 'required',
            'message' => 'required',
            'image' =>'required',
        ]);
        $img_name = rand().time().$request->file('image')->getClientOriginalName();
        $request->file('image')->move(public_path('uploads'), $img_name);

        complaint::create([
            'student_name' => $request->student_name,
            'student_email' => $request->student_email,
            'student_university_id' => $request->student_university_id,
            'title' => $request->title,
            'message' => $request->message,
            'image' => $img_name,

        ]);
        return redirect()->route('complaints.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\complaint  $complaint
     * @return \Illuminate\Http\Response
     */
    public function show(complaint $complaint)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\complaint  $complaint
     * @return \Illuminate\Http\Response
     */
    public function edit($complaint)
    {
        $comp = complaint::findorfail($complaint);
        return view('cms.complaints.edit', compact('comp'));    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\complaint  $complaint
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$complaint)
    {
        $request->validate([
            'student_name' => 'required',
            'student_email' => 'required|email',
            'student_university_id' =>'required',
            'title' => 'required',
            'message' => 'required',
            'image' =>'required',
        ]);

        $comp=complaint::findorfail($complaint);

        $img_name = $comp->image;
        if($request->hasFile('image')) {
            File::delete(public_path('uploads/'.$comp->image));
            $img_name = rand().time().$request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path('uploads'), $img_name);
        }


        $comp->update([
            'student_name' => $request->student_name,
            'student_email' => $request->student_email,
            'student_university_id' => $request->student_university_id,
            'title' => $request->title,
            'message' => $request->message,
            'image' => $img_name,

        ]);
        // dd(11);

        return redirect()->route('complaints.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\complaint  $complaint
     * @return \Illuminate\Http\Response
     */
    public function destroy($complaint)
    {

        $comp = complaint::findorfail($complaint);
        File::delete(public_path('uploads/'.$comp->image));
        $comp->delete();


        return redirect()->back();
}
    }
