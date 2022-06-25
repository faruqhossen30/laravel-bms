<ul class="navbar-nav sidebar sidebar-light accordion" id="accordionSidebar">
<a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('admin.dashboard') }}">
<div class="sidebar-brand-text mx-3">{{ $bs->site_name }}</div>
</a>
<hr class="sidebar-divider my-0">
@can('Dashboard')
<li class="nav-item {{ (request()->is('tib-admin')) ? 'active' : '' }}">
<a class="nav-link" href="{{ route('admin.dashboard') }}">
<i class="fas fa-fw fa-tachometer-alt"></i>
<span>Dashboard</span></a>
</li>
@endcan
@can('Betting')
<li class="nav-item {{ (request()->is('tib-admin/betting*')) ? 'active' : '' }}">
<a class="nav-link" href="{{ url('tib-admin/betting') }}">
<i class="fas fa-fw fa-chart-area"></i>
<span>Betting</span>
</a>
</li>
@endcan
@can('Transaction')
<li class="nav-item {{ (request()->is('tib-admin/transactions*')) ? 'active' : '' }}">
<a class="nav-link" href="{{ url('tib-admin/transactions') }}">
<i class="fas fa-fw fa-money-check-alt"></i>
<span>Transaction</span>
</a>
</li>
@endcan
@can('Deposit')
<li class="nav-item {{ (request()->is('tib-admin/deposits*')) ? 'active' : '' }}">
<a class="nav-link" href="{{ url('tib-admin/deposits') }}">
<i class="fas fa-fw fa-dollar-sign"></i>
<span>Deposit</span>
</a>
</li>
@endcan
@can('Withdraw')
<li class="nav-item {{ (request()->is('tib-admin/withdraws*')) ? 'active' : '' }}">
<a class="nav-link" href="{{ url('tib-admin/withdraws') }}">
<i class="fas fa-fw fa-money-bill-wave"></i>
<span>Withdraw</span>
</a>
</li>
@endcan
@can('Alart')
<li class="nav-item {{ (request()->is('tib-admin/notifications*')) ? 'active' : '' }}">
<a class="nav-link" href="{{ url('tib-admin/notifications') }}">
<i class="fas fa-fw fa-bell"></i>
<span>Notifications</span>
</a>
</li>
@endcan
@can('Club')
<li class="nav-item {{ (request()->is('tib-admin/club*')) ? 'active' : '' }}">
<a class="nav-link" href="{{ url('tib-admin/club') }}">
<i class="fas fa-fw fa-cubes"></i>
<span>Clubs</span>
</a>
</li>
@endcan
@can('User')
<li class="nav-item {{ (request()->is('tib-admin/users*','tib-admin/admins*','tib-admin/roles*')) ? 'active' : '' }}">
<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUser" aria-expanded="true" aria-controls="collapseUser">
<i class="fas fa-fw fa-users"></i>
<span>User</span>
</a>
<div id="collapseUser" class="collapse" aria-labelledby="headingUser" data-parent="#accordionSidebar">
<div class="bg-white py-2 collapse-inner rounded">
@can('User')
<a class="collapse-item" href="{{ route('users.index') }}">Users</a>
@endcan
@can('Admin')
<a class="collapse-item" href="{{ route('admins.index') }}">Admins</a>
@endcan
@can('Role')
<a class="collapse-item" href="{{ route('roles.index') }}">Roles</a>
@endcan
</div>
</div>
</li>
@endcan
@can('Complain')
<li class="nav-item {{ (request()->is('tib-admin/complains*')) ? 'active' : '' }}">
<a class="nav-link" href="{{ url('tib-admin/complains') }}">
<i class="fas fa-fw fa-question-circle"></i>
<span>Complain</span>
</a>
</li>
@endcan
@can('Balance')
<li class="nav-item {{ (request()->is('tib-admin/balance-transfers*')) ? 'active' : '' }}">
<a class="nav-link" href="{{ url('tib-admin/balance-transfers') }}">
<i class="fas fa-fw fa-comments-dollar"></i>
<span>Balance Transfer</span>
</a>
</li>
@endcan
@can('Database')
<li class="nav-item {{ (request()->is('tib-admin/database*')) ? 'active' : '' }}">
<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseDatabase" aria-expanded="true" aria-controls="collapseDatabase">
<i class="fas fa-fw fa-bell"></i>
<span>Database</span>
</a>
<div id="collapseDatabase" class="collapse" aria-labelledby="headingDatabase" data-parent="#accordionSidebar">
<div class="bg-white py-2 collapse-inner rounded">
<a class="collapse-item" href="{{ url('tib-admin/database/close-matchs') }}">Close Match</a>
<a class="collapse-item" href="{{ url('tib-admin/database/close-questions') }}">Close Question</a>
<a class="collapse-item" href="{{ url('tib-admin/database/close-options') }}">Close Options</a>
</div>
</div>
</li>
@endcan
@can('AutoQuestion')
<li class="nav-item {{ (request()->is('tib-admin/auto-questions*')) ? 'active' : '' }}">
<a class="nav-link" href="{{ route('auto-questions.index') }}">
<i class="fas fa-fw fa-question-circle"></i>
<span>Auto Question</span>
</a>
</li>
@endcan
@can('Backup')
<li class="nav-item {{ (request()->is('tib-admin/backup*')) ? 'active' : '' }}">
<a class="nav-link" href="{{ url('tib-admin/backup') }}">
<i class="fas fa-fw fa-archive"></i>
<span>Backup</span>
</a>
</li>
@endcan
@can('Setting')
<hr class="sidebar-divider">
<div class="sidebar-heading">
Setting
</div>
@can('Payment')
<li class="nav-item {{ (request()->is('tib-admin/gateways*')) ? 'active' : '' }}">
<a class="nav-link" href="{{ url('tib-admin/gateways') }}">
<i class="fas fa-fw fa-money-bill-wave"></i>
<span>Payment Gateway</span>
</a>
</li>
@endcan
<li class="nav-item {{ (request()->is('tib-admin/setting*')) ? 'active' : '' }}">
<a class="nav-link" href="{{ url('tib-admin/setting') }}">
<i class="fas fa-fw fa-cog"></i>
<span>Website Setting</span>
</a>
</li>
@endcan
</ul>