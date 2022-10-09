<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLabel">Wellcome To {{ $bs->site_name }}</h4>    
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" style="margin: 2%;">
                <form method="POST" id="registration" action="{{ route('register') }}" style="padding: 0;box-shadow: none">
                    @csrf
                    <div class="signup-form">
                        <div id="formData">

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-xs-6">
                                        <label> {{ __('Full Name') }} <span style="color: red">*</span></label>
                                        <input type="text" class="form-control" name="name" id="name" placeholder="Full Name" required>
                                        @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="col-xs-6">
                                        <label>{{ __('Username') }}<span style="color: red">*</span></label>
                                        <input type="text" class="form-control" name="username" value="" id="username" placeholder="Username" required>
                                        @error('username')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-xs-6">
                                        <label>{{ __('Mobile Number') }}<span style="color: red">*</span></label>
                                        <input type="text" class="form-control" name="mobile" id="mobile" placeholder="Mobile Number" required>
                                        @error('mobile')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="col-xs-6">
                                        <label>{{ __('Email Address') }}<span style="color: red">*</span></label>
                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Email Address" required autocomplete="email">

                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-xs-6">
                                        <label>{{ __('Select Club') }} <span style="color: red">*</span></label>
                                        <select class="form-control" name="club_id" required>
                                            <option value="">Select Club</option>
                                            @if(!empty($clubs) && $clubs->count())
                                            @foreach($clubs as $key => $club)
                                            <option value="{{ $club->id }}">{{ $club->name }}</option>
                                            @endforeach
                                            @endif

                                        </select>
                                        @error('club')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="col-xs-6">
                                        <label>{{ __('Sponsor Name') }} <span style="color: red">*</span></label>
                                        <input type="text" class="form-control" name="sponsor" id="sponsor" placeholder="Your Sponsor" required>
                                        @error('sponsor')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-xs-6">
                                        <label>{{ __('Password') }} <span style="color: red">*</span></label>
                                        <input type="password" class="form-control" name="password" value="" id="password" placeholder="Password" required="required" pattern=".{8,}" title="8 characters minimum">
                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                        <span>Password at least 8 characters.</span>
                                    </div>
                                    <div class="col-xs-6">
                                        <label>{{ __('Confirm Password') }} <span style="color: red">*</span></label>
                                        <input type="password" class="form-control" name="password_confirmation" id="confirmPassword" placeholder="confirm Password" required="required" pattern=".{8,}" title="8 characters minimum">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <button type="submit" id="userSignUp" name="registration" class="btn btn-success btn-lg btn-block mh-color">Register Now</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
