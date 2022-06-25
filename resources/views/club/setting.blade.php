<div class="tab-pane fade" id="ClubSetting">
    <div class="card">
        <div class="card-header">
            <h5 class="card-title mb-0">Club Setting</h5>
        </div>
        <div class="card-body p-2">
            <form method="POST" action="{{ route('club.profileSetting') }}">
                @csrf

                <div class="form-group">
                    <label for="">Club Owner <span class="text-danger">*</span></label>
                    <input type="text" name="club_owner" class="form-control" placeholder="Club Owner" value="{{ Auth::user()->club_owner }}" required="">
                </div>

                <div class="form-group">
                    <label for="">Club Mobile <span class="text-danger">*</span></label>
                    <input type="text" name="club_mobile" class="form-control" placeholder="Club Mobile" value="{{ Auth::user()->club_mobile }}" required="">
                </div>

                <div class="form-group">
                    <label for="">Club Address <span class="text-danger">*</span></label>
                    <input type="text" name="club_address" class="form-control" placeholder="Club Address" value="{{ Auth::user()->club_address }}" required="">
                </div>

                <button type="submit" class="btn btn-primary">Save changes</button>
            </form>

        </div>
    </div>
</div>