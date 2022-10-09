<div class="tab-pane fade {{ request()->get('sec') == 'transfer' ? 'show active' : ''}}" id="transfer">
   <div class="card">
      <div class="card-header">
         <h5 class="card-title mb-0">Balance Transfer</h5>
      </div>
      <div class="card-body p-2">
         <div class="table-responsive">
            <table class="table table-bordered table-hover">
               <thead class="thead-dark">
                  <tr>
                     <th scope="col">SN</th>
                     <th scope="col">Username</th>
                     <th scope="col">Amount</th>
                     <th scope="col">Time</th>
                  </tr>
               </thead>
               <tbody>
                  @if(!empty($transfers) && $transfers->count())
                  @foreach($transfers as $key => $transfer)
                  <tr>
                     <th scope="row">
                     {{ $transfers->currentpage() * $transfers->perpage() - $transfers->perpage() + ++$key }}
                     </th>
                     <td>
                        {{ $transfer->to_username }}
                     </td>
                     <td>{{ $bs->currency_symbol }} {{ number_format($transfer->amount,2) }}</td>
                     <td>{{ \Carbon\Carbon::parse($transfer->created_at)->format('d M Y h:i:s A')}}</td>
                  </tr>
                  @endforeach
                  @else
                  <tr>
                     <th colspan="4">Balance Transfer not found!</th>
                  </tr>
                  @endif
               </tbody>
            </table>
         </div>
         @if(!empty($transfers) && $transfers->count() > 0)
         <div class="pagination py-2">
             {{ $transfers->appends(['sec' => 'transfer'])->links() }}
        </div>
        @endif
      </div>
   </div>
</div>