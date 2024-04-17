@extends('layouts.admin')
@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>All plans</h1>
            </div>
            @include('inc.messages')

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header justify-content-end">
                            <a href="{{route('admin/createplan')}}" class="btn btn-primary"> <i class="fa fa-plus"></i>
                                Add plan</a>
                        </div>
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table table-striped" id="table-2">
                                    <thead>
                                        <tr>

                                            <th>Sl.</th>
                                            <th>Plan name</th>
                                            <th>Invest Amount</th>
                                            <th>Category</th>
                                            <th>Return Percentage</th>
                                            <th>Payout Amount</th>
                                            <th>Return Period</th>
                                            <th>Fee %</th>
                                            <th>Fee Amount</th>
                                            <th></th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($invplans as $data)
                                            <tr>
                                                <td>{{$data->id}}</td>
                                                <td>{{$data->name}}</td>
                                                <td>{{$data->price}} KSH</td>
                                                <td>{{$data->category}}</td>
                                                <td>{{$data->return_percentage}}</td>
                                                <td>{{$data->payout_amount}}</td>
                                                <td>{{$data->return_months}} Months</td>
                                                <td>{{$data->fee_percentage}}</td>
                                                <td>{{$data->fee_amount}}</td>


                                                <td>
                                                    <a href="{{route('admin/planupdate',$data->id)}}"
                                                        class="btn btn-md btn-primary"><i class="fa fa-pen">
                                                            <!-- </i class="fa fa-pen mr-2"></i>Edit</a> -->
                                                </td>
                                                <td>
                                                    <a href="{{route('trashplan',$data->id)}}"
                                                        class="btn btn-md btn-danger"><i class="fa-solid fa-trash"></i>
                                                </td>
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
@endsection