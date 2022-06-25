@extends('layouts.admin.master') 
@section('title')
Club Details | {{ $bs->site_name }}
@endsection
@section('breadcrumb')
Club Details
@endsection
@section('content')
<div class="row">
<div class="col-md-6">
<div class="card mb-4">
<div class="card-body">
<h5 class="card-title">Club: {{ $club->name }} </h5>
<p>Username: {{ $club->username }}</p>
<p>Mobile: {{ $club->mobile }}</p>
<p>Username: {{ $club->username }}</p>
<p>Balance: {{ $bs->currency_symbol }} {{ number_format($club->balance,2) }}</p>
<p>Total Users: {{ $club->clubUsers->count() }}</p>
<p>Club Address: {{ $club->club_address }}</p>
<p>Club Owner: {{ $club->club_owner }}</p>
<p>Club Mobile: {{ $club->club_mobile }}</p>
<p>Club Commission: {{ $club->club_commission }}</p>
<p>Status: @if($club->status == 'active')
<span class="badge badge-success text-capitalize">
Active
</span>
@elseif($club->status == 'deactive')
<span class="badge badge-info text-capitalize">
Deactive
</span>
@else
<span class="badge badge-danger text-capitalize">
Suspend
</span>
@endif
</p>
<p>Created At: {{ date('d m y | h:i A', strtotime($club->created_at)) }}</p>
<p>Updated At: {{ date('d m y | h:i A', strtotime($club->updated_at)) }}</p>
<a href="{{ url('tib-admin/club') }}" class="btn btn-primary">Back</a>
<a href="{{ url('tib-admin/club/'.$club->id.'/edit') }}" class="btn btn-primary">Edit</a>
</div>
</div>
</div>
</div>
@endsection