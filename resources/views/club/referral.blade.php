@extends('layouts.frontend.master')
@section('content')
    <div class="p-2 bg-gray-400">
        <div class="bg-emerald-700 font-bold text-white text-md text-left p-2">
            All Referral
        </div>

        <div class="flex flex-col">
            <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
                    <div class="overflow-x-auto">
                        <table class="min-w-full">
                            <thead class="bg-white border-b">

                                <tr class="">
                                    <th scope="col" class="text-center text-sm font-medium text-gray-900 px-2 border-r py-4 text-left">
                                        S.N
                                    </th>
                                    <th scope="col" class="text-center text-sm font-medium text-gray-900 px-2 border-r py-4 text-left">
                                        Name
                                    </th>
                                    <th scope="col" class="text-center text-sm font-medium text-gray-900 px-2 border-r py-4 text-left">
                                        Username
                                    </th>
                                    <th scope="col" class="text-center text-sm font-medium text-gray-900 px-2 border-r py-4 text-left">
                                        Email
                                    </th>
                                </tr>

                            </thead>
                            <tbody>
                                @if (!empty(Auth::user()->clubUsers) && Auth::user()->clubUsers->count())
                                    @foreach (Auth::user()->clubUsers as $key => $referral)
                                        <tr class="bg-white border-b">
                                            <td class="px-2 border-r text-center py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                                {{ ++$key }}
                                            </td>
                                            <td class="text-sm text-gray-900 font-light px-2 border-r py-4 whitespace-nowrap">
                                                {{ $referral->name }}
                                            </td>
                                            <td class="text-sm text-gray-900 font-light px-2 border-r py-4 whitespace-nowrap">
                                                {{ $referral->username }}
                                            </td>
                                            <td class="text-sm text-gray-900 font-light px-2 border-r py-4 whitespace-nowrap">
                                                {{ $referral->email }}
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <th colspan="7">Withdraw not found!</th>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
