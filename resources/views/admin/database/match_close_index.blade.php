@extends('layouts.admin.master')
@section('title')
Close Match | {{ $bs->site_name }}
@endsection
@section('breadcrumb')
Close Match
@endsection
@section('content')
<div class="row">
<div class="col-lg-12">
<div class="card mb-4">
<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
<h6 class="m-0 font-weight-bold text-primary">Close Matchs</h6>
</div>
<div class="filter-form p-3">
<form action="{{ url('tib-admin/database/close-matchs')}}" method="get">
<div class="input-group">
<input type="date" class="form-control" name="date" value="{{ request()->get('date') ? request()->get('date') : '' }}" placeholder="Date">
<input type="text" class="form-control" name="team_one" value="{{ request()->get('team_one') ? request()->get('team_one') : '' }}" placeholder="Team One">
<input type="text" class="form-control" name="team_two" value="{{ request()->get('team_two') ? request()->get('team_two') : '' }}" placeholder="Team Two">
<input type="text" class="form-control" name="bet_statement" value="{{ request()->get('bet_statement') ? request()->get('bet_statement') : '' }}" placeholder="Statement">
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
<th>Match</th>
<th style="width: 25%">Action</th>
<th style="width: 10%">Time</th>
</tr>
</thead>
<tbody>
@if($matchs->count() > 0)
@foreach($matchs as $key => $row)
<tr>
<td>{{ request()->get('page') ? ++$key + ((request()->get('page') - 1) * 100) : ++$key }}</td>
<td>{{ $row->team_one . ' vs ' . $row->team_two . ' || ' . $row->bet_statement }}</td>
<td>
<a href="javascript:void(0)" id="match-to-live" data-id="{{ $row->id }}">
<button type="button" class="btn btn-primary btn-sm">
<i class="fas fa-calendar-check"></i> To Live
</button>
</a>
<a href="javascript:void(0)" id="match-to-upcoming" data-id="{{ $row->id }}">
<button type="button" class="btn btn-danger btn-sm">
<i class="fas fa-clock"></i> To Upcoming
</button>
</a>
</td>
<td>
{{ date('d/m/y', strtotime($row->created_at)) }} <br> 
{{ date('h:i A', strtotime($row->created_at)) }}
</td>
</tr>
@endforeach
@else
<tr class="text-center">
<td colspan="4">
No Data Found!
</td>
</tr>
@endif
</tbody>
</table>
</div>
<div id="table-paginator">
<div class="d-block d-lg-flex justify-content-center">
{!! $matchs->appends($_GET)->links() !!}
</div>
</div>
</div>
</div>
</div>
@endsection