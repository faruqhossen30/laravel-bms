@extends('layouts.admin.master')
@section('title')
    Bettings | {{ $bs->site_name }}
@endsection
@section('breadcrumb')
    Bettings
@endsection
@section('content')
    <div class="row bg_fff live-bet mb-2">
        <div class="col-lg-12">
            <div class="card p-md-3 p-sm-1">
                <div class="table_list_item">
                    <ul>
                        <li>
                            <a href="javascript:void(0)" id="btn_add">
                                <i class="fa fa-plus" aria-hidden="true"></i> Add Item
                            </a>
                        </li>
                        <li>
                            <a href="javascript:void(0)" id="refresh">
                                <i class="fa fa-retweet" aria-hidden="true"></i> Refresh
                            </a>
                        </li>
                        <li>
                            <a href="javascript:void(0)" id="hidden" data-toggle="modal" data-target="#hiddenMatch">
                                <i class="fa fa-minus-square" aria-hidden="true"></i> Hidden Match
                            </a>
                        </li>
                        <li>
                            <a href="{{ url('tib-admin/all-bets') }}">
                                <i class="fas fa-gamepad"></i> All Bets
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="py-3">
                    <h4 class="sectionTitle">Live Metch</h4>
                </div>
                <div class="loader"></div>
                <div id="auto-load">
                </div>
                <div class="py-3">
                    <h4 class="sectionTitle">Upcoming Metch</h4>
                </div>
                <div class="loader"></div>
                <div id="upcoming-match-load">
                </div>
            </div>
        </div>
    </div>
@endsection
@section('modal')
    @include('admin.bet.matchModal')
    @include('admin.bet.questionModal')
    @include('admin.bet.optionModal')
@endsection
@push('scripts')
    @include('admin.bet.matchJS')
    @include('admin.bet.questionJS')
    @include('admin.bet.optionJS')
@endpush
