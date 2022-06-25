<!-- Modal -->
<div class="modal fade" id="ReferralsModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">All Referrals</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="table-responsive">
          <table class="table table-bordered table-hover">
            <thead>
              <tr>
                <th scope="col">SN</th>
                <th scope="col">Name</th>
                <th scope="col">Username</th>
                <th scope="col">Email</th>
              </tr>
            </thead>
            <tbody>
              @if(!empty(Auth::user()->clubUsers) && Auth::user()->clubUsers->count())
              @foreach (Auth::user()->clubUsers as $key => $referral)
              <tr>
                <th scope="row">{{ ++$key }}</th>
                <td>{{ $referral->name }}</td>
                <td>{{ $referral->username }}</td>
                <td>{{ $referral->email }}</td>
              </tr>
              @endforeach
              @else
              <tr>
                <th scope="row"></th>
                <td>Referrals not found!</td>
                <td></td>
                <td></td>
              </tr>
              @endif
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