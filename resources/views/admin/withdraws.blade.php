@extends('layouts.admin.master') 
@section('title')
Withdraw | {{ $bs->site_name }}
@endsection
@section('breadcrumb')
Withdraw
@endsection
@section('content')
<div class="row">
<div class="col-lg-12">
<div class="card mb-4">
<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
<h6 class="m-0 font-weight-bold text-primary">Withdraw</h6>
</div>
<div class="filter-form p-3">
<form action="{{ url('tib-admin/withdraws')}}" method="get">
<div class="input-group">
<input type="date" class="form-control" name="date" value="{{ request()->get('date') ? request()->get('date') : '' }}" placeholder="Date">
<input type="text" class="form-control" name="user" value="{{ request()->get('user') ? request()->get('user') : '' }}" placeholder="User">
<select class="form-control" name="method">
<option value="All" {{ (request()->get('method')) == 'All' ? 'selected' : '' }}>All</option>
<option value="bKash" {{ (request()->get('method')) == 'bKash' ? 'selected' : '' }}>bKash</option>
<option value="Rocket" {{ (request()->get('method')) == 'Rocket' ? 'selected' : '' }}>Rocket</option>
<option value="Nagad" {{ (request()->get('method')) == 'Nagad' ? 'selected' : '' }}>Nagad</option>
</select>
<select class="form-control" name="status">
<option value="All" {{ (request()->get('status')) == 'All' ? 'selected' : '' }}>All</option>
<option value="pending" {{ (request()->get('status')) == 'pending' ? 'selected' : '' }}>Pending</option>
<option value="complete" {{ (request()->get('status')) == 'complete' ? 'selected' : '' }}>Complete</option>
<option value="cancel" {{ (request()->get('status')) == 'cancel' ? 'selected' : '' }}>Cancel</option>
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
<th style="width: 10%">Method</th>
<th style="width: 10%">Amount</th>
<th style="width: 15%">Account</th>
<th style="width: 15%">Note</th>
<th style="width: 5%">Status</th>
<th style="width: 15%">Action</th>
<th style="width: 10%">Time</th>
</tr>
</thead>
<tbody>
@if($withdraws->count() > 0)
@foreach($withdraws as $key => $row)
<tr>
<td>{{ request()->get('page') ? ++$key + ((request()->get('page') - 1) * 100) : ++$key }}</td>
<td>
@if($row->user)
{{ $row->user->username }}
@else
Not Found!
@endif
</td>
<td>{{ $row->method }}</td>
<td>{{ number_format($row->amount,2) }}</td>
<td>{{ $row->account }} ({{ $row->type }})</td>
<td>
@if(empty($row->note))
Not Entry!
@else
{{ $row->note }}
@endif
</td>
<td>
@if($row->status == 'pending')
<span class="badge badge-primary text-capitalize">
Pending
</span>
@elseif($row->status == 'complete')
<span class="badge badge-success text-capitalize">
Complete
</span>
@else
<span class="badge badge-danger text-capitalize">
Cancel
</span>
@endif
</td>
<td>
@if($row->status== 'pending')
<a href="javascript:void(0)" id="withdraw-complete" data-id="{{ $row->id }}">
<button type="button" class="btn btn-primary btn-sm">
<i class="fas fa-check"></i>
</button>
</a>
<a href="javascript:void(0)" id="withdraw-cancel" data-id="{{ $row->id }}">
<button type="button" class="btn btn-danger btn-sm">
<i class="fas fa-times"></i>
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
<td colspan="10">
No Data Found!
</td>
</tr>
@endif
</tbody>
</table>
</div>
<div id="table-paginator">
<div class="d-block d-lg-flex justify-content-center">
{!! $withdraws->appends($_GET)->links() !!}
</div>
</div>
</div>
</div>
</div>
@endsection