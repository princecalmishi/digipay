@extends('layouts.newui')
@section('content')


<div class="dashboard-body-part">

<div class="mobile-page-header">
    <h5 class="title">Money Transfer history</h5>
    <a href="<?php echo URL::to('/'); ?>/home" class="back-btn"><i class="bi bi-arrow-left"></i> Back</a>
</div>

<div class="site-card">        
    <div class="card-header d-flex flex-wrap justify-content-between align-items-center">
        <h5 class="mb-sm-0 mb-2">Transfer logs</h5>
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
                        <th>Transfer Date</th>
                        <th>Amount</th>
                        <th>Recipient Account</th>
                        <th>Transfer Reason</th>
                        <th>Status</th>
                        <th></th>
                        
                    </tr>
                </thead>

                <tbody>
                @if($datacount > 1)
                @foreach($data as $data)

                        <tr>
                            <td data-caption="Trx">{{$data->id}}</td>
                            <td data-caption="User">{{$data->created_at}}  </td>
                            <td data-caption="Gateway"> {{$data->amount}}</td>
                            <td data-caption="Amount">{{$data->recipient}} </td>
                          <td data-caption="Currency">
                          {{$data->reason}}
                          </td>
                            <td data-caption="Charge">
                            Complete
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