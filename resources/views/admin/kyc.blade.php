@extends('layouts.admin')
@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Kyc settings</h1>
        </div>

        <div class="row">


            <div class="col-md-12">
                <div class="card">

                    <div class="card-header bg-primary">

                        <h6 class="text-white">Kyc form</h6>

                        <button type="button" class="btn btn-success ml-auto payment"> <i class="fa fa-plus text-white"></i>
                            Add kyc requirements</button>

                    </div>

                    <div class="card-body">

                        <form action="" method="post">
                            <input type="hidden" name="_token" value="xJWRIWbTB3SDB5EcuvpETasTNqlC55wGHqBMwbmT">
                            <div class="row payment-instruction">

                                <div class="col-md-12 user-data">
                                    <div class="row">


                                                                                                                        <div class="col-md-12 user-data">
                                            <div class="form-group">
                                                <div class="input-group mb-md-0 mb-4">

                                                    <div class="col-md-3">
                                                        <label>Label name</label>
                                                        <input name="kyc[0][label]" class="form-control form_control" type="text" value="label" required>
                                                    </div>


                                                    <div class="col-md-3">
                                                        <label>Field name</label>
                                                        <input name="kyc[0][field_name]" class="form-control form_control fieldName" type="text" value="asdasd" required>
                                                    </div>
                                                    <div class="col-md-2 mt-md-0 mt-2">
                                                        <label>Field type</label>
                                                        <select name="kyc[0][type]" class="form-control selectric">
                                                            <option value="text" selected>
                                                                Input text
                                                            </option>
                                                            <option value="textarea" >
                                                                Textarea
                                                            </option>
                                                            <option value="file" >
                                                                File upload
                                                            </option>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-2 mt-md-0 mt-2">
                                                        <label>Field validation</label>
                                                        <select name="kyc[0][validation]" class="form-control selectric">
                                                            <option value="required" selected>
                                                                Required
                                                            </option>
                                                            <option value="nullable" >
                                                                Optional
                                                            </option>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-2 text-right my-auto ">

                                                        <button class="btn btn-danger btn-lg remove w-100 mt-4" type="button">
                                                            <i class="fa fa-times"></i>
                                                        </button>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                                                                                                    </div>

                                </div>

                            </div>

                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary">Update kyc</button>
                            </div>
                        </form>


                    </div>

                </div>
            </div>

        </div>
    </section>
</div>


  
    <!-- General JS Scripts -->
    <script src="https://invest.digitalafrica.live/asset/admin/js/jquery.min.js"></script>
    <script src="https://invest.digitalafrica.live/asset/admin/js/proper.min.js"></script>
    <script src="https://invest.digitalafrica.live/asset/admin/js/bootstrap.min.js"></script>
    
    <script src="https://invest.digitalafrica.live/asset/admin/js/feather.min.js"></script>

    <script src="https://invest.digitalafrica.live/asset/admin/js/nicescroll.min.js"></script>
    <script src="https://invest.digitalafrica.live/asset/admin/js/summernote-bs4.min.js"></script>
    <script src="https://invest.digitalafrica.live/asset/admin/js/daterangepicker.js"></script>
    <script src="https://invest.digitalafrica.live/asset/admin/modules/jquery-selectric/jquery.selectric.min.js"></script>
    <script src="https://invest.digitalafrica.live/asset/admin/modules/moment.min.js"></script>
    <script src="https://invest.digitalafrica.live/asset/admin/modules/upload-preview/assets/js/jquery.uploadPreview.min.js"></script>
    <script src="https://invest.digitalafrica.live/asset/admin/modules/bootstrap-daterangepicker/daterangepicker.js"></script>
    <script src="https://invest.digitalafrica.live/asset/admin/modules/bootstrap-timepicker/js/bootstrap-timepicker.min.js"></script>
    <script src="https://invest.digitalafrica.live/asset/admin/modules/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js"></script>
    <script src="https://invest.digitalafrica.live/asset/admin/js/stisla.js"></script>
    <script src="https://invest.digitalafrica.live/asset/admin/js/scripts.js"></script>
    <script src="https://invest.digitalafrica.live/asset/admin/js/izitoast.min.js"></script>
    <script src="https://invest.digitalafrica.live/asset/admin/js/iconpicker.js"></script>

    <script src="https://invest.digitalafrica.live/asset/admin/modules/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js"></script>
        <script src="https://invest.digitalafrica.live/asset/admin/js/sortable.min.js"></script>

    <script>
    $(function() {
        'use strict'

        var i = "1";

        $('.payment').on('click', function() {

            var html = `
                <div class="col-md-12 user-data">
                    <div class="form-group">
                        <div class="input-group mb-md-0 mb-4">

                            <div class="col-md-3">
                                <label>Label name</label>
                                <input name="kyc[${i}][label]" class="form-control form_control" type="text" value="" required >
                            </div>

                            <div class="col-md-3">
                                <label>Field name</label>
                                <input name="kyc[${i}][field_name]" class="form-control form_control fieldName" type="text" value="" required >
                            </div>
                            <div class="col-md-2 mt-md-0 mt-2">
                                <label>Field type</label>
                                <select name="kyc[${i}][type]" class="form-control selectric">
                                    <option value="text" > Input text </option>
                                    <option value="textarea" > Textarea </option>
                                    <option value="file"> File upload </option>
                                </select>
                            </div>
                            <div class="col-md-2 mt-md-0 mt-2">
                                <label>Field validation</label>
                                <select name="kyc[${i}][validation]"
                                        class="form-control selectric">
                                    <option value="required"> Required </option>
                                    <option value="nullable">  Optional </option>
                                </select>
                            </div>
                            <div class="col-md-2 text-right my-auto">
                              
                                    <button class="btn btn-danger btn-lg remove w-100 mt-4" type="button">
                                        <i class="fa fa-times"></i>
                                    </button>
                                
                            </div>
                        </div>
                    </div>
                </div>`;
            $('.payment-instruction').append(html);

            i++;

        })

        $(document).on('keyup', '.fieldName', function() {

            let data = $(this).val();

            $(this).val(data.replace(/[^a-zA-Z0-9 ]/g, ''));
        });

        $(document).on('click', '.remove', function() {
            $(this).closest('.user-data').remove();
        });

    })
</script>





@endsection
