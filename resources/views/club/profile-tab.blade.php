<div class="tab-content" id="tabs-tabContent">
    <div class="tab-pane fade show active " id="tabs-profile" role="tabpanel" aria-labelledby="tabs-profile-tab">
        <div class="flex justify-center ">
            <div class="block rounded-lg shadow-lg bg-white min-w-full">
                <div class="bg-emerald-700 font-bold text-white text-md p-3 border-b border-gray-300 text-left">
                    Profile Info
                </div>
                <div class="p-2 grid grid-cols-12 gap-4">
                    <div class="col-span-12 md:col-span-6 bg-green-100 flex justify-between place-items-center">
                        <div class="p-3 text-center">
                            <span class="font-bold">{{ $bs->currency_symbol }}
                                {{ number_format(Auth::user()->balance, 2) }}</span> <br>
                            <span class="text-orange-700">Balance</span>
                        </div>
                        <div>
                            <span class="text-3xl p-4 text-emerald-700"><i class="fas fa-money-check-alt"></i></span>
                        </div>
                    </div>
                    <div class="col-span-12 md:col-span-6 bg-green-100 flex justify-between place-items-center">
                        <div class="p-3 text-center">
                            <span class="font-bold">{{ Auth::user()->clubUsers->count() }}</span> <br>
                            <span class="text-orange-700 ">Total Referral</span>
                        </div>
                        <div>
                            <span class="text-3xl p-4 text-emerald-700"><i class="fas fa-users"></i></span>
                        </div>
                    </div>
                </div>
                <div class="py-3">
                    <div class="flex flex-col">
                        <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                            <div class="px-2 inline-block min-w-full sm:px-6 lg:px-8">
                                <div class="overflow-hidden p-3">
                                    <table class="min-w-full border text-center text-sm">
                                        <tbody>
                                            <tr class="border-b font-bold text-left">
                                                <td class="border-r p-2">1</td>
                                                <td class="border-r p-2">Full Name</td>
                                                <td class="border-r p-2">: {{ Auth::user()->name }}</td>
                                            </tr>
                                            <tr class="border-b font-bold text-left">
                                                <td class="border-r p-2">2</td>
                                                <td class="border-r p-2">Username</td>
                                                <td class="border-r p-2">: {{ Auth::user()->username }}</td>
                                            </tr>
                                            <tr class="border-b font-bold text-left">
                                                <td class="border-r p-2">3</td>
                                                <td class="border-r p-2">Mobile</td>
                                                <td class="border-r p-2">: {{ Auth::user()->mobile }} </td>
                                            </tr>
                                            <tr class="border-b font-bold text-left">
                                                <td class="border-r p-2">4</td>
                                                <td class="border-r p-2">Email</td>
                                                <td class="border-r p-2">: {{ Auth::user()->email }} </td>
                                            </tr>
                                            <tr class="border-b font-bold text-left">
                                                <td class="border-r p-2">5</td>
                                                <td class="border-r p-2">Club</td>
                                                <td class="border-r p-2">:
                                                    @if (!empty(Auth::user()->club))
                                                        <span> {{ Auth::user()->club->name }} </span>
                                                    @else
                                                        <span>Not Found</span>
                                                    @endif
                                                </td>
                                            </tr>
                                            <tr class="border-b font-bold text-left">
                                                <td class="border-r p-2">6</td>
                                                <td class="border-r p-2">Sponsor</td>
                                                <td class="border-r p-2">:
                                                    @if (!empty(Auth::user()->sponsor))
                                                        <span> {{ Auth::user()->sponsor->username }} </span>
                                                    @else
                                                        <span>Not Found</span>
                                                    @endif
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
