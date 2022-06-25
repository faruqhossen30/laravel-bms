<div class="tab-pane fade {{ request()->get('sec') == 'withdraw' ? 'show active' : ''}}" id="ClubWithdrawal">
   <div class="card">
      <div class="card-header">
         <h5 class="card-title mb-0">All Withdraw</h5>
      </div>
      <div class="card-body p-2">
         <div class="table-responsive">
            <table class="table table-bordered table-hover">
               <thead class="thead-dark">
                  <tr>
                     <th scope="col">SN</th>
                     <th scope="col">Account</th>
                     <th scope="col">Method</th>
                     <th scope="col">Amount</th>
                     <th scope="col">Status</th>
                     <th scope="col">Requested At</th>
                     <th scope="col">Action At</th>
                  </tr>
               </thead>
               <tbody>
                  @if(!empty($withdraws) && $withdraws->count())
                  @foreach($withdraws as $key => $withdraw)
                  <tr>
                      <th scope="row">
                      {{ $withdraws->currentpage() * $withdraws->perpage() - $withdraws->perpage() + ++$key }}
                    </th>
                     <td class="text-capitalize">
                        {{ $withdraw->account }} ({{ $withdraw->type }})
                     </td>
                     <td>
                        {{ $withdraw->method }}
                     </td>
                     <td>{{ $bs->currency_symbol }} {{ number_format($withdraw->amount,2) }}</td>
                     <td class="text-center">
                        @if($withdraw->status == 'pending')
                        <img src="{{ asset('assets/images/pending.gif') }}" alt="Pending" class="img-table">
                        @elseif($withdraw->status == 'complete')
                        <img src="{{ asset('assets/images/complete.png') }}" alt="Win" class="img-table">
                        @elseif($withdraw->status == 'cancel')
                        <img src="{{ asset('assets/images/cancel.png') }}" alt="Loss" class="img-table">
                        @endif
                     </td>
                     <td>{{ \Carbon\Carbon::parse($withdraw->created_at)->format('d M Y, h:i:s A')}}</td>
                     <td>{{ \Carbon\Carbon::parse($withdraw->updated_at)->format('d M Y, h:i:s A')}}</td>
                  </tr>
                  @endforeach
                  @else
                  <tr>
                     <th colspan="7">Withdraw not found!</th>
                  </tr>
                  @endif
               </tbody>
            </table>
         </div>
         @if(!empty($withdraws) && $withdraws->count() > 0)
         <div class="pagination py-2">
            {{ $withdraws->appends(['sec' => 'withdraw'])->links() }}
         </div>
        @endif
      </div>
   </div>
</div>