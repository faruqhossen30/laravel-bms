<div class="d-sm-flex align-items-center justify-content-between mb-4">
<h1 class="h3 mb-0 text-gray-800">@yield('breadcrumb', 'Dashboard')</h1>
<ol class="breadcrumb">
<li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
<li class="breadcrumb-item active" aria-current="page">@yield('breadcrumb', 'Dashboard')</li>
</ol>
</div>