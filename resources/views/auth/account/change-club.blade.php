<div class="tab-pane fade" id="tabs-changeclub" role="tabpanel" aria-labelledby="tabs-changeclub-tab">
    <div class="flex justify-center ">
        <div class="block rounded-lg shadow-lg bg-white min-w-full">
            <div class="bg-emerald-700 font-bold text-white text-md p-3 border-b border-gray-300 text-left">
                Change Club
            </div>
            <div>
                <div class="block p-6 rounded-lg shadow-lg bg-white">
                    <form method="POST" action="{{ route('change.profile') }}">
                        @csrf
                        <div class="form-group mb-6">
                            <label for="forClub" class="form-label inline-block mb-2 text-gray-700">Club
                                <span class="text-red-600">*</span></label>
                            <select name="method" id="forClub"
                                class="form-select appearance-none block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding bg-no-repeat border border-solid border-gray-300 rounded transition ease-in-out m-0  focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                                aria-label="Default select example">
                                @if (!empty($clubs) && $clubs->count())
                                    @foreach ($clubs as $key => $club)
                                        <option value="{{ $club->id }}"
                                            {{ $user->club_id == $club->id ? 'selected' : '' }}>{{ $club->name }}
                                        </option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                        <div class="form-group mb-6">
                            <label for="forPassword" class="form-label inline-block mb-2 text-gray-700">Password
                                <span class="text-red-600">*</span></label>
                            <input name="password" type="password"
                                class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                                id="forPassword" aria-describedby="emailHelp" placeholder="Password">
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
                            Club</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
