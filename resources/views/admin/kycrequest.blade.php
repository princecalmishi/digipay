@extends('layouts.admin')
@section('content')
                <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Kyc requests</h1>
            </div>

            <div class="row">

                <div class="col-md-12">

                    <div class="card">

                        <div class="card-header">
                            <div class="d-inline-flex">


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
                                            <th>Country</th>
                                            <th>Status</th>
                                            <th>Action</th>

                                        </tr>

                                    </thead>

                                    <tbody id="filter_data">

                                                                                    <tr>
                                                <td class="text-center" colspan="100%">No data found</td>
                                            </tr>
                                        


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
