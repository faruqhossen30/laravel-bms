$(document).ready(function () {
    'use strict';
    //var Site_Url = "https://localhost/2winbd/";
    var Site_Url = window.location.origin + '/';

    // Bet Panel
    $('body').on('click', '.betInfo', function () {
        let option_id = $(this).data('id');

        console.log('custom js', option_id)
        $.ajax({
            url: Site_Url + 'option/' + option_id,
            type: "GET",
            success: function (data) {
                console.log(data)
                $('#lacebetModalBody').empty();
                $('#lacebetModalBody').append(data);

            },
            error: function (xhr, exception) {
                var msg = "";
                if (xhr.status === 0) {
                    msg = "Not connect.\n Verify Network." + xhr.responseText;
                } else if (xhr.status == 404) {
                    msg = "Requested page not found. [404]" + xhr.responseText;
                } else if (xhr.status == 500) {
                    msg = "Internal Server Error [500]." +  xhr.responseText;
                } else if (exception === "parsererror") {
                    msg = "Requested JSON parse failed.";
                } else if (exception === "timeout") {
                    msg = "Time out error." + xhr.responseText;
                } else if (exception === "abort") {
                    msg = "Ajax request aborted.";
                } else {
                    msg = "Error:" + xhr.status + " " + xhr.responseText;
                }

            }
        });


        // $.get(Site_Url + 'option/' + option_id, function (data) {
        //     $('.optionTitle').html(data.match_details);
        //     $('.status').html(data.match.status);
        //     $('.questionName').html(data.question.name);
        //     $('.optionName').html(data.option.name);
        //     $('.ratio').html(data.option.bet_rate);
        //     var value = $("input[name='amount']:checked").val();
        //     $('.selected_plan').val(value);
        //     var amount = $("input[name='predict_amount']").val();
        //     $('.stake').html(amount);
        //     $('.retunt').html(data.option.bet_rate * amount);
        //     $("input[name='amount']").click(function () {
        //         var value = $("input[name='amount']:checked").val();
        //         $('.selected_plan').val(value);
        //         var amount = $("input[name='predict_amount']").val();
        //         $('.stake').html(amount);
        //         $('.retunt').html(data.option.bet_rate * amount);
        //     });
        //     $("input[name='predict_amount']").change(function () {
        //         var amount = $("input[name='predict_amount']").val();
        //         $('.stake').html(amount);
        //         $('.retunt').html(data.option.bet_rate * amount);
        //     });
        //     $('#betModal').modal('show');
        //     $('#option_id').val(data.option.id);
        //     $('#name').val(data.option.name);
        // });
    });

});
