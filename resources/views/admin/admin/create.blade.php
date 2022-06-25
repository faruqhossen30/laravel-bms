@extends('layouts.admin.master') 
@section('title')
Add New Admin | {{ $bs->site_name }}
@endsection
@section('breadcrumb')
Add New Admin
@endsection
@section('content')
<div class="row justify-content-center">
<div class="col-lg-12">
<div class="card mb-4">
<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
<h6 class="m-0 font-weight-bold text-primary">Admin Add</h6>
</div>
<div class="card-body">
<form method="post" action="{{ url('tib-admin/admins') }}">
@csrf
<div class="row">
<div class="col-md-6">
<div class="form-group">
<label for="name" class="control-label">Name</label>
<input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" placeholder="Enter Name" maxlength="50" required="">
@error('name')
<span class="invalid-feedback" role="alert">
<strong>{{ $message }}</strong>
</span>
@enderror
</div>
</div>
<div class="col-md-6">
<div class="form-group">
<label class="control-label">Email</label>
<input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" placeholder="Enter Email" required="">
@error('email')
<span class="invalid-feedback" role="alert">
<strong>{{ $message }}</strong>
</span>
@enderror
</div>
</div>
<div class="col-md-6">
<div class="form-group">
<label class="control-label">Mobile</label>
<input type="text" class="form-control @error('mobile') is-invalid @enderror" id="mobile" name="mobile" value="{{ old('mobile') }}" placeholder="Enter Mobile" required="">
@error('mobile')
<span class="invalid-feedback" role="alert">
<strong>{{ $message }}</strong>
</span>
@enderror
</div>
</div>
<div class="col-md-6">
<div class="form-group">
<label class="control-label">Username</label>
<input type="text" class="form-control @error('username') is-invalid @enderror" id="username" name="username" value="{{ old('username') }}" placeholder="Enter Username" required="">
@error('username')
<span class="invalid-feedback" role="alert">
<strong>{{ $message }}</strong>
</span>
@enderror
</div>
</div>
<div class="col-md-6">
<div class="form-group">
<label class="control-label">Role</label>
<select class="form-control @error('roles') is-invalid @enderror" name="roles" id="roles" required="">
@if(!empty($roles))
@foreach($roles as $role)
<option value="{{ $role }}">{{ $role }}</option>
@endforeach
@endif
</select>
@error('status')
<span class="invalid-feedback" role="alert">
<strong>{{ $message }}</strong>
</span>
@enderror
</div>
</div>
<div class="col-md-6">
<div class="form-group">
<label class="control-label">Password</label>
<input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" value="{{ old('password') }}" placeholder="Password" required="">
@error('password')
<span class="invalid-feedback" role="alert">
<strong>{{ $message }}</strong>
</span>
@enderror
</div>
</div>
<div class="col-md-6">
<div class="form-group">
<label class="control-label">Confirm Password</label>
<input type="password" class="form-control @error('confirm-password') is-invalid @enderror" id="confirm-password" name="confirm-password" value="{{ old('confirm-password') }}" placeholder="Confirm Password" required="">
@error('confirm-password')
<span class="invalid-feedback" role="alert">
<strong>{{ $message }}</strong>
</span>
@enderror
</div>
</div>
<div class="col-md-6">
<div class="form-group">
<label class="control-label">Status</label>
<select class="form-control @error('status') is-invalid @enderror" name="status" id="status" required="">
<option value="active" selected>Active</option>
<option value="deactive">Deactive</option>
</select>
@error('status')
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