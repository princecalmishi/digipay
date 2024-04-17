@extends('layouts.admin')
@section('content')
                <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1> User Deposits</h1>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>@include('inc.messages')</h4>
                            <div class="card-header-form">
                                <form>
                                    <div class="input-group">
                                        <input type="text" name="search" class="form-control" placeholder="Search">
                                        <div class="input-group-btn">
                                            <button class="btn btn-primary"><i class="fas fa-search"></i></button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>SI</th>
                                            <th> Fixed Acc No</th>
                                            <th> Acc No</th>
                                            <th>Target Amount</th>
                                            <th>Amount</th>
                                            <th>Period</th>
                                            <th>Maturity Date</th>
                                            <th>Date</th>                                           
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($data as $tickets)
                                            <tr>
                                                <td scope="row"><b>#{{$tickets->id}}</b></td>
                                                <td>{{$tickets->fixed_account_number}}</td>
                                                <td>{{$tickets->account_number}}</td>
                                                <td>{{$tickets->target_amount}}</td>
                                                <td>{{$tickets->amount}}</td>
                                                <td>{{$tickets->period}} Months</td>
                                                <td>{{$tickets->maturity_date}}</td>
                                                <td>{{$tickets->created_at}}</td>
                                               
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                                            </div>
                </div>
            </div>
        </section>
    </div>

    <!-- Start:: Delete Modal-->
    <div class="modal fade" id="delete_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form action="" method="POST">
                <input type="hidden" name="_token" value="xJWRIWbTB3SDB5EcuvpETasTNqlC55wGHqBMwbmT">                <input type="hidden" name="_method" value="DELETE">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Delete </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row col-md-12">
                            <p>Are you sure to delete ?</p>
                        </div>
                    </div>
                    <div class="card-footer text-right">
                        <button class="btn btn-danger" type="submit">Delete</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- End:: Delete Modal-->
            <footer class="main-footer">
  

        <script>
        'use strict'
        $('.delete_confirm').on('click', function() {
            const modal = $('#delete_modal')

            modal.find('form').attr('action', $(this).data('href'))
            modal.modal('show');
        })
    </script>

@endsection