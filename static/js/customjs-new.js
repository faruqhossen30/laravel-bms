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
                    msg = "Internal Server Error [500]." + xhr.responseText;
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



        $(document).on('change', 'input:radio[name=amount]', function () {
            let amount = $(this).val();
            console.log(amount)
            $('input[name=predict_amount]').val(amount)
            $('input:radio[name=amount]').parent().removeClass('bg-red-500 text-white');
            $('input[name=amount]:checked').parent().addClass('bg-red-500 text-white');
            changeAmount()
        });

    });

    function changeAmount() {
        let amount = $("input[name='predict_amount']").val();
        let betRate = $("#betRate").data('betrate');
        $('.stake').html(amount);
        $('.retunt').html((amount * betRate).toFixed(2));
    }
    $(document).on('change', "input[name='predict_amount']", function () {
        changeAmount();

    });


    $(document).on('click', ".match-open", function () {
        let matchid = $(this).data('match');
        let matchdiv = 'upconnitMatch'+matchid
        console.log(matchid);

        $.ajax({
            url: Site_Url + 'match-open/' + matchid,
            type: "GET",
            success: function (data) {
                // console.log(data)
                $(`#${matchdiv}`).empty()
                $(`#${matchdiv}`).append(data)
            },
            error: function (xhr, exception) {
                var msg = "";
                if (xhr.status === 0) {
                    msg = "Not connect.\n Verify Network." + xhr.responseText;
                } else if (xhr.status == 404) {
                    msg = "Requested page not found. [404]" + xhr.responseText;
                } else if (xhr.status == 500) {
                    msg = "Internal Server Error [500]." + xhr.responseText;
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

    });

});
