@extends('layouts.app')

@section('content')
    <div class="container-fuild">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">All posted jobs</div>

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


                        @if (Session::has('remove'))

                        <div class="alert alert-danger">
                            <i class="fa fa-trash"></i> {{Session::get('remove')}}
                        </div>  

                        {{Session::forget('remove')}}
                        
                    @endif  
                        
                        @if ($jobs->count()>0)

                            <div class="row w-100   ">
                                <div class="col-md-12 ">
                                        <table class="table table-striped border ">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">No</th>
                                                        <th scope="col">Image</th>
                                                        <th scope="col">Title</th>
                                                        <th scope="col">Description</th>
                                                        <th scope="col">Closing_date</th>
                                                        <th scope="col">Operation</th>
                    
                                                    </tr>
                                                </thead>
                                                <tbody class="align-middle">
            
                                                    @foreach ($jobs as $job)
                                                        <tr>  
                                                            <td>#</td> 
                                                            <td><img src='{{ asset("uploads/careers/$job->image") }}' alt=""  width="100px" height="100px"></td>
                                                            <td>{{$job->title}}</td>
                                                            <td style="max-width:150px">{{$job->description}}</td>
                                                            <td>{{$job->closing_date}}</td>
                                                            <td style="max-width:210px">
                                                                <a href="{{route('job.show',['id' => $job->id])}}" class="btn btn-primary"><i class="fa fa-eye"></i>Show</a>
                                                                <a href="{{route('job.edit',['id' => $job->id])}}" class="btn btn-success"><i class="fa fa-edit"></i>Edit</a>
                                                                <a href="{{route('job.delete',['id' => $job->id])}}" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this item?');"><i class="fa fa-trash"></i> Delete</a>
                                                            </td>
                                                            
                                                        </tr>
                                                        @endforeach
                                            
                                                </tbody>
                                        </table>    
                                </div>
                            </div>
                            
                        @else
                            <span class="text-center text-danger"><h4><i class="fa fa-folder-open-o"></i> No posted jobs</h4></span>
                            <center>
                                <br>
                                <p class="card-text"><a href="{{ route('job.create') }}" class="btn btn-primary text-white"><i class="fa fa-plus-square"></i>&nbsp; Add New Job</a> </p>
                            </center>
                        @endif

                     

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection