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
                            aria-controls="tabs-widthdraw" aria-selected="false">Withdraw</a>
                    </li>
                @endif
                <li class="nav-item" role="presentation">
                    <a href="#tabs-clubsetting"
                        class=" nav-link block font-medium text-xs leading-tight uppercase border-x-0 border-t-0 border-b-2 border-transparent px-6 py-3 my-2 hover:border-transparent hover:bg-gray-100 focus:border-transparent"
                        id="tabs-clubsetting-tab" data-bs-toggle="pill" data-bs-target="#tabs-clubsetting" role="tab"
                        aria-controls="tabs-clubsetting" aria-selected="false">Club Setting</a>
                </li>
                <li class="nav-item" role="presentation">
                    <a href="#tabs-changepassword"
                        class=" nav-link block font-medium text-xs leading-tight uppercase border-x-0 border-t-0 border-b-2 border-transparent px-6 py-3 my-2 hover:border-transparent hover:bg-gray-100 focus:border-transparent"
                        id="tabs-changepassword-tab" data-bs-toggle="pill" data-bs-target="#tabs-changepassword"
                        role="tab" aria-controls="tabs-changepassword" aria-selected="false">changepassword</a>
                </li>
            </ul>
            {{-- Tab content statart --}}
            @include('club.profile-tab')
            {{-- @if (option('balance_transfer') == 'on') --}}
            @include('club.banlancetransfer-tab')
            {{-- @endif --}}
            @if (option('withdraw_system') == 'on')
                @include('club.widthdraw-tab')
            @endif
            @include('club.clubsetting-tab')
            @include('club.changepassword-tab')




        </div>
        </div>
    </section>
    <!-- Main Section end -->
@endsection
