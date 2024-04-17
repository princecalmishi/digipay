@extends('layouts.admin')
@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>All users</h1>
            </div>

            <div class="row">

                <div class="col-md-12">

                    <div class="card">

                        <div class="card-header">
                            <div class="d-inline-flex">
                                 <input type="hidden" name="model" class="form-control" value="User" id="model"> <input type="text" name="search" placeholder="Search emails" class="form-control w-auto mr-3" id="search_text" data-colum="email"> <select type="date" name="filter" class="form-control w-auto" id="optionFilter" data-colum="status">
                                <option value=1>Active </option><option value=0>Inactive </option>
                            </select>
                            </div>
                        </div>

                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table" id="example">
                                    <thead>
                                        <tr>

                                            <th>Sl</th>
                                            <th>Full name</th>
                                            <th>Phone</th>
                                            <th>Email</th>
                                            <th>Role</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                            <th></th>

                                        </tr>

                                    </thead>

                                    <tbody id="filter_data">
                                        @foreach($alluserdata as $alluserdata)
                                             <tr>
                                                <td>{{$alluserdata->id}}</td>
                                                <td>{{$alluserdata->name}}</td>

                                                <td>{{$alluserdata->phone}}</td>
                                                <td>{{$alluserdata->email}}</td>
                                                <td>{{$alluserdata->role}}</td>
                                                <td>{{$alluserdata->status}}</td>
                                                <td>

                                                <span class='badge badge-success'>Active</span>
                                                    
                                                </td>

                                                <td>

                                                    <a href="{{route('userdetails',$alluserdata->id)}}" class="btn btn-sm btn-outline-primary"><i class="fa fa-eye"></i>Details</a>

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
