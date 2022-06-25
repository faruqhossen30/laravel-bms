@extends('layouts.admin.master')
@section('title')
Edit Auto Question | {{ $bs->site_name }}
@endsection
@section('breadcrumb')
Edit Auto Question
@endsection
@section('content')
<div class="row justify-content-center">
<div class="col-lg-12">
<div class="card mb-4">
<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
<h6 class="m-0 font-weight-bold text-primary">Edit Auto Question </h6>
</div>
<div class="card-body">
<form method="post" action="{{ route('auto-questions.update', $question->id) }}" enctype="multipart/form-data">
{{csrf_field()}}
{{ method_field('PUT') }}
<div class="row">
<div class="col-md-4">
<div class="form-group">
<label>Question*</label>
 <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $question->name }}" placeholder="Question" required="">
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
<option value="FootBall" {{ $question->match_type == 'FootBall' ? 'selected' : '' }}>FootBall</option>
<option value="Cricket" {{ $question->match_type == 'Cricket' ? 'selected' : '' }}>Cricket</option>
<option value="Basketball" {{ $question->match_type == 'Basketball' ? 'selected' : '' }}>Basketball</option>
<option value="Boxing" {{ $question->match_type == 'Boxing' ? 'selected' : '' }}>Boxing</option>
<option value="Tennis" {{ $question->match_type == 'Tennis' ? 'selected' : '' }}>Tennis</option>
<option value="Horse Racing" {{ $question->match_type == 'Horse Racing' ? 'selected' : '' }}>Horse Racing</option>
<option value="Badminton" {{ $question->match_type == 'Badminton' ? 'selected' : '' }}>Badminton</option>
<option value="Ice Hokey" {{ $question->match_type == 'Ice Hokey' ? 'selected' : '' }}>Ice Hokey</option>
<option value="Hand Ball" {{ $question->match_type == 'Hand Ball' ? 'selected' : '' }}>Hand Ball</option>
<option value="Base Ball" {{ $question->match_type == 'Base Ball' ? 'selected' : '' }}>Base Ball</option>
<option value="Rugby" {{ $question->match_type == 'Rugby' ? 'selected' : '' }}>Rugby</option>
<option value="Snooker" {{ $question->match_type == 'Snooker' ? 'selected' : '' }}>Snooker</option>
<option value="Darts" {{ $question->match_type == 'Darts' ? 'selected' : '' }}>Darts</option>
<option value="Table Tennis" {{ $question->match_type == 'Table Tennis' ? 'selected' : '' }}>Table Tennis</option>
<option value="Beach Volley" {{ $question->match_type == 'Beach Volley' ? 'selected' : '' }}>Beach Volley</option>
<option value="Floor Ball" {{ $question->match_type == 'Floor Ball' ? 'selected' : '' }}>Floor Ball</option>
<option value="Bandy" {{ $question->match_type == 'Bandy' ? 'selected' : '' }}>Bandy</option>
<option value="Ludo" {{ $question->match_type == 'Ludo' ? 'selected' : '' }}>Ludo</option>
<option value="Lucky Card" {{ $question->match_type == 'Lucky Card' ? 'selected' : '' }}>Lucky Card</option>
<option value="Esports" {{ $question->match_type == 'Esports' ? 'selected' : '' }}>Esports</option>
<option value="Volleyball" {{ $question->match_type == 'Volleyball' ? 'selected' : '' }}>Volleyball</option>
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
<option value="active" {{ $question->status == 'active' ? 'selected' : '' }}>Active</option>
<option value="deactive" {{ $question->status == 'deactive' ? 'selected' : '' }}>Deactive</option>
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
@if(!empty($question->options) && $question->options->count())
@foreach($question->options as $key => $option)
<tr>
<td><input type="text" name="option[{{ $key }}][name]" value="{{ $option->name }}" placeholder="Enter Option" class="form-control" required /></td>
<td><input type="number" step="any" name="option[{{ $key }}][bet_rate]" value="{{ $option->bet_rate }}" placeholder="Enter Bet Rate" class="form-control" required/></td>
<td><select name="option[{{ $key }}][status]" class="form-control"><option value="active" {{ $option->status == 'active' ? 'selected' : '' }}>Active</option><option value="deactive" {{ $option->status == 'deactive' ? 'selected' : '' }}>Deactive</option></select></td>
<td><button type="button" class="btn btn-danger remove-tr">Remove</button></td>
</tr>
@endforeach
@endif
</table>
<button type="button" id="add_option_more" class="btn btn-success btn-lg btn-block my-3">Add More</button>
</div>
</div>
<input type="hidden" value="{{ $key }}" id="option-last-id">
<button type="submit" class="btn btn-primary">Save</button>
</form>
</div>
</div>
</div>
</div>
@endsection