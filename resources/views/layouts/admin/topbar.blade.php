<nav class="navbar navbar-expand navbar-light bg-navbar topbar mb-4 static-top">
<button id="sidebarToggleTop" class="btn btn-link rounded-circle mr-3">
<i class="fa fa-bars"></i>
</button>
<ul class="navbar-nav ml-auto">
@can('Alart')
<li class="nav-item dropdown no-arrow mx-1">
<a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
<i class="fas fa-bell fa-fw"></i>
<span class="badge badge-danger badge-counter notifications-count"></span>
</a>
<div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown">
<h6 class="dropdown-header">
Notification
</h6>
<div id="notifications"></div>
<a class="dropdown-item text-center small text-gray-500" href="{{ url('tib-admin/notifications') }}">Show All</a>
</div>
</li>
@endcan
<li class="nav-item dropdown no-arrow">
<a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
<img class="img-profile rounded-circle" src="{{ asset('static/images/boy.png') }}" style="max-width: 60px">
<span class="ml-2 d-none d-lg-inline text-white small">{{ Auth::user()->name }}</span>
</a>
<div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
<a class="dropdown-item" href="{{ route('admin.profile') }}">
<i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i> Profile
</a>
<a class="dropdown-item" href="{{ route('admin.password') }}">
<i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
Change Password
</a>
<div class="dropdown-divider"></div>
<a class="dropdown-item" href="javascript:void(0);" data-toggle="modal" data-target="#logoutModal">
<i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
Logout
</a>
</div>
</li>
</ul>
</nav>