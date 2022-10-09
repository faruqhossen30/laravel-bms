<div class="tab-pane fade" id="tabs-deposite" role="tabpanel" aria-labelledby="tabs-deposite-tab">
    <div class="flex justify-center ">
        <div class="block rounded-lg shadow-lg bg-white min-w-full">
            <div class="bg-emerald-700 font-bold text-white text-md p-3 border-b border-gray-300 text-left">
                Deposite
            </div>
            <div>
                <div class="block p-6 rounded-lg shadow-lg bg-white">
                    <form method="POST" action="{{ route('user.storeDeposit') }}">
                        @csrf
                        <div class="form-group mb-6">
                            <label for="forMethord" class="form-label inline-block mb-2 text-gray-700">Method
                                <span class="text-red-600">*</span></label>
                            <select name="method" id="forMethord"
                                class="form-select appearance-none block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding bg-no-repeat border border-solid border-gray-300 rounded transition ease-in-out m-0  focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                                aria-label="Default select example" required>
                                <option selected>Bkash</option>
                            </select>
                        </div>
                        <div class="form-group mb-6">
                            <label for="forTo" class="form-label inline-block mb-2 text-gray-700">To <span
                                    class="text-red-600">*</span></label>
                            <select name="to_account" id="forTo"
                                class="form-select appearance-none block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding bg-no-repeat border border-solid border-gray-300 rounded transition ease-in-out m-0  focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                                aria-label="Default select example" required>
                                <option selected value="{{ $bkash->account_number }}">{{ $bkash->account_number }}
                                    ({{ $bkash->type }})</option>
                            </select>
                        </div>
                        <div class="form-group mb-6">
                            <label for="forAmountLabel" class="form-label inline-block mb-2 text-gray-700">Amount
                                <span class="text-red-600">*</span></label>
                            <input name="amount" type="number"
                                class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                                id="forAmountLabel" aria-describedby="emailHelp" placeholder="Amount" required>
                        </div>
                        <div class="form-group mb-6">
                            <label for="forFromLabel" class="form-label inline-block mb-2 text-gray-700">From
                                <span class="text-red-600">*</span></label>
                            <input name="from_account" type="text"
                                class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                                id="forFromLabel" aria-describedby="emailHelp" placeholder="Account Number">
                        </div>
                        <div class="form-group mb-6">
                            <label for="froTransctionNumber"
                                class="form-label inline-block mb-2 text-gray-700">Transection Number <span
                                    class="text-red-600">*</span></label>
                            <input name="transaction" type="text"
                                class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                                id="froTransctionNumber" aria-describedby="emailHelp" placeholder="Transaction">
                        </div>

                        <button type="submit" class="px-6 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out">Deposite</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
