@extends('layouts.admin')
@section('content')
                <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Create admins</h1>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header justify-content-end">
                            <a href="https://invest.digitalafrica.live/admin/admins" class="btn btn-primary"> <i
                                    class="fa fa-arrow-left"></i>
                                Go back</a>
                        </div>
                        <div class="card-body">
                            <form action="https://invest.digitalafrica.live/admin/admins" method="post" enctype="multipart/form-data">
                                <input type="hidden" name="_token" value="xJWRIWbTB3SDB5EcuvpETasTNqlC55wGHqBMwbmT">                                <div class="row">

                                  
                                    <div class="col-md-9"></div>
                                   

                                    <div class="form-group col-md-6">
                                        <label for="">Full name</label>
                                        <input type="text" name="name" class="form-control" required value="">
                                    </div>
    
    
                                    <div class="form-group col-md-6">
                                        <label for="">Username</label>
                                        <input type="text" name="username" class="form-control" required value="">
                                    </div>
    
    
                                    
                                    <div class="form-group col-md-6">
                                        <label for="">Email</label>
                                        <input type="email" name="email" class="form-control" required value="">
                                    </div>
    
    
                                    <div class="form-group col-md-6">
                                        <label for="">Password</label>
                                        <input type="password" name="password" class="form-control" required>
                                    </div>
    
                                    <div class="form-group col-md-6">
                                        <label for="">Password confirmation</label>
                                        <input type="password" name="password_confirmation" class="form-control" required>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="">Roles</label>
                                        <select name="roles[]" class="form-control js-example-tokenizer" multiple>
                                                                                         <option value="Support">Support</option>
                                                                                         <option value="Manager">Manager</option>
                                                                                         <option value="Editor">Editor</option>
                                                                                         <option value="Admin">Admin</option>
                                                                                    </select>
                                        
                                    </div>


                                    <button class="btn btn-primary" type="admin">Create admin</button>

                                </div>

                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection