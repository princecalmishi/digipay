@extends('layouts.admin')
@section('content')


<div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Update plan</h1>
            </div>
            <div class="row">
                <div class="col-md-12 stretch-card">
                    <div class="card">
                        <div class="card-header">
                            <a href="{{route('admin/plans')}}" class="btn btn-primary"><i
                                    class="fa fa-arrow-left mr-2"></i>Back</a>
                        </div>
                        <div class="card-body">
                        @include('inc.messages')

                            <form method="POST" action="{{route('admin/updateplanpost')}}">@csrf
                            <input type="hidden" name="_xstoken" value="KllArkMn46bVG35wy3MAAidVbcUaSZAdkxjQqnrc">                                <div class="form-row">
                                @foreach($plan as $plan)
                                <input type="hidden" name="planid" value="{{$plan->id}}">                                
                                <div class="form-row">

                                    <div class="form-group col-md-3">
                                        <label class="font-weight-bold">Plan name
                                            <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="planname"
                                            value="{{$plan->name}}" placeholder="Plan name" value="" required>
                                    </div>


                                    <div class="form-group col-md-3">
                                        <label class="font-weight-bold">Category type <span
                                                class="text-danger">*</span></label></label>
                                        <select required name="category_type" class="form-control selectric" id="category_type">
                                            <option value="{{$plan->category}}" selected>{{$plan->category}}</option>
                                            
                                        </select>

                                    </div>

                                    <div class="form-group offman col-md-3" id="minimum">
                                        <label class="font-weight-bold">Plan Price<span
                                                class="text-danger">*</span></label></label>
                                        <div class="input-group">
                                            <input type="number" class="form-control" name="planprice"
                                                value="{{$plan->price}}" placeholder="Plan Amount" required>
                                            <div class="input-group-append">
                                                <div class="input-group-text">KSH</div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group offman col-md-3" id="maximum">
                                        <label class="font-weight-bold">Return Percentage</label>
                                        <div class="input-group">
                                            <input type="number" class="form-control" name="return_percentage"
                                                value="{{$plan->return_percentage}}" placeholder="Return Percentage" required>
                                            <div class="input-group-append">
                                                <div class="input-group-text">%</div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group onman col-md-3 amount">
                                        <label class="font-weight-bold"> Payout Amount</label>
                                        <div class="input-group">
                                            <input type="number" class="form-control" name="payout_amount"
                                                value="{{$plan->payout_amount}}" placeholder="Payout Amount" required>
                                            <div class="input-group-append">
                                                <div class="input-group-text">KSH</div>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="form-group col-md-3">
                                        <label class="font-weight-bold">Fee Percentage
                                            <span class="text-danger">*</span></label>
                                        </label>
                                        <div class="input-group">
                                            <input type="number" class="form-control" name="fee_percentage"
                                                placeholder="Interest rate" value="{{$plan->fee_percentage}}" required>
                                            <div class="input-group-append">
                                                <div class="input-group">
                                                    <select name="interest_status" class="form-control selectric">
                                                        <option value="percentage">Percentage</option>
                                                        <!-- <option value="fixed">Fixed</option> -->
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group col-md-3">
                                        <label class="font-weight-bold">Fee Amount
                                            <span class="text-danger">*</span></label>
                                        </label>
                                        <div class="input-group">
                                            <input type="number" class="form-control" name="fee_amount"
                                                placeholder="Interest rate" value="{{$plan->fee_amount}}" required>
                                            <div class="input-group-append">
                                                <div class="input-group">
                                                    <select name="interest_status" class="form-control selectric">
                                                        <option value="percentage">KSH</option>
                                                        <!-- <option value="fixed">Fixed</option> -->
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group onman col-md-3 amount">
                                        <label class="font-weight-bold"> How many Months</label>
                                        <div class="input-group">
                                            <input type="number" class="form-control" name="months"
                                                value="{{$plan->return_months}}" placeholder="Payout Amount" required>
                                            <div class="input-group-append">
                                                <div class="input-group-text">Months</div>
                                            </div>
                                        </div>
                                    </div>

                                    

                                   
                                    <div class="form-group col-md-6">
                                            <label class="font-weight-bold" for="exampleFormControlTextarea1">About Plan</label>
                                            <textarea class="form-control" required id="exampleFormControlTextarea1" rows="3" name="aboutplan">"{{$plan->about}}</textarea>
                                    </div>
                                    <div class="form-group col-md-6">
                                            <label class="font-weight-bold" for="exampleFormControlTextarea1">How it works</label>
                                            <textarea class="form-control" required id="exampleFormControlTextarea1" rows="3" name="howitworks">"{{$plan->how_it_works}}</textarea>
                                    </div>


                                </div>
                                <button type="submit" class="btn btn-primary">Plan Update</button>
                           @endforeach
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>


@endsection