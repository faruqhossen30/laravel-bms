<div class="block p-6 rounded-lg shadow-lg bg-white">
    <div>
        {{-- {{$option}} --}}
        <h4 class="text-gray-600 font-semibold p-1">{{$match_details}}  <span class="bg-red-600 text-white p-1">Live</span>
        </h4>
        <h5 class="text-gray-600 font-light p-1">{{$option->question->name}}</h5>
        <h5 class="text-gray-600 font-light p-1">{{$option->name}} <span class="bg-red-600 text-white p-1" id="betRate" data-betrate="{{$option->bet_rate}}">{{$option->bet_rate}}</span></h5>
    </div>
    <form method="POST" action="{{ route('user.bet') }}">
        @csrf
            <div class="flex space-x-4 py-2">
                <label class="cursor-pointer border border-green-800 rounded-full py-1 px-4">
                    <input type="radio" class="plan_name" name="amount" value="100"  style="display:none">100
                 </label>
                <label class="cursor-pointer border border-green-800 rounded-full py-1 px-4">
                    <input type="radio" class="plan_name" name="amount" value="500"  style="display:none">500
                 </label>
                <label class="cursor-pointer border border-green-800 rounded-full py-1 px-4">
                    <input type="radio" class="plan_name" name="amount" value="1000" style="display:none" >1000
                 </label>
                <label class="cursor-pointer border border-green-800 rounded-full py-1 px-4">
                    <input type="radio" class="plan_name" name="amount" value="3000" style="display:none" >3000
                 </label>
                <label class="cursor-pointer border border-green-800 rounded-full py-1 px-4">
                    <input type="radio" class="plan_name" name="amount" value="5000" style="display:none" >5000
                 </label>
            </div>
            <input type="hidden" name="option_id" value="{{$option->id}}">
            <div class="form-group mb-6">

                <input name="predict_amount" type="number" value=""
                    class="selected_plan block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                    id="forModalName" aria-describedby="emailHelp" placeholder="Amoount">
            </div>

            <div class="py-2 space-y-2">
                <div class="flex justify-between bg-emerald-600 w-full rounded-sm"
                    data-bs-toggle="modal" data-bs-target="#betModal" data-id="{{ $option->id }}">
                    <span class="text-white font-light p-1">Total Stake</span>
                    <span class="bg-emerald-800 text-white font-light p-1 px-4 stake">0</span>
                </div>
                <div class="flex justify-between bg-emerald-600 w-full rounded-sm "
                    data-bs-toggle="modal" data-bs-target="#betModal" data-id="{{ $option->id }}">
                    <span class="text-white font-light p-1">Possible To Win </span>
                    <span class="bg-emerald-800 text-white font-light p-1 px-4 retunt">0</span>
                </div>
            </div>


        <button type="submit" class="px-6 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out">Submit !</button>
    </form>
</div>
