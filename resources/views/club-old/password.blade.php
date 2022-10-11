<div class="tab-pane fade" id="ClubPassword">
                <div class="card">
                        <div class="card-header">
                            <h5 class="card-title mb-0">Change Password</h5>
                        </div>
                        <div class="card-body p-2">
                            <form method="POST" action="{{ route('club.changePassword') }}">
                                @csrf
                                <div class="form-group">
                                    <label for="inputPasswordCurrent">Current password <span class="text-danger">*</span></label>
                                    <input type="password" name="current_password" class="form-control" required="">
                                </div>
                                <div class="form-group">
                                    <label for="inputPasswordNew">New password <span class="text-danger">*</span></label>
                                    <input type="password" name="new_password" class="form-control" required="">
                                </div>
                                <div class="form-group">
                                    <label for="inputPasswordNew2">Confirm password <span class="text-danger">*</span></label>
                                    <input type="password" name="new_confirm_password" class="form-control" required="">
                                </div>
                                <button type="submit" class="btn btn-primary">Save changes</button>
                            </form>

                        </div>
                    </div>
                </div>