@extends('layouts.frontend.master')
@section('content')
    <div class="p-2 bg-gray-400">
        <div class="bg-emerald-700 font-bold text-white text-md text-left p-2">
            Deposites
        </div>
        @include('inc.club-tabpane')
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
                                        To
                                    </th>
                                    <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                        From
                                    </th>
                                    <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                        Method
                                    </th>
                                    <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                        Amount
                                    </th>
                                    <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                        TrxID
                                    </th>
                                    <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                        Status
                                    </th>
                                    <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                        Requested At
                                    </th>
                                    <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                        Action At
                                    </th>
                                </tr>

                            </thead>
                            <tbody>
                                @if (!empty($deposits) && $deposits->count())
                                    @foreach ($deposits as $key => $deposit)
                                        <tr class="bg-white border-b">
                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                                {{ $deposits->currentpage() * $deposits->perpage() - $deposits->perpage() + ++$key }}
                                            </td>
                                            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                {{ $deposit->to_account }}
                                            </td>
                                            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                {{ $deposit->from_account }}
                                            </td>
                                            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                {{ $deposit->method }}
                                            </td>
                                            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                {{ $bs->currency_symbol }} {{ number_format($deposit->amount, 2) }}
                                            </td>
                                            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                {{ $deposit->transaction }}
                                            </td>
                                            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                @if ($deposit->status == 'pending')
                                                    <img src="{{ asset('static/images/pending.gif') }}" alt="Pending"
                                                        class="h-4">
                                                @elseif($deposit->status == 'complete')
                                                    <img src="{{ asset('static/images/complete.png') }}" alt="Complete"
                                                        class="h-4">
                                                @elseif($deposit->status == 'cancel')
                                                    <img src="{{ asset('static/images/cancel.png') }}" alt="Cancel"
                                                        class="h-4">
                                                @endif
                                            </td>
                                            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                {{ \Carbon\Carbon::parse($deposit->created_at)->format('d M Y h:i:s A') }}
                                            </td>
                                            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                {{ \Carbon\Carbon::parse($deposit->updated_at)->format('d M Y h:i:s A')}}
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <th colspan="9">Deposit not found!</th>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="p-2">
            {{ $deposits->links('pagination::tailwind') }}
        </div>
    </div>
@endsection
