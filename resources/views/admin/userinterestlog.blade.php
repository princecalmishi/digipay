@extends('layouts.admin')
@section('content')


<div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>User interest log</h1>
            </div>
            <div class="card">
                <div class="card-body p-2">

                    <table class="table" id="myTable">
                        <thead>
                            <tr>
                                <th>Sl</th>
                                <th>Plan Name</th>
                                <th>Status</th>
                                <th>Return amount</th>
                                <th>How many time get paid</th>
                                <th>Account</th>
                                <th>Date Created</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if($intlogscount >=1)
                            @foreach($intlogs as $data)
                                <tr>
                                    <td>{{$data->id}}</td>
                                    <td>@php
                                    $comm = DB::table('investment_plans')
                                    ->where('id', $data->investment_plan)                            
                                    ->pluck('name');
                                    foreach($comm as $comm)
                                    echo $comm;
                                    @endphp</td>
                                    <td>
                                    @if($data->status == 1)
                                    <span class="badge badge-success">Complete</span>
                                    @else
                                    <span class="badge badge-danger">Running</span>

                                    @endif
                                    </td>
                                    <td>{{$data->returns}} KSH
                                    </td>
                                    <td>{{$data->no_of_times_paid}} Out of
                                    {{$data->no_of_times_to_pay}} Times
                                    </td>
                                    <td>{{$data->account_number}}</td>
                                    <td>{{$data->created_at}}</td>
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