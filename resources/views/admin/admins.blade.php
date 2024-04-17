@extends('layouts.admin')
@section('content')
                <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Manage admins</h1>
            </div>

            <div class="row">
                <div class="col-12">

                    <div class="card">
                        <div class="card-header justify-content-end">

                            <div class="d-flex flex-wrap">

                                 <input type="hidden" name="model" class="form-control" value="Admin" id="model"> <input type="text" name="search" placeholder="Search Username" class="form-control w-auto mr-3" id="search_text" data-colum="username">
                            </div>


                            <a href="{{route('admin/createadmin')}}" class="btn btn-primary add me-2"> <i
                                    class="fa fa-plus"></i>
                                Create admin</a>


                        </div>
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table table-striped" id="table-2">
                                    <thead>
                                        <tr>

                                            <th>Sl.</th>
                                            <th>Role name</th>
                                            <th>Username</th>
                                            <th>Email</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    @if($admincount >=1)
                                    <tbody id="filter_data">
                                        @foreach($alladmin as $alladmin)
                                            <tr>
                                                <td>{{$alladmin->id}}</td>
                                                <td>
                                                  <span class="badge badge-primary">{{$alladmin->role}}</span>
                                                </td>

                                                <td>{{$alladmin->name}}</td>
                                                <td>{{$alladmin->email}}</td>

                                                <td>
                                                    <a href="{{route('editadmin',$alladmin->id)}}"
                                                        class="btn btn-primary btn-sm"><i class="fa fa-pen"></i></a>
                                                </td>

                                            </tr>
                                        @endforeach
                                                                                  
                                    </tbody>
                                    @else
                                    <tr>
                                                <td data-caption="Data" class="text-center" colspan="100%">
                                                    No data found</td>
                                            </tr>
                                    @endif
                                </table>
                            </div>
                        </div>

                                            </div>
                </div>
            </div>

        </section>
    </div>
 
    @endsection