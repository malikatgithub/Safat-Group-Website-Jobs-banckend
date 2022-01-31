@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header content-center"><h5><i class="fa fa-plus-circle"></i> Update job details </h5></div>

                    <div class="card-body">

                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        @if (Session::has('success'))

                        <div class="alert alert-success">
                            {{Session::get('success')}}
                        </div>  

                        {{Session::forget('success')}}
                        @endif


                        
                        <h6> Job details : </h6>
                    
                         <form action="{{ route('job.update',['id'=>$job->id]) }}" method="POST" enctype="multipart/form-data">
                            {{@csrf_field()}}

                            <label for="#" class="font-weight-bold text-danger">- Choose language</label>
                                <br>
                                <div class="form-group form-check">
                                    
                                    <div class="form-check">
                                        @if($job->language == 'ar')
                                            <input class="form-check-input" type="radio" name="language" id="exampleRadios1" value="ar" checked>
                                        @else
                                            <input class="form-check-input" type="radio" name="language" id="exampleRadios1" value="ar">
                                        @endif
                                        <label class="form-check-label" for="exampleRadios1">
                                            Arabic Site
                                        </label>
                                        </div>
                                    <div class="form-check">
                                        @if($job->language == 'en')
                                            <input class="form-check-input" type="radio" name="language" id="exampleRadios2" value="en" checked>
                                        @else
                                            <input class="form-check-input" type="radio" name="language" id="exampleRadios2" value="en">
                                        @endif

                                        <label class="form-check-label" for="exampleRadios2">
                                            English Site
                                        </label>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label for="title" class="font-weight-bold">- Title</label>
                                            <input type="text" class="form-control"  name="title"  placeholder="Enter title" value='{{ $job->title }}' required>
                                            <small id="text" class="form-text text-muted">please write the title and the field related to career</small>
                                        </div>
    
                                        <div class="col-md-6">
                                            <label for="title" class="font-weight-bold">- Closing Date</label>
                                            <input type="date" class="form-control"  name="closing_date"  placeholder="Enter date" value='{{ $job->closing_date }}' required>
                                            <small id="text" class="form-text text-muted">please pick last date for apply</small>
                                        </div>
                                    </div>
                                
                                </div> 



                                <div class="form-group">
                                    <label for="description" class="font-weight-bold">- Short-description</label>
                                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="description" required>{{ $job->description }}</textarea>
                                    <small id="emailHelp" class="form-text text-muted">please write short description</small>

             
                                    
                                </div>

                                <div class="form-group">
                                    <label for="details" class="font-weight-bold">- Job Details</label>
                                    <textarea id="editor" class="form-control" id="exampleFormControlTextarea1" rows="3" name="details" required>{!! $job->details !!}</textarea>
                                    <small id="emailHelp" class="form-text text-muted">please write the content of the career details</small>

                                    
                                
                                    
                                </div>

                                <br>
                                <div class="form-group">
                                   <h5>Image:</h5>
                                    <img src='{{ asset("uploads/careers/$job->image") }}' alt=""  width="250px" height="250px" class="img-thumbnail">
                                    
                                    <input type="file" class="form-control-file mt-3" id="exampleFormControlFile1" name="pic">
                                    
                             
                                </div>
                    
                                <br>
                                <center>
                                    <button type="submit" class="btn btn-success"><i class="fa fa-pencil-square-o"></i> Update data</button>
                                </center>
                    
                        </form>

                      

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection