<script>
$(document).ready(function () {
// Url
var urlQuestion = "{{ url('tib-admin/questions') }}";

//Question Action Modal
$(document).on('click', '#question_action', function () {
    var data_id = $(this).data("id");
    $('.add-option').val(data_id);
    $('.edit-question').val(data_id);
    $('.close-question').val(data_id);
    $('#QuestionActionModal').modal('show');

});

//Add Option
$(document).on('click', '.add-option', function () {
    var data_id = $(this).val();
    $.get(urlQuestion + '/' + data_id, function (data) {
        console.log(data);
        $('#OptionForm').trigger("reset");
        $('.option-modal-title').html("Add Option");
        $('#option_match_id').val(data.match_id);
        $('#option_question_id').val(data_id);
        $('#QuestionActionModal').modal('hide');
        $('.question-title').html(data.name);
        $('#save-option').val('add');
        $('#OptionModal').modal('show');
    })
});


$(document).on('click', '.edit-question', function () {
    var data_id = $(this).val();
    $.get(urlQuestion + '/' + data_id, function (data) {
        $('#QuestionForm').trigger("reset");
        $('.modal-title').html("Edit Question");
        $('#match_id').val(data.match_id);
        $('#question_id').val(data.id);
        $('#question_name').val(data.name);
        $('#question-title').html(data.name);
        $('#QuestionActionModal').modal('hide');
        $('.match-details').hide();
        $('#save-question').val('update');
        $('#QuestionModal').modal('show');
    })

});


// Save or update question
$("#save-question").click(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    var formData = {
        name: $('#question_name').val(),
        match_id: $('#match_id').val()
    }
    //used to determine the http verb to use [add=POST], [update=PUT]
    var state = $('#save-question').val();
    var type = "POST"; //for creating new resource
    var data_id = $('#question_id').val();
    var my_url = urlQuestion;
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
            $('#QuestionForm').trigger("reset");
            if (state == "update") {
                $('#QuestionModal').modal('hide')
            }
        },
        error: function (data) {
            console.log('Error:', data);
        }
    });
});

//Close Question
$(document).on('click', '.close-question', function () {
    var data_id = $(this).val();
    $('#QuestionActionModal').modal('hide');
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        type: "PUT",
        url: urlQuestion + '/close/' + data_id,
        success: function (data) {},
        error: function (data) {
            console.log('Error:', data);
        }
    });
});

//Question Limit
$(document).on('click', '.question-limit', function () {
    var data_id = $(this).data("id");
    $.get(urlQuestion + '/' + data_id, function (data) {
        $('#QuestionLimitForm').trigger("reset");
        $('#question_limit_id').val(data_id);
        $('.question-title').html(data.name);
        $('#question_bet_limit').val(data.bet_limit);
        $('#question-limit-btn').val("update");
        $('#QuestionLimitModal').modal('show')
    })
});

// Update Match Limit
$("#question-limit-btn").click(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    var formData = {
        bet_limit: $('#question_bet_limit').val(),
    }
    //used to determine the http verb to use [add=POST], [update=PUT]
    var state = $('#question-limit-btn').val();
    var type = "POST"; //for creating new resource
    var data_id = $('#question_limit_id').val();
    var my_url = urlQuestion;
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
            $('#QuestionLimitForm').trigger("reset");
            $('#QuestionLimitModal').modal('hide')
        },
        error: function (data) {
            console.log('Error:', data);
        }
    });
});

// Question Active
$(document).on('click', '.question-active', function () {
    var data_id = $(this).data("id");
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        type: "PUT",
        url: urlQuestion + '/active/' + data_id,
        success: function (data) {},
        error: function (data) {
            console.log('Error:', data);
        }
    });
});

// Question Deactive
$(document).on('click', '.question-deactive', function () {
    var data_id = $(this).data("id");
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        type: "PUT",
        url: urlQuestion + '/deactive/' + data_id,
        success: function (data) {},
        error: function (data) {
            console.log('Error:', data);
        }
    });
});

// Question Hide
$(document).on('click', '.question-hide', function () {
    var data_id = $(this).data("id");
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        type: "PUT",
        url: urlQuestion + '/hide/' + data_id,
        success: function (data) {},
        error: function (data) {
            console.log('Error:', data);
        }
    });
});

// Question Deactive
$(document).on('click', '.question-show', function () {
    var data_id = $(this).data("id");
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        type: "PUT",
        url: urlQuestion + '/show/' + data_id,
        success: function (data) {},
        error: function (data) {
            console.log('Error:', data);
        }
    });
});

// Area Hide
$(document).on('click', '.question-area-hide', function () {
    var data_id = $(this).data("id");
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        type: "PUT",
        url: urlQuestion + '/area-hide/' + data_id,
        success: function (data) {},
        error: function (data) {
            console.log('Error:', data);
        }
    });
});

// Area Show
$(document).on('click', '.question-area-show', function () {
    var data_id = $(this).data("id");
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        type: "PUT",
        url: urlQuestion + '/area-show/' + data_id,
        success: function (data) {},
        error: function (data) {
            console.log('Error:', data);
        }
    });
});

//Restart
$(document).on('click', '.restart', function () {
    var data_id = $(this).data("id");
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        type: "PUT",
        url: urlQuestion + '/restart/' + data_id,
        success: function (data) {
            console.log(data);
        },
        error: function (data) {
            console.log('Error:', data);
        }
    });
});

});
</script>