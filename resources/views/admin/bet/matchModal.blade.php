  <!----- Hiden Match Modal ------>

  <div class="modal fade" id="hiddenMatch" tabindex="-1" aria-labelledby="" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="" id="">Hidden Match</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">SN</th>
                                    <th scope="col">Live Match</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody id="hiddenLiveMatch">

                            </tbody>
                        </table>

                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">SN</th>
                                    <th scope="col">Upcoming Match</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody id="hiddenUpcomingMatch">
                            </tbody>
                        </table>

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!--- modal Match --->
    <div class="modal fade" id="DataModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="ModalTitle">
                    </h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="javascript:void(0)" id="DataForm">
                        <input type="hidden" name="data_id" id="data_id">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Team One*</label>
                                    <input type="text" class="form-control" id="team_one" name="team_one" placeholder="Team One" required="">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Team Two*</label>
                                    <input type="text" class="form-control" id="team_two" name="team_two" placeholder="Team Two" required="">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Bet Statement*</label>
                                    <input type="text" class="form-control" id="bet_statement" name="bet_statement" placeholder="Bet Statement" required="">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Date*</label>
                                    <input type="date" class="form-control" id="date" name="date" placeholder="Date" required="">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Time*</label>
                                    <input type="time" class="form-control" id="time" name="time" placeholder="Time" required="">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Match Type*</label>
                                    <select name="match_type" class="form-control mb-3" id="match_type" required>
                                        <option value="FootBall">FootBall</option>
                                        <option value="Cricket" selected>Cricket</option>
                                        <option value="Basketball">Basketball</option>
                                        <option value="Boxing">Boxing</option>
                                        <option value="Tennis">Tennis</option>
                                        <option value="Horse Racing">Horse Racing</option>
                                        <option value="Badminton">Badminton</option>
                                        <option value="Ice Hokey">Ice Hokey</option>
                                        <option value="Hand Ball">Hand Ball</option>
                                        <option value="Base Ball">Base Ball</option>
                                        <option value="Rugby">Rugby</option>
                                        <option value="Snooker">Snooker</option>
                                        <option value="Darts">Darts</option>
                                        <option value="Table Tennis">Table Tennis</option>
                                        <option value="Beach Volley">Beach Volley</option>
                                        <option value="Floor Ball">Floor Ball</option>
                                        <option value="Bandy">Bandy</option>
                                        <option value="Ludo">Ludo</option>
                                        <option value="Lucky Card">Lucky Card</option>
                                        <option value="Esports">Esports</option>
                                        <option value="Volleyball">Volleyball</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Status*</label>
                                    <select name="status" class="form-control mb-3" id="status" required>
                                        <option value="live">Live</option>
                                        <option value="upcoming" selected>Upcoming</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Auto Question*</label>
                                    <select name="auto_question" class="form-control mb-3" id="auto_question" required>
                                        <option value="yes">Yes</option>
                                        <option value="no" selected>No</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <button id="btn-save" type="submit" class="btn btn-primary" value="add">Save Changes</button>
                    </form>
                </div>
                <div class="modal-footer">

                </div>
            </div>
        </div>
    </div>

    <!-- Match Action Modal -->

    <div class="modal fade" id="ActionModal" tabindex="-1" aria-labelledby="" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="" id="">Action</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <button type="button" class="btn btn-primary btn-block add-question" value="">Add Question</button>
                    <button type="button" class="btn btn-secondary btn-block edit-match" value="">Update Match</button>
                    <button type="button" class="btn btn-danger btn-block close-match" value="">Close Match</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Match Limit ---->

    <div class="modal fade" id="MatchLimitModal" tabindex="-1" aria-labelledby="" aria-hidden="true">
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
                        <b>Match: </b> <b class="match-title"></b>
                    </div>
                    <form action="javascript:void(0)" id="MatchLimitForm">
                        <input type="hidden" name="data_id" id="data_id">
                        <div class="form-group">
                            <label for="">Limit</label>
                            <input type="text" class="form-control" id="bet_limit" name="bet_limit" aria-describedby="" placeholder="Enter Limit" required>
                        </div>
                        <button id="match-limit-btn" type="submit" class="btn btn-primary" value="add">Save Changes</button>
                    </form>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>

            </div>
        </div>
    </div>
     