<div class="tab-pane fade" id="transfer">
    <div class="card">
        <div class="card-header">
            <h5 class="card-title mb-0">Transfer Balance</h5>
        </div>
        <div class="card-body p-2">

            <form method="POST" action="{{ route('user.balanceTransfer') }}">
                @csrf

                <div class="form-group">
                    <label>From <span class="text-danger">*</span></label>
                    <input type="text" name="from" class="form-control" value="{{ Auth::user()->username }}" placeholder="From" readonly>
                </div>

                <div class="form-group">
                    <label for="">To User <span class="text-danger">*</span></label>
                    <input type="text" name="to_username" class="form-control" placeholder="User Name" required="">
                </div>

                <div class="form-group">
                    <label for="">Amount <span class="text-danger">*</span></label>
                    <input type="text" name="amount" class="form-control" placeholder="Enter amount" required="">
                </div>
                <div class="form-group">
                    <label for="">Password <span class="text-danger">*</span></label>
                    <input type="password" name="password" class="form-control" placeholder="Password" required="">
                </div>


                <button type="submit" class="btn btn-primary">Submit</button>
            </form>

        </div>
    </div>
</div>