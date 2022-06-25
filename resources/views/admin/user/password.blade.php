@extends('layouts.admin.master') 
@section('title')
Change Password | {{ $bs->site_name }}
@endsection
@section('breadcrumb')
Change Password
@endsection
@section('content')

<div class="row justify-content-center">
  <div class="col-lg-7">
    <!-- Form Basic -->
    <div class="card mb-4">
      <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary">Change Profile</h6>
      </div>
      <div class="card-body">
       <form method="post" action="{{route('admin.update.password')}}" enctype="multipart/form-data">
         {{csrf_field()}}
         <div class="form-group">
          <label for="">Current Password</label>
          <input type="password" class="form-control" name="current_password" placeholder="Enter Current Password" required="">
        </div>

        <div class="form-group">
          <label for="">New Password</label>
          <input type="password" class="form-control" name="new_password" placeholder="Enter New Password" required="">
        </div>

        <div class="form-group">
          <label for="">Confirm New Password</label>
          <input type="password" class="form-control" name="new_confirm_password" placeholder="Enter New Password Again" required="">
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
    </div>
  </div>

</div>
</div>

@endsection