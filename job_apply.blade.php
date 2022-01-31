



@extends('layouts.group-nav')

@section('content')

  <!--==========================
    Intro Section
  ============================-->


  <main id="main">


      <!--==========================
          Call To Action Section
        ============================-->
        <section id="job_apply-bg" class="bg-secondary mt-5">
            <div class="overlay">
              <div id="call-to-action">
                  <div class="p-5">
                      <div class="row">
                          <div class="col-lg-12 text-lg-left wow slideInLeft center-content" data-wow-delay="0.5s">
                            <dl>
                                <dt><h3 class="cta-title">SAFAT AVIATION GROUP</h3></dt>
                                <dd>
                                  <h5 class="text-white text-center">- Apply Form Job -</h5>
                                  </p>
                                </dd>
                              </dl>

                          </div>
                        </div>
                      </div>
                    </div>
              </div>
              </section>
              
        <!--call-to-action -->


        

    <!--==========================
      Careers Avialable Sections
    ============================-->
    <section class="m-4">
        <div class="container">
            <h4 class="cta-title mt-5 font-weight-bold text-dark"><i class="fa  fa-newspaper-o"></i> New Avialable Jobs </h4>
            <hr class="border border-danger">  

         
          
                <div class="card">
                  <div class="card-header alert-secondary font-weight-bold">
                      <span class="float-left"> <i class="ion-log-in"></i> {{ $job->title }}</span>
                      <span class="float-right"><i class="fa fa-calendar"></i> Closing-date: <span class=" text-danger"> {{ $job->closing_date }} </span></span>
                  </div>
                  <div class="card-body">
                   <h5><i class="fa fa-list-alt"></i> Please Fill all this field </h5>
                    <form action="{{ route('confirm.apply') }}" method="POST" enctype="multipart/form-data">
                      {{@csrf_field()}}
                        <input type="hidden" name="job_id" value="{{ $job->id }}"/>
                          <div class="form-group">

                            <label for="name" class="font-weight-bold">- Enter full name</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" name="name" aria-describedby="text" placeholder="Enter name" required>
                            <small id="text" class="form-text text-muted">please write your full name</small>
    
                          </div>



                          <div class="form-group">
                             <div class="row">
                                  <div class="col-md-6">
                                      <label for="phone" class="font-weight-bold">- Phone</label>
                                      <input type="text" class="form-control"  name="phone"  placeholder="Enter mobile number" required>
                                      <small id="text" class="form-text text-muted">please write contact mobile number</small>
                                  </div>

                                  <div class="col-md-6">
                                      <label for="email" class="font-weight-bold">- Email</label>
                                      <input type="email" class="form-control"  name="email"  placeholder="Enter date" required>
                                      <small id="emailHelp" class="form-text text-muted">please write your email address</small>
                                  </div>
                              </div>
                              
                          </div>

                          <div class="form-group">
                              <label for="Address" class="font-weight-bold">- Address information</label>
                              <textarea id="editor" class="form-control" id="exampleFormControlTextarea1" rows="3" name="address" required></textarea>
                              <small id="address" class="form-text text-muted">please write full address location</small>

                              
                          </div>

                          <br>
                          <div class="form-group">
                              <label for="pic" class="font-weight-bold">- Upload Cv <span class="text-danger">(PDF only !)</span></label>
                              <input type="file" class="form-control-file" id="exampleFormControlFile1" name="cv" required>
                              

                          </div>
              
                          <br>
                          <button type="submit" class="btn btn-primary">Apply now</button>
                  </form>

                  </div>
             
                </div>
    

        </div>
    </section>




    
  </main>
@endsection

