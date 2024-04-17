@extends('layouts.newui')
@section('content')


<div class="dashboard-body-part">

<div class="mobile-page-header">
    <a href="<?php echo URL::to('/'); ?>/home" class="back-btn"><i class="bi bi-arrow-left"></i> Back</a>
</div>



<br><br><center><strong>Budget</strong></center><br>
@include('inc.messages')
    <div class="row g-sm-4 g-3 justify-content-center">
          <center>
          <div class="col-xxl-4 col-lg-6 col-sm-4 col-12">
                      <div class="payment-box text-center">
                          <!-- <div class="payment-box-thumb">
                              <img src="dashboard/assets/avatars/savings.jpeg" alt="Lights" class="trans-img">
                          </div> -->
                          <div class="payment-box-content">
                              <h5 class="title">Ksh. {{$dataamount}}</h5>
                              <p>Total Savings Balance</p>
                              <button data-bs-toggle="modal" data-bs-target="#exampleModal" data-id="32" class="btn main-btn w-100 paynow mt-3">Create New Budget</button>
                                    <!-- <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal">open</a> -->

                            </div>
                      </div>
                    </div>
          </center>
          
          <strong>Upcoming Payments</strong><br>
          @if($datacount >= 2)
          @foreach($data as $data)
          <div class="col-xxl-2 col-lg-3 col-sm-4 col-12">
            <div class="payment-box text-center">
                <div class="payment-box-thumb">
                    <img src="dashboard/assets/avatars/savings.jpeg" alt="Lights" class="trans-img">
                </div>
                <div class="payment-box-content">
                    <h5 class="title">{{$data->name}}</h5>
                    <p>Ksh {{$data->amount}}</p>
                    <!-- <button data-bs-toggle="modal" data-bs-target="#exampleModal" data-id="32" class="btn main-btn w-100 paynow mt-3">Save now</button> -->
                          <!-- <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal">open</a> -->

                </div>
            </div>
          </div>
          @endforeach
          @else
          <h4>Nothing found here !</h4>

          @endif

         
</div>
</div>

<div class="modal fade" tabindex="-1" role="dialog" id="exampleModal">
<div class="modal-dialog" role="document">
<form action="{{route('addbudget')}}" method="post">@csrf
        <div class="modal-content bg-body">
            <div class="modal-header">
                <h5 class="modal-title">Flexible Savings Plan</h5>
                <!-- <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="text-light">&times;</span>
                </button> -->
            </div>
            <div class="modal-body">
                <div class="row">
                    <input type="hidden" name="id" value="">
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Item Name:</label>
                        <input type="text" class="form-control" id="goalname" name="name" placeholder="Item Name">
                    </div>

                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Allocated Amount:</label>
                        <input type="number" class="form-control" id="goal" name="amount" placeholder="Allocated amount">
                    </div>
                   
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn sp_btn_danger"
                    data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn main-btn">Create now</button>
            </div>
        </div>
    </form>
</div>
</div>




</section>
</main>









@endsection