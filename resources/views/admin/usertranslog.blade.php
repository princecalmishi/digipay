@extends('layouts.admin')
@section('content')


<div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>User Transactions log</h1>
            </div>
            @include('inc.messages')
            <div class="card">
                <div class="card-body p-2">

                    <table class="table" id="myTable">
                        <thead>
                            <tr>
                                <th>Sl</th>
                                <th>Category</th>
                                <th>Amount</th>
                                <th>Reason</th>
                                <th>Ref No</th>
                                <th>Date Created</th>
                                <th>Status</th>
                                <th></th>

                            </tr>
                        </thead>
                        <tbody>
                            @if($intlogscount >=1)
                            @foreach($intlogs as $data)
                                <tr>
                                    <td>{{$data->id}}</td>
                                    <td>{{$data->category}}</td>
                                    
                                    <td>{{$data->amount}} KSH
                                    </td>
                                    <td>{{$data->reason}} </td>
                                    <td>{{$data->ref_number}}</td>
                                    <td>{{$data->date}}</td>
                                    <td>
                                    @if($data->status == 1)
                                    <span class="badge badge-success">Complete</span>
                                    @else
                                    <span class="badge badge-danger">Pending</span>

                                    @endif
                                    </td>
                                    @if($data->status == 0)
                                    <td>
                                        <a class="badge badge-primary" href="{{route('approveusertrans',$data->id)}}">Approve</a>
                                    </td>

                                    @endif

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