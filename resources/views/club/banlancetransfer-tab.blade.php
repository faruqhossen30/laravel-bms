<div class="tab-pane fade" id="tabs-transferbalance" role="tabpanel" aria-labelledby="tabs-transferbalance-tab">
    <div class="flex justify-center ">
        <div class="block rounded-lg shadow-lg bg-white min-w-full">
            <div class="bg-emerald-700 font-bold text-white text-md p-3 border-b border-gray-300 text-left">
                Transfer Balance
            </div>
            <div>
                <div class="block p-6 rounded-lg shadow-lg bg-white">
                    <form method="POST" action="{{ route('club.balanceTransfer') }}">
                        @csrf
                        <div class="form-group mb-6">
                            <label for="forFrom" class="form-label inline-block mb-2 text-gray-700">From
                                <span class="text-red-600">*</span></label>
                            <input name="from" type="text" disabled
                                class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                                id="forFrom" aria-describedby="emailHelp" placeholder="From"
                                value="{{ Auth::user()->username }}">
                        </div>
                        <div class="form-group mb-6">
                            <label for="forToUser" class="form-label inline-block mb-2 text-gray-700">To User
                                <span class="text-red-600">*</span></label>
                            <input name="to_username" type="text"
                                class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                                id="forToUser" aria-describedby="emailHelp" placeholder="username" required>
                        </div>
                        <div class="form-group mb-6">
                            <label for="forAmount" class="form-label inline-block mb-2 text-gray-700">Amount
                                <span class="text-red-600">*</span></label>
                            <input name="amount" type="number"
                                class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                                id="forAmount" aria-describedby="emailHelp" placeholder="Enter amount">
                        </div>
                        <div class="form-group mb-6">
                            <label for="forPassword" class="form-label inline-block mb-2 text-gray-700">Password
                                <span class="text-red-600">*</span></label>
                            <input name="password" type="password"
                                class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                                id="forPassword" aria-describedby="emailHelp" placeholder="Password">
                        </div>

                        <button type="submit"
                            class="px-6 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out">Balance
                            Transfer</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
