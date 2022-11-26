<div class="tab-pane fade" id="tabs-widthdraw" role="tabpanel" aria-labelledby="tabs-widthdraw-tab">
    <div class="flex justify-center ">
        <div class="block rounded-lg shadow-lg bg-white min-w-full">
            <div class="bg-emerald-700 font-bold text-white text-md p-3 border-b border-gray-300 text-left">
                Widthdraw
            </div>
            <div>
                <div class="block p-6 rounded-lg shadow-lg bg-white">
                    <form method="POST" action="{{ route('user.storeWithdraw') }}">
                        @csrf
                        <div class="form-group mb-6">
                            <label for="forPaymentMethord" class="form-label inline-block mb-2 text-gray-700">Method
                                <span class="text-red-600">*</span></label>
                            <select name="method" id="forPaymentMethord"
                                class="form-select appearance-none block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding bg-no-repeat border border-solid border-gray-300 rounded transition ease-in-out m-0  focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                                aria-label="Default select example">
                                <option disabled="" selected=""> Select Method </option>
                                <option value="bKash">Bkash</option>
                                <option value="Rocket">Rocket</option>
                                <option value="Nagad">Nagad</option>
                            </select>
                        </div>
                        <div class="form-group mb-6">
                            <label for="forTypeofwidtddrew" class="form-label inline-block mb-2 text-gray-700">Type
                                <span class="text-red-600">*</span></label>
                            <select name="type" id="forTypeofwidtddrew"
                                class="form-select appearance-none block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding bg-no-repeat border border-solid border-gray-300 rounded transition ease-in-out m-0  focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                                aria-label="Default select example">
                                <option disabled="" selected=""> Select Type </option>
                                <option value="personal">Personal</option>
                                <option value="agent">Agent</option>
                            </select>
                        </div>
                        <div class="form-group mb-6">
                            <label for="forWidthdrawAmount" class="form-label inline-block mb-2 text-gray-700">Amount
                                <span class="text-red-600">*</span></label>
                            <input name="amount" type="number"
                                class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                                id="forWidthdrawAmount" aria-describedby="emailHelp" min="500" max="50000" placeholder="amount">
                        </div>
                        <div class="form-group mb-6">
                            <label for="forWidthdrwayTo" class="form-label inline-block mb-2 text-gray-700">To <span
                                    class="text-red-600">*</span></label>
                            <input name="account" type="text"
                                class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                                id="forWidthdrwayTo" aria-describedby="emailHelp" placeholder="Enter account number">
                        </div>
                        <div class="form-group mb-6">
                            <label for="forWidthdrayPass" class="form-label inline-block mb-2 text-gray-700">Password
                                <span class="text-red-600">*</span></label>
                            <input name="password" type="password"
                                class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                                id="forWidthdrayPass" aria-describedby="emailHelp" placeholder="Password">
                        </div>

                        <button type="submit"
                            class="px-6 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out">Balance
                            Widthdraw</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
