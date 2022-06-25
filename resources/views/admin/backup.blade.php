@extends('layouts.admin.master')
@section('title')
Backup | {{ $bs->site_name }}
@endsection
@section('breadcrumb')
Backup
@endsection
@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Backups</h6>
                <div class="ml-auto">
                    <a href="{{ url('tib-admin/backup/generate') }}">
                        <button class="btn btn-primary"><i class="fas fa-plus"></i> Generate New Backup </button>
                    </a>
                </div>
            </div>
            <div class="table-responsive p-3">
                <table class="table table-sm table-striped table-bordered table-hover">
                    <thead class="thead-dark">
                        <tr>
                            <th style="width: 10%">No</th>
                            <th>Backup</th>
                            <th style="width: 15%">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(!empty($files))
                        @php
                        $key = 0;
                        @endphp
                        @foreach($files as $item)
                        <tr>
                            <td>{{ ++$key }}</td>
                            <td>{{ $item }}</td>
                            <td>
                                <a class="btn btn-sm btn-primary" href="{{ url('tib-admin/backup/download/'.$item) }}" role="button">
                                    <i class="fas fa-download"></i>
                                </a>
                                <a class="btn btn-sm btn-danger" href="{{ url('tib-admin/backup/delete/'.$item) }}" role="button">
                                    <i class="fas fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                        @else
                        <tr>
                            <td colspan="3">There are no data.</td>
                        </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
