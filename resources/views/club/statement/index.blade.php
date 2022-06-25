@extends('layouts.frontend.master')
@section('title', 'Statements | '.$bs->site_name)
@section('content')
<section id="dashboard">
   <div class="container">
      <div class="row">
         <div class="col-md-12 col-xl-12">
            @include('club.statement.sidebar')
         </div>
         <div class="col-md-12 col-xl-12">
            <div class="tab-content">
               <div class="tab-pane fade {{ empty(request()->get('sec')) ? 'show active' : ''}}" id="clubBets">
                  <div class="card">
                     <div class="card-header">
                        <h5 class="card-title mb-0">All Bets</h5>
                     </div>
                     <div class="card-body p-2">
                        <div class="table-responsive">
                           <table class="table table-bordered table-hover">
                              <thead class="thead-dark">
                                 <tr>
                                    <th scope="col">SN</th>
                                    <th scope="col">User</th>
                                    <th scope="col">Match</th>
                                    <th scope="col">Question</th>
                                    <th scope="col">Answer</th>
                                    <th scope="col">Amount</th>
                                    <th scope="col">Commission</th>
                                    <th scope="col">Win / Loss</th>
                                    <th scope="col">Date</th>
                                 </tr>
                              </thead>
                              <tbody>
                                 @if(!empty($bets) && $bets->count())
                                 @foreach($bets as $key => $bet)
                                 <tr>
                                    <th scope="row">
                                       {{ $bets->currentpage() * $bets->perpage() - $bets->perpage() + ++$key }}
                                    </th>
                                    <td>{{ $bet->user->username }} </td>
                                    <td>
                                       @if(!empty($bet->match))
                                       {{ $bet->match->team_one. ' vs ' . $bet->match->team_two }} || {{ $bet->match->bet_statement }}
                                       @else
                                       Match not found!
                                       @endif
                                    </td>
                                    <td>
                                       @if(!empty($bet->question))
                                       {{ $bet->question->name }}
                                       @else
                                       Question not found!
                                       @endif
                                    </td>
                                    <td>
                                       @if(!empty($bet->option))
                                       {{ $bet->option->name }}
                                       @else
                                       Option not found!
                                       @endif
                                    </td>
                                    <td>{{ $bs->currency_symbol }} {{ number_format($bet->predict_amount,2) }}</td>
                                    <td>{{ $bs->currency_symbol }} {{ number_format($bet->club_commission,2) }}</td>
                                    <td class="text-center">
                                       @if($bet->status == 'pending')
                                       <img src="{{ asset('assets/images/pending.gif') }}" alt="Pending" class="img-table">
                                       @elseif($bet->status == 'win')
                                       <img src="{{ asset('assets/images/win.png') }}" alt="Win" class="img-table">
                                       @elseif($bet->status == 'loss')
                                       <img src="{{ asset('assets/images/loss.png') }}" alt="Loss" class="img-table">
                                       @elseif($bet->status == 'refund')
                                       <img src="{{ asset('assets/images/refund.png') }}" alt="Refund" class="img-table">
                                       @endif
                                    </td>
                                    <td>{{ \Carbon\Carbon::parse($bet->created_at)->format('d M Y, h:i:s A')}}</td>
                                 </tr>
                                 @endforeach
                                 @else
                                 <tr>
                                    <th colspan="9">Bet not found!</th>
                                 </tr>
                                 @endif
                              </tbody>
                           </table>
                        </div>
                        @if(!empty($bets) && $bets->count() > 0)
                        <div class="pagination py-2">
                            {{ $bets->links() }}
                        </div>
                        @endif
                     </div>
                  </div>
               </div>
               @include('club.statement.withdraw')
               @include('club.statement.balanceTransfer')
               @include('club.statement.transaction')
            </div>
         </div>
      </div>
   </div>
</section>
@endsection