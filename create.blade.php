@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header content-center"><h5><i class="fa fa-plus-circle"></i> Create new Advertising Jobs </h5></div>

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


                        
                        <h6>Write the job details : </h6>
                    
                         <form action="{{ route('job.store') }}" method="POST" enctype="multipart/form-data">
                            {{@csrf_field()}} 
                            
                            <label for="#" class="font-weight-bold text-danger">- Choose language</label>
                                <br>
                                <div class="form-group form-check">
                                    
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="language" id="exampleRadios1" value="ar" checked>
                                        <label class="form-check-label" for="exampleRadios1">
                                            Arabic Site
                                        </label>
                                        </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="language" id="exampleRadios2" value="en">
                                        <label class="form-check-label" for="exampleRadios2">
                                            English Site
                                        </label>
                                    </div>
                           
                                    
                                </div>

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label for="title" class="font-weight-bold">- Title</label>
                                            <input type="text" class="form-control"  name="title"  placeholder="Enter title" required>
                                            <small id="text" class="form-text text-muted">please write the title and the field related to career</small>
                                        </div>
    
                                        <div class="col-md-6">
                                            <label for="title" class="font-weight-bold">- Closing Date</label>
                                            <input type="date" class="form-control"  name="closing_date"  placeholder="Enter date" required>
                                            <small id="text" class="form-text text-muted">please pick last date for apply</small>
                                        </div>
                                    </div>
                                </div>



                                <div class="form-group">
                                    <label for="description" class="font-weight-bold">- Short-description</label>
                                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="description" required></textarea>
                                    <small id="text" class="form-text text-muted">please write short description</small>

             
                                    
                                </div>

                                <div class="form-group">
                                    <label for="details" class="font-weight-bold">- Job Details</label>
                                    <textarea id="editor" class="form-control" id="exampleFormControlTextarea1" rows="3" name="details" required></textarea>
                                    <small id="text" class="form-text text-muted">please write the content of the career details</small>

                                    
                                
                                    
                                </div>

                                <br>
                                <div class="form-group">
                                    <label for="pic">Upload Image</label>
                                    <input type="file" class="form-control-file" id="exampleFormControlFile1" name="pic" required>
                                    
                             
                                </div>
                    
                                <br>
                                <button type="submit" class="btn btn-primary"><i class="fa  fa-bullhorn "></i> Advertise</button>
                        </form>

                      

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection