@extends('layouts.admin')
@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Create admins</h1>
            </div>
            @include('inc.messages')

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header justify-content-end">
                            <a href="{{route('admin/dashboard')}}" class="btn btn-primary"> <i
                                    class="fa fa-arrow-left"></i>
                                Go back</a>
                        </div>
                        @foreach($data as $data)
                        <div class="card-body">
                            <form action="{{route('editadminpost')}}" method="post">
                                @csrf                                   
                                    <div class="col-md-9"></div>
                                    <input type="hidden" name="userid" class="form-control" required value="{{$data->id}}">

                                    <div class="form-group col-md-6">
                                        <label for="">Full name</label>
                                        <input type="text" name="name" class="form-control" required value="{{$data->name}}">
                                    </div>
     
                                    
                                    <div class="form-group col-md-6">
                                        <label for="">Email</label>
                                        <input type="email" name="email" class="form-control" required value="{{$data->email}}">
                                    </div>
    
    
                                    <div class="form-group col-md-6">
                                        <label for="">Password</label>
                                        <input type="password" name="password" class="form-control" >
                                    </div>
    
                                    <div class="form-group col-md-6">
                                        <label for="">Password confirmation</label>
                                        <input type="password" name="password_confirmation" class="form-control" >
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="">Roles</label>
                                        <select name="role" class="form-control js-example-tokenizer">
                                        <option value="{{$data->role}}" selected disabled>{{$data->role}}</option>
                                        <option value="admin" >Admin</option>
                                        <option value="user" >User</option>
                                        </select>
                                        
                                    </div>


                                    <button class="btn btn-primary" type="admin">Update admin</button>

                                </div>

                            </form>
                        </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
