<!-- Modal -->
<div class="modal fade" id="signinm" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLabel">Wellcome To {{ $bs->site_name }} </h4>    
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" style="margin: 2%;">
                <form method="POST" action="{{ route('login') }}" style="padding: 0;box-shadow: none">
                              @csrf
                    <div class="signup-form">
                        <div id="formData">

                            <div class="form-group">
                                <label>Username / Email <span style="color: red">*</span></label>
                                <input type="text" class="form-control" name="login" value="" id="userId" placeholder="Username Or Email Address" required>
                            </div>
                            <div class="form-group">
                                <label>Password <span style="color: red">*</span></label>
                                <input type="password" class="form-control" name="password" value="" id="password" placeholder="Password" required="required" pattern=".{6,}" title="6 characters minimum">
                                <span>Password at least 6 characters.</span>
                            </div>
                            <div class="form-group">

                                <button type="submit" id="userSignIn" name="registration" class="btn btn-success btn-lg btn-block mh-color">Sign In</button>

                                 @if (Route::has('password.request'))
                                    <a class="mt-5 texte-center" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif

                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>