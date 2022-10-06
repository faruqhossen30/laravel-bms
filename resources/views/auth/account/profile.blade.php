@extends('layouts.frontend.master')

@section('title')
    Dashboard | {{ $bs->site_name }}
@endsection

@section('content')
    <!-- Main Section start -->
    <section class="bg-gray-200">
        <div class="m-auto shadow-lg p-4">
            <ul class="bg-white nav nav-tabs flex flex-row md:flex-row flex-wrap list-none border-b-0 pl-0 mb-4 font-bold "
                id="tabs-tab" role="tablist">

                <li class="nav-item" role="presentation">
                    <a href="#tabs-profile"
                        class="text-white nav-link block font-medium text-xs leading-tight uppercase border-x-0 border-t-0 border-b-2 border-transparent px-6 py-3 my-2 hover:border-transparent hover:bg-gray-100 focus:border-transparent active"
                        id="tabs-profile-tab" data-bs-toggle="pill" data-bs-target="#tabs-profile" role="tab"
                        aria-controls="tabs-profile" aria-selected="false">Profile</a>
                </li>
                <li class="nav-item" role="presentation">
                    <a href="#tabs-deposite"
                        class=" nav-link block font-medium text-xs leading-tight uppercase border-x-0 border-t-0 border-b-2 border-transparent px-6 py-3 my-2 hover:border-transparent hover:bg-gray-100 focus:border-transparent"
                        id="tabs-deposite-tab" data-bs-toggle="pill" data-bs-target="#tabs-deposite" role="tab"
                        aria-controls="tabs-deposite" aria-selected="true">deposite</a>
                </li>
                @if (option('balance_transfer') == 'on')
                    <li class="nav-item" role="presentation">
                        <a href="#tabs-transferbalance"
                            class=" nav-link block font-medium text-xs leading-tight uppercase border-x-0 border-t-0 border-b-2 border-transparent px-6 py-3 my-2 hover:border-transparent hover:bg-gray-100 focus:border-transparent"
                            id="tabs-transferbalance-tab" data-bs-toggle="pill" data-bs-target="#tabs-transferbalance"
                            role="tab" aria-controls="tabs-transferbalance" aria-selected="false">Transfer Balance</a>
                    </li>
                @endif
                @if (option('withdraw_system') == 'on')
                    <li class="nav-item" role="presentation">
                        <a href="#tabs-widthdraw"
                            class=" nav-link block font-medium text-xs leading-tight uppercase border-x-0 border-t-0 border-b-2 border-transparent px-6 py-3 my-2 hover:border-transparent hover:bg-gray-100 focus:border-transparent"
                            id="tabs-widthdraw-tab" data-bs-toggle="pill" data-bs-target="#tabs-widthdraw" role="tab"
                            aria-controls="tabs-widthdraw" aria-selected="false">widthdraw</a>
                    </li>
                @endif
                <li class="nav-item" role="presentation">
                    <a href="#tabs-changeclub"
                        class=" nav-link block font-medium text-xs leading-tight uppercase border-x-0 border-t-0 border-b-2 border-transparent px-6 py-3 my-2 hover:border-transparent hover:bg-gray-100 focus:border-transparent"
                        id="tabs-changeclub-tab" data-bs-toggle="pill" data-bs-target="#tabs-changeclub" role="tab"
                        aria-controls="tabs-changeclub" aria-selected="false">changeclub</a>
                </li>
                <li class="nav-item" role="presentation">
                    <a href="#tabs-changepassword"
                        class=" nav-link block font-medium text-xs leading-tight uppercase border-x-0 border-t-0 border-b-2 border-transparent px-6 py-3 my-2 hover:border-transparent hover:bg-gray-100 focus:border-transparent"
                        id="tabs-changepassword-tab" data-bs-toggle="pill" data-bs-target="#tabs-changepassword"
                        role="tab" aria-controls="tabs-changepassword" aria-selected="false">changepassword</a>
                </li>
            </ul>
            {{-- Tab content statart --}}
            @include('auth.account.profile-show')
            @include('auth.account.deposite')
            @if (option('balance_transfer') == 'on')
                @include('auth.account.balance-transfer')
            @endif
            @if (option('withdraw_system') == 'on')
                @include('auth.account.widthdraw')
            @endif
            @include('auth.account.change-club')
            @include('auth.account.change-password')




        </div>
        </div>
    </section>
    <!-- Main Section end -->
@endsection
