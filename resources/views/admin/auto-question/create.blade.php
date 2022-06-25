@extends('layouts.admin.master')
@section('title')
Add Auto Question | {{ $bs->site_name }}
@endsection
@section('breadcrumb')
Add Auto Question
@endsection
@section('content')
<div class="row justify-content-center">
<div class="col-lg-12">
<div class="card mb-4">
<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
<h6 class="m-0 font-weight-bold text-primary">Add Auto Question </h6>
</div>
<div class="card-body">
<form method="post" action="{{route('auto-questions.store')}}">
{{csrf_field()}}
<div class="row">
<div class="col-md-4">
<div class="form-group">
<label>Question*</label>
<input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" placeholder="Question" required="">
@error('name')
<span class="invalid-feedback" role="alert">
<strong>{{ $message }}</strong>
</span>
@enderror
</div>
</div>
<div class="col-md-4">
<div class="form-group">
<label>Game*</label>
<select name="match_type" class="form-control @error('match_type') is-invalid @enderror mb-3" id="match_type" required>
<option value="FootBall">FootBall</option>
<option value="Cricket" selected>Cricket</option>
<option value="Basketball">Basketball</option>
<option value="Boxing">Boxing</option>
<option value="Tennis">Tennis</option>
<option value="Horse Racing">Horse Racing</option>
<option value="Badminton">Badminton</option>
<option value="Ice Hokey">Ice Hokey</option>
<option value="Hand Ball">Hand Ball</option>
<option value="Base Ball">Base Ball</option>
<option value="Rugby">Rugby</option>
<option value="Snooker">Snooker</option>
<option value="Darts">Darts</option>
<option value="Table Tennis">Table Tennis</option>
<option value="Beach Volley">Beach Volley</option>
<option value="Floor Ball">Floor Ball</option>
<option value="Bandy">Bandy</option>
<option value="Ludo">Ludo</option>
<option value="Lucky Card">Lucky Card</option>
<option value="Esports">Esports</option>
<option value="Volleyball">Volleyball</option>
</select>
@error('match_type')
<span class="invalid-feedback" role="alert">
<strong>{{ $message }}</strong>
</span>
@enderror
</div>
</div>
<div class="col-md-4">
<div class="form-group">
<label>Status*</label>
<select name="status" class="form-control @error('status') is-invalid @enderror">
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
<div class="row">
<div class="col-md-12 py-5">
<table class="table table-bordered" id="question-options">
<tr>
<th>Option</th>
<th>Bet Rate</th>
<th>Status</th>
<th>Action</th>
</tr>
<tr>
<td><input type="text" name="option[0][name]" value="#team-1#" placeholder="Enter Option" class="form-control" required /></td>
<td><input type="number" step="any" name="option[0][bet_rate]" placeholder="Enter Bet Rate" class="form-control" required /></td>
<td><select name="option[0][status]" class="form-control"><option value="active" selected>Active</option><option value="deactive">Deactive</option></select></td>
<td><button type="button" class="btn btn-danger remove-tr">Remove</button></td></tr>
<tr>
<td><input type="text" name="option[1][name]" value="#team-2#" placeholder="Enter Option" class="form-control" required /></td>
<td><input type="number" step="any" name="option[1][bet_rate]" placeholder="Enter Bet Rate" class="form-control" required /></td>
<td><select name="option[1][status]" class="form-control"><option value="active" selected>Active</option><option value="deactive">Deactive</option></select></td>
<td><button type="button" class="btn btn-danger remove-tr">Remove</button></td>
</tr>
</table>
<button type="button" id="add_option_more" class="btn btn-success btn-lg btn-block my-3">Add More</button>
</div>
</div>
<input type="hidden" value="1" id="option-last-id">
<button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>
</div>
</div>
</div>
@endsection