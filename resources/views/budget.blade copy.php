@extends('layouts.dashboard')
@section('content')


<main role="main" class="main-content">
        <div class="container-fluid">
          <div class="row justify-content-center">
            <div class="col-12">
               <center> <h5>Budget</h5>  <button type="button" class="btn mb-2 btn-outline-primary" data-toggle="modal" data-target="#varyModal" data-whatever="@mdo">Create New Budget</button>
                </center><hr>
              @if($datacount >= 1)  
                @foreach($data as $data)
                <center>                
                <div class="col-12 col-lg-6">
                    <div class="card shadow mb-4">
                        <div class="card-body">
                        <i class="fe fe-info fe-32 text-primary"></i>
                        <a href="#">
                            <h3 class="h5 mt-4 mb-1">{{$data->name}}</h3>
                        </a>
                        <p class="">Monthly: Kes. {{$data->amount}}</p>
                        </div> <!-- .card-body -->
                    </div> <!-- .card -->
                </div>
              </center>
             @endforeach
             @else
             <center>                 
           <div class="col-12 col-lg-6">
                 <div class="card shadow mb-4">
                     <div class="card-body">
                     <i class="fe fe-info fe-32 text-primary"></i>
                     <a href="#">
                         <h3 class="h5 mt-4 mb-1">Nothing Found Here !</h3>
                     </a>
                     </div> <!-- .card-body -->
                 </div> <!-- .card -->
             </div>
             </center>
             @endif
             
            </div>
      </main> <!-- main -->
    </div> <!-- .wrapper -->

    <div class="col-md-4 mb-4">
                  <div class="card shadow">
                    <div class="card-body">
                        <div class="modal fade" id="varyModal" tabindex="-1" role="dialog" aria-labelledby="varyModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="varyModalLabel">Add New Budget Item</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                              <form action="{{route('addbudget')}}" method="post">@csrf
                                <div class="form-group">
                                  <label for="recipient-name" class="col-form-label">Item Name:</label>
                                  <input type="text" class="form-control" name="name" id="recipient-name" placeholder="Item Name">
                                </div>
                                <div class="form-group">
                                  <label for="message-text" class="col-form-label">Allocated Amount:</label>
                                  <input type="number" class="form-control" name="amount" id="amount" placeholder="Allocated Amount">
                                </div>
                                <hr>
                                <div class="modal-footer">
                              <button type="submit" class="btn mb-2 btn-primary">ADD ITEM</button>
                            </div>
                              </form>
                            </div>
                           
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

@endsection