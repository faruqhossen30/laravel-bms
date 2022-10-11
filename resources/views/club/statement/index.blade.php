@extends('layouts.frontend.master')

@section('content')
    <div class="p-2 bg-gray-300">
        <div class="bg-white">
            <div class="bg-emerald-700 font-bold text-white text-md p-3 border-b border-gray-300 text-left">
                All Bets
            </div>
            @include('inc.club-tabpane')


            <div class="flex flex-col container">
                <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
                        <div class="overflow-x-auto">
                            <table class="min-w-full">
                                <thead class="border-b">
                                    <tr>
                                        <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                            #
                                        </th>
                                        <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                            Match
                                        </th>
                                        <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                            Question
                                        </th>
                                        <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                            Answer
                                        </th>
                                        <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                            Amount
                                        </th>
                                        <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                            Return Rate
                                        </th>
                                        <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                            Return Amount
                                        </th>
                                        <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                            Win / Loss
                                        </th>
                                        <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                            Date
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if (!empty($bets) && $bets->count())
                                        @foreach ($bets as $key => $bet)
                                            <tr class="border-b">
                                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                                    {{ $bets->currentpage() * $bets->perpage() - $bets->perpage() + ++$key }}
                                                </td>
                                                <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                    @if (!empty($bet->match))
                                                        {{ $bet->match->team_one . ' vs ' . $bet->match->team_two }}
                                                        || {{ $bet->match->bet_statement }}
                                                    @else
                                                        Match not found!
                                                    @endif
                                                </td>
                                                <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                    @if (!empty($bet->question))
                                                        {{ $bet->question->name }}
                                                    @else
                                                        Question not found!
                                                    @endif
                                                </td>
                                                <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                    @if (!empty($bet->option))
                                                        {{ $bet->option->name }}
                                                    @else
                                                        Option not found!
                                                    @endif
                                                </td>
                                                <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                    {{ $bs->currency_symbol }}
                                                    {{ number_format($bet->predict_amount, 2) }}</td>
                                                </td>
                                                <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                    {{ $bet->bet_rate }}</td>
                                                </td>
                                                <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                    {{ $bs->currency_symbol }}
                                                    {{ number_format($bet->return_amount, 2) }}</td>
                                                </td>
                                                <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                    @if ($bet->status == 'pending')
                                                        <img src="{{ asset('static/images/pending.gif') }}" alt="Pending"
                                                            class="h-4">
                                                    @elseif($bet->status == 'win')
                                                        <img src="{{ asset('static/images/win.png') }}" alt="Win"
                                                            class="h-4">
                                                    @elseif($bet->status == 'loss')
                                                        <img src="{{ asset('static/images/loss.png') }}" alt="Loss"
                                                            class="h-4">
                                                    @elseif($bet->status == 'refund')
                                                        <img src="{{ asset('static/images/refund.png') }}" alt="Refund"
                                                            class="h-4">
                                                    @endif
                                                </td>
                                                <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                    {{ \Carbon\Carbon::parse($bet->created_at)->format('d M Y, h:i:s A') }}
                                                </td>
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
                    </div>
                </div>
            </div>
            <div class="p-2">
                {{ $bets->links('pagination::tailwind') }}
            </div>


        </div>
    </div>
@endsection
