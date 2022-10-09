@extends('layouts.frontend.master')
@section('content')
    <div class="p-2 bg-gray-400">
        <div class="bg-emerald-700 font-bold text-white text-md text-left p-2">
            Transction Historry
        </div>
        <div class="flex flex-start bg-white text-white font-semibold space-x-1 text-center p-4">
            <a href="{{ url('auth/statement') }}"
                class="bg-emerald-700 hover:bg-white hover:text-emerald-800 p-2 border-r-2 border-gray-200">All
                Bets</a>
            <a href="{{ url('auth/statement?sec=deposit') }}"
                class="bg-emerald-700 hover:bg-white hover:text-emerald-800 p-2 border-r-2 border-gray-200">Deposite</a>
            <a href="{{ url('auth/statement?sec=withdraw') }}"
                class="bg-emerald-700 hover:bg-white hover:text-emerald-800 p-2 border-r-2 border-gray-200">All
                Widthdraw</a>
            <a href="{{ url('auth/statement?sec=transfer') }}"
                class="bg-emerald-700 hover:bg-white hover:text-emerald-800 p-2 border-r-2 border-gray-200">Balance
                Transfer</a>
            <a href="{{ url('auth/statement?sec=transaction') }}"
                class="bg-emerald-700 hover:bg-white hover:text-emerald-800 p-2">Transaction History</a>
        </div>
        <div class="flex flex-col">
            <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
                    <div class="overflow-x-auto">
                        <table class="min-w-full">
                            <thead class="bg-white border-b">

                                <tr>
                                    <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                        S.N
                                    </th>
                                    <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                        Credit (In)
                                    </th>
                                    <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                        Debit (Out)
                                    </th>
                                    <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                        Description
                                    </th>
                                    <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                        Balance
                                    </th>
                                    <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                        Time
                                    </th>
                                </tr>

                            </thead>
                            <tbody>
                                @if (!empty($transactions) && $transactions->count())
                                    @foreach ($transactions as $key => $transaction)
                                        <tr class="bg-white border-b">
                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                                {{ $transactions->currentpage() * $transactions->perpage() - $transactions->perpage() + ++$key }}
                                            </td>
                                            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                {{ $bs->currency_symbol }} {{ number_format($transaction->credit,2) }}
                                            </td>
                                            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                {{ $bs->currency_symbol }} {{ number_format($transaction->debit,2) }}
                                            </td>
                                            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                {{ $transaction->description }}
                                            </td>
                                            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                {{ $bs->currency_symbol }} {{ number_format($transaction->balance,2) }}
                                            </td>
                                            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                {{ \Carbon\Carbon::parse($transaction->created_at)->format('d M Y h:i:s A')}}
                                            </td>

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
                </div>
            </div>
        </div>
        <div class="p-2">
            {{ $transactions->links('pagination::tailwind') }}
        </div>
    </div>
@endsection
