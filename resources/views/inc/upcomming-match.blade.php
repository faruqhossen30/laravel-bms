@if (!empty($match->questions) && $match->questions->count())
    @foreach ($match->questions as $key => $question)
        @if ($question->status == 'active' && $question->is_hide == '0')
            <div>
                <div class="text-white bg-gray-200 border">
                    <h4 class="text-gray-600 font-bold p-1">{{ $question->name }}</h4>
                </div>
                <div class="flex justify-between space-x-1 p-2 text-sm ">
                    @if (!empty($question->options) && $match->questions->count())
                        @foreach ($question->options as $key => $option)
                            @if ($option->status == 'active' && $option->is_hide == '0')
                                <div class="flex justify-between bg-emerald-600 w-full rounded-sm {{ $match->is_active == '1' && $question->is_active == '1' ? 'betInfo' : '' }}"
                                    @auth data-bs-toggle="modal" data-bs-target="#betModal" @endauth
                                    @guest data-bs-toggle="modal" data-bs-target="#loginModal" @endguest
                                    data-id="{{ $option->id }}">
                                    <span class="text-white font-bold p-1">{{ $option->name }}</span>
                                    <span
                                        class="bg-emerald-800 text-white font-bold p-1 px-4">{{ number_format($option->bet_rate, 2) }}</span>
                                </div>
                            @endif
                        @endforeach
                    @endif
                </div>
            </div>
        @endif
    @endforeach
@endif
