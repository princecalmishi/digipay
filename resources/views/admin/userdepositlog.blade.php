@extends('layouts.admin')
@section('content')


<div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>User Deposit log</h1>
            </div>
            <div class="card">
                <div class="card-body p-2">

                    <table class="table" id="myTable">
                        <thead>
                            <tr>
                                <th>Sl</th>
                                <th>Category</th>
                                <th>Status</th>
                                <th>Amount</th>
                                <th>Reason</th>
                                <th>Ref No</th>
                                <th>Date Created</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if($intlogscount >=1)
                            @foreach($intlogs as $data)
                                <tr>
                                    <td>{{$data->id}}</td>
                                    <td>{{$data->category}}</td>
                                    <td>
                                    @if($data->status == 1)
                                    <span class="badge badge-success">Complete</span>
                                    @else
                                    <span class="badge badge-danger">Pending</span>

                                    @endif
                                    </td>
                                    <td>{{$data->amount}} KSH
                                    </td>
                                    <td>{{$data->reason}} </td>
                                    <td>{{$data->ref_number}}</td>
                                    <td>{{$data->date}}</td>
                                </tr>
                             @endforeach
                             @else
                             
                                <tr>

                                    <td class="text-center" colspan="100%">No data found</td>

                                </tr>

                            @endif
                        </tbody>

                    </table>

                </div>

                
            </div>
        </section>
    </div>
    @endsection