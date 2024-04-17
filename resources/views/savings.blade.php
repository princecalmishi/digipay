@extends('layouts.newui')
@section('content')


<div class="dashboard-body-part">

<div class="mobile-page-header">
    <h5 class="title">Create a savings goal</h5>
    <a href="<?php echo URL::to('/'); ?>/home" class="back-btn"><i class="bi bi-arrow-left"></i> Back</a>
</div>



<style>.table_component {
    overflow: auto;
    width: 100%;
}

.table_component table {
    border: 1px solid #dededf;
    height: 100%;
    width: 100%;
    table-layout: auto;
    border-collapse: collapse;
    border-spacing: 1px;
    text-align: left;
}

.table_component caption {
    caption-side: top;
    text-align: left;
}

.table_component th {
    border: 1px solid #dededf;
    background-color: #ffffff;
    color: #08b553;
    padding: 5px;
}

.table_component td {
    border: 1px solid #dededf;
    background-color: #ffffff;
    color: #000000;
    padding: 5px;
}
</style>
<div class="table_component" role="region" tabindex="0" style="background: #ffffff;">
    <table><br>
    <center><h5 clas="ml-3">Your Goals</h5></center><br>
    <center>@include('inc.messages')</center>
        <thead>
            <tr>
                <th style="width:100px;"></th>
                <th>Name</th>
                <th>Saved</th>
                <th>Target</th>
                <th>Status</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
        @if($datacount >= 1)
            @foreach($data as $data)
            <tr>
                <td><img src="/savings.png" alt="" style="height:70px; width:70px;" class="ml-3"></td>
                <td>{{$data->name}}</td>
                <td>{{$data->total_amount}}</td>
                <td>{{$data->target_amount}}</td>

                <td>@if($data->status == 0)
                  In Progress
                  @elseif($data->status == 1)
                  Complete
                  @endif
                </td>
                @if($data->status == 0)
                <td><a onclick="myFunction()" href="{{route('dissolve', $data->id)}}" class="btn btn-sm btn-success">Widthraw</a></td>
                 @elseif($data->status == 1)
                 <td><a  href="#" class="btn btn-sm btn-primary">Complete</a></td>
                 @endif
                 <script>
                  function myFunction() {
                    confirm("Confirm to Dissolve your savings goal and send balance to your account ?");
                  }
                  </script>
            </tr>
            @endforeach
        @else
            <td>
                No data found
            </td>
            <td>
                No data found
            </td>
        @endif
    </tbody>
</table>
</div>
<br><hr><br><center><strong>Create savings Goals</strong></center><br>
<hr>
<div class="row g-sm-4 g-3 justify-content-center">
          <div class="col-xxl-2 col-lg-3 col-sm-4 col-12">
            <div class="payment-box text-center">
                <div class="payment-box-thumb">
                    <img src="dashboard/assets/avatars/savings.jpeg" alt="Lights" class="trans-img">
                </div>
                <div class="payment-box-content">
                    <h5 class="title">Flexible Plan</h5>
                    <p>Save daily, weekly and monthly towards a goal and get an interest of 10% per year</p>
                    <button data-bs-toggle="modal" data-bs-target="#exampleModal" data-id="32" class="btn main-btn w-100 paynow mt-3">Save now</button>
                          <!-- <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal">open</a> -->

                  </div>
            </div>
          </div>

          <div class="col-xxl-2 col-lg-3 col-sm-4 col-12">
            <div class="payment-box text-center">
                <div class="payment-box-thumb">
                    <img src="dashboard/assets/avatars/savings2.jpeg" alt="Lights" class="trans-img">
                </div>
                <div class="payment-box-content">
                    <h5 class="title">Spend and Save</h5>
                    <p>Save a percentage every time you spend from your account</p>
                    <button data-bs-toggle="modal" data-bs-target="#exampleModal2" data-id="32" class="btn main-btn w-100 paynow mt-3">Save now</button>

                  </div>
            </div>
          </div>

          <div class="col-xxl-2 col-lg-3 col-sm-4 col-12">
            <div class="payment-box text-center">
                <div class="payment-box-thumb">
                    <img src="dashboard/assets/avatars/savings3.jpeg" alt="Lights" class="trans-img">
                </div>
                <div class="payment-box-content">
                    <h5 class="title">Fixed</h5>
                    <p>Save a particular amount at once and earn 25% interest annually</p>
                    <button data-bs-toggle="modal" data-bs-target="#exampleModal3" data-id="32" class="btn main-btn w-100 paynow mt-3">Save now</button>

                  </div>
            </div>
          </div>
       
    
</div>
</div>




<div class="modal fade" tabindex="-1" role="dialog" id="exampleModal">
<div class="modal-dialog" role="document">
<form action="{{route('createsavegoal')}}" method="post">@csrf
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
                        <label for="recipient-name" class="col-form-label">What would you like to call this goal:</label>
                        <input type="text" class="form-control" id="goalname" name="goalname" placeholder="Goal Name">
                    </div>

                    <div class="form-group">
                                  <label for="recipient-name" class="col-form-label">How much would you like to save ? How frequent ? eg Kes. 1,000 weekly:</label>
                                  <input type="number" class="form-control" id="goaltarget" name="goaltarget" placeholder="Target Saving Amount">
                                  <hr>
                                  <input type="number" class="form-control" id="goalamount" name="goalamount" placeholder="Frequent Saving Amount">
                                  <hr>
                                  <select name="period" id="" class="form-control">
                                    <option value="" disabled selected>Choose Option</option>
                                    <option value="Daily">Daily</option>
                                    <option value="Weekly">Weekly</option>
                                    <option value="Monthly">Monthly</option>
                                  </select>
                                </div>
                                <div class="form-group">
                                  <label for="recipient-name" class="col-form-label">Start Date:</label>
                                  <input type="date" class="form-control" id="stdate" name="startdate" placeholder="Select Date">
                                </div>
                                <div class="form-group">
                                  <label for="recipient-name" class="col-form-label">Withdrawal Date:</label>
                                  <input type="date" class="form-control" id="enddate" name="enddate" placeholder="Select Date">
                                </div>


                   
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn sp_btn_danger"
                    data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn main-btn">Deposit now</button>
            </div>
        </div>
    </form>
</div>
</div>


<!-- //modal 2 for fixed savigs -->

<div class="modal fade" tabindex="-1" role="dialog" id="exampleModal3">
<div class="modal-dialog" role="document">
<form action="{{route('createfixedsave')}}" method="post">@csrf
        <div class="modal-content bg-body">
            <div class="modal-header">
                <h5 class="modal-title">Fixed Savings Account</h5>
                <!-- <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="text-light">&times;</span>
                </button> -->
            </div>
            <div class="modal-body">
                <div class="row">
                    <input type="hidden" name="id" value="">
                  
                    <div class="form-group">
                                  <label for="recipient-name" class="col-form-label">Target Amount:</label>
                                  <input type="number" class="form-control" id="goaltarget" min="1000" name="goaltarget" placeholder="Target Saving Amount">
                                                                    
                                </div>

                                <div class="form-group">
                                  <label for="recipient-name" class="col-form-label">Amount to Deposit</label>
                                  <input type="number" class="form-control" id="amount" max="{{$myamt}}" name="amount" placeholder="Your balance KSH {{$myamt}}">
                                </div>
                                <div class="form-group">
                                  <label for="recipient-name" class="col-form-label">Period</label>
                                  <input type="number" class="form-control" min="1" id="period" name="period" placeholder="Number of months">
                                </div>

                                <!-- <div class="form-group">
                                  <label for="recipient-name" class="col-form-label">Start Date:</label>
                                  <input type="date" class="form-control" id="stdate" name="startdate" placeholder="Select Date">
                                </div>
                                <div class="form-group">
                                  <label for="recipient-name" class="col-form-label">Withdrawal Date:</label>
                                  <input type="date" class="form-control" id="enddate" name="enddate" placeholder="Select Date">
                                </div> -->

                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn sp_btn_danger"
                            data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn main-btn">Deposit now</button>
                    </div>
                </div>
            </form>
        </div>
        </div>









</section>
</main>









@endsection