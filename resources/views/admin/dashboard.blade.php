@extends('layouts.admin.master')
@section('title')
Dashboard | {{ $bs->site_name }}
@endsection
@section('breadcrumb')
Dashboard
@endsection
@section('content')
<div class="row mb-3">

  <div class="col-xl-3 col-md-6 mb-4">
    <div class="card h-100">
      <div class="card-body">
        <div class="row align-items-center">
          <div class="col mr-2">
            <div class="text-xs font-weight-bold mb-1">Total Bets (Current Month)</div>
            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $bs->currency_symbol }} {{ number_format($totalBet, 2) }} </div>
          </div>
          <div class="col-auto">
            <i class="fas fa-gamepad fa-2x text-primary"></i>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="col-xl-3 col-md-6 mb-4">
    <div class="card h-100">
      <div class="card-body">
        <div class="row align-items-center">
          <div class="col mr-2">
            <div class="text-xs font-weight-bold mb-1">Total User Win (Current Month)</div>
            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $bs->currency_symbol }} {{ number_format($totalWin, 2) }} </div>
          </div>
          <div class="col-auto">
            <i class="fas fa-thumbs-up fa-2x text-primary"></i>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="col-xl-3 col-md-6 mb-4">
    <div class="card h-100">
      <div class="card-body">
        <div class="row align-items-center">
          <div class="col mr-2">
            <div class="text-xs font-weight-bold mb-1">Total User Loss (Current Month)</div>
            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $bs->currency_symbol }} {{ number_format($totalLoss, 2) }} </div>
          </div>
          <div class="col-auto">
            <i class="fas fa-thumbs-down fa-2x text-primary"></i>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="col-xl-3 col-md-6 mb-4">
    <div class="card h-100">
      <div class="card-body">
        <div class="row align-items-center">
          <div class="col mr-2">
            <div class="text-xs font-weight-bold mb-1">Total Income (Current Month)</div>
            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $bs->currency_symbol }} {{ number_format($totalIncome, 2) }} </div>
          </div>
          <div class="col-auto">
            <i class="fas fa-calendar fa-2x text-primary"></i>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="col-xl-3 col-md-6 mb-4">
    <div class="card h-100">
      <div class="card-body">
        <div class="row no-gutters align-items-center">
          <div class="col mr-2">
            <div class="text-xs font-weight-bold mb-1">Total User</div>
            <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{ $userCount }}</div>
          </div>
          <div class="col-auto">
            <i class="fas fa-users fa-2x text-info"></i>
          </div>
        </div>
      </div>
    </div>
  </div>
  
    <div class="col-xl-3 col-md-6 mb-4">
    <div class="card h-100">
      <div class="card-body">
        <div class="row no-gutters align-items-center">
          <div class="col mr-2">
            <div class="text-xs font-weight-bold mb-1">Club Balance</div>
            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $bs->currency_symbol }} {{ number_format($clubBalance, 2) }}</div>
          </div>
          <div class="col-auto">
            <i class="fa fa-cubes fa-2x text-warning"></i>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="col-xl-3 col-md-6 mb-4">
    <div class="card h-100">
      <div class="card-body">
        <div class="row no-gutters align-items-center">
          <div class="col mr-2">
            <div class="text-xs font-weight-bold mb-1">Total User Balance</div>
            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $bs->currency_symbol }} {{ number_format($userBalance, 2) }}</div>
          </div>
          <div class="col-auto">
            <i class="fas fa-dollar-sign fa-2x text-warning"></i>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="col-xl-3 col-md-6 mb-4">
    <div class="card h-100">
      <div class="card-body">
        <div class="row no-gutters align-items-center">
          <div class="col mr-2">
            <div class="text-xs font-weight-bold mb-1">Total Deposit (Current Month)</div>
            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $bs->currency_symbol }} {{ number_format($totalDeposit, 2) }}</div>
          </div>
          <div class="col-auto">
            <i class="fas fa-dollar-sign fa-2x text-success"></i>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="col-xl-3 col-md-6 mb-4">
    <div class="card h-100">
      <div class="card-body">
        <div class="row no-gutters align-items-center">
          <div class="col mr-2">
            <div class="text-xs font-weight-bold mb-1">Total Withdraw (Current Month)</div>
            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $bs->currency_symbol }} {{ number_format($totalWithdraw, 2) }}</div>
          </div>
          <div class="col-auto">
            <i class="fas fa-dollar-sign fa-2x text-success"></i>
          </div>
        </div>
      </div>
    </div>
  </div>

</div>
<!--Row-->
@endsection