@extends('layouts.dashboard')
@section('content')

<main role="main" class="main-content">
        <div class="container-fluid">
          <div class="row justify-content-center">
            <div class="col-12 col-lg-10 col-xl-8">
              <h2 class="h3 mb-4 page-title">Profile</h2>
              <div class="my-4">
                <ul class="nav nav-tabs mb-4" id="myTab" role="tablist">
                  <li class="nav-item">
                    <!-- <a class="nav-link" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Profile</a> -->
                  </li>
                  <li class="nav-item">
                    <a class="nav-link active" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Security</a>
                  </li>
                  <li class="nav-item">
                    <!-- <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Notifications</a> -->
                  </li>
                </ul>
                <h5 class="mb-0 mt-5">Security Settings</h5>
                <p>These settings are helps you keep your account secure.</p>
                @include('inc.messages')


                <div class="row">
                <div class="col-md-6 mb-4">
                  <div class="accordion w-100" id="accordion1">
                    <div class="card shadow">
                      <div class="card-header" id="heading1">
                        <a role="button" href="#collapse1" data-toggle="collapse" data-target="#collapse1" aria-expanded="false" aria-controls="collapse1">
                          <strong>Change your password </strong><br><hr><button class="btn btn-primary">Change Password</button>
                        </a>
                      </div>
                      <div id="collapse1" class="collapse" aria-labelledby="heading1" data-parent="#accordion1">
                        <div class="card-body">
                            <form action="{{route('changepass')}}" method="post">@csrf
                            <input type="text"  ​maxlength="12" class="form-control" placeholder="Enter Old Password" name="oldpass"><hr>
                            <input type="text"  ​maxlength="12" class="form-control" placeholder="Enter New Password" name="newpass"><hr>
                            <input type="text"  ​maxlength="12" class="form-control" placeholder="Repeat New Password" name="newpasschck"><hr>
                            <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                            
                        </div>
                      </div>
                    </div>
                    <div class="card shadow">
                      <div class="card-header" id="heading1">
                        <a role="button" href="#collapse2" data-toggle="collapse" data-target="#collapse2" aria-expanded="false" aria-controls="collapse2">
                        <strong>Change your Pin </strong><br><hr><button class="btn btn-success">Change Pin</button>
                        </a>
                      </div>
                      <div id="collapse2" class="collapse" aria-labelledby="heading2" data-parent="#accordion1">
                      <div class="card-body">
                            <form action="{{route('changepin')}}" method="post">@csrf
                            <input type="number" ​maxlength="4" class="form-control" name="oldpin" placeholder="Enter Old Pin"><hr>
                            <input type="number"  ​maxlength="4" class="form-control" name="newpin" placeholder="Enter New Pin"><hr>
                            <input type="number"  ​maxlength="4" class="form-control" name="newpinchck" placeholder="Repeat New Pin"><hr>
                            <button type="submit" class="btn btn-success">Submit</button>
                            </form>
                            
                        </div>                      </div>
                    </div>
                   
                  </div>
                </div>              
               
              </div> <!-- end section -->
               
                
              </div> <!-- /.card-body -->
            </div> <!-- /.col-12 -->
          </div> <!-- .row -->
        </div> <!-- .container-fluid -->

             
                
        
      </main> <!-- main -->
    </div> <!-- .wrapper -->

@endsection