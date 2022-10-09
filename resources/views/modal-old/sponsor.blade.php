<!-- Modal -->
<div class="modal fade" id="sponsorModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">All Sponsor's</h5>
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
              @if(!empty(Auth::user()->sponsors) && Auth::user()->sponsors->count())
              @foreach (Auth::user()->sponsors as $key => $sponsor)
              <tr>
                <th scope="row">{{ ++$key }}</th>
                <td>{{ $sponsor->name }}</td>
                <td>{{ $sponsor->username }}</td>
                <td>{{ $sponsor->email }}</td>
              </tr>
              @endforeach
              @else
              <tr>
                <th scope="row"></th>
                <td>Sponsor's not found!</td>
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