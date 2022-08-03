@extends('layouts.admin.master')
@section('title')
Website Setting | {{ $bs->site_name }}
@endsection
@section('breadcrumb')
Website Setting
@endsection
@section('content')
<div class="row justify-content-center">
    <div class="col-lg-12">
        <div class="card mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Website Setting</h6>
            </div>
            <div class="card-body">
                <form method="post" action="{{ url('tib-admin/setting') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Website Name*</label>
                                <input type="text" class="form-control" name="site_name" value="{{ $setting->site_name }}" placeholder="Site Name" required="">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Site Title*</label>
                                <input type="text" class="form-control" name="site_title" value="{{ $setting->site_title }}" placeholder="Site Title" required="">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Currency*</label>
                                <input type="text" class="form-control" name="currency" value="{{ $setting->currency }}" placeholder="Currency" required="">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Currency Code*</label>
                                <input type="text" class="form-control" name="currency_code" value="{{ $setting->currency_code }}" placeholder="Currency Code" required="">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Currency Symbol*</label>
                                <input type="text" class="form-control" name="currency_symbol" value="{{ $setting->currency_symbol }}" placeholder="Currency Symbol" required="">
                            </div>
                        </div>
                        <hr>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Club Commission*</label>
                                <input type="number" class="form-control" name="club_commission" value="{{ $setting->club_commission }}" step="any" placeholder="Club Commission" required="">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Copyright Text*</label>
                                <input type="text" class="form-control" name="copyright" value="{{ $setting->copyright }}" placeholder="Copyright Text">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Sponsor Commission*</label>
                                <input type="number" class="form-control" name="sponsor_commission" value="{{ $setting->sponsor_commission }}" step="any" placeholder="Sponsor Commission" required="">
                            </div>
                        </div>
                        <hr>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Notice</label>
                                <textarea name="notice" class="form-control">{{ $setting->notice }}</textarea>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Footer Notice</label>
                                <textarea name="footer_notice" class="form-control">{{ $setting->footer_notice }}</textarea>
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
