@extends('layouts.frontend.master')

@section('title')
Alarts | {{ $bs->site_name }}
@endsection

@section('content')

<section id="dashboard">
    <div class="container">
        <div class="row">

            <div class="col-md-12 col-xl-12">
                <div class="tab-content">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title mb-0">Alarts</h5>
                        </div>
                        <div class="card-body p-2">
                            @if(!empty($alarts) && $alarts->count())
                            @foreach($alarts as $alart)
                            <div class="box alert alert-primary" data-id="{{ $alart->id }}">
                                <button type="button" class="close">
                                    ×</button>
                                <strong>
                                    {{ $alart->title }}
                                </strong>
                                <hr class="message-inner-separator">
                                <p>
                                    {{ $alart->description }}
                                </p>
                            </div>
                            @endforeach
                            @else
                            <b> No alarts found! </b>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
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