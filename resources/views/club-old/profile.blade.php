@extends('layouts.frontend.master')

@section('title')
Dashboard | {{ $bs->site_name }}
@endsection

@section('content')

<section id="dashboard">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-xl-12">
                @include('club.sidebar')
            </div>

            <div class="col-md-12 col-xl-12">
                <div class="tab-content">

                <div class="tab-pane fade show active" id="ClubProfile">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title mb-0">Club Profile</h5>
                        </div>
                        <div class="card-body p-2">

                            <div class="row dashboard-statistics">
                                <div class="col-xl-6 col-md-6">
                                    <div class="card text-light bg-secondary rounded-2">
                                        <div class="card-body p-2">
                                            <div class="float-right">
                                                <i class="fas fa-money-check-alt ml-3"></i>
                                            </div>
                                            <h5 class="font-size-20 mt-0 pt-1">{{ $bs->currency_symbol }} {{ number_format(Auth::user()->balance, 2) }}</h5>
                                            <p class="mb-0">Balance</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-6 col-md-6">
                                    <div class="card text-light bg-secondary rounded-2">
                                        <div class="card-body p-2">
                                            <div class="float-right">
                                                <i class="fas fa-users ml-3"></i>
                                            </div>
                                            <h5 class="font-size-20 mt-0 pt-1"> {{ Auth::user()->clubUsers->count() }} </h5>
                                            <p class="mb-0">Total Referral</p>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <!-- end row -->

                            <div class="row">
                                <div class="col-6 pr-0">
                                    <div class="UsrerInfo">
                                        <span> Club Name</span>
                                    </div>
                                </div>
                                <div class="col-6 pl-0">
                                    <div class="UsrerInfoHere">
                                        <span> {{ Auth::user()->name }} </span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6 pr-0">
                                    <div class="UsrerInfo">
                                        <span> Username</span>
                                    </div>
                                </div>
                                <div class="col-6 pl-0">
                                    <div class="UsrerInfoHere">
                                        <span> {{ Auth::user()->username }} </span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6 pr-0">
                                    <div class="UsrerInfo">
                                        <span> Mobile</span>
                                    </div>
                                </div>
                                <div class="col-6 pl-0">
                                    <div class="UsrerInfoHere">
                                        <span> {{ Auth::user()->mobile }} </span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6 pr-0">
                                    <div class="UsrerInfo">
                                        <span> Email Address</span>
                                    </div>
                                </div>
                                <div class="col-6 pl-0">
                                    <div class="UsrerInfoHere">
                                        <span> {{ Auth::user()->email }} </span>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-6 pr-0">
                                    <div class="UsrerInfo">
                                        <span> Club Owner</span>
                                    </div>
                                </div>
                                <div class="col-6 pl-0">
                                    <div class="UsrerInfoHere">
                                        <span> {{ Auth::user()->club_owner }} </span>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    </div>

                @include('club.password')
                @include('club.balanceTransfer')
                @include('club.withdraw')
                @include('club.setting')
                @include('club.password')


                </div>
            </div>
        </div>

    </div>
</section>
@endsection