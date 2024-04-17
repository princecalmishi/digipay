@extends('layouts.admin')
@section('content')


<div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Create plan</h1>
            </div>
            <div class="row">
                <div class="col-md-12 stretch-card">
                    <div class="card">
                        <div class="card-header">
                            <a href="{{route('admin/plans')}}" class="btn btn-primary"><i
                                    class="fa fa-arrow-left mr-2"></i>Back</a>
                        </div>            @include('inc.messages')

                        <div class="card-body">
                            <form method="POST" action="{{route('createnewplanpost')}}">@csrf
                                <input type="hidden" name="_xstoken" value="KllArkMn46bVG35wy3MAAidVbcUaSZAdkxjQqnrc">                                <div class="form-row">

                                    <div class="form-group col-md-3">
                                        <label class="font-weight-bold">Plan name
                                            <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="planname"
                                            value="" placeholder="Plan name" required>
                                    </div>


                                    <div class="form-group col-md-3">
                                        <label class="font-weight-bold">Category type <span
                                                class="text-danger">*</span></label></label>
                                        <select name="category_type" class="form-control selectric" id="category_type" required>
                                            <option disabled selected>Select Category</option>
                                            @foreach($categories as $categories)
                                            <option value="{{$categories->id}}">{{$categories->name}}</option>
                                            @endforeach
                                        </select>

                                    </div>

                                    <div class="form-group offman col-md-3" id="minimum">
                                        <label class="font-weight-bold">Plan Price<span
                                                class="text-danger">*</span></label></label>
                                        <div class="input-group">
                                            <input type="number" class="form-control" name="planprice"
                                                value="" placeholder="Plan Amount" required>
                                            <div class="input-group-append">
                                                <div class="input-group-text">KSH</div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group offman col-md-3" id="maximum">
                                        <label class="font-weight-bold">Return Percentage</label>
                                        <div class="input-group">
                                            <input type="number" class="form-control" name="return_percentage"
                                                value="" placeholder="Return Percentage" required>
                                            <div class="input-group-append">
                                                <div class="input-group-text">%</div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group onman col-md-3 amount">
                                        <label class="font-weight-bold"> Payout Amount</label>
                                        <div class="input-group">
                                            <input type="number" class="form-control" name="payout_amount"
                                                value="" placeholder="Payout Amount" required>
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
                                                placeholder="Interest rate" required>
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
                                                placeholder="Interest rate" required>
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



                                    <div class="form-group return col-md-3 how_many_times">
                                        <label class="font-weight-bold">How many Months</label>
                                        <input type="number" class="form-control" name="months"
                                            vlaue="" placeholder="How many months" required/>
                                    </div>

                                   
                                    <div class="form-group col-md-6">
                                            <label class="font-weight-bold" for="exampleFormControlTextarea1">About Plan</label>
                                            <textarea class="form-control" required id="exampleFormControlTextarea1" rows="3" name="aboutplan"></textarea>
                                    </div>
                                    <div class="form-group col-md-6">
                                            <label class="font-weight-bold" for="exampleFormControlTextarea1">How it works</label>
                                            <textarea class="form-control" required id="exampleFormControlTextarea1" rows="3" name="howitworks"></textarea>
                                    </div>


                                </div>
                                <button type="submit" class="btn btn-primary">Plan create</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>







@endsection