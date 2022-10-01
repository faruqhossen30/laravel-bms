<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{asset('static/tailwindcss/output.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.7.1/css/all.min.css"
        integrity="sha512-3M00D/rn8n+2ZVXBO9Hib0GKNpkm8MSUU/e2VNthDyBYxKWG+BftNYYcuEjXlyrSO637tidzMBXfE7sQm0INUg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tw-elements/dist/css/index.min.css" />

    <style>
        .accordion-button:after {
            background-image: none
        }
    </style>
</head>

<body class="bg-emerald-900 h-screen">
    <header class="sticky top-0 z-50">
        <div class="flex h-14 px-2 bg-emerald-800 border-b-2 border-emerald-600 ">
            <a href="#" class="flex items-center mr-4">
                <img src="{{asset('static')}}/img/logo.png" class="h-8" alt="">
            </a>
            <div class="flex sm:justify-end md:justify-between flex-grow items-center">
                <div class="hidden md:block text-white font-bold space-x-3">
                    <a href="#" class="i">Home </a>
                    <a href="#">Home </a>
                    <a href="#">Home </a>
                </div>
                <div class="space-x-2">
                    <button type="button"
                        class="inline-block px-6 py-2.5 bg-white text-emerald-800 font-bold text-xs leading-tight uppercase rounded shadow-md hover:bg-yellow-700 hover:shadow-lg focus:bg-yellow-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-yellow-800 active:shadow-lg transition duration-150 ease-in-out"
                        data-bs-toggle="modal" data-bs-target="#registerModal">Register</button>
                    <button type="button"
                        class="inline-block px-6 py-2.5 bg-white text-emerald-800 font-bold text-xs leading-tight uppercase rounded shadow-md hover:bg-yellow-700 hover:shadow-lg focus:bg-yellow-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-yellow-800 active:shadow-lg transition duration-150 ease-in-out"
                        data-bs-toggle="modal" data-bs-target="#loginModal">Login</button>
                </div>
            </div>
        </div>
    </header>
    {{-- Modal --}}
    <div>
        <!-- Login Modal -->
        <div class="modal fade fixed top-0 left-0 hidden w-full h-full outline-none overflow-x-hidden overflow-y-auto"
            id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
            <div class="modal-dialog relative w-auto pointer-events-none">
                <div
                    class="modal-content border-none shadow-lg relative flex flex-col w-full pointer-events-auto bg-white bg-clip-padding rounded-md outline-none text-current">
                    <div
                        class="modal-header flex flex-shrink-0 items-center justify-between p-4 border-b border-gray-200 rounded-t-md">
                        <h5 class="text-xl font-medium leading-normal text-gray-800" id="loginModalLabel">Wellcome To
                            NetT20.Com
                        </h5>
                        <button type="button"
                            class="btn-close box-content w-4 h-4 p-1 text-black border-none rounded-none opacity-50 focus:shadow-none focus:outline-none focus:opacity-100 hover:text-black hover:opacity-75 hover:no-underline"
                            data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body relative p-4">
                        <div class="block p-6 rounded-lg shadow-lg bg-white">
                            <form>
                                <div class="form-group mb-6">
                                    <label for="exampleInputEmail1"
                                        class="form-label inline-block mb-2 text-gray-700">Username/Email</label>
                                    <input type="email"
                                        class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                                        id="exampleInputEmail1" aria-describedby="emailHelp"
                                        placeholder="Username or Email">

                                </div>
                                <div class="form-group mb-6">
                                    <label for="exampleInputPassword1"
                                        class="form-label inline-block mb-2 text-gray-700">Password</label>
                                    <input type="password" class="form-control block
                                  w-full
                                  px-3
                                  py-1.5
                                  text-base
                                  font-normal
                                  text-gray-700
                                  bg-white bg-clip-padding
                                  border border-solid border-gray-300
                                  rounded
                                  transition
                                  ease-in-out
                                  m-0
                                  focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                                        id="exampleInputPassword1" placeholder="Password">
                                </div>

                                <button type="submit" class="
                                px-6
                                py-2.5
                                bg-blue-600
                                text-white
                                font-medium
                                text-xs
                                leading-tight
                                uppercase
                                rounded
                                shadow-md
                                hover:bg-blue-700 hover:shadow-lg
                                focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0
                                active:bg-blue-800 active:shadow-lg
                                transition
                                duration-150
                                w-full
                                ease-in-out">Login</button>
                                <a href="#!"
                                    class="text-blue-600 hover:text-blue-700 focus:text-blue-700 transition duration-200 ease-in-out">Forgot
                                    password?</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade fixed top-0 left-0 hidden w-full h-full outline-none overflow-x-hidden overflow-y-auto"
            id="registerModal" tabindex="-1" aria-labelledby="registerModalLabel" aria-modal="true" role="dialog">
            <div class="modal-dialog modal-lg relative w-auto pointer-events-none">
                <div
                    class="modal-content border-none shadow-lg relative flex flex-col w-full pointer-events-auto bg-white bg-clip-padding rounded-md outline-none text-current">
                    <div
                        class="modal-header flex flex-shrink-0 items-center justify-between p-2 ml-2 border-b border-gray-200 rounded-t-md">
                        <h5 class="text-xl font-medium leading-normal text-gray-800" id="registerModalLabel">
                            Register Your Account !
                        </h5>
                        <button type="button"
                            class="btn-close box-content w-4 h-4 p-1 text-black border-none rounded-none opacity-50 focus:shadow-none focus:outline-none focus:opacity-100 hover:text-black hover:opacity-75 hover:no-underline"
                            data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body relative p-4">
                        <div class="block p-6 rounded-lg shadow-lg bg-white">
                            <form>
                                <div class="grid grid-cols-2 gap-4">
                                    <div class="form-group mb-6">
                                        <label for="exampleInputEmail1"
                                            class="form-label inline-block mb-2 text-gray-700">Full Name<span class="text-red-600">*</span></label>
                                        <input type="text"
                                            class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                                            id="exampleInputEmail1" aria-describedby="emailHelp"
                                            placeholder="Full Name">

                                    </div>
                                    <div class="form-group mb-6">
                                        <label for="exampleInputEmail1"
                                            class="form-label inline-block mb-2 text-gray-700">Username <span class="text-red-600">*</span></label>
                                        <input type="text"
                                            class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                                            id="exampleInputEmail1" aria-describedby="emailHelp"
                                            placeholder="Username">

                                    </div>
                                </div>
                                <div class="grid grid-cols-2 gap-4">

                                    <div class="form-group mb-6">
                                        <label for="exampleInputEmail1"
                                            class="form-label inline-block mb-2 text-gray-700">Mobile <span class="text-red-600">*</span></label>
                                        <input type="text"
                                            class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                                            id="exampleInputEmail1" aria-describedby="emailHelp"
                                            placeholder="Mobile no">
                                    </div>
                                    <div class="form-group mb-6">
                                        <label for="exampleInputEmail1"
                                            class="form-label inline-block mb-2 text-gray-700">Email<span class="text-red-600">*</span></label>
                                        <input type="email"
                                            class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                                            id="exampleInputEmail1" aria-describedby="emailHelp"
                                            placeholder="Email">

                                    </div>
                                </div>
                                <div class="grid grid-cols-2 gap-4">

                                    <div class="form-group mb-6">
                                        <label for="exampleInputEmail1"
                                            class="form-label inline-block mb-2 text-gray-700">Select Club <span class="text-red-600">*</span></label>
                                            <select class="form-select appearance-none
                                            block
                                            w-full
                                            px-3
                                            py-1.5
                                            text-base
                                            font-normal
                                            text-gray-700
                                            bg-white bg-clip-padding bg-no-repeat
                                            border border-solid border-gray-300
                                            rounded
                                            transition
                                            ease-in-out
                                            m-0
                                            focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" aria-label="Default select example">
                                              <option selected>Open this select menu</option>
                                              <option value="1">One</option>
                                              <option value="2">Two</option>
                                              <option value="3">Three</option>
                                          </select>
                                    </div>
                                    <div class="form-group mb-6">
                                        <label for="exampleInputEmail1"
                                            class="form-label inline-block mb-2 text-gray-700">Sponser Name<span class="text-red-600">*</span></label>
                                        <input type="text"
                                            class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                                            id="exampleInputEmail1" aria-describedby="emailHelp"
                                            placeholder="Sponser Name">

                                    </div>
                                </div>
                                <div class="grid grid-cols-2 gap-4">
                                    <div class="form-group mb-6">
                                        <label for="exampleInputEmail1"
                                            class="form-label inline-block mb-2 text-gray-700">Password <span class="text-red-600">*</span></label>
                                            <input type="password"
                                            class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                                            id="exampleInputEmail1" aria-describedby="emailHelp"
                                            placeholder="Password">
                                    </div>
                                    <div class="form-group mb-6">
                                        <label for="exampleInputEmail1"
                                            class="form-label inline-block mb-2 text-gray-700">Confirm Password <span class="text-red-600">*</span></label>
                                            <input type="password"
                                            class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                                            id="exampleInputEmail1" aria-describedby="emailHelp"
                                            placeholder="Confirm Password">
                                    </div>
                                </div>

                                <button type="submit" class="
                            px-6
                            py-2.5
                            bg-blue-600
                            text-white
                            font-medium
                            text-xs
                            leading-tight
                            uppercase
                            rounded
                            shadow-md
                            hover:bg-blue-700 hover:shadow-lg
                            focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0
                            active:bg-blue-800 active:shadow-lg
                            transition
                            duration-150
                            w-full
                            ease-in-out">Register Now !</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <section class="">
        <marquee class="text-white text-sm pt-2">
            ❤️ Withdraw লিমিট 500 To 20,000 হাজার টাকা ! উইথড্র ২৪ ঘন্টা চালু পেমেন্ট ১ ঘন্টার মধ্যে [ধন্যবাদ আমার সকল ইউজার ভাইদের]আপনাদের  অর্থ আমাদের কাছে সর্বদা নিরাপদ।❤️
        </marquee>
    </section>
    <!-- Main Section start -->
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
    <!-- Main Section end -->

    <section class="p-2">
        <div class="text-white border">
            <div class="bg-yellow-400">
                <h4 class="text-emerald-800 font-bold p-1">Nocice</h4>
            </div>
            <p class="p-2">Welcome to NetT20.live😍Dear User😍All Time best service ❤️ Withdraw লিমিট 500 To 25,000
                হাজার টাকা ! [All time Withdraw Open ] 😍আপনাদের অর্থ আমাদের কাছে সর্বদা নিরাপদ।❤️</p>
        </div>
    </section>
    <footer class="block w-full md:hidden sticky bottom-0 bg-white text-emerald-700 text-sm">
        <div class="flex justify-around py-1">
            <div class="">
                <a href="#" class="flex flex-col text-center">
                    <i class="fas fa-home"></i>
                    <span>Home</span>
                </a>
            </div>
            <div class="">
                <a href="#" class="flex flex-col text-center">
                    <i class="fas fa-wallet"></i>
                    <span>Wallet</span>
                </a>
            </div>
            <div class="">
                <a href="#" class="flex flex-col text-center">
                    <span class="">
                        <i class="far fa-money-bill-alt"></i>
                    </span>
                    <span>Deposite</span>
                </a>
            </div>
            <div class="">
                <a href="#" class="flex flex-col text-center">
                    <i class="fas fa-th-list"></i>
                    <span>Statement</span>
                </a>
            </div>
            <div class="">
                <a href="#" class="flex flex-col text-center dropdown-toggle" type="button" id="dropdownMenuButton1"
                    data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="fas fa-user-circle"></i>
                    <span>Account</span>
                </a>
                <ul class="
          dropdown-menu
          min-w-max
          absolute
          hidden
          bg-white
          text-base
          z-50
          float-left
          py-2
          list-none
          text-left
          rounded-lg
          shadow-lg
          mt-1
          hidden
          m-0
          bg-clip-padding
          border-none
        " aria-labelledby="dropdownMenuButton1">
                    <li>
                        <a class="
              dropdown-item
              text-sm
              py-2
              px-4
              font-normal
              block
              w-full
              whitespace-nowrap
              bg-transparent
              text-gray-700
              hover:bg-gray-100
            " href="#">Logout </a>
                    </li>

                </ul>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/tw-elements/dist/js/index.min.js"></script>
</body>

</html>
