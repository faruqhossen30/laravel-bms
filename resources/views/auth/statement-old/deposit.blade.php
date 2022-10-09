<div class="tab-pane fade {{ request()->get('sec') == 'deposit' ? 'show active' : ''}}" id="deposit">
   <div class="card">
      <div class="card-header">
         <h5 class="card-title mb-0">All Deposit</h5>
      </div>
      <div class="card-body p-2">
         <div class="table-responsive">
            <table class="table table-bordered table-hover">
               <thead class="thead-dark">
                  <tr>
                     <th scope="col">SN</th>
                     <th scope="col">To</th>
                     <th scope="col">From</th>
                     <th scope="col">Method</th>
                     <th scope="col">Amount</th>
                     <th scope="col">TrxID</th>
                     <th scope="col">Status</th>
                     <th scope="col">Requested At</th>
                     <th scope="col">Action At</th>
                  </tr>
               </thead>
               <tbody>
                  @if(!empty($deposits) && $deposits->count())
                  @foreach($deposits as $key => $deposit)
                  <tr>
                     <th scope="row">
                     {{ $deposits->currentpage() * $deposits->perpage() - $deposits->perpage() + ++$key }}
                     </th>
                     <td>
                        {{ $deposit->to_account }}
                     </td>
                     <td>
                        {{ $deposit->from_account }}
                     </td>
                     <td>
                        {{ $deposit->method }}
                     </td>
                     <td>{{ $bs->currency_symbol }} {{ number_format($deposit->amount,2) }}</td>
                     <td>{{ $deposit->transaction }}</td>
                     <td class="text-center">
                        @if($deposit->status == 'pending')
                        <img src="{{ asset('static/images/pending.gif') }}" alt="Pending" class="img-table">
                        @elseif($deposit->status == 'complete')
                        <img src="{{ asset('static/images/complete.png') }}" alt="Complete" class="img-table">
                        @elseif($deposit->status == 'cancel')
                        <img src="{{ asset('static/images/cancel.png') }}" alt="Cancel" class="img-table">
                        @endif
                     </td>
                     <td>{{ \Carbon\Carbon::parse($deposit->created_at)->format('d M Y h:i:s A')}}</td>
                     <td>{{ \Carbon\Carbon::parse($deposit->updated_at)->format('d M Y h:i:s A')}}</td>
                  </tr>
                  @endforeach
                  @else
                  <tr>
                     <th colspan="9">Deposit not found!</th>
                  </tr>
                  @endif
               </tbody>
            </table>
         </div>
         @if(!empty($deposits) && $deposits->count() > 0)
         <div class="pagination py-2">
             {{ $deposits->appends(['sec' => 'deposit'])->links() }}
        </div>
        @endif
      </div>
   </div>
</div>