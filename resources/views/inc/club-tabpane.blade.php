<div class="flex flex-start text-white font-semibold space-x-1 text-center py-2">
    <a href="{{ url('club/statement') }}"
        class="bg-emerald-700 hover:bg-white hover:text-emerald-800 p-2 border-r-2 border-gray-200">All Bets</a>
    <a href="{{ url('club/statement?sec=withdraw') }}"
        class="bg-emerald-700 hover:bg-white hover:text-emerald-800 p-2 border-r-2 border-gray-200">All
        Widthdraw</a>
    <a href="{{ url('club/statement?sec=transfer') }}"
        class="bg-emerald-700 hover:bg-white hover:text-emerald-800 p-2 border-r-2 border-gray-200">Balance
        Transfer</a>
    <a href="{{ url('club/statement?sec=transaction') }}"
        class="bg-emerald-700 hover:bg-white hover:text-emerald-800 p-2">Transaction History</a>
</div>
