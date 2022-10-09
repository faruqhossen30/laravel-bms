<div class="tab-pane fade" id="tabs-changepassword" role="tabpanel" aria-labelledby="tabs-changepassword-tab">
    <div class="flex justify-center ">
        <div class="block rounded-lg shadow-lg bg-white min-w-full">
            <div class="bg-emerald-700 font-bold text-white text-md p-3 border-b border-gray-300 text-left">
                Change Password
            </div>
            <div>
                <div class="block p-6 rounded-lg shadow-lg bg-white">
                    <form method="POST" action="{{ route('change.password') }}">
                        @csrf
                        <div class="form-group mb-6">
                            <label for="forCurentPass" class="form-label inline-block mb-2 text-gray-700">Curent
                                Password <span class="text-red-600">*</span></label>
                            <input name="current_password" type="password"
                                class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                                id="forCurentPass" aria-describedby="emailHelp" placeholder="Password" required>
                        </div>
                        <div class="form-group mb-6">
                            <label for="forNewPas" class="form-label inline-block mb-2 text-gray-700">New
                                Password <span class="text-red-600">*</span></label>
                            <input name="new_password" type="password"
                                class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                                id="forNewPas" aria-describedby="emailHelp" placeholder="Password" required>
                        </div>
                        <div class="form-group mb-6">
                            <label for="forConfPass" class="form-label inline-block mb-2 text-gray-700">Confirm
                                Password <span class="text-red-600">*</span></label>
                            <input name="new_confirm_password" type="password"
                                class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                                id="forConfPass" aria-describedby="emailHelp" placeholder="Password" required>
                        </div>

                        <button type="submit"
                            class="
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
                                        ease-in-out">Change
                            Password</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
