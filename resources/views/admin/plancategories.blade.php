@extends('layouts.admin')
@section('content')
            
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>All Categories</h1>
            </div>
            @include('inc.messages')


            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header justify-content-end">
                            <a href="" class="btn btn-primary" data-toggle="modal" data-target="#time"> 
                                <i class="fa fa-plus"></i>
                                Add Plan Category</a>
                            
                        </div>
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table table-striped" id="table-2">
                                    <thead>
                                        <tr>

                                            <th>Sl.</th>
                                            <th>Name</th>
                                            <th>Action</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($catdata as $catdata)
                                         <tr>
                                                <td>{{$catdata->id}}</td>
                                                <td>{{$catdata->name}}</td>

                                                <td>
                                                    <a href="#" data-collection="{&quot;id&quot;:7,&quot;name&quot;:&quot;year&quot;,&quot;time&quot;:&quot;8760&quot;,&quot;created_at&quot;:&quot;2022-04-16T09:04:08.000000Z&quot;,&quot;updated_at&quot;:&quot;2022-04-16T09:04:08.000000Z&quot;}" 
                                                    data-toggle="modal" data-target="#edittime" class="btn btn-md btn-primary editTime"><i class="fa fa-pen mr-2"></i
                                                            class="fa fa-pen mr-2"></i>Edit</a>
                                                </td>
                                                <td>
                                                    <a href="{{route('trashcategory',$catdata->id)}}" class="btn btn-md btn-danger editTime"><i class="fa fa-bin"></i
                                                            class="fa fa-trash"></i>Delete</a>
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




    <div class="modal fade" id="time" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Add new time</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <form action="{{route('admin/createnewcategorypost')}}"  method="POST" >@csrf
                    <input type="hidden" name="_fstoken" value="xJWRIWbTB3SDB5EcuvpETasTNqlC55wGHqBMwbmT">                
                    <div class="form-group">
                    <label>Category name:</label>
                    <input type="text" class="form-control" value="" name="catname" placeholder="Ex: day, week, month..." required>
                </div>

              
              
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Save</button>
            </form>
              <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>






      <div class="modal fade" id="edittime" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Edit time</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <form action="" method="POST">@csrf
                    <input type="hidden" name="_tcoken" value="xJWRIWbTB3SDB5EcuvpETasTNqlC55wGHqBMwbmT">                    <input type="hidden" name="_method" value="PUT">                   
                <div class="form-group">
                    <label>Category name:</label>
                    <input type="text" class="form-control" value="" id="catname" name="name" placeholder="Ex: day, week, month..." required>
                </div>

                
              
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Save</button>
            </form>
              <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>

      
@endsection