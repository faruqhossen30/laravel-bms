<div class="tab-pane fade {{ request()->get('sec') == 'transaction' ? 'show active' : ''}}" id="transaction">
   <div class="card">
      <div class="card-header">
         <h5 class="card-title mb-0">Transaction History</h5>
      </div>
      <div class="card-body p-2">
         <div class="table-responsive">
            <table class="table table-bordered table-hover">
               <thead class="thead-dark">
                  <tr>
                     <th scope="col">SN</th>
                     <th scope="col">Credit (In)</th>
                     <th scope="col">Debit (Out)</th>
                     <th scope="col">Description</th>
                     <th scope="col">Balance</th>
                     <th scope="col">Time</th>
                  </tr>
               </thead>
               <tbody>
                  @if(!empty($transactions) && $transactions->count())
                  @foreach($transactions as $key => $transaction)
                  <tr>
                     <th scope="row">
                     {{ $transactions->currentpage() * $transactions->perpage() - $transactions->perpage() + ++$key }}
                     </th>
                     <td>
                        {{ $bs->currency_symbol }} {{ number_format($transaction->credit,2) }}
                     </td>
                     <td>
                        {{ $bs->currency_symbol }} {{ number_format($transaction->debit,2) }}
                     </td>
                     <td>{{ $transaction->description }} </td>
                     <td>{{ $bs->currency_symbol }} {{ number_format($transaction->balance,2) }}</td>
                     <td>{{ \Carbon\Carbon::parse($transaction->created_at)->format('d M Y h:i:s A')}}</td>
                  </tr>
                  @endforeach
                  @else
                  <tr>
                     <th colspan="9">Transaction not found!</th>
                  </tr>
                  @endif
               </tbody>
            </table>
         </div>
         @if(!empty($transactions) && $transactions->count() > 0)
         <div class="pagination py-2">
             {{ $transactions->appends(['sec' => 'transaction'])->links() }}
        </div>
        @endif
      </div>
   </div>
</div>