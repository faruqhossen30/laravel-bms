{{-- Modal --}}
<div>
    <!-- Login Modal -->
    <div class="modal fade fixed top-0 left-0 hidden w-full h-full outline-none overflow-x-hidden overflow-y-auto"
        id="depositeModal" tabindex="-1" aria-labelledby="depositeModalLabel" aria-hidden="true">
        <div class="modal-dialog relative w-auto pointer-events-none">
            <div
                class="modal-content border-none shadow-lg relative flex flex-col w-full pointer-events-auto bg-white bg-clip-padding rounded-md outline-none text-current">
                <div
                    class="modal-header flex flex-shrink-0 items-center justify-between p-4 border-b border-gray-200 rounded-t-md">
                    <h5 class="text-xl font-medium leading-normal text-gray-800" id="depositeModalLabel">
                        Deposite Now !
                    </h5>
                    <button type="button"
                        class="btn-close box-content w-4 h-4 p-1 text-black border-none rounded-none opacity-50 focus:shadow-none focus:outline-none focus:opacity-100 hover:text-black hover:opacity-75 hover:no-underline"
                        data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body relative p-4">
                    <div class="block p-2 rounded-lg shadow-lg bg-white">
                        <form method="POST" action="{{ route('user.storeDeposit') }}">
                            @csrf
                            <div class="form-group mb-3">
                                <label for="forMethord" class="form-label inline-block mb-2 text-gray-700">Method
                                    <span class="text-red-600">*</span></label>
                                <select name="method" id="forMethord"
                                    class="form-select appearance-none block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding bg-no-repeat border border-solid border-gray-300 rounded transition ease-in-out m-0  focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                                    aria-label="Default select example" required>
                                    <option selected>Bkash</option>
                                </select>
                            </div>
                            <div class="form-group mb-3">
                                <label for="forTo" class="form-label inline-block mb-2 text-gray-700">To <span
                                        class="text-red-600">*</span></label>
                                <select name="to_account" id="forTo"
                                    class="form-select appearance-none block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding bg-no-repeat border border-solid border-gray-300 rounded transition ease-in-out m-0  focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                                    aria-label="Default select example" required>
                                    <option selected value="{{ $bkash->account_number }}">{{ $bkash->account_number }}
                                        ({{ $bkash->type }})</option>
                                </select>
                            </div>
                            <div class="form-group mb-3">
                                <label for="forAmountLabel" class="form-label inline-block mb-2 text-gray-700">Amount
                                    <span class="text-red-600">*</span></label>
                                <input name="amount" type="number"
                                    class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                                    id="forAmountLabel" aria-describedby="emailHelp" placeholder="Amount" required>
                            </div>
                            <div class="form-group mb-3">
                                <label for="forFromLabel" class="form-label inline-block mb-2 text-gray-700">From
                                    <span class="text-red-600">*</span></label>
                                <input name="from_account" type="text"
                                    class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                                    id="forFromLabel" aria-describedby="emailHelp" placeholder="Account Number">
                            </div>
                            <div class="form-group mb-3">
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
</div>
