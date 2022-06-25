<!-- Match Question Modal -->

<div class="modal fade" id="QuestionModal" tabindex="-1" aria-labelledby="" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id=""></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="match-details">
                        <b>Match: </b> <b class="match-title"></b>
                    </div>
                    <form action="javascript:void(0)" id="QuestionForm">
                        <input type="hidden" name="match_id" id="match_id">
                        <input type="hidden" name="question_id" id="question_id">
                        <div class="form-group">
                            <label for="">Question</label>
                            <input type="text" class="form-control" id="question_name" name="name" aria-describedby="" placeholder="Enter Question" required>
                        </div>
                        <button id="save-question" type="submit" class="btn btn-primary" value="add">Save Changes</button>
                    </form>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>

            </div>
        </div>
    </div>

       <!-- Question Action Modal -->

       <div class="modal fade" id="QuestionActionModal" tabindex="-1" aria-labelledby="" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="" id="">Action</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <button type="button" class="btn btn-success btn-block add-option" value="">Add Option</button>
                    <button type="button" class="btn btn-secondary btn-block edit-question" value="">Update Question</button>
                    <button type="button" class="btn btn-danger btn-block close-question" value="">Close Question</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Question Limit ---->

    <div class="modal fade" id="QuestionLimitModal" tabindex="-1" aria-labelledby="" aria-hidden="true">
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
                        <b>Question: </b> <b class="question-title"></b>
                    </div>
                    <form action="javascript:void(0)" id="QuestionLimitForm">
                        <input type="hidden" name="question_limit_id" id="question_limit_id">
                        <div class="form-group">
                            <label for="">Limit</label>
                            <input type="text" class="form-control" id="question_bet_limit" name="question_bet_limit" aria-describedby="" placeholder="Enter Limit" required>
                        </div>
                        <button id="question-limit-btn" type="submit" class="btn btn-primary" value="add">Save Changes</button>
                    </form>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>

            </div>
        </div>
    </div>