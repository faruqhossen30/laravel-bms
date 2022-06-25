<!-- Modal -->
<div class="modal fade" id="complainModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Complain Box</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('user.submitComplain') }}">
                    @csrf
                    <div class="row">

                    <div class="col-md-12">
                    <div class="form-group">
                        <label for="">Contact Number <span class="text-danger">*</span></label>
                        <input type="text" name="contact_number" class="form-control" value="" placeholder="Contact Number" required="">
                    </div>
                    </div>

                    <div class="col-md-12">
                    <div class="form-group">
                        <label for="">Message <span class="text-danger">*</span></label>
                        <textarea class="form-control" name="message" placeholder="Write about your complain...." required></textarea>
                    </div>
                    </div>

                    </div>

                    <button type="submit" id="userSignIn" name="submit" class="btn btn-success btn-lg btn-block mh-color">Submit</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>