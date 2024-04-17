@extends('layouts.dashboard')
@section('content')
      

<main role="main" class="main-content">
        <div class="container-fluid">
          <div class="row justify-content-center">
            <div class="col-12">
              <div class="row align-items-center my-4">
                <div class="col">
                  <h2 class="h3 mb-0 page-title">Investment Plans</h2>
                </div>
                <div class="col-auto">
                  <button type="button" class="btn btn-primary"><span class="fe fe-filter fe-12 mr-2"></span>Investment History</button>
                </div>
              </div>
              <div class="row">

              
                <div class="col-md-3">
                  <div class="card shadow mb-4">
                    <div class="card-body text-center">
                      <div class="avatar avatar-lg mt-4">
                        <a href="">
                          <img style="height:150px; width: 200px;" src="./dashboard/assets/avatars/face-4.jpg" alt="..." class="avatar-img">
                        </a>
                      </div>
                      <div class="card-text my-2">
                        <strong class="card-title my-0"></strong>
                        <p class="small"> returns in  months</p>
                        <p class=""><span class="badge badge-light"> At Kes. per unit</span></p>
                      </div>
                    </div> <!-- ./card-text -->
                    <center>
                    <div class="card-footer">
                      <div class="row align-items-center justify-content-between">
                        <div class="col-auto">                          
                            <a href="" class="btn btn-primary" style="color:white">Buy Investment</a><i class="fe fe-info fe-32 text-primary ml-3 mt-5"></i>
                        </div>                       
                      </div>
                    </div> <!-- /.card-footer -->
                  </center>
                  </div>
                </div> <!-- .col -->
               
               
                
                <div class="col-md-9">
                </div> <!-- .col -->
              </div> <!-- .row -->
             
            </div> <!-- .col-12 -->
          </div> <!-- .row -->
        </div> <!-- .container-fluid -->
       
       
      </main> <!-- main -->
    </div> <!-- .wrapper -->
    @endsection