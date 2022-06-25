@extends('layouts.admin.master') 
@section('title')
Show Role | {{ $bs->site_name }}
@endsection
@section('breadcrumb')
Show Role
@endsection
@section('content')
<div class="row">
<div class="col-md-6">
<div class="card mb-4">
<div class="card-body">
<h5 class="card-title">Name: {{ $role->name }} </h5>
<div class="form-group">	
<strong>Permissions:</strong>
@if(!empty($rolePermissions))
@foreach($rolePermissions as $v)
<label class="label label-success">{{ $v->name }},</label>
@endforeach
@endif
</div>
<p>Created At: {{ date('d m y | h:i A', strtotime($role->created_at)) }}</p>
<p>Updated At: {{ date('d m y | h:i A', strtotime($role->updated_at)) }}</p>
</div>
<div class="card-body">
<a href="{{ route('roles.index') }}" class="btn btn-primary">Back</a>
<a href="{{ route('roles.edit',$role->id) }}" class="btn btn-primary">Edit</a>
</div>
</div>
</div>
</div>
@endsection