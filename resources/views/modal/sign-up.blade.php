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
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="grid grid-cols-2 gap-4">
                            <div class="form-group mb-6">
                                <label for="exampleInputEmail1" class="form-label inline-block mb-2 text-gray-700">Full
                                    Name<span class="text-red-600">*</span></label>
                                <input name="name" type="text"
                                    class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                                    id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Full Name">


                            </div>
                            <div class="form-group mb-6">
                                <label for="exampleInputEmail1"
                                    class="form-label inline-block mb-2 text-gray-700">Username <span
                                        class="text-red-600">*</span></label>
                                <input name="username" type="text"
                                    class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                                    id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Username">

                            </div>
                        </div>
                        <div class="grid grid-cols-2 gap-4">

                            <div class="form-group mb-6">
                                <label for="exampleInputEmail1"
                                    class="form-label inline-block mb-2 text-gray-700">Mobile <span
                                        class="text-red-600">*</span></label>
                                <input name="mobile" type="text"
                                    class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                                    id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Mobile no">
                            </div>
                            <div class="form-group mb-6">
                                <label for="exampleInputEmail1"
                                    class="form-label inline-block mb-2 text-gray-700">Email<span
                                        class="text-red-600">*</span></label>
                                <input name="email" type="email"
                                    class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                                    id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Email">

                            </div>
                        </div>
                        <div class="grid grid-cols-2 gap-4">

                            <div class="form-group mb-6">
                                <label for="exampleInputEmail1"
                                    class="form-label inline-block mb-2 text-gray-700">Select Club <span
                                        class="text-red-600">*</span></label>
                                <select name="club_id"
                                    class="form-select appearance-none
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
                                        focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                                    aria-label="Default select example">
                                    <option value="">Select Club</option>
                                    @if (!empty($clubs) && $clubs->count())
                                        @foreach ($clubs as $key => $club)
                                            <option value="{{ $club->id }}">{{ $club->name }}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                            <div class="form-group mb-6">
                                <label for="exampleInputEmail1"
                                    class="form-label inline-block mb-2 text-gray-700">Sponser Name<span
                                        class="text-red-600">*</span></label>
                                <input name="sponsor" type="text"
                                    class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                                    id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Sponser Name">

                            </div>
                        </div>
                        <div class="grid grid-cols-2 gap-4">
                            <div class="form-group mb-6">
                                <label for="exampleInputEmail1"
                                    class="form-label inline-block mb-2 text-gray-700">Password <span
                                        class="text-red-600">*</span></label>
                                <input name="password"  type="password"
                                    class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                                    id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Password">
                            </div>
                            <div class="form-group mb-6">
                                <label for="exampleInputEmail1"
                                    class="form-label inline-block mb-2 text-gray-700">Confirm Password <span
                                        class="text-red-600">*</span></label>
                                <input name="password_confirmation" id="confirmPassword" type="password"
                                    class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                                    aria-describedby="emailHelp"
                                    placeholder="Confirm Password">
                            </div>
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
                        w-full
                        ease-in-out">Register
                            Now !</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
