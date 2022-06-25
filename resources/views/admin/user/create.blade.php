@extends('layouts.admin.master')
@section('title')
Add New User | {{ $bs->site_name }}
@endsection
@section('breadcrumb')
Add New User
@endsection
@section('content')
<div class="row justify-content-center">
<div class="col-lg-12">
<div class="card mb-4">
<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
<h6 class="m-0 font-weight-bold text-primary">Add New User</h6>
</div>
<div class="card-body">
<form method="post" action="{{route('users.store')}}" enctype="multipart/form-data">
{{csrf_field()}}
<div class="row">
<div class="col-md-6">
<div class="form-group">
<label>Full Name*</label>
<input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" placeholder="Enter Full Name" required="">
@error('name')
<span class="invalid-feedback" role="alert">
<strong>{{ $message }}</strong>
</span>
@enderror
</div>
</div>
<div class="col-md-6">
 <div class="form-group">
<label>Email Address*</label>
<input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Enter Email Address" required="">
@error('email')
<span class="invalid-feedback" role="alert">
<strong>{{ $message }}</strong>
</span>
@enderror
</div>
</div>
<div class="col-md-6">
<div class="form-group">
<label>Mobile Number*</label>
<input type="text" class="form-control @error('mobile') is-invalid @enderror" name="mobile" value="{{ old('mobile') }}" placeholder="Enter Mobile Number" required="">
@error('mobile')
<span class="invalid-feedback" role="alert">
<strong>{{ $message }}</strong>
</span>
@enderror
</div>
</div>
<div class="col-md-6">
<div class="form-group">
<label>Username*</label>
<input type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" placeholder="Enter Username" required="">
@error('username')
<span class="invalid-feedback" role="alert">
<strong>{{ $message }}</strong>
</span>
@enderror
</div>
</div>
<div class="col-md-6">
<div class="form-group">
<label>Sponsor*</label>
<input type="text" class="form-control @error('sponsor') is-invalid @enderror" name="sponsor" value="{{ old('sponsor') }}" placeholder="Enter Sponsor Username" required="">
@error('sponsor')
<span class="invalid-feedback" role="alert">
<strong>{{ $message }}</strong>
</span>
@enderror
</div>
</div>
<div class="col-md-6">
<div class="form-group">
<label>Club*</label>
<select class="form-control @error('club_id') is-invalid @enderror" name="club_id" required>
<option value="">Select Club</option>
@if(!empty($clubs) && $clubs->count())
@foreach($clubs as $key => $club)
<option value="{{ $club->id }}">{{ $club->name }}</option>
@endforeach
@endif
</select>
@error('club_id')
<span class="invalid-feedback" role="alert">
<strong>{{ $message }}</strong>
</span>
@enderror
</div>
</div>
<div class="col-md-6">
<div class="form-group">
<label>Password*</label>
<input type="password" class="form-control @error('password') is-invalid @enderror" name="password" value="{{ old('password') }}" placeholder="Enter Password" required="">
@error('password')
<span class="invalid-feedback" role="alert">
<strong>{{ $message }}</strong>
</span>
@enderror
</div>
</div>
<div class="col-md-6">
<div class="form-group">
<label>Confirm Password*</label>
<input type="password" class="form-control @error('confirm-password') is-invalid @enderror" name="confirm-password" value="{{ old('confirm-password') }}" placeholder="Enter Password Again" required="">
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