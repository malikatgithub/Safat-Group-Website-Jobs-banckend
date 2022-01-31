<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\JobsApply;

class JobsApplyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cv = $request->cv;
        $cv_new_name = time().$cv->getClientOriginalName();
        $cv->move('uploads/JobCv', $cv_new_name);
   
        $job_apply = JobsApply::create([
            'job_id'=> $request->job_id,
            'name'=> $request->name,
            'phone'=> $request->phone,
            'email'=> $request->email,
            'address'=> $request->address,
            'cv'=> $cv_new_name,
        ]);

        // $jobs =  $jobs = DB::table('jobs')
        // ->orderBy('id', 'desc')
        // ->get();
        // return redirect()->route('jobs.view')->with('success', 'New Career added successfully.')->with('jobs', $jobs);

        return redirect()->route('/');

        
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
    }
}
