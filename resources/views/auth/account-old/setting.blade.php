<div class="tab-pane fade" id="changeClub">
    <div class="card">
        <div class="card-header">
            <h5 class="card-title mb-0">Change Club</h5>
        </div>
        <div class="card-body p-2">
            <form method="POST" action="{{ route('change.profile') }}">
                @csrf

                <div class="form-group">
                    <label for="">Club <span class="text-danger">*</span></label>
                    <select class="form-control" name="club_id" required>
                        @if(!empty($clubs) && $clubs->count())
                        @foreach($clubs as $key => $club)
                        <option value="{{ $club->id }}" {{(($user->club_id==$club->id)? 'selected' : '')}}>{{ $club->name }}
                        </option>
                        @endforeach
                        @endif

                    </select>
                </div>
                <div class="form-group">
                    <label for="">Password <span class="text-danger">*</span></label>
                    <input type="password" name="password" class="form-control" placeholder="Password" required="">
                </div>

                <button type="submit" class="btn btn-primary">Save changes</button>
            </form>

        </div>
    </div>
</div>