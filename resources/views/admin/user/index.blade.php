@extends('layouts.admin.master') 
@section('title')
Users | {{ $bs->site_name }}
@endsection
@section('breadcrumb')
Users
@endsection
@section('content')
<div class="row">
<div class="col-lg-12">
<div class="card mb-4">
<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
<h6 class="m-0 font-weight-bold text-primary">Users</h6>
<div class="ml-auto">
<a href="{{ url('tib-admin/users/create') }}"><button class="btn btn-primary" type="button">
<i class="fas fa-plus"></i>Add New</button>
</a>
</div>
</div>
<div class="filter-form p-3">
<form action="{{ url('tib-admin/users')}}" method="get">
<div class="input-group">
<input type="text" class="form-control" name="name" value="{{ request()->get('name') ? request()->get('name') : '' }}" placeholder="Name">
<input type="text" class="form-control" name="username" value="{{ request()->get('username') ? request()->get('username') : '' }}" placeholder="Username">
<input type="text" class="form-control" name="mobile" value="{{ request()->get('mobile') ? request()->get('mobile') : '' }}" placeholder="Mobile">
<select class="form-control" name="status">
<option value="All" {{ (request()->get('status')) == 'All' ? 'selected' : '' }}>All</option>
<option value="active" {{ (request()->get('status')) == 'active' ? 'selected' : '' }}>Active</option>
<option value="deactive" {{ (request()->get('status')) == 'deactive' ? 'selected' : '' }}>Deactive</option>
<option value="suspend" {{ (request()->get('status')) == 'suspend' ? 'selected' : '' }}>Suspend</option>
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
<th>Name</th>
<th>Username</th>
<th>Mobile</th>
<th style="width: 10%">Balance</th>
<th style="width: 5%">Status</th>
<th style="width: 15%">Action</th>
<th style="width: 10%">Time</th>
</tr>
</thead>
<tbody>
@if($users->count() > 0)
@foreach($users as $key => $row)
<tr>
<td>{{ request()->get('page') ? ++$key + ((request()->get('page') - 1) * 100) : ++$key }}</td>
<td>{{ $row->name }}</td>
<td>{{ $row->username }}</td>
<td>{{ $row->mobile }}</td>
<td>{{ number_format($row->balance,2) }}</td>
<td>
@if($row->status == 'active')
<span class="badge badge-primary text-capitalize">
Active
</span>
@elseif($row->status == 'deactive')
<span class="badge badge-warning text-capitalize">
Deactive
</span>
@else
<span class="badge badge-danger text-capitalize">
Suspend
</span>
@endif
</td>
<td>
<a href="{{ route('users.show', $row->id) }}">
<button type="button" class="btn btn-primary btn-sm">
<i class="fas fa-eye"></i>
</button>
</a>
<a href="{{ route('users.edit', $row->id) }}">
<button type="button" class="btn btn-success btn-sm">
<i class="fas fa-pen"></i>
</button>
</a>
<a href="javascript:void(0)" id="user-delete" data-id="{{ $row->id }}">
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
<td colspan="8">
No Data Found!
</td>
</tr>
@endif
</tbody>
</table>
</div>
<div id="table-paginator">
<div class="d-block d-lg-flex justify-content-center">
{!! $users->appends($_GET)->links() !!}
</div>
</div>
</div>
</div>
</div>
@endsection