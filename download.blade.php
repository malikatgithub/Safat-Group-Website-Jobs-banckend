@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header alert-secondary"><h5><i class="fa s fa-image"></i> Show all Submited CV's</h5></div>
                    <div class="card-body">
                         <form action="{{ route('job_cv') }}" method="POST" enctype="multipart/form-data">
                            {{@csrf_field()}}
                                <div class="form-group">
                                    <label for="title" class="font-weight-bold">- Select the variance</label>
                                    <select class="form-control" name="job_id">
                                        @foreach ($jobs as $job)
                                            <option value="{{ $job->id }}">{{ $job->title }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-primary"><i class="fa fa-list"></i> Show Files</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection