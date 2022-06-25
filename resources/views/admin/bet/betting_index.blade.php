@extends('layouts.admin.master')
@section('title')
Bettings | {{ $bs->site_name }}
@endsection
@section('breadcrumb')
Bettings
@endsection
@section('content')
<div class="row">
<div class="col-lg-12">
<div class="card mb-4">
<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
<h6 class="m-0 font-weight-bold text-primary">Bettings</h6>
<div class="ml-auto">
<a class="btn btn-warning" data-toggle="collapse" href="#refund" role="button" aria-expanded="false" aria-controls="refund">
Refund
</a>
</div>
</div>
<form action="{{ url('tib-admin/all-bets')}}" method="get">
<div class="filter-form p-3">
<div class="input-group">
<input type="date" class="form-control" name="date" value="{{ request()->get('date') ? request()->get('date') : '' }}" placeholder="Date">
<input type="text" class="form-control" name="user" value="{{ request()->get('user') ? request()->get('user') : '' }}" placeholder="User">
<input type="text" class="form-control" name="question" value="{{ request()->get('question') ? request()->get('question') : '' }}" placeholder="Question">
<input type="text" class="form-control" name="match" value="{{ request()->get('match') ? request()->get('match') : '' }}" placeholder="Match">
<select class="form-control" name="status">
<option value="All" {{ (request()->get('status')) == 'All' ? 'selected' : '' }}>All</option>
<option value="win" {{ (request()->get('status')) == 'win' ? 'selected' : '' }}>Win</option>
<option value="loss" {{ (request()->get('status')) == 'loss' ? 'selected' : '' }}>Loss</option>
<option value="refund" {{ (request()->get('status')) == 'refund' ? 'selected' : '' }}>Refund</option>
<option value="pending" {{ (request()->get('status')) == 'pending' ? 'selected' : '' }}>Pending</option>
</select>
<div class="input-group-append">
<button class="btn btn-outline-primary" type="submit">Search</button>
</div>
</div>
<div class="collapse my-2" id="refund">
<div class="input-group">
<input type="text" name="percentage" class="form-control" placeholder="Refund Percentage">
<div class="input-group-append">
<button class="btn btn-outline-secondary" type="submit">Refund Now</button>
</div>
</div>
</div>
</div>
<div class="table-responsive p-3">
<table class="table table-sm table-striped table-bordered table-hover">
<thead class="thead-dark">
<tr>
<th style="width: 5%">
<div class="checkbox">
<label>
<input type="checkbox" class="check" id="checkAll">
</label>
</div>
</th>
<th style="width: 5%">No</th>
<th>User</th>
<th>Option</th>
<th>Question</th>
<th>Match</th>
<th>Predict Amount</th>
<th>Bet Rate</th>
<th>Return Amount</th>
<th>Status</th>
<th style="width: 10%">Time</th>
</tr>
</thead>
<tbody>
@if($bets->count() > 0)
@foreach($bets as $key => $row)
<tr>
<td>
<div class="checkbox">
<label>
<input type="checkbox" class="check" name="bets[]" value="{{ $row->id }}">
</label>
</div>
</td>
<td>{{ request()->get('page') ? ++$key + ((request()->get('page') - 1) * 100) : ++$key }}</td>
<td>
@if($row->user)
{{ $row->user->username }}
@else
Not Found!
@endif
</td>
<td>
{{ $row->option_name }}
</td>
<td>
{{ $row->question_name }}
</td>
<td>
{{ $row->match_name }}
</td>
<td>
{{ number_format($row->predict_amount, 2) }}
</td>
<td>
{{ $row->bet_rate }}
</td>
<td>
{{ number_format($row->return_amount, 2) }}
</td>
<td>
@if($row->status == 'pending')
<span class="badge badge-primary text-capitalize">
Pending
</span>
@elseif($row->status == 'win')
<span class="badge badge-success text-capitalize">
Win
</span>
@elseif($row->status == 'loss')
<span class="badge badge-warning text-capitalize">
Loss
</span>
@elseif($row->status == 'refund')
<span class="badge badge-dark text-capitalize">
Refund
</span>
@else
<span class="badge badge-danger text-capitalize">
Other
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
<td colspan="11">
No Data Found!
</td>
</tr>
@endif
</tbody>
</table>
</div>
<div id="table-paginator">
<div class="d-block d-lg-flex justify-content-center">
{!! $bets->appends($_GET)->links() !!}
</div>
</div>
</form>
</div>
</div>
</div>
@endsection
