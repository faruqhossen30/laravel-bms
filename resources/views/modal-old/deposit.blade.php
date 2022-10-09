<!-- Modal -->
<div class="modal fade" id="depositModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Deposit</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('user.storeDeposit') }}">
                    @csrf
                    <div class="row">

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Method <span class="text-danger">*</span></label>
                                <select class="form-control" id="method" name="method" required>
                                    <option value="bKash" selected="">Bkash</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>To <span class="text-danger">*</span></label>
                                <select name="to_account" class="form-control text-capitalize" id="account" required>
                                    <option value="{{ $bkash->account_number }}" selected="">{{ $bkash->account_number }} ({{ $bkash->type }})</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Amount <span class="text-danger">*</span></label>
                                <input type="number" name="amount" class="form-control" id="deposit_popup_amount" step="any" value="" placeholder="Enter amount" required="">
                                <small id="deposit_popup_amount_error" class="font-weight-bold text-danger">
                                </small>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">From <span class="text-danger">*</span></label>
                                <input type="text" name="from_account" class="form-control" value="" placeholder="Enter account number" required="">
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="">Transaction Number <span class="text-danger">*</span></label>
                                <input type="text" name="transaction" class="form-control" value="" placeholder="Transaction" required="">
                            </div>
                        </div>

                    </div>

                    <button type="submit" id="deposit_popup_btn" name="submit" class="btn btn-success btn-lg btn-block btn-info mh-color">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>