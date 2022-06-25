@extends('layouts.admin.master')
@section('title')
Transactions | {{ $bs->site_name }}
@endsection
@section('breadcrumb')
Transactions
@endsection
@section('content')
<div class="row">
<div class="col-lg-12">
<div class="card mb-4">
<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
<h6 class="m-0 font-weight-bold text-primary">Transactions</h6>
</div>
<div class="filter-form p-3">
<form action="{{ url('tib-admin/transactions')}}" method="get">
<div class="input-group">
<input type="date" class="form-control" name="date" value="{{ request()->get('date') ? request()->get('date') : '' }}" placeholder="Date">
<input type="text" class="form-control" name="user" value="{{ request()->get('user') ? request()->get('user') : '' }}" placeholder="User">
<select class="form-control" name="type">
<option value="All" {{ (request()->get('type')) == 'All' ? 'selected' : '' }}>All</option>
<option value="Deposit" {{ (request()->get('type')) == 'Deposit' ? 'selected' : '' }}>Deposit</option>
<option value="Withdraw" {{ (request()->get('type')) == 'Withdraw' ? 'selected' : '' }}>Withdraw</option>
<option value="Refund" {{ (request()->get('type')) == 'Refund' ? 'selected' : '' }}>Refund</option>
<option value="Bet Placed" {{ (request()->get('type')) == 'Bet Placed' ? 'selected' : '' }}>Bet Placed</option>
<option value="Win" {{ (request()->get('type')) == 'Win' ? 'selected' : '' }}>Win</option>
<option value="Received Balance" {{ (request()->get('type')) == 'Received Balance' ? 'selected' : '' }}>Received Balance</option>
<option value="Balance Transfer" {{ (request()->get('type')) == 'Balance Transfer' ? 'selected' : '' }}>Balance Transfer</option>
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
<th style="width: 10%">No</th>
<th style="width: 15%">User</th>
<th style="width: 10%">Credit</th>
<th style="width: 10%">Debit</th>
<th style="width: 30%">Description</th>
<th style="width: 15%">Balance</th>
<th style="width: 10%">Time</th>
</tr>
</thead>
<tbody>
@if($transactions->count() > 0)
@foreach($transactions as $key => $row)
<tr>
<td>{{ request()->get('page') ? ++$key + ((request()->get('page') - 1) * 100) : ++$key }}</td>
<td>
@if($row->user)
{{ $row->user->username }}
@else
Not Found!
@endif
</td>
<td>{{ number_format($row->debit,2) }}</td>
<td>{{ number_format($row->credit,2) }}</td>
<td>{{ $row->description }}</td>
<td>{{ number_format($row->balance,2) }}</td>
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
{!! $transactions->appends($_GET)->links() !!}
</div>
</div>
</div>
</div>
</div>
@endsection