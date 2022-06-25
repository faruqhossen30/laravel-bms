<!-- Option Modal -->

<div class="modal fade" id="OptionModal" tabindex="-1" aria-labelledby="" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="option-modal-title" id=""></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="question-details">
                        <b>Question: </b> <b class="question-title"></b>
                    </div>
                    <form action="javascript:void(0)" id="OptionForm">
                        <input type="hidden" name="option_question_id" id="option_question_id">
                        <input type="hidden" name="option_match_id" id="option_match_id">
                        <input type="hidden" name="option_data_id" id="option_data_id">
                        <div class="form-group">
                            <label for="">Option</label>
                            <input type="text" class="form-control" id="option_name" name="name" aria-describedby="" placeholder="Enter Option" required>
                        </div>
                        <div class="form-group">
                            <label for="">Bet Rate</label>
                            <input type="number" class="form-control" id="option_bet_rate" name="bet_rate" step="any" aria-describedby="" placeholder="Bet Ret" required>
                        </div>
                        <button id="save-option" type="submit" class="btn btn-primary" value="add">Save Changes</button>
                    </form>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>

            </div>
        </div>
    </div>

     <!-- Option Limit ---->

     <div class="modal fade" id="OptionLimitModal" tabindex="-1" aria-labelledby="" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="">Update Limit</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="">
                        <b>Option: </b> <b class="option-title"></b>
                    </div>
                    <form action="javascript:void(0)" id="OptionLimitForm">
                        <input type="hidden" name="option_id" id="option_id">
                        <div class="form-group">
                            <label for="">Limit</label>
                            <input type="text" class="form-control" id="option_bet_limit" name="option_bet_limit" aria-describedby="" placeholder="Enter Limit" required>
                        </div>
                        <button id="option-limit-btn" type="submit" class="btn btn-primary" value="update">Save Changes</button>
                    </form>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>

            </div>
        </div>
    </div>