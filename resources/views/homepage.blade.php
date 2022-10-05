@extends('layouts.frontend.master')
@section('title', 'Welcome To '.$bs->site_name)
@section('content')
@include('inc.marque')
<section class="p-1">
    <div class="grid grid-cols-12 gap-1">
        <div class="hidden md:block md:col-span-2 bg-white text-gray-500 text-sm rounded-md">
            <div class="bg-emerald-700">
                <h4 class="text-white font-bold p-1 text-center">Sports</h4>
            </div>
            <div class="flex flex-col space-y-1">
                <a href="#"  class="flex space-x-1 border-b-2 ml-2 last:border-b-0 p-1 hover:bg-green-100 ">
                    <img src="{{asset('static')}}/img/footbal.png" class="h-5" alt="">
                    <span>All</span>
                </a>
                <a href="#"  class="flex space-x-1 border-b-2 ml-2 last:border-b-0 p-1 hover:bg-green-100">
                    <img src="{{asset('static')}}/img/cricket.png" class="h-5" alt="">
                    <span>Cricket</span>
                </a>
                <a href="#"  class="flex space-x-1 border-b-2 ml-2 last:border-b-0 p-1 hover:bg-green-100">
                    <img src="{{asset('static')}}/img/footbal.png" class="h-5" alt="">
                    <span>Football</span>
                </a>
                <a href="#"  class="flex space-x-1 border-b-2 ml-2 last:border-b-0 p-1 hover:bg-green-100">
                    <img src="{{asset('static')}}/img/cricket.png" class="h-5" alt="">
                    <span>Cricket</span>
                </a>
            </div>
        </div>
        <div class="col-span-12 md:col-span-7 bg-white">
            <div class="flex items-center bg-emerald-700 text-white text-sm ">
                <a href="#" class="flex items-center space-x-2 px-2 py-1 border-b-4 border-yellow-400">
                    <img src="{{asset('static')}}/img/footbal.png" class="h-4" alt="">
                    <span>All</span>
                </a>
                <a href="#" class="flex items-center space-x-2 px-2 py-1 ">
                    <img src="{{asset('static')}}/img/cricket.png" class="h-4" alt="">
                    <span>Cricket</span>
                </a>
                <a href="#" class="flex items-center space-x-2 px-2 py-1">
                    <img src="{{asset('static')}}/img/footbal.png" class="h-4" alt="">
                    <span>Football</span>
                </a>
                <a href="#" class="flex items-center space-x-2 px-2 py-1">
                    <img src="{{asset('static')}}/img/cricket.png" class="h-4" alt="">
                    <span>Cricket</span>
                </a>
            </div>

            <div class="bg-emerald-700 m-1 p-1">
                <h4 class="text-white font-bold p-1 text-left">Live Match <span><i
                            class="fas fa-circle text-red-600"></i></span></h4>
            </div>
            <!-- Accroding -->
            <div>
                <div class="accordion p-1" id="accordionExample5">
                    <div class="accordion-item bg-white border border-gray-200">
                        <h2 class="accordion-header mb-0 bg-green-100 flex" id="headingTwo5">
                            <button class="
                          accordion-button
                          collapsed
                          relative
                          flex
                          items-center
                          w-full
                          py-2
                          px-5
                          text-base text-gray-700 text-left
                          bg-green-100
                          border-0
                          rounded-none
                          transition
                          focus:outline-none
                        " type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo5"
                                aria-expanded="false" aria-controls="collapseTwo5" style="border-radius: 0;">
                                <div class="shrink-0">
                                    <img class="h-12 w-12" src="{{asset('static')}}/img/cricket-logo.png" alt="ChitChat Logo">
                                </div>
                                <div class="flex flex-col ml-2">
                                    <span class="font-semibold">Bangladesh Vs Srilanka</span>
                                    <span class="text-orange-700 text-sm font-semibold">Chaina Division 1</span>
                                    <div class="text-sm">
                                        <span>
                                            <i class="fas fa-calendar-alt"></i>
                                            28 September 2022
                                        </span>
                                        <span>
                                            <i class="far fa-clock"></i>
                                            10:05 PM
                                        </span>
                                    </div>
                                </div>
                            </button>
                            <img src="{{asset('static')}}/img/live.gif" class="h-4 m-2" alt="">
                        </h2>
                        <div id="collapseTwo5" class="accordion-collapse collapse show"
                            aria-labelledby="headingTwo5">
                            <div class="accordion-body py-2">
                                <div>
                                    <div class="text-white bg-gray-200 border">
                                        <h4 class="text-gray-600 font-bold p-1">Who win the match</h4>
                                    </div>
                                    <div class="flex justify-between space-x-1 p-2 text-sm">
                                        <div class="flex justify-between bg-emerald-600 w-full rounded-sm ">
                                            <span class="text-white font-bold p-1">Bangladesh</span>
                                            <span class="bg-emerald-800 text-white font-bold p-1 px-4">2.50</span>
                                        </div>
                                        <div class="flex justify-between bg-emerald-600 w-full rounded-sm">
                                            <span class="text-white font-bold p-1">Srilanka</span>
                                            <span class="bg-emerald-800 text-white font-bold p-1 px-4">1.50</span>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <div class="text-white bg-gray-200 border">
                                        <h4 class="text-gray-600 font-bold p-1">Who win the match</h4>
                                    </div>
                                    <div class="flex justify-between space-x-1 p-2 text-sm">
                                        <div class="flex justify-between bg-emerald-600 w-full rounded-sm ">
                                            <span class="text-white font-bold p-1">Bangladesh</span>
                                            <span class="bg-emerald-800 text-white font-bold p-1 px-4">2.50</span>
                                        </div>
                                        <div class="flex justify-between bg-emerald-600 w-full rounded-sm">
                                            <span class="text-white font-bold p-1">Srilanka</span>
                                            <span class="bg-emerald-800 text-white font-bold p-1 px-4">1.50</span>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <div class="text-white bg-gray-200 border">
                                        <h4 class="text-gray-600 font-bold p-1">Who win the match</h4>
                                    </div>
                                    <div class="flex justify-between space-x-1 p-2 text-sm">
                                        <div class="flex justify-between bg-emerald-600 w-full rounded-sm ">
                                            <span class="text-white font-bold p-1">Bangladesh</span>
                                            <span class="bg-emerald-800 text-white font-bold p-1 px-4">2.50</span>
                                        </div>
                                        <div class="flex justify-between bg-emerald-600 w-full rounded-sm">
                                            <span class="text-white font-bold p-1">Srilanka</span>
                                            <span class="bg-emerald-800 text-white font-bold p-1 px-4">1.50</span>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Sidebar start -->
        <div class="hidden md:block md:col-span-3 bg-emerald-700">
            <div class="bg-emerald-700">
                <h4 class="text-white font-bold p-1 text-center">Upcomming Match</h4>
            </div>
            <div>
                <div class="accordion p-1" id="accordionExample5">
                    <div class="accordion-item bg-white border border-gray-200">
                        <h2 class="accordion-header mb-0" id="headingTwo5">
                            <button class="
                          accordion-button
                          collapsed
                          relative
                          flex
                          items-center
                          w-full
                          py-2
                          px-5
                          text-base text-gray-700 text-left
                          bg-green-100
                          border-0
                          rounded-none
                          transition
                          focus:outline-none
                        " type="button" data-bs-toggle="collapse" data-bs-target="#collapse2" aria-expanded="false"
                                aria-controls="collapse2" style="border-radius: 0;">
                                <div class="shrink-0">
                                    <img class="h-12 w-12" src="{{asset('static')}}/img/cricket-logo.png" alt="ChitChat Logo">
                                </div>

                                <div class="flex flex-col ml-2">
                                    <span class="font-semibold">Bangladesh Vs Srilanka</span>
                                    <span class="text-orange-700 text-sm font-semibold">Chaina Division 1</span>
                                    <div class="text-sm">
                                        <span>
                                            <i class="fas fa-calendar-alt"></i>
                                            28 September 2022
                                        </span>
                                        <span>
                                            <i class="far fa-clock"></i>
                                            10:05 PM
                                        </span>
                                    </div>
                                </div>
                            </button>
                        </h2>
                        <div id="collapse2" class="accordion-collapse collapse show" aria-labelledby="headingTwo5">
                            <div class="accordion-body py-2">
                                <div>
                                    <div class="text-white bg-gray-200 border">
                                        <h4 class="text-gray-600 font-bold p-1">Who win the match</h4>
                                    </div>
                                    <div class="flex justify-between space-x-1 p-2 text-sm">
                                        <div class="flex justify-between bg-emerald-600 w-full rounded-sm ">
                                            <span class="text-white font-bold p-1">Bangladesh</span>
                                            <span class="bg-emerald-800 text-white font-bold p-1 px-4">2.50</span>
                                        </div>
                                        <div class="flex justify-between bg-emerald-600 w-full rounded-sm">
                                            <span class="text-white font-bold p-1">Srilanka</span>
                                            <span class="bg-emerald-800 text-white font-bold p-1 px-4">1.50</span>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <div class="text-white bg-gray-200 border">
                                        <h4 class="text-gray-600 font-bold p-1">Who win the match</h4>
                                    </div>
                                    <div class="flex justify-between space-x-1 p-2 text-sm">
                                        <div class="flex justify-between bg-emerald-600 w-full rounded-sm ">
                                            <span class="text-white font-bold p-1">Bangladesh</span>
                                            <span class="bg-emerald-800 text-white font-bold p-1 px-4">2.50</span>
                                        </div>
                                        <div class="flex justify-between bg-emerald-600 w-full rounded-sm">
                                            <span class="text-white font-bold p-1">Srilanka</span>
                                            <span class="bg-emerald-800 text-white font-bold p-1 px-4">1.50</span>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <div class="text-white bg-gray-200 border">
                                        <h4 class="text-gray-600 font-bold p-1">Who win the match</h4>
                                    </div>
                                    <div class="flex justify-between space-x-1 p-2 text-sm">
                                        <div class="flex justify-between bg-emerald-600 w-full rounded-sm ">
                                            <span class="text-white font-bold p-1">Bangladesh</span>
                                            <span class="bg-emerald-800 text-white font-bold p-1 px-4">2.50</span>
                                        </div>
                                        <div class="flex justify-between bg-emerald-600 w-full rounded-sm">
                                            <span class="text-white font-bold p-1">Srilanka</span>
                                            <span class="bg-emerald-800 text-white font-bold p-1 px-4">1.50</span>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Sidebar end -->
    </div>
    <div class="md:hidden bg-emerald-700">
        <div class="bg-emerald-700">
            <h4 class="text-white font-bold p-1 text-center">Upcomming Match</h4>
        </div>
        <div>
            <div class="accordion p-1" id="accordionExample5">
                <div class="accordion-item bg-white border border-gray-200">
                    <h2 class="accordion-header mb-0" id="headingTwo5">
                        <button class="
                      accordion-button
                      collapsed
                      relative
                      flex
                      items-center
                      w-full
                      py-2
                      px-5
                      text-base text-gray-700 text-left
                      bg-green-100
                      border-0
                      rounded-none
                      transition
                      focus:outline-none
                    " type="button" data-bs-toggle="collapse" data-bs-target="#collapse2" aria-expanded="false"
                            aria-controls="collapse2" style="border-radius: 0;">
                            <div class="shrink-0">
                                <img class="h-12 w-12" src="{{asset('static')}}/img/cricket-logo.png" alt="ChitChat Logo">
                            </div>

                            <div class="flex flex-col ml-2">
                                <span class="font-semibold">Bangladesh Vs Srilanka</span>
                                <span class="text-orange-700 text-sm font-semibold">Chaina Division 1</span>
                                <div class="text-sm">
                                    <span>
                                        <i class="fas fa-calendar-alt"></i>
                                        28 September 2022
                                    </span>
                                    <span>
                                        <i class="far fa-clock"></i>
                                        10:05 PM
                                    </span>
                                </div>
                            </div>
                        </button>
                    </h2>
                    <div id="collapse2" class="accordion-collapse collapse show" aria-labelledby="headingTwo5">
                        <div class="accordion-body py-2">
                            <div>
                                <div class="text-white bg-gray-200 border">
                                    <h4 class="text-gray-600 font-bold p-1">Who win the match</h4>
                                </div>
                                <div class="flex justify-between space-x-1 p-2 text-sm">
                                    <div class="flex justify-between bg-emerald-600 w-full rounded-sm ">
                                        <span class="text-white font-bold p-1">Bangladesh</span>
                                        <span class="bg-emerald-800 text-white font-bold p-1 px-4">2.50</span>
                                    </div>
                                    <div class="flex justify-between bg-emerald-600 w-full rounded-sm">
                                        <span class="text-white font-bold p-1">Srilanka</span>
                                        <span class="bg-emerald-800 text-white font-bold p-1 px-4">1.50</span>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <div class="text-white bg-gray-200 border">
                                    <h4 class="text-gray-600 font-bold p-1">Who win the match</h4>
                                </div>
                                <div class="flex justify-between space-x-1 p-2 text-sm">
                                    <div class="flex justify-between bg-emerald-600 w-full rounded-sm ">
                                        <span class="text-white font-bold p-1">Bangladesh</span>
                                        <span class="bg-emerald-800 text-white font-bold p-1 px-4">2.50</span>
                                    </div>
                                    <div class="flex justify-between bg-emerald-600 w-full rounded-sm">
                                        <span class="text-white font-bold p-1">Srilanka</span>
                                        <span class="bg-emerald-800 text-white font-bold p-1 px-4">1.50</span>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <div class="text-white bg-gray-200 border">
                                    <h4 class="text-gray-600 font-bold p-1">Who win the match</h4>
                                </div>
                                <div class="flex justify-between space-x-1 p-2 text-sm">
                                    <div class="flex justify-between bg-emerald-600 w-full rounded-sm ">
                                        <span class="text-white font-bold p-1">Bangladesh</span>
                                        <span class="bg-emerald-800 text-white font-bold p-1 px-4">2.50</span>
                                    </div>
                                    <div class="flex justify-between bg-emerald-600 w-full rounded-sm">
                                        <span class="text-white font-bold p-1">Srilanka</span>
                                        <span class="bg-emerald-800 text-white font-bold p-1 px-4">1.50</span>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
