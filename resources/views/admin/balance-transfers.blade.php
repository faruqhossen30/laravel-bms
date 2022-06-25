@extends('layouts.admin.master')
@section('title')
Balance Transfer | {{ $bs->site_name }}
@endsection
@section('breadcrumb')
Balance Transfer
@endsection
@section('content')
<div class="row">
<div class="col-lg-12">
<div class="card mb-4">
<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
<h6 class="m-0 font-weight-bold text-primary">Balance Transfer</h6>
</div>
<div class="filter-form p-3">
<form action="{{ url('tib-admin/balance-transfers')}}" method="get">
<div class="input-group">
<input type="date" class="form-control" name="date" value="{{ request()->get('date') ? request()->get('date') : '' }}" placeholder="Date">
<input type="text" class="form-control" name="from_username" value="{{ request()->get('from_username') ? request()->get('from_username') : '' }}" placeholder="From User">
<input type="text" class="form-control" name="to_username" value="{{ request()->get('to_username') ? request()->get('to_username') : '' }}" placeholder="To User">
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
<th style="width: 10%">No</th>
<th style="width: 15%">User</th>
<th style="width: 15%">To User</th>
<th style="width: 15%">Amount</th>
<th style="width: 30%">Note</th>
<th style="width: 15%">Time</th>
</tr>
</thead>
<tbody>
@if($transfers->count() > 0)
@foreach($transfers as $key => $row)
<tr>
<td>{{ request()->get('page') ? ++$key + ((request()->get('page') - 1) * 100) : ++$key }}</td>
<td>
@if($row->user)
{{ $row->user->username }}
@else
Not Found!
@endif
</td>
<td>{{ $row->to_username }}</td>
<td>{{ number_format($row->amount, 2) }}</td>
<td>
@if(!empty($row->note))
{{ $row->note }}
@else
Not Entry!
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
<td colspan="6">
No Data Found!
</td>
</tr>
@endif
</tbody>
</table>
</div>
<div id="table-paginator">
<div class="d-block d-lg-flex justify-content-center">
{!! $transfers->appends($_GET)->links() !!}
</div>
</div>
</div>
</div>
</div>
@endsection