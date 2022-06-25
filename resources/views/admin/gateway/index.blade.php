@extends('layouts.admin.master') 
@section('title')
Payment Gateways | {{ $bs->site_name }}
@endsection
@section('breadcrumb')
Payment Gateways
@endsection
@section('content')
<div class="row">
<div class="col-lg-12">
<div class="card mb-4">
<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
<h6 class="m-0 font-weight-bold text-primary">Payment Gateways </h6>
</div>
<div class="table-responsive p-3">
<table class="table table-sm table-striped table-bordered table-hover">
<thead class="thead-dark">
<tr>
<th style="width: 15%">SN</th>
<th style="width: 25%">Account Number</th>
<th style="width: 15%">Method</th>
<th style="width: 15%">Type</th>
<th style="width: 15%">Status</th>
<th style="width: 15%">Action</th>
</tr>
</thead>
<tbody>
@if(!empty($gateways) && $gateways->count())
@foreach($gateways as $key => $row)
<tr>
<td>{{ ++$key }}</td>
<td>{{ $row->account_number }}</td>
<td class="text-capitalize">{{ $row->method }}</td>
<td class="text-capitalize">{{ $row->type }}</td>
<td>
@if($row->status=='active')
<span class="badge badge-success text-capitalize">{{ $row->status }}</span>
@elseif($row->status=='deactive')
<span class="badge badge-danger text-capitalize">{{ $row->status }}</span>
@endif
</td>
<td>
<a href="{{ url('tib-admin/gateway',$row->id) }}" class="btn btn-sm btn-warning">
<i class="fas fa-edit"></i>
</a>
</td>
</tr>
@endforeach
@else
<tr>
<td colspan="6">There are no data.</td>
@endif
</tbody>
</table>
</div>
</div>
</div>
</div>
@endsection