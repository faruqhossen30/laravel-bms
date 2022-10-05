<div class="card">
   <div class="card-header">
      <h5 class="card-title mb-0">Profile</h5>
   </div>
   <div class="sidebar-li">
      <ul class="nav nav-tabs" role="tablist">
         <li class="nav-item">
            <a class="nav-link active" id="profile-tab" data-toggle="tab" href="#profile" role="tab">Profile</a>
         </li>
         <li class="nav-item">
            <a class="nav-link" id="deposit-tab" data-toggle="tab" href="#deposit" role="tab">Deposit</a>
         </li>
         @if(option('balance_transfer') == 'on')
         <li class="nav-item">
            <a class="nav-link" id="transfer-tab" data-toggle="tab" href="#transfer" role="tab">Transfer Balance</a>
         </li>
         @endif
         @if(option('withdraw_system') == 'on')
         <li class="nav-item">
            <a class="nav-link" id="withdraw-tab" data-toggle="tab" href="#withdraw" role="tab">Withdraw</a>
         </li>
         @endif
         <li class="nav-item">
            <a class="nav-link" id="club-tab" data-toggle="tab" href="#changeClub" role="tab">Change Club</a>
         </li>
         <li class="nav-item">
            <a class="nav-link" id="password-tab" data-toggle="tab" href="#password" role="tab">Change Password</a>
         </li>
      </ul>
   </div>
</div>
