@extends('layouts.newui')
@section('content')


<div class="dashboard-body-part">

<div class="mobile-page-header">
    <h5 class="title">Interest history</h5>
    <a href="<?php echo URL::to('/'); ?>/home" class="back-btn"><i class="bi bi-arrow-left"></i> Back</a>
</div>

<div class="site-card">        
    <div class="card-header d-flex flex-wrap justify-content-between align-items-center">
        <h5 class="mb-sm-0 mb-2">Investment log</h5>
        <form action="" method="get" class="d-inline-flex">
            <input type="text" name="trx" class="form-control form-control-sm me-2" placeholder="transaction id">
            <input type="date" class="form-control form-control-sm me-3" placeholder="Search User" name="date">
            <button type="submit" class="btn main-btn btn-sm">Search</button>
        </form>
    </div>

    <script>
       function getCountDown(elementId, seconds) {
        var times = seconds;

        var x = setInterval(function() {
            var distance = times * 1000;

            if (distance < 0) {
                clearInterval(x);
                firePayment(elementId);
                return
            }
            var days = Math.floor(distance / (1000 * 60 * 60 * 24));
            var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            var seconds = Math.floor((distance % (1000 * 60)) / 1000);
            document.getElementById(elementId).innerHTML = days + "d " + hours + "h " + minutes + "m " +
                seconds + "s ";
            times--;
        }, 1000);
    }

    </script>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table site-table">
                <thead>
                    <tr>
                        <th>Invoice No</th>
                        <!-- <th>User</th> -->
                        <th>Invoice Date</th>
                        <th>Invest Name</th>
                        <th>Status</th>
                        <th>Returns</th>
                        <th>Period</th>
                        <th>Price</th>
                        <th>Maturity Date</th>
                    </tr>
                </thead>

                <tbody>
                @if($datacount >= 1)
                @foreach($data as $data)

                        <tr>
                            <td data-caption="Trx">{{$data->id}}</td>
                            <!-- <td data-caption="User">
                                Kessie Cox</td> -->
                            <td data-caption="Gateway"> {{$data->created_at}}</td>
                            <td data-caption="Amount">{{$data->created_at}} </td>
                          <td data-caption="Currency">
                          {{$data->created_at}}
                          </td>
                            <td data-caption="Charge">
                            {{$data->created_at}}
                            </td>

                            <td data-caption="Payment date">
                            {{$data->created_at}}    
                          </td>
                          <td data-caption="Charge">
                          {{$data->created_at}}
                          </td>
                            <td data-caption="Upcoming payment">
                            {{$data->maturity_date}}
                            </td>
                        </tr>
                        @endforeach
                        @else
                        <td class="text-center no-data-table" colspan="100%">
                                        No transaction found
                                    </td>
                        @endif
                    </tbody>
            </table>

            
        </div>
    </div>
</div>
</div>
</section>
</main>

@endsection