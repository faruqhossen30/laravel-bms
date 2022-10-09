<div class="card">
   <div class="card-header">
      <h5 class="card-title mb-0">Statements</h5>
   </div>
   <div class="sidebar-li">
      <ul class="nav nav-tabs" role="tablist">
         <li class="nav-item">
            <a class="nav-link {{ empty(request()->get('sec')) ? 'active' : ''}}" href="{{ url('auth/statement') }}">All Bets</a>
         </li>
         <li class="nav-item">
            <a class="nav-link {{ request()->get('sec') == 'deposit' ? 'active' : ''}}" href="{{ url('auth/statement?sec=deposit') }}">All Deposit</a>
         </li>
         <li class="nav-item">
            <a class="nav-link {{ request()->get('sec') == 'withdraw' ? 'active' : ''}}" href="{{ url('auth/statement?sec=withdraw') }}">All Withdrawal</a>
         </li>
         <li class="nav-item">
            <a class="nav-link {{ request()->get('sec') == 'transfer' ? 'active' : ''}}" href="{{ url('auth/statement?sec=transfer') }}">Balance Transfer</a>
         </li>
         <li class="nav-item">
            <a class="nav-link {{ request()->get('sec') == 'transaction' ? 'active' : ''}}" href="{{ url('auth/statement?sec=transaction') }}">Transaction History</a>
         </li>
      </ul>
   </div>
</div>