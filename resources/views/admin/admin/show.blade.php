@extends('layouts.admin.master') 
@section('title')
Show Admin | {{ $bs->site_name }}
@endsection
@section('breadcrumb')
Show Admin
@endsection
@section('content')
<div class="row">
<div class="col-md-6">
<div class="card mb-4">
<div class="card-body">
<h5 class="card-title">Name: {{ $user->name }} </h5>
<p>
<strong>Roles:</strong>
@if(!empty($user->getRoleNames()))
@foreach($user->getRoleNames() as $v)
<label class="badge badge-success">{{ $v }}</label>
@endforeach
@endif
</p>
<p>Email: {{ $user->email }}</p>
<p>Mobile: {{ $user->mobile }}</p>
<p>Username: {{ $user->username }}</p>
<p> Status: @if($user->status=='active')
<span class="badge badge-success text-capitalize">{{ $user->status }}
</span>
@elseif($user->status=='deactive')
<span class="badge badge-danger text-capitalize">{{ $user->status }}</span>
@endif
</p>
<p>Created At: {{ date('d m y | h:i A', strtotime($user->created_at)) }}</p>
<p>Updated At: {{ date('d m y | h:i A', strtotime($user->updated_at)) }}</p>
<a href="{{ route('admins.index') }}" class="btn btn-primary">Back</a>
<a href="{{ route('admins.edit',$user->id) }}" class="btn btn-primary">Edit</a>
</div>
</div>
</div>
</div>
@endsection