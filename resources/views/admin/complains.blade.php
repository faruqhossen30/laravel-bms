@php
// use Option;
$system = option('complain_system');
@endphp
@extends('layouts.admin.master')
@section('title')
Complain | {{ $bs->site_name }}
@endsection
@section('breadcrumb')
Complain
@endsection
@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Complain</h6>
                <form action="{{ url('tib-admin/complains/system/on-off')}}" method="post">
                    @csrf
                    <input name="complain_system" type="checkbox" @if($system == 'on') checked @endif data-toggle="toggle"  data-onstyle="success" onchange="this.form.submit()">
                </form>
            </div>
            <div class="filter-form p-3">
                <form action="{{ url('tib-admin/complains')}}" method="get">
                    <div class="input-group">
                        <input type="date" class="form-control" name="date" value="{{ request()->get('date') ? request()->get('date') : '' }}" placeholder="Date">
                        <input type="text" class="form-control" name="user" value="{{ request()->get('user') ? request()->get('user') : '' }}" placeholder="User">
                        <select class="form-control" name="status">
                            <option value="All" {{ (request()->get('status')) == 'All' ? 'selected' : '' }}>All</option>
                            <option value="waiting" {{ (request()->get('status')) == 'waiting' ? 'selected' : '' }}>Waiting</option>
                            <option value="solved" {{ (request()->get('status')) == 'solved' ? 'selected' : '' }}>Solved</option>
                        </select>
                        <div class="input-group-append">
                            <button class="btn btn-outline-primary" type="submit">Search</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="table-responsive p-3">
                <table class="table table-sm table-striped table-bordered table-hover">
                    <thead class="thead-dark">
                        <tr>
                            <th style="width: 5%">No</th>
                            <th style="width: 15%">User</th>
                            <th style="width: 15%">Contact Number</th>
                            <th style="width: 45%">Message</th>
                            <th style="width: 5%">Status</th>
                            <th style="width: 5%">Solved</th>
                            <th style="width: 10%">Time</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if($complains->count() > 0)
                        @foreach($complains as $key => $row)
                        <tr>
                            <td>{{ request()->get('page') ? ++$key + ((request()->get('page') - 1) * 100) : ++$key }}</td>
                            <td>
                                @if($row->user)
                                {{ $row->user->username }}
                                @else
                                Not Found!
                                @endif
                            </td>
                            <td>{{ $row->contact_number }}</td>
                            <td>{{ $row->message }}</td>
                            <td>
                                @if($row->status == 'waiting')
                                <span class="badge badge-primary text-capitalize">
                                    Waiting
                                </span>
                                @elseif($row->status == 'solved')
                                <span class="badge badge-success text-capitalize">
                                    Solved
                                </span>
                                @else
                                <span class="badge badge-danger text-capitalize">
                                    N/A
                                </span>
                                @endif
                            </td>
                            <td>
                                @if($row->status== 'waiting')
                                <a href="javascript:void(0)" id="complain-solved" data-id="{{ $row->id }}">
                                    <button type="button" class="btn btn-primary btn-sm">
                                        <i class="fas fa-check"></i>
                                    </button>
                                </a>
                                @else
                                <span class="badge badge-dark">
                                    <i class="fas fa-calendar-check"></i>
                                </span>
                                @endif
                            </td>
                            <td>
                                {{ date('d/m/y', strtotime($row->created_at)) }} <br>
                                {{ date('h:i A', strtotime($row->created_at)) }}
                            </td>
                        </tr>
                        @endforeach
                        @else
                        <tr class="text-center">
                            <td colspan="7">
                                No Data Found!
                            </td>
                        </tr>
                        @endif
                    </tbody>
                </table>
            </div>
            <div id="table-paginator">
                <div class="d-block d-lg-flex justify-content-center">
                    {!! $complains->appends($_GET)->links() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('styles')
<link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/css/bootstrap4-toggle.min.css" rel="stylesheet">
@endpush
@push('scripts')
<script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script>
@endpush
