@extends('layouts.admin.master') 
@section('title')
Club Edit | {{ $bs->site_name }}
@endsection
@section('breadcrumb')
Club Edit
@endsection
@section('content')
<div class="row justify-content-center">
<div class="col-lg-12">
<div class="card mb-4">
<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
<h6 class="m-0 font-weight-bold text-primary">Club Add</h6>
</div>
<div class="card-body">
<form method="post" action="{{ url('tib-admin/club/'.$club->id) }}">
@csrf
@method('PUT')
<div class="row">
<div class="col-md-6">
<div class="form-group">
<label for="name" class="control-label">Name</label>
<input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ $club->name }}" placeholder="Enter Name" maxlength="50" required="">
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
<input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ $club->email }}" placeholder="Enter Email" required="">
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
<input type="text" class="form-control @error('mobile') is-invalid @enderror" id="mobile" name="mobile" value="{{ $club->mobile }}" placeholder="Enter Mobile" required="">
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
<input type="text" class="form-control @error('username') is-invalid @enderror" id="username" name="username" value="{{ $club->username }}" placeholder="Enter Username" required="">
@error('username')
<span class="invalid-feedback" role="alert">
<strong>{{ $message }}</strong>
</span>
@enderror
</div>
</div>
<div class="col-md-6">
<div class="form-group">
<label class="control-label">Club Owner</label>
<input type="text" class="form-control @error('club_owner') is-invalid @enderror" id="club_owner" name="club_owner" value="{{ $club->club_owner }}" placeholder="Club Owner" required="">
@error('club_owner')
<span class="invalid-feedback" role="alert">
<strong>{{ $message }}</strong>
</span>
@enderror
</div>
</div>
<div class="col-md-6">
<div class="form-group">
<label class="control-label">Club Mobile</label>
<input type="text" class="form-control @error('club_mobile') is-invalid @enderror" id="club_mobile" name="club_mobile" value="{{ $club->club_mobile }}" placeholder="Club Mobile" required="">
@error('club_mobile')
<span class="invalid-feedback" role="alert">
<strong>{{ $message }}</strong>
</span>
@enderror
</div>
</div>
<div class="col-md-6">
<div class="form-group">
<label class="control-label">Club Address</label>
<input type="text" class="form-control @error('club_address') is-invalid @enderror" id="club_address" name="club_address" value="{{ $club->club_address }}" placeholder="Club Address" required="">
@error('club_address')
<span class="invalid-feedback" role="alert">
<strong>{{ $message }}</strong>
</span>
@enderror
</div>
</div>
<div class="col-md-6">
<div class="form-group">
<label class="control-label">Club Commission</label>
<input type="number" class="form-control @error('club_commission') is-invalid @enderror" step="any" id="club_commission" value="{{ $club->club_commission }}" name="club_commission" placeholder="Club Commission" required="">
@error('club_commission')
<span class="invalid-feedback" role="alert">
<strong>{{ $message }}</strong>
</span>
@enderror
</div>
</div>
<div class="col-md-6">
<div class="form-group">
<label class="control-label">Password</label>
<input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" placeholder="Password" >
@error('password')
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
<option value="active" {{ ( $club->status == 'active') ? 'selected' : '' }}>Active</option>
<option value="deactive" {{ ( $club->status == 'deactive') ? 'selected' : '' }}>Deactive</option>
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