<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Response;
use App\Job;
use DB;
class JobController extends Controller
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
        return view('jobs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $pic = $request->pic;
        $pic_new_name = time().$pic->getClientOriginalName();
        $pic->move('uploads/careers', $pic_new_name);
   
        $job = Job::create([
            'language'=> $request->language,
            'title'=> $request->title,
            'details'=> $request->details,
            'description'=> $request->description,
            'closing_date'=> $request->closing_date,
            'image'=> $pic_new_name,
        ]);

        $jobs =  $jobs = DB::table('jobs')
        ->orderBy('id', 'desc')
        ->get();
        return redirect()->route('jobs.view')->with('success', 'New Career added successfully.')->with('jobs', $jobs);

     
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $job = Job::find($id);
        return view('jobs.show')->with('job', $job);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $job = Job::find($id);
        return view('jobs.edit')->with('job', $job);
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
        $job = Job::find($id);


        if($request->hasFile('pic')){

            $pic = $request->pic;
            $pic_new_name = time().$pic->getClientOriginalName();
            $pic->move('uploads/careers', $pic_new_name);
            $post->image = $pic_new_name;

        }

        $job->title = $request->title;
        $job->language = $request->language;
        $job->details = $request->details;
        $job->description = $request->description;
        $job->closing_date = $request->closing_date;
        $job->save();

        $jobs =  $jobs = DB::table('jobs')
        ->orderBy('id', 'desc')
        ->get();
        return redirect()->route('jobs.view')->with('success', 'Careers data updated successfully.')->with('jobs', $jobs);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $job = Job::find($id);
        $file= $job->image ;
        $job->delete();
        
        $filename = public_path().'/uploads/careers/'.$file;
        \File::delete($filename);

        return back()->with('remove', 'Job Adv removed successfully.');
    }
    


    /*
    Custom made function 
    =================================*/

    public function view()
    {
        $jobs = DB::table('jobs')
        ->orderBy('id', 'desc')
        ->get();
        return view('jobs.view')->with('jobs', $jobs);
    }


    public function download(Request $request)
    {
        $jobs = Job::all();
        return view('jobs.download')->with('jobs', $jobs);
    }

    public function job_cv(Request $request)
    {
        $id = $request->job_id;
        $data = DB::table('jobs_applies')
        ->where('job_id', $id)
        ->get();
        return view('jobs.cv')->with('data', $data);
    }

    public function get_download(Request $request)
    {

        $path = $request->path;
        $name = $request->name;
        //PDF file is stored under project/public/download/info.pdf
        $file= public_path(). "/uploads/JobCv/$path";

        $headers = array(
                'Content-Type: application/pdf',
                );

        return Response::download($file, "$name.pdf", $headers);
    }

}


