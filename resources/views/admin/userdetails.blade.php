@extends('layouts.admin')
@section('content')
<style>
        .user-action-list {
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            list-style: none;
            padding: 0;
            margin: -4px;
        }

        .user-action-list li {
            padding: 4px;
        }

        .sp-referral {
            padding: 0;
            margin: 0;
            list-style: none;
        }

        .sp-referral .single-child {
            padding: 6px 10px;
            border-radius: 5px;
        }

        .sp-referral .single-child+.single-child {
            margin-top: 15px;
        }

        .sp-referral .single-child p {
            display: flex;
            align-items: center;
            margin-bottom: 0;
        }

        .sp-referral .single-child p img {
            width: 35px;
            height: 35px;
            border-radius: 50%;
            object-fit: cover;
            -o-object-fit: cover;
            border: 2px solid #e5e5e5;
        }

        .sp-referral .single-child p span {
            width: calc(100% - 35px);
            font-size: 14px;
            padding-left: 10px;
        }

        .sub-child-list {
            position: relative;
            padding-left: 35px;
            list-style: none;
            margin-bottom: 0
        }

        .sub-child-list::before {
            position: absolute;
            content: '';
            top: 0;
            left: 17px;
            width: 1px;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.2);
        }

        .sp-referral>.single-child.root-child>p img {
            border: 2px solid #5463ff;
        }

        .sub-child-list>.single-child {
            position: relative;
        }

        .sub-child-list>.single-child::before {
            position: absolute;
            content: '';
            left: -18px;
            top: 21px;
            width: 30px;
            height: 5px;
            border-left: 1px solid rgba(0, 0, 0, 0.2);
            border-bottom: 1px solid rgba(0, 0, 0, 0.2);
            border-radius: 0 0 0 5px;
        }

        .sub-child-list.step-2>.single-child>p img {
            border: 2px solid #0aa27c;
        }

        .sub-child-list.step-3>.single-child>p img {
            border: 2px solid #a20a0a;
        }

        .sub-child-list.step-4>.single-child>p img {
            border: 2px solid #f562e6;
        }

        .sub-child-list.step-5>.single-child>p img {
            border: 2px solid #a20a0a;
        }
    </style>

<div class="main-content">
        <!-- <div class="text-right mb-4">
            <a href="#" class="btn btn-sm btn-outline-primary sendMail">
                <i class="fas fa-envelope mr-1"></i>
                Send Email
            </a>
        </div> -->

        <div class="row gy-4">
            <div class="col-xl-3">
                <div class="sp_user_sidebar h-100">
                    <!-- <div class="sp_user_img">
                        <img src="https://invest.digitalafrica.live/asset/theme3/images/placeholder.png" alt="image">
                    </div> -->
                    <div class="text-center mt-4">
                        <h5 class="mb-0">{{$userinfoname}}</h5>
                        <p>{{$userinfoemail}}</p>
                    </div>

                    <ul class="user-action-list">
                        <li>
                            <a href="{{route('loginas',$userinfoid)}}" target="_blank"
                                class="btn btn-sm btn-outline-primary"><i class="fas fa-link mr-1"></i>
                                Login As User</a>
                        </li>

                        <!-- <li>
                            <a href="https://invest.digitalafrica.live/admin/commision/1" class="btn btn-sm btn-outline-primary"><i
                                    class="fas fa-link mr-1"></i> Commission Log</a>
                        </li> -->

                        <li>
                            <a href="{{route('userinterestlog',$userinfoid)}}" class="btn btn-sm btn-outline-primary"><i
                                    class="fas fa-link mr-1"></i> Interest Log</a>
                        </li>

                        <li>
                            <a href="{{route('userdepositlog',$userinfoid)}}" class="btn btn-sm btn-outline-primary"><i
                                    class="fas fa-link mr-1"></i> Deposit Log</a>
                        </li>

                        <!-- <li>
                            <a href="https://invest.digitalafrica.live/admin/payment-report/1" class="btn btn-sm btn-outline-primary"><i
                                    class="fas fa-link mr-1"></i> Investment Log</a>
                        </li> -->

                        <li>
                            <a href="{{route('userwithrawlog',$userinfoid)}}" class="btn btn-sm btn-outline-primary"><i
                                    class="fas fa-link mr-1"></i> Withdraw Log</a>
                        </li>

                        <!-- <li>
                            <a href="https://invest.digitalafrica.live/admin/ticket?user=1"
                                class="btn btn-sm btn-outline-primary"><i class="fas fa-link mr-1"></i>
                                User Ticket</a>
                        </li> -->

                        <li>
                            <a href="{{route('usertranslog',$userinfoid)}}" class="btn btn-sm btn-outline-primary"><i
                                    class="fas fa-link mr-1"></i> User Transactions</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-xl-9 mt-xl-0 mt-4">
                <div class="sp_user_details">
                    <ul class="nav nav-tabs sp_nav_tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="overview-tab" data-toggle="tab" data-target="#overview"
                                type="button" role="tab" aria-controls="overview"
                                aria-selected="true">Overview</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="settings-tab" data-toggle="tab" data-target="#settings"
                                type="button" role="tab" aria-controls="settings"
                                aria-selected="false">Settings</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="balance-tab" data-toggle="tab" data-target="#balance"
                                type="button" role="tab" aria-controls="balance" aria-selected="false">Balance</button>
                        </li>
                        <!-- <li class="nav-item" role="presentation">
                            <button class="nav-link" id="referral-tab" data-toggle="tab" data-target="#referral"
                                type="button" role="tab" aria-controls="referral"
                                aria-selected="false">Referral</button>
                        </li> -->
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="overview" role="tabpanel"
                            aria-labelledby="overview-tab">
                            <div class="row mt-4">
                                <div class="custom-xxxl-3 custom-xxl-4 col-md-6 col-sm-6 col-12 mb-4">
                                    <div class="card card-statistic-1 style-three mb-0 p-0">
                                        <div class="card-icon bg-1">
                                            <i class="fas fa-wallet"></i>
                                        </div>
                                        <div class="card-wrap">
                                            <div class="card-header">
                                                <h4>Savings balance</h4>
                                            </div>
                                            <div class="card-body">
                                                {{$useraccountbal}} KSH
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="custom-xxxl-3 custom-xxl-4 col-md-6 col-sm-6 col-12 mb-4">
                                    <div class="card card-statistic-1 style-three mb-0 p-0">
                                        <div class="card-icon bg-2">
                                            <i class="fas fa-link"></i>
                                        </div>
                                        <div class="card-wrap">
                                            <div class="card-header">
                                                <h4>Total Fixed Savings</h4>
                                            </div>
                                            <div class="card-body">
                                               {{$fixedsaves}} KSH
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="custom-xxxl-3 custom-xxl-4 col-md-6 col-sm-6 col-12 mb-4">
                                    <div class="card card-statistic-1 style-three mb-0 p-0">
                                        <div class="card-icon bg-3">
                                            <i class="fas fa-undo-alt"></i>
                                        </div>
                                        <div class="card-wrap">
                                            <div class="card-header">
                                                <h4>Total return interest</h4>
                                            </div>
                                            <div class="card-body">
                                                {{$allinterest}} KSH
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="custom-xxxl-3 custom-xxl-4 col-md-6 col-sm-6 col-12 mb-4">
                                    <div class="card card-statistic-1 style-three mb-0 p-0">
                                        <div class="card-icon bg-4">
                                            <i class="fas fa-funnel-dollar"></i>
                                        </div>
                                        <div class="card-wrap">
                                            <div class="card-header">
                                                <h4>Total Referral</h4>
                                            </div>
                                            <div class="card-body">
                                                {{$userrefslistcount}}
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="custom-xxxl-3 custom-xxl-4 col-md-6 col-sm-6 col-12 mb-4">
                                    <div class="card card-statistic-1 style-three mb-0 p-0">
                                        <div class="card-icon bg-5">
                                            <i class="fas fa-hand-holding-usd"></i>
                                        </div>
                                        <div class="card-wrap">
                                            <div class="card-header">
                                                <h4>Total withdraw</h4>
                                            </div>
                                            <div class="card-body">
                                                {{$totalwith}} KSH
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="custom-xxxl-3 custom-xxl-4 col-md-6 col-sm-6 col-12 mb-4">
                                    <div class="card card-statistic-1 style-three mb-0 p-0">
                                        <div class="card-icon bg-6">
                                            <i class="far fa-credit-card"></i>
                                        </div>
                                        <div class="card-wrap">
                                            <div class="card-header">
                                                <h4>Total deposit</h4>
                                            </div>
                                            <div class="card-body">
                                               {{$totaldepo}} KSH
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="custom-xxxl-3 custom-xxl-4 col-md-6 col-sm-6 col-12 mb-4">
                                    <div class="card card-statistic-1 style-three mb-0 p-0">
                                        <div class="card-icon bg-7">
                                            <i class="fas fa-coins"></i>
                                        </div>
                                        <div class="card-wrap">
                                            <div class="card-header">
                                                <h4>Total invest amount</h4>
                                            </div>
                                            <div class="card-body">
                                                {{$totaluserinvestments}} KSH
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="custom-xxxl-3 custom-xxl-4 col-md-6 col-sm-6 col-12 mb-4">
                                    <div class="card card-statistic-1 style-three mb-0 p-0">
                                        <div class="card-icon bg-8">
                                            <i class="fas fa-ticket-alt"></i>
                                        </div>
                                        <div class="card-wrap">
                                            <div class="card-header">
                                                <h4>Total ticket</h4>
                                            </div>
                                            <div class="card-body">
                                                0
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                           
                        </div>
                        @include('inc.messages')


                        <div class="tab-pane fade pt-3" id="settings" role="tabpanel" aria-labelledby="settings-tab">
                            <form action="{{route('admin/updateuserycdata')}}" method="post">@csrf
                                <input type="hidden" value="{{$userinfoid}}" name="userkey">
                                <input type="hidden" name="_tboken" value="83Wq01biAzHHjAIvfYL7XTMQKQX7kahSoLh9Smjt">                                <div class="row">
                                    <div class="col-md-12 mb-3">
                                        <label>Full name</label>
                                        <input type="text" name="name" class="form-control"
                                            value="{{$userinfoname}}">
                                    </div>
                                    <!-- <div class="col-md-6 mb-3">

                                        <label>Last name</label>
                                        <input type="text" name="lname" class="form-control"
                                            value="Calm Ishi">
                                    </div> -->

                                    <div class="form-group col-md-6 mb-3 ">
                                        <label>Phone</label>
                                        <input type="text" name="phone" class="form-control"
                                            value="{{$userinfophone}}">
                                    </div>
                                    <div class="form-group col-md-6 mb-3 ">
                                        <label>Email</label>
                                        <input type="text" name="email" class="form-control"
                                            value="{{$userinfoemail}}">
                                    </div>

                                    <div class="col-md-4 mb-3">

                                        <label>User ID Number</label>
                                        <input type="text" name="userid" class="form-control form_control"
                                            value="{{$userinfonationalid}}">
                                    </div>

                                    <div class="col-md-4 mb-3">

                                        <label>Role</label>
                                        <input type="text" name="role" class="form-control form_control"
                                            value="{{$userinforole}}">
                                    </div>

                                    <div class="col-md-4 mb-3">
                                        <label>Status</label>
                                        <input type="text" name="status" class="form-control form_control"
                                            value="{{$userinfostatus}}">
                                    </div>

                                    <!-- <div class="col-md-12 mb-4">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <p for="">Email verified</p>
                                                <div class="custom-control custom-switch">
                                                    <input type="checkbox" name="email_status"
                                                         class="custom-control-input"
                                                        id="customSwitch1">
                                                    <label class="custom-control-label"
                                                        for="customSwitch1">Active/Deactive</label>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <p for="">Sms verified</p>
                                                <div class="custom-control custom-switch">
                                                    <input type="checkbox" name="sms_status"
                                                         class="custom-control-input"
                                                        id="customSwitch2">
                                                    <label class="custom-control-label"
                                                        for="customSwitch2">Active/Deactive</label>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <p for="">Kyc verified</p>
                                                <div class="custom-control custom-switch">
                                                    <input type="checkbox" name="kyc_status"
                                                         name="email_status"
                                                        class="custom-control-input" id="customSwitch3">
                                                    <label class="custom-control-label"
                                                        for="customSwitch3">Active/Deactive</label>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <p for="">Status</p>
                                                <div class="custom-control custom-switch">
                                                    <input type="checkbox" name="status"
                                                        checked name="email_status"
                                                        class="custom-control-input" id="customSwitch4">
                                                    <label class="custom-control-label"
                                                        for="customSwitch4">Active/Deactive</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div> -->
                                    <div class="col-md-12">
                                        <button type="submit" class="btn btn-primary w-100">Update User</button>
                                    </div>
                                </div>
                            </form>
                        </div>

                        <div class="tab-pane fade pt-4" id="balance" role="tabpanel" aria-labelledby="balance-tab">
                            <form action="{{route('admin/useraddbal')}}" method="post">@csrf
                                <input type="hidden" name="_tddoken" value="83Wqf01biAzHHjAIvfYL7XTMQKQX7kahSoLh9Smjt">                                <div class="input-group mb-3">
                                    <input type="hidden" class="form-control" name="user_id"
                                        value="{{$userinfoid}}">
                                    <input type="hidden" class="form-control" name="type" value="add">
                                    <input type="number" class="form-control" name="balance" min="1"
                                        placeholder="add Balance">
                                    <button class="btn btn-outline-success px-4" type="submit" id="button-addon2"> <i
                                            class="fa fa-plus"></i> Add balance</button>
                                </div>
                            </form>
                            <form action="{{route('admin/usersubbal')}}" method="post">@csrf
                                <input type="hidden" name="_tobbvken" value="83Wq01biAzHHjAIvfYL7XTMQKQX7kahSoLh9Smjt">                                <div class="input-group mb-3">
                                    <input type="hidden" class="form-control" name="user_id"
                                        value="{{$userinfoid}}">
                                    <input type="hidden" class="form-control" name="type" value="minus">
                                    <input type="number" class="form-control" name="balance" min="1"
                                        placeholder="Subtract Balance">
                                    <button class="btn btn-outline-danger px-2" type="submit" id="button-addon2"> <i
                                            class="fa fa-minus mr-1"></i> Subtruct balance</button>
                                </div>
                            </form>
                        </div>
                        <div class="tab-pane fade pt-3" id="referral" role="tabpanel" aria-labelledby="referral-tab">
                            
                                                            <div class="col-md-12 text-center mt-5">
                                    <i class="far fa-sad-tear display-1"></i>
                                    <p class="mt-2">
                                        No reference user found
                                    </p>

                                </div>
                                                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" tabindex="-1" role="dialog" id="mail">
        <div class="modal-dialog modal-lg" role="document">
            <form action="https://invest.digitalafrica.live/admin/users/mail/1" method="post">
                <input type="hidden" name="_token" value="83Wq01biAzHHjAIvfYL7XTMQKQX7kahSoLh9Smjt">                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Send mail to user</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">

                            <label for="">Subject</label>

                            <input type="text" name="subject" class="form-control">

                        </div>

                        <div class="form-group">

                            <label for="">Message</label>

                            <textarea name="message" id="" cols="30" rows="10" class="form-control summernote"></textarea>

                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Send mail</button>
                        <button type="button" class="btn btn-secondary"
                            data-dismiss="modal">Close</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    @endsection