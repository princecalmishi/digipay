@extends('layouts.newui')
@section('content')
      
<div class="dashboard-body-part">

<div class="mobile-page-header">
    <h5 class="title">Tranfer money</h5>
    <a href="<?php echo URL::to('/'); ?>/home" class="back-btn"><i class="bi bi-arrow-left"></i> Back</a>
</div>

<div class="row justify-content-center">
    <div class="col-lg-6">
        <div class="site-card">
            <div class="card-header d-flex flex-wrap justify-content-between align-items-center">
                <h4 class="mb-0">Mpesa Deposit</h4>
                <!-- <p class="mb-0">Current Balance :99,997,000.00 KSH</p> -->
            </div>
            <div class="card-body">@include('inc.messages')
            <form action="{{route('mpesadeposit')}}" method="post">@csrf
                    <!-- <input type="hidden" name="_token" value="9ViQcIgE4bNedRgF5EkXhZhuwXtJkAzTBFqH2Kxi">                            <div class="form-group mb-3">
                        <label for="">Receiver email</label>
                        <input type="text" name="email" id="refer-link" class="form-control"
                            placeholder="Transfer account email" required>
                    </div> -->
                    <div class="form-group mb-3">
                        <label for="example-month">Send to</label>
                        <select name="acc2" id="" class="form-control">
                          @foreach($accounts as $accounts)
                        <option class="form-control" name="acc2" value="{{$accounts->account_number}}">{{$accounts->account_number}} - Balance Ksh {{$accounts->balance}}</option>

                        @endforeach

                        @foreach($fixedacc as $fixedacc)
                        <option class="form-control" name="acc2" value="{{$fixedacc->fixed_account_number}}">{{$fixedacc->fixed_account_number}} - Balance Ksh {{$fixedacc->amount}}</option>
                        @endforeach

                        </select>
                      </div>
                      <div class="form-group mb-3">
                        <label for="example-week">Payment Reason</label>
                        <input class="form-control" id="example-week" type="text" name="payreason" placeholder="Payment Reason - Optional">
                      </div>

                    <div class="form-group mb-3">
                        <label for="">Amount</label>
                        <input type="text" name="amount" id="amount" class="form-control"
                            placeholder="Transfer Amount" data-type="percent"
                            data-charge="2" required>

                        <p id="totalAmount" class="sp_text_secondary mt-3"></p>
                    </div>

                    <div class="form-group mb-3">
                        <label for="example-date">Send From</label>
                        <input class="form-control" id="example-date" type="phone" name="myphone" placeholder="Phone Number">
                      </div>

                    <!-- <p class="text-center mb-3">Transfer charge 2 %</p> -->

                    <ul class="list-group mb-4">
                        <li class="list-group-item d-flex flex-wrap align-items-center justify-content-between px-0 border-0 py-0">
                            <span>Min deposit amount</span>
                            <span>100 KSH</span>
                        </li>
                        <hr>
                        <li class="list-group-item d-flex flex-wrap align-items-center justify-content-between px-0 border-0 py-0">
                            <span>Max deposit amount</span>
                            <span>500000 KSH</span>
                        </li>
                    </ul>

                    <button type="submit" class="btn main-btn w-100" id="basic-addon2">Deposit money</button>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
</section>
</main>

@endsection