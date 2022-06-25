@extends('layouts.admin.master') 
@section('title')
Payment Gateway Setting | {{ $bs->site_name }}
@endsection
@section('breadcrumb')
Payment Gateway Setting 
@endsection
@section('content')
<div class="row">
<div class="col-lg-12">
<div class="card mb-4">
<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
<h6 class="m-0 font-weight-bold text-primary">Payment Gateway Setting </h6>
</div>
<div class="card-body">
<form method="post" action="javascript:void(0)" enctype="multipart/form-data" id="gateway-update">
<input type="hidden" name="id" value="{{ $gateway->id }}">
<div class="row">
<div class="col-md-6">
<div class="form-group">
<label>Account Number*</label>
<input type="text" class="form-control" name="account_number" placeholder="Account Number" value="{{ $gateway->account_number }}" required="">
</div>
</div>
<div class="col-md-6">
<div class="form-group">
<label>Method*</label>
<select name="method" class="form-control">
<option value="bKash" {{(($gateway->method == 'bKash')? 'selected' : '')}}>Bkash</option>
<option value="Rocket" {{(($gateway->method == 'Rocket')? 'selected' : '')}}>Rocket</option>
<option value="Nagad" {{(($gateway->method == 'Nagad')? 'selected' : '')}}>Nagad</option>
</select>
</div>
</div>
<div class="col-md-6">
<div class="form-group">
<label>Type*</label>
<select name="type" class="form-control">
<option value="personal" {{(($gateway->type == 'personal')? 'selected' : '')}}>Personal</option>
<option value="agent" {{(($gateway->type == 'agent')? 'selected' : '')}}>Agent</option>
<option value="merchant" {{(($gateway->type == 'merchant')? 'selected' : '')}}>Metchant</option>
</select>
</div>
</div>
<div class="col-md-6">
<div class="form-group">
<label>Status*</label>
<select name="status" class="form-control">
<option value="active" {{(($gateway->status == 'active')? 'selected' : '')}}>Active</option>
<option value="deactive" {{(($gateway->status == 'deactive')? 'selected' : '')}}>Deactive</option>
</select>
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