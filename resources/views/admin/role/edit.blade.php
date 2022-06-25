@extends('layouts.admin.master') 
@section('title')
Edit Role | {{ $bs->site_name }}
@endsection
@section('breadcrumb')
Edit Role
@endsection
@section('content')
<div class="row justify-content-center">
<div class="col-lg-12">
<div class="card mb-4">
<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
<h6 class="m-0 font-weight-bold text-primary">Edit Role</h6>
</div>
<div class="card-body">
<form method="post" action="{{ url('tib-admin/roles/'.$role->id) }}">
@csrf
@method('PUT')
<div class="row">
<div class="col-md-6">
<div class="form-group">
<label for="name" class="control-label">Name</label>
<input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ $role->name }}" placeholder="Enter Name" maxlength="50" required="">
@error('name')
<span class="invalid-feedback" role="alert">
<strong>{{ $message }}</strong>
</span>
@enderror
</div>
</div>
<div class="col-md-12">
<div class="form-group">
<label for="permission" class="control-label">Permission</label>
@foreach($permission as $value)
<div class="form-check">
  <input class="form-check-input" type="checkbox" name="permission[]" value="{{ $value->id }}" id="check-{{ $value->id }}" @if(in_array($value->id, $rolePermissions)) checked @endif>
  <label class="form-check-label" for="check-{{ $value->id }}">
  {{ $value->name }}
  </label>
</div>
@endforeach
@error('permission')
<span class="invalid-feedback" role="alert">
<strong>{{ $message }}</strong>
</span>
@enderror
</div>
</div>
</div>
<button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>
</div>
</div>
</div>
@endsection