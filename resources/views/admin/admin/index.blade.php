@extends('layouts.admin.master') 
@section('title')
Admins | {{ $bs->site_name }}
@endsection
@section('breadcrumb')
Admins
@endsection
@section('content')
<div class="row">
<div class="col-lg-12">
<div class="card mb-4">
<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
<h6 class="m-0 font-weight-bold text-primary">Admins</h6>
<div class="ml-auto">
<a href="{{ url('tib-admin/admins/create') }}"><button class="btn btn-primary" type="button">
<i class="fas fa-plus"></i>Add New</button>
</a>
</div>
</div>
<div class="table-responsive p-3">
<table class="table table-sm table-striped table-bordered table-hover">
<thead class="thead-dark">
<tr>
<th style="width: 5%">No</th>
<th style="width: 15%">Name</th>
<th style="width: 10%">User</th>
<th style="width: 15%">Mobile</th>
<th style="width: 15%">Email</th>
<th style="width: 10%">Role</th>
<th style="width: 5%">Status</th>
<th style="width: 15%">Action</th>
<th style="width: 10%">Time</th>
</tr>
</thead>
<tbody>
@if($admins->count() > 0)
@foreach($admins as $key => $row)
<tr>
<td>{{ ++$key }}</td>
<td>{{ $row->name }}</td>
<td>{{ $row->username }}</td>
<td>{{ $row->mobile }}</td>
<td>{{ $row->email }}</td>
<td>
@if(!empty($row->getRoleNames()))
@foreach($row->getRoleNames() as $v)
<span class="badge badge-primary text-capitalize">
{{ $v }}
</span>
@endforeach
@endif
</td>
<td>
@if($row->status == 'active')
<span class="badge badge-primary text-capitalize">
Active
</span>
@elseif($row->status == 'deactive')
<span class="badge badge-danger text-capitalize">
Deactive
</span>
@endif
</td>
<td>
<a href="{{ url('tib-admin/admins/'.$row->id) }}">
<button type="button" class="btn btn-primary btn-sm">
<i class="fas fa-eye"></i>
</button>
</a>
<a href="{{ url('tib-admin/admins/'.$row->id.'/edit') }}">
<button type="button" class="btn btn-success btn-sm">
<i class="fas fa-pen"></i>
</button>
</a>
<a href="javascript:void(0)" id="admin-delete" data-id="{{ $row->id }}">
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
<td colspan="9">
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