$(document).ready(function () {
	'use strict';
	//var Site_Url = "https://localhost/2winbd/";
	var Site_Url = window.location.origin + '/';

	$('.nav-link').on('click', function () {
		$('.navbar-collapse').collapse('hide');
	});

	// Filter Match
	$(".filter-match").click(function () {
		var value = $(this).attr('data-type');
		if (value == "all") {
			$('.filter').show('1000');
		} else {
			$(".filter").not('.' + value).hide('3000');
			$('.filter').filter('.' + value).show('3000');

		}
	});

	// Alert count
	if ($('.user-loggedin').length > 0) {
	$('.alart-count').html('0');
	$.ajax({
		url: Site_Url + 'auth/alart-count',
		type: 'get',
		dataType: 'JSON',
		success: function (response) {
			$('.alart-count').html(response);
		}
	});
   }


	//games_slider
	$('.games_slider').slick({
		slidesToShow: 6,
		slidesToScroll: 3,
		autoplay: true,
		arrows: false,
		autoplaySpeed: 2000,
		dots: false,
		responsive: [{
				breakpoint: 992,
				settings: {
					slidesToShow: 3,
				}

			},
			{
				breakpoint: 576,
				settings: {
					slidesToShow: 3,
				}

			},
		]
	});

	var min_deposit = 100;
	var max_deposit = 1000000;
	var min_withdraw = 500;
	var max_withdraw = 1000000;

	//Deposit vadilate
	$('#deposit_amount').on('keydown keyup change', function () {
		var amount = $(this).val();
		if (amount < min_deposit) {
			$('#deposit_amount_error').html('Minimum Deposit Amount 100 TK');
			$('#deposit_btn').prop('disabled', true);
		} else if (max_deposit < amount) {
			$('#deposit_amount_error').html('Max Deposit Amount 10000 TK');
			$('#deposit_btn').prop('disabled', true);
		} else {
			$('#deposit_amount_error').html('');
			$('#deposit_btn').prop('disabled', false);
		}
	});

	$('#deposit_popup_amount').on('keydown keyup change', function () {
		var amount = $(this).val();
		if (amount < min_deposit) {
			$('#deposit_popup_amount_error').html('Minimum Deposit Amount 100 TK');
			$('#deposit_popup_btn').prop('disabled', true);
		} else if (max_deposit < amount) {
			$('#deposit_popup_amount_error').html('Max Deposit Amount 1,00,0000 TK');
			$('#deposit_popup_btn').prop('disabled', true);
		} else {
			$('#deposit_popup_amount_error').html('');
			$('#deposit_popup_btn').prop('disabled', false);
		}
	});

	//Withdraw Vadilate
	$('#withdraw_amount').on('keydown keyup change', function () {
		var amount = $(this).val();
		if (amount < min_withdraw) {
			$('#withdraw_amount_error').html('Minimum Withdraw Amount 500 TK');
			$('#withdraw_btn').prop('disabled', true);
		} else if (max_withdraw < amount) {
			$('#withdraw_amount_error').html('Max Withdraw Amount 1,00,0000 TK');
			$('#withdraw_btn').prop('disabled', true);
		} else {
			$('#withdraw_amount_error').html('');
			$('#withdraw_btn').prop('disabled', false);
		}
	});

	// Match Open
	$('.match-open').on('click', function () {
		var match_id = $(this).attr('data-match');
		if ($('#collapse' + match_id).length > 0) {
			if(!($('#collapse' + match_id).hasClass('show'))){
				$('#collapse' + match_id).addClass('show');
			}else{
				$('#collapse' + match_id).removeClass('show');
			}
		}
		else{
			$('.match-open-' + match_id).load(Site_Url + 'match-open/' + match_id);
		}
	});

	// Bet Panel
	$('body').on('click', '.betInfo', function () {
		if ($('.user-loggedin').length > 0) {
			var option_id = $(this).data('id');
			$.get(Site_Url + 'option/' + option_id, function (data) {
				$('.optionTitle').html(data.match_details);
				$('.status').html(data.match.status);
				$('.questionName').html(data.question.name);
				$('.optionName').html(data.option.name);
				$('.ratio').html(data.option.bet_rate);
				var value = $("input[name='amount']:checked").val();
				$('.selected_plan').val(value);
				var amount = $("input[name='predict_amount']").val();
				$('.stake').html(amount);
				$('.retunt').html(data.option.bet_rate * amount);
				$("input[name='amount']").click(function () {
					var value = $("input[name='amount']:checked").val();
					$('.selected_plan').val(value);
					var amount = $("input[name='predict_amount']").val();
					$('.stake').html(amount);
					$('.retunt').html(data.option.bet_rate * amount);
				});
				$("input[name='predict_amount']").change(function () {
					var amount = $("input[name='predict_amount']").val();
					$('.stake').html(amount);
					$('.retunt').html(data.option.bet_rate * amount);
				});
				$('#betModal').modal('show');
				$('#option_id').val(data.option.id);
				$('#name').val(data.option.name);
			});
		} else {
			$('#signinm').modal('show');
		}
	});

});
