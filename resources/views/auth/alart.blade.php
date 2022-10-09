@extends('layouts.frontend.master')
@section('title', 'Welcome To ' . $bs->site_name)
@section('content')
    <div class="bg-white p-2">

        @if (!empty($alarts) && $alarts->count())
            @foreach ($alarts as $alart)
                <div class="alert bg-yellow-100 rounded-lg py-5 px-6 mb-3 text-base text-yellow-700 inline-flex items-center w-full alert-dismissible fade show"
                    role="alert">
                    <strong class="mr-1"> {{ $alart->title }} </strong>  {{ $alart->description }}
                    <button type="button"
                        class="box btn-close box-content w-4 h-4 p-1 ml-auto text-blue-600 border-none rounded-none opacity-50 focus:shadow-none focus:outline-none focus:opacity-100 hover:text-yellow-900 hover:opacity-75 hover:no-underline"
                        data-bs-dismiss="alert" aria-label="Close" data-id="{{ $alart->id }}">X</button>
                </div>
            @endforeach
        @else
            <b> No alarts found! </b>
        @endif
    </div>
@endsection

@push('script')
<script>
    $(document).ready(function() {

        $('.box').bind('click', function() {
            var selectedid = $(this).data('id');
            $.ajax({
                type: 'post',
                url: "{{ route('user.updateAlart') }}",
                data: {
                    '_token': $('input[name=_token]').val(),
                    'alart_id': selectedid
                },

            });

            $(this).fadeOut(500, function() {
                $(this).remove();
            });

        });

        $('#method').on('change', function(e) {
            var methodName = e.target.value;
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            })
        });

    });
</script>
@endpush
