@extends('layouts.newui')
@section('content')
      
<div class="dashboard-body-part">

<div class="mobile-page-header">
    <h5 class="title">Transact PayBill Number</h5>
    <a href="<?php echo URL::to('/'); ?>/home" class="back-btn"><i class="bi bi-arrow-left"></i> Back</a>
</div>

<div class="row justify-content-center">
    <div class="col-lg-6">
        <div class="site-card">
            <div class="card-header d-flex flex-wrap justify-content-between align-items-center">
                <h4 class="mb-0">Transact - PayBill</h4>
                <!-- <p class="mb-0">Current Balance :99,997,000.00 KSH</p> -->
            </div>
            <div class="card-body">@include('inc.messages')
                    <form action="{{route('paybillrequest')}}" method="post">@csrf
                    <div class="card-body">
                      <p class="mb-2"><strong>Please enter the Payment details</strong></p>
                     
                      <div class="form-group mb-3">
                        <label for="example-month">Send From</label>
                        <select name="myaccount" id="" class="form-control">
                          @foreach($accounts as $data)
                        <option class="form-control" name="myaccount" value="{{$data->account_number}}">{{$data->account_number}} - Balance: {{$data->balance}}</option>
                        @endforeach
                        @foreach($fixedacc as $fixedacc)
                        <option class="form-control" name="myaccount" value="{{$fixedacc->fixed_account_number}}">{{$fixedacc->fixed_account_number}} - Balance: {{$fixedacc->amount}}</option>
                        @endforeach

                        </select>
                      </div>

                      <div class="form-group mb-3">
                        <label for="example-date">PayBill Number</label>
                        <input class="form-control" id="example-date" type="number" name="paybill" placeholder="PayBill Number">
                      </div>

                      <div class="form-group mb-3">
                        <label for="example-time">Currency</label>
                        <input class="form-control" id="example-time" type="number" name="amount" placeholder="Enter an Amount">
                      </div>
                      <div class="form-group mb-3">
                        <label for="example-week">Payment Reason</label>
                        <input class="form-control" id="example-week" type="text" name="payreason" placeholder="Payment Reason - Optional">
                      </div>
                    
                     
                    </div> <!-- /.card-body -->
                    <button type="submit" class="btn main-btn w-100">Send Money</button>
                    </form>
                    </div>
        </div>
    </div>
</div>
</div>
</section>
</main>

@endsection