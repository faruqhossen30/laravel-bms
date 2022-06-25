<div class="tab-pane fade" id="deposit">
    <div class="card">
        <div class="card-header">
            <h5 class="card-title mb-0">Deposit</h5>
        </div>
        <div class="card-body p-2">

            <form method="POST" action="{{ route('user.storeDeposit') }}">
                @csrf
                <div class="form-group">
                    <label>Method <span class="text-danger">*</span></label>
                    <select class="form-control" id="method" name="method" required>
                        <option value="bKash" selected="">Bkash</option>
                    </select>
                </div>

                <div class="form-group">
                    <label>To <span class="text-danger">*</span></label>
                    <select name="to_account" class="form-control text-capitalize" id="account" required>
                        <option value="{{ $bkash->account_number }}" selected="">{{ $bkash->account_number }} ({{ $bkash->type }})</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="">Amount <span class="text-danger">*</span></label>
                    <input type="number" name="amount" class="form-control" id="deposit_amount" step="any" value="" placeholder="Enter amount" required="">
                    <small id="deposit_amount_error" class="font-weight-bold text-danger">
                    </small>
                </div>

                <div class="form-group">
                    <label for="">From <span class="text-danger">*</span></label>
                    <input type="text" name="from_account" class="form-control" value="" placeholder="Enter account number" required="">
                </div>
                <div class="form-group">
                    <label for="">Transaction Number <span class="text-danger">*</span></label>
                    <input type="text" name="transaction" class="form-control" value="" placeholder="Transaction" required="">
                </div>
                <button type="submit" class="btn btn-primary" id="deposit_btn">Submit</button>
            </form>
        </div>
    </div>
</div>