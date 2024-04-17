@extends('layouts.newui')
@section('content')
<div class="dashboard-body-part">
    <div class="mobile-page-header">
        <h5 class="title">Investment</h5>
        <a href="<?php echo URL::to('/'); ?>/home" class="back-btn"><i class="bi bi-arrow-left"></i> Back</a>
    </div>
<h5>@include('inc.messages')
</h5>
    <div class="row gy-4 items-wrapper justify-content-center">
      @foreach($data as $data)

              <div class="col-xxl-4 col-xl-6 col-md-6"> 
                <div class="plan-item plan-item-two"> 
                    <h3 class="plan-name mb-3">{{$data->name}}</h3> 
                    <div class="plan-percentage"> 
                        <span class="plan-amount"> 
                        {{$data->payout_amount}} KSH
                         </span>
                        <span class="plan-status">Total Payout</span>
                    </div>
                    <ul class="plan-list my-5">
                              <li>
                                <span class="caption">Amount </span>
                                <span class="details"> {{$data->price}} KSH</span>
                            </li>
                          

                            <li>
                                <span class="caption">For </span>
                                <span class="details"> {{$data->return_months}} Months</span>
                            </li>
                        
                            <li>
                                <span class="caption">Return Percentage </span>
                                <span class="details"> {{$data->return_percentage}} %</span>
                            </li>
                     </ul>
                    <div class="mt-auto">
                      <center> <a href="{{route('buyinvest', $data->id)}}" class="btn main-btn plan-btn w-100" style="color:white">Buy Investment Now</a></center> 
                      </div>
                </div>
            </div>

            @endforeach

            </div>

</div>



        </section>
    </main>

    @endsection