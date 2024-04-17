@extends('layouts.admin')
@section('content')
                <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Pending Widthrawals</h1>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>@include('inc.messages')</h4>
                            <div class="card-header-form">
                                <form>
                                    <div class="input-group">
                                        <input type="text" name="search" class="form-control" placeholder="Search">
                                        <div class="input-group-btn">
                                            <button class="btn btn-primary"><i class="fas fa-search"></i></button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>SI</th>
                                            <th> Ref No</th>
                                            <th> Amount</th>
                                            <th>Category</th>
                                            <th>Sender</th>
                                            <th>Recipient</th>
                                            <th>Status</th>
                                            <th>Created at</th>                                           
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($data as $tickets)
                                            <tr>
                                                <td scope="row"><b>#{{$tickets->id}}</b></td>
                                                <td>{{$tickets->ref_number}}</td>
                                                <td>{{$tickets->amount}}</td>
                                                <td>{{$tickets->category}}</td>
                                                <td>{{$tickets->sender}}</td>
                                                <td>{{$tickets->recipient}}</td>

                                                <td>
                                                @if($tickets->status ==1 )
                                                <span class="badge badge-success"> Completed </span>
                                                @else
                                                <span class="badge badge-danger"> Pending </span>

                                                @endif
                                                </td>
                                                <td>{{$tickets->date}}</td>
                                                @if($tickets->status == 0 )
                                                <td>
                                                <a class="badge badge-success"
                                                        href="{{route('approvewidth',$tickets->id)}}">
                                                        <i class="fas fa-check"></i>
                                                    </a>
                                                    <a class="badge badge-danger ml-2"
                                                        href="{{route('rejectwith',$tickets->id)}}">
                                                        <i class="fas fa-close "></i>
                                                    </a>
                                                    
                                                </td>
                                                @else <td>
                                                <a class="btn btn-md btn-success btn-action"
                                                        href="#">
                                                        <i class="fas fa-eye"></i>
                                                    </a></td>
                                                @endif

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

    <!-- Start:: Delete Modal-->
    <div class="modal fade" id="delete_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form action="" method="POST">
                <input type="hidden" name="_token" value="xJWRIWbTB3SDB5EcuvpETasTNqlC55wGHqBMwbmT">                <input type="hidden" name="_method" value="DELETE">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Delete </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row col-md-12">
                            <p>Are you sure to delete ?</p>
                        </div>
                    </div>
                    <div class="card-footer text-right">
                        <button class="btn btn-danger" type="submit">Delete</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- End:: Delete Modal-->
            <footer class="main-footer">
  

        <script>
        'use strict'
        $('.delete_confirm').on('click', function() {
            const modal = $('#delete_modal')

            modal.find('form').attr('action', $(this).data('href'))
            modal.modal('show');
        })
    </script>

@endsection