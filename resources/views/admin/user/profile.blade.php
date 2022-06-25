@extends('layouts.admin.master') 
@section('title')
Change Profile | {{ $bs->site_name }}
@endsection
@section('breadcrumb')
Change Profile
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
       <form method="post" action="{{route('admin.update.profile')}}" enctype="multipart/form-data">
         {{csrf_field()}}
         <div class="form-group">
          <label for="">Full Name*</label>
          <input type="text" class="form-control" name="name" value="{{ $user->name }}" placeholder="Enter Full Name" required="">
        </div>

        <div class="form-group">
          <label for="">Email Address*</label>
          <input type="email" class="form-control" name="email" value="{{ $user->email }}" placeholder="Enter Email Address" required="">
        </div>

        <div class="form-group">
          <label for="">Mobile Number*</label>
          <input type="text" class="form-control" name="mobile" value="{{ $user->mobile }}" placeholder="Enter Mobile Number" required="">
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
    </div>
  </div>

</div>
</div>

@endsection