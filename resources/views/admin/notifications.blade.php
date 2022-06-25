@extends('layouts.admin.master')
@section('title')
Notifications | {{ $bs->site_name }}
@endsection
@section('breadcrumb')
Notifications
@endsection
@section('content')
<div class="row">
<div class="col-lg-12">
<div class="card mb-4">
<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
<h6 class="m-0 font-weight-bold text-primary">Notifications</h6>
</div>
<div class="filter-form p-3">
<form action="{{ url('tib-admin/notifications')}}" method="get">
<div class="input-group">
<input type="date" class="form-control" name="date" value="{{ request()->get('date') ? request()->get('date') : '' }}" placeholder="Date">
<input type="text" class="form-control" name="user" value="{{ request()->get('user') ? request()->get('user') : '' }}" placeholder="User">
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
<th style="width: 10%">User</th>
<th style="width: 30%">Title</th>
<th style="width: 45%">Details</th>
<th style="width: 10%">Time</th>
</tr>
</thead>
<tbody>
@if($notifications->count() > 0)
@foreach($notifications as $key => $row)
<tr>
<td>{{ request()->get('page') ? ++$key + ((request()->get('page') - 1) * 100) : ++$key }}</td>
<td>
@if($row->user)
{{ $row->user->username }}
@else
Not Found!
@endif
</td>
<td>{{ $row->title }}</td>
<td>{{ $row->description }}</td>
<td>
{{ date('d/m/y', strtotime($row->created_at)) }} <br> 
{{ date('h:i A', strtotime($row->created_at)) }}
</td>
</tr>
@endforeach
@else
<tr class="text-center">
<td colspan="5">
No Data Found!
</td>
</tr>
@endif
</tbody>
</table>
</div>
<div id="table-paginator">
<div class="d-block d-lg-flex justify-content-center">
{!! $notifications->appends($_GET)->links() !!}
</div>
</div>
</div>
</div>
</div>
@endsection