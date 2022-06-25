@extends('layouts.admin.master') 
@section('title')
Roles | {{ $bs->site_name }}
@endsection
@section('breadcrumb')
Roles
@endsection
@section('content')
<div class="row">
<div class="col-lg-12">
<div class="card mb-4">
<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
<h6 class="m-0 font-weight-bold text-primary">Roles</h6>
</div>
<div class="table-responsive p-3">
<table class="table table-sm table-striped table-bordered table-hover">
<thead class="thead-dark">
<tr>
<th style="width: 5%">No</th>
<th>Name</th>
<th style="width: 15%">Action</th>
<th style="width: 10%">Time</th>
</tr>
</thead>
<tbody>
@if($roles->count() > 0)
@foreach($roles as $key => $row)
<tr>
<td>{{ ++$key }}</td>
<td>{{ $row->name }}</td>
<td>
<a href="{{ url('tib-admin/roles/'.$row->id) }}">
<button type="button" class="btn btn-primary btn-sm">
<i class="fas fa-eye"></i>
</button>
</a>
<a href="{{ url('tib-admin/roles/'.$row->id.'/edit') }}">
<button type="button" class="btn btn-success btn-sm">
<i class="fas fa-pen"></i>
</button>
</a>
<a href="javascript:void(0)" id="role-delete" data-id="{{ $row->id }}">
<button type="button" class="btn btn-danger btn-sm">
<i class="fas fa-trash"></i>
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
</div>
</div>
</div>
@endsection