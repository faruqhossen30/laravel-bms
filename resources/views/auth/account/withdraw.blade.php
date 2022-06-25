<div class="tab-pane fade" id="withdraw">
<div class="card">
        <div class="card-header">
            <h5 class="card-title mb-0">Request Withdraw</h5>
        </div>
        <div class="card-body p-2">

            <form method="POST" action="{{ route('user.storeWithdraw') }}">
                @csrf

                <div class="form-group">
                    <label>Method <span class="text-danger">*</span></label>
                    <select class="form-control" id="method" name="method" required>
                        <option disabled="" selected=""> Select Method </option>
                        <option value="bKash">Bkash</option>
                        <option value="Rocket">Rocket</option>
                        <option value="Nagad">Nagad</option>
                    </select>
                </div>

                <div class="form-group">
                    <label>Type <span class="text-danger">*</span></label>
                    <select class="form-control" id="type" name="type" required>
                        <option disabled="" selected=""> Select Type </option>
                        <option value="personal">Personal</option>
                        <option value="agent">Agent</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="">Amount <span class="text-danger">*</span></label>
                    <input type="number" name="amount" id="withdraw_amount" class="form-control" step="any" min="50" max="10000" value="" placeholder="Enter ammount" required="">
                    <small id="withdraw_amount_error" class="font-weight-bold text-danger">
                    </small>
                </div>

                <div class="form-group">
                    <label for="">To <span class="text-danger">*</span></label>
                    <input type="text" name="account" class="form-control" value="" placeholder="Enter account number" required="">
                </div>

                <div class="form-group">
                    <label for="">Password <span class="text-danger">*</span></label>
                    <input type="password" name="password" class="form-control" placeholder="Password" required="">
                </div>

                <button type="submit" id="withdraw_btn" class="btn btn-primary">Submit</button>
            </form>

        </div>
    </div>
                </div>