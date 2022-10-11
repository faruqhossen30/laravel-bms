<div class="tab-pane fade" id="tabs-clubsetting" role="tabpanel" aria-labelledby="tabs-clubsetting-tab">
    <div class="flex justify-center ">
        <div class="block rounded-lg shadow-lg bg-white min-w-full">
            <div class="bg-emerald-700 font-bold text-white text-md p-3 border-b border-gray-300 text-left">
                Widthdraw
            </div>
            <div>
                <div class="block p-6 rounded-lg shadow-lg bg-white">
                    <form method="POST" action="{{ route('club.profileSetting') }}">
                        @csrf
                        <div class="form-group mb-6">
                            <label for="forWidthdrawAmount" class="form-label inline-block mb-2 text-gray-700">Amount
                                <span class="text-red-600">*</span></label>
                            <input name="club_owner" value="{{ Auth::user()->club_owner }}" type="text"
                                class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                                id="forWidthdrawAmount" aria-describedby="emailHelp" placeholder="Full Name">
                        </div>
                        <div class="form-group mb-6">
                            <label for="forWidthdrwayTo" class="form-label inline-block mb-2 text-gray-700">Club Mobile <span
                                    class="text-red-600">*</span></label>
                            <input name="club_mobile" value="{{ Auth::user()->club_mobile }}" type="text"
                                class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                                id="forWidthdrwayTo" aria-describedby="emailHelp" placeholder="Club Mobile">
                        </div>

                        <div class="form-group mb-6">
                            <label for="forAddress" class="form-label inline-block mb-2 text-gray-700">Club Address<span
                                    class="text-red-600">*</span></label>
                            <input name="club_address" value="{{ Auth::user()->club_address }}" type="text"
                                class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                                id="forAddress" aria-describedby="emailHelp" placeholder="Club Address">
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
