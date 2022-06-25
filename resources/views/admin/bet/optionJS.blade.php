<script>
$(document).ready(function () {

// Url
var urlOption = "{{ url('tib-admin/options') }}";

// Edit Option
$(document).on('click', '.edit-option', function () {
    var data_id = $(this).data("id");
    $.get(urlOption + '/' + data_id, function (data) {
        $('#OptionForm').trigger("reset");
        $('.option-modal-title').html("Edit Option");
        $('#option_question_id').val(data.question_id);
        $('#option_match_id').val(data.match_id);
        $('.question-title').html(data.question.name);
        $('#option_data_id').val(data.id);
        $('#option_name').val(data.name);
        $('#option_bet_rate').val(data.bet_rate);
        $('#save-option').val('update');
        $('#OptionModal').modal('show');
    })
});

// Save or update question

$("#save-option").click(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    var formData = {
        name: $('#option_name').val(),
        question_id: $('#option_question_id').val(),
        match_id: $('#option_match_id').val(),
        bet_rate: $('#option_bet_rate').val()
    }
    //used to determine the http verb to use [add=POST], [update=PUT]
    var state = $('#save-option').val();
    var type = "POST"; //for creating new resource
    var data_id = $('#option_data_id').val();
    var my_url = urlOption;
    if (state == "update") {
        type = "PUT"; //for updating existing resource
        my_url += '/' + data_id;
    }
    $.ajax({
        type: type,
        url: my_url,
        data: formData,
        dataType: 'json',
        success: function (data) {
            console.log(data);
            $('#OptionForm').trigger("reset");
            if (state == "update") {
                $('#OptionModal').modal('hide')
            }
        },
        error: function (data) {
            console.log('Error:', data);
        }
    });
});

//Run Option
$(document).on('click', '#option-run', function () {
    var data_id = $(this).data("id");
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        type: "PUT",
        url: urlOption + '/run/' + data_id,
        success: function (data) {},
        error: function (data) {
            console.log('Error:', data);
        }
    });
});

//Stop Option
$(document).on('click', '#option-stop', function () {
    var data_id = $(this).data("id");
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        type: "PUT",
        url: urlOption + '/stop/' + data_id,
        success: function (data) {},
        error: function (data) {
            console.log('Error:', data);
        }
    });
});

//Show Option
$(document).on('click', '#option-show', function () {
    var data_id = $(this).data("id");
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        type: "PUT",
        url: urlOption + '/show/' + data_id,
        success: function (data) {},
        error: function (data) {
            console.log('Error:', data);
        }
    });
});

//Hide Option
$(document).on('click', '#option-hide', function () {
    var data_id = $(this).data("id");
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        type: "PUT",
        url: urlOption + '/hide/' + data_id,
        success: function (data) {},
        error: function (data) {
            console.log('Error:', data);
        }
    });
});

//Close Option
$(document).on('click', '#option-close', function () {
    var data_id = $(this).data("id");
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        type: "PUT",
        url: urlOption + '/close/' + data_id,
        success: function (data) {},
        error: function (data) {
            console.log('Error:', data);
        }
    });
});

//Question Limit
$(document).on('click', '#option-limit', function () {
    var data_id = $(this).data("id");
    $.get(urlOption + '/' + data_id, function (data) {
        $('#OptionLimitForm').trigger("reset");
        $('#option_id').val(data_id);
        $('.option-title').html(data.name);
        $('#option_bet_limit').val(data.bet_limit);
        $('#option-limit-btn').val("update");
        $('#OptionLimitModal').modal('show')
    })
});

// Update Option Limit

$("#option-limit-btn").click(function () {

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    var formData = {
        bet_limit: $('#option_bet_limit').val(),
    }
    //used to determine the http verb to use [add=POST], [update=PUT]
    var state = $('#option-limit-btn').val();
    var type = "POST"; //for creating new resource
    var data_id = $('#option_id').val();
    var my_url = urlOption;
    if (state == "update") {
        type = "PUT"; //for updating existing resource
        my_url += '/' + data_id;
    }
    $.ajax({
        type: type,
        url: my_url,
        data: formData,
        dataType: 'json',
        success: function (data) {
            $('#OptionLimitForm').trigger("reset");
            $('#OptionLimitModal').modal('hide')
        },
        error: function (data) {
            console.log('Error:', data);
        }
    });
});

//Win Option
$(document).on('click', '#option-win', function () {
    var data_id = $(this).data("id");
    var confirmation = confirm('Are you sure you want to win the option?');
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    if (confirmation == true) {
        $.ajax({
            type: "PUT",
            url: urlOption + '/win/' + data_id,
            success: function (data) {},
            error: function (data) {
                console.log('Error:', data);
            }
        });
    }
});

});
</script>