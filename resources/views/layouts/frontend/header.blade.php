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
