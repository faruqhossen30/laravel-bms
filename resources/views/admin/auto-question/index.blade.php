@extends('layouts.admin.master')
@section('title')
Auto Questions | {{ $bs->site_name }}
@endsection
@section('breadcrumb')
Auto Questions
@endsection
@section('content')
<div class="row">
<div class="col-lg-12">
<div class="card mb-4">
<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
<h6 class="m-0 font-weight-bold text-primary">Auto Questions</h6>
<div class="ml-auto">
<a href="{{ route('auto-questions.create') }}">
<button class="btn btn-primary"><i class="fas fa-plus"></i> Add New </button>
</a>
</div>
</div>
<div class="filter-form p-3">
<form action="{{ url('tib-admin/auto-questions')}}" method="get">
<div class="input-group">
<input type="text" class="form-control" name="question" value="{{ request()->get('question') ? request()->get('question') : '' }}" placeholder="Question">
<select class="form-control" name="game">
<option value="All" {{ (request()->get('method')) == 'All' ? 'selected' : '' }}>All</option>
<option value="FootBall" {{ (request()->get('game')) == 'FootBall' ? 'selected' : '' }}>FootBall</option>
<option value="Cricket" {{ (request()->get('game')) == 'Cricket' ? 'selected' : '' }}>Cricket</option>
<option value="Basketball" {{ (request()->get('game')) == 'Basketball' ? 'selected' : '' }}>Basketball</option>
<option value="Boxing" {{ (request()->get('game')) == 'Boxing' ? 'selected' : '' }}>Boxing</option>
<option value="Tennis" {{ (request()->get('game')) == 'Tennis' ? 'selected' : '' }}>Tennis</option>
<option value="Horse Racing" {{ (request()->get('game')) == 'Horse Racing' ? 'selected' : '' }}>Horse Racing</option>
<option value="Badminton" {{ (request()->get('game')) == 'Badminton' ? 'selected' : '' }}>Badminton</option>
<option value="Ice Hokey" {{ (request()->get('game')) == 'Ice Hokey' ? 'selected' : '' }}>Ice Hokey</option>
<option value="Hand Ball" {{ (request()->get('game')) == 'Hand Ball' ? 'selected' : '' }}>Hand Ball</option>
<option value="Base Ball" {{ (request()->get('game')) == 'Base Ball' ? 'selected' : '' }}>Base Ball</option>
<option value="Rugby" {{ (request()->get('game')) == 'Rugby' ? 'selected' : '' }}>Rugby</option>
<option value="Snooker" {{ (request()->get('game')) == 'Snooker' ? 'selected' : '' }}>Snooker</option>
<option value="Darts" {{ (request()->get('game')) == 'Darts' ? 'selected' : '' }}>Darts</option>
<option value="Table Tennis" {{ (request()->get('game')) == 'Table Tennis' ? 'selected' : '' }}>Table Tennis</option>
<option value="Beach Volley" {{ (request()->get('game')) == 'Beach Volley' ? 'selected' : '' }}>Beach Volley</option>
<option value="Bandy" {{ (request()->get('game')) == 'Bandy' ? 'selected' : '' }}>Bandy</option>
<option value="Ludo" {{ (request()->get('game')) == 'Ludo' ? 'selected' : '' }}>Ludo</option>
<option value="Lucky Card" {{ (request()->get('game')) == 'Lucky Card' ? 'selected' : '' }}>Lucky Card</option>
<option value="Esports" {{ (request()->get('game')) == 'Esports' ? 'selected' : '' }}>Esports</option>
<option value="Volleyball" {{ (request()->get('game')) == 'Volleyball' ? 'selected' : '' }}>Volleyball</option>
</select>
<select class="form-control" name="status">
<option value="All" {{ (request()->get('status')) == 'All' ? 'selected' : '' }}>All</option>
<option value="active" {{ (request()->get('status')) == 'active' ? 'selected' : '' }}>Active</option>
<option value="deactive" {{ (request()->get('status')) == 'deactive' ? 'selected' : '' }}>Deactive</option>
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
<th style="width: 30%">Question</th>
<th style="width: 15%">Game</th>
<th style="width: 15%">Status</th>
<th style="width: 15%">Action</th>
<th style="width: 15%">Time</th>
</tr>
</thead>
<tbody>
@if($questions->count() > 0)
@foreach($questions as $key => $row)
<tr>
<td>{{ request()->get('page') ? ++$key + ((request()->get('page') - 1) * 100) : ++$key }}</td>
<td>{{ $row->name }}</td>
<td>{{ $row->match_type }}</td>
<td>
@if($row->status == 'active')
<span class="badge badge-primary text-capitalize">
Pending
</span>
@else
<span class="badge badge-danger text-capitalize">
Deactive
</span>
@endif
</td>
<td>
<a href="{{ url('tib-admin/auto-questions/'.$row->id) }}">
<button type="button" class="btn btn-primary btn-sm">
<i class="fas fa-eye"></i>
</button>
</a>
<a href="{{ url('tib-admin/auto-questions/'.$row->id.'/edit/') }}">
<button type="button" class="btn btn-success btn-sm">
<i class="fas fa-pen"></i>
</button>
</a>
<a href="javascript:void(0)" id="question-delete" data-id="{{ $row->id }}">
<button type="button" class="btn btn-danger btn-sm">
<i class="fas fa-times"></i>
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
{!! $questions->appends($_GET)->links() !!}
</div>
</div>
</div>
</div>
</div>
@endsection