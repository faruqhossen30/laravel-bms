@extends('layouts.admin.master') 
@section('title')
Auto Questions Details | {{ $bs->site_name }}
@endsection
@section('breadcrumb')
Auto Questions Details
@endsection
@section('content')
<div class="row">
<div class="col-md-6">
<div class="card mb-4">
<div class="card-body">
<h5 class="card-title">Question: {{ $question->name }} </h5>
<p>Game: {{ $question->match_type }}</p>
<p>Status: @if($question->status == 'active')
<span class="badge badge-success text-capitalize">
Active
</span>
@else
<span class="badge badge-info text-capitalize">
Deactive
</span>
@endif
</p>
<p>Created At: {{ date('d m y | h:i A', strtotime($question->created_at)) }}</p>
<p>Updated At: {{ date('d m y | h:i A', strtotime($question->updated_at)) }}</p>
</div>
<div class="card-body">
<h3>Question Options</h3>
<div class="table-responsive pb-3">
<table class="table table-sm table-striped table-bordered table-hover">
<thead class="thead-dark">
<tr>
<th>No</th>
<th>Option</th>
<th>Rate</th>
<th>Status</th>
</tr>
</thead>
<tbody>
@if(!empty($question->options) && $question->options->count() > 0)
@foreach($question->options as $key => $row)
<tr>
<td>{{ ++$key }}</td>
<td>{{ $row->name }}</td>
<td>{{ $row->bet_rate }}</td>
<td>
@if($row->status == 'active')
<span class="badge badge-success text-capitalize">
Active
</span>
@else
<span class="badge badge-info text-capitalize">
Deactive
</span>
@endif
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
<a href="{{ url('tib-admin/auto-questions') }}" class="btn btn-primary">Back</a>
<a href="{{ url('tib-admin/auto-questions/'.$question->id.'/edit') }}" class="btn btn-primary">Edit</a>
</div>
</div>
</div>
</div>
@endsection