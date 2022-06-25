$(document).ready(function () {
	"use strict"; // Start of use strict
	$.ajaxSetup({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		}
	});

	//var Admin_url = 'https://localhost/2winbd/tib-admin';
	var Admin_url = window.location.origin + '/tib-admin';

	// Toggle the side navigation
	$("#sidebarToggle, #sidebarToggleTop").on('click', function (e) {
		$("body").toggleClass("sidebar-toggled");
		$(".sidebar").toggleClass("toggled");
		if ($(".sidebar").hasClass("toggled")) {
			$('.sidebar .collapse').collapse('hide');
		};
	});

	// Close any open menu accordions when window is resized below 768px
	$(window).resize(function () {
		if ($(window).width() < 768) {
			$('.sidebar .collapse').collapse('hide');
		};
	});

	// Prevent the content wrapper from scrolling when the fixed side navigation hovered over
	$('body.fixed-nav .sidebar').on('mousewheel DOMMouseScroll wheel', function (e) {
		if ($(window).width() > 768) {
			var e0 = e.originalEvent,
				delta = e0.wheelDelta || -e0.detail;
			this.scrollTop += (delta < 0 ? 1 : -1) * 30;
			e.preventDefault();
		}
	});

	// Scroll to top button appear
	$(document).on('scroll', function () {
		var scrollDistance = $(this).scrollTop();
		if (scrollDistance > 100) {
			$('.scroll-to-top').fadeIn();
		} else {
			$('.scroll-to-top').fadeOut();
		}
	});

	// Smooth scrolling using jQuery easing
	$(document).on('click', 'a.scroll-to-top', function (e) {
		var $anchor = $(this);
		$('html, body').stop().animate({
			scrollTop: ($($anchor.attr('href')).offset().top)
		}, 1000, 'easeInOutExpo');
		e.preventDefault();
	});

	$('.dropdown-toggle').dropdown();

	$("#checkAll").click(function () {
		$(".check").prop('checked', $(this).prop('checked'));
	});

	//Toaster Function
	function toaster(icon, title) {
		const Toast = Swal.mixin({
			toast: true,
			position: 'top-end',
			showConfirmButton: false,
			timer: 3000,
			timerProgressBar: true,
			didOpen: (toast) => {
				toast.addEventListener('mouseenter', Swal.stopTimer)
				toast.addEventListener('mouseleave', Swal.resumeTimer)
			}
		})
		Toast.fire({
			icon: icon,
			title: title
		})
	}

	//Top Notifications
	$('.notifications-count').html('0');
	$.ajax({
		url: Admin_url + '/notifications-top',
		type: 'get',
		dataType: 'JSON',
		success: function (response) {
			var len = response.length;
			$('.notifications-count').html(len);
			for (var i = 0; i < len; i++) {
				var id = response[i].id;
				var title = response[i].title;
				var date = response[i].date;
				var time = response[i].time;

				var notification_items = '<a class="dropdown-item d-flex align-items-center" href="' + Admin_url + '/notifications/' + id + '">' +
					'<div class="mr-3">' +
					'<div class="icon-circle bg-primary">' +
					'<i class="fas fa-file-alt text-white"></i>' +
					'</div>' +
					'</div>' +
					'<div>' +
					'<div class="small text-gray-500">' + date + ' ' + time + '</div>' +
					'<span class="font-weight-bold">' + title + '</span>'
				'</div>' +
				'</a>';

				$("#notifications").append(notification_items);
			}
		}

	});

	//Deposit
	$(document).on('click', '#deposit-accept', function () {
		var deposit_id = $(this).data("id");
		var conirmation = confirm("Are you sure to accept the deposit?");
		if (conirmation == true) {
			$.ajax({
				type: "POST",
				url: Admin_url + '/deposit/accept/' + deposit_id,
				success: function (data) {
					if (data.success == 'yes') {
						toaster('success', data.message);
						//Redirect
						window.setTimeout(function () {
							window.location.href = Admin_url + '/deposits';
						}, 3000);
					} else {
						toaster('error', data.message);
					}
				},
				error: function (data) {}
			});
		}
	});

	$(document).on('click', '#deposit-cancel', function () {
		var deposit_id = $(this).data("id");
		var conirmation = confirm("Are you sure to cancel the deposit?");
		if (conirmation == true) {
			$.ajax({
				type: "POST",
				url: Admin_url + '/deposit/cancel/' + deposit_id,
				success: function (data) {
					if (data.success == 'yes') {
						toaster('success', data.message);
						//Redirect
						window.setTimeout(function () {
							window.location.href = Admin_url + '/deposits';
						}, 3000);
					} else {
						toaster('error', data.message);
					}
				},
				error: function (data) {}
			});
		}
	});

	//Withdraw
	$(document).on('click', '#withdraw-complete', function () {
		var withdraw_id = $(this).data("id");
		var conirmation = confirm("Are you sure to complete the withdraw?");
		if (conirmation == true) {
			$.ajax({
				type: "POST",
				url: Admin_url + '/withdraw/complete/' + withdraw_id,
				success: function (data) {
					if (data.success == 'yes') {
						toaster('success', data.message);
						//Redirect
						window.setTimeout(function () {
							window.location.href = Admin_url + '/withdraws';
						}, 3000);
					} else {
						toaster('error', data.message);
					}
				},
				error: function (data) {}
			});
		}
	});

	$(document).on('click', '#withdraw-cancel', function () {
		var withdraw_id = $(this).data("id");
		var conirmation = confirm("Are you sure to cancel the withdraw?");
		if (conirmation == true) {
			$.ajax({
				type: "POST",
				url: Admin_url + '/withdraw/cancel/' + withdraw_id,
				success: function (data) {
					if (data.success == 'yes') {
						toaster('success', data.message);
						//Redirect
						window.setTimeout(function () {
							window.location.href = Admin_url + '/withdraws';
						}, 3000);
					} else {
						toaster('error', data.message);
					}
				},
				error: function (data) {}
			});
		}
	});

	//Complain
	$(document).on('click', '#complain-solved', function () {
		var complain_id = $(this).data("id");
		var conirmation = confirm("Are you sure to complete the complain?");
		if (conirmation == true) {
			$.ajax({
				type: "POST",
				url: Admin_url + '/complain/solved/' + complain_id,
				success: function (data) {
					if (data.success == 'yes') {
						toaster('success', data.message);
						//Redirect
						window.setTimeout(function () {
							window.location.href = Admin_url + '/complains';
						}, 3000);
					} else {
						toaster('error', data.message);
					}
				},
				error: function (data) {}
			});
		}
	});

	//Gateway Update
	$('#gateway-update').submit(function (e) {
		e.preventDefault();
		$.ajax({
			type: "PUT",
			url: Admin_url + "/gateway",
			data: $(this).serialize(),
			cache: false,
			success: function (data) {
				if (data.success == 'yes') {
					toaster('success', data.message);
					//Redirect
					window.setTimeout(function () {
						window.location.href = Admin_url + '/gateways';
					}, 3000);
				} else {
					toaster('error', data.message);
				}
			},
			error: function (error) {}
		});
	});

	//Auto Question
	var i = $('#option-last-id').val();
	$("#add_option_more").click(function () {
		++i;
		$("#question-options").append('<tr><td><input type="text" name="option[' + i + '][name]" placeholder="Enter Option" class="form-control" required/></td><td><input type="number" step="any" name="option[' + i + '][bet_rate]" placeholder="Enter Bet Rate" class="form-control" required/></td><td><select name="option[' + i + '][status]" class="form-control"><option value="active" selected>Active</option><option value="deactive">Deactive</option></select></td><td><button type="button" class="btn btn-danger remove-tr">Remove</button></td></tr>');
	});
	$(document).on('click', '.remove-tr', function (event) {
		$(this).parents('tr').remove();
	});

	//Auto Question Delete
	$(document).on('click', '#question-delete', function () {
		var question_id = $(this).data("id");
		var conirmation = confirm("Are you sure to delete the record?");
		if (conirmation == true) {
			$.ajax({
				type: "DELETE",
				url: Admin_url + '/auto-questions/' + question_id,
				success: function (data) {
					if (data.success == 'yes') {
						toaster('success', data.message);
						//Redirect
						window.setTimeout(function () {
							window.location.href = Admin_url + '/auto-questions';
						}, 3000);
					} else {
						toaster('error', data.message);
					}
				},
				error: function (data) {}
			});
		}
	});

	//Role Delete
	$(document).on('click', '#role-delete', function () {
		var role_id = $(this).data("id");
		var conirmation = confirm("Are you sure to delete the record?");
		if (conirmation == true) {
			$.ajax({
				type: "DELETE",
				url: Admin_url + '/roles/' + role_id,
				success: function (data) {
					if (data.success == 'yes') {
						toaster('success', data.message);
						//Redirect
						window.setTimeout(function () {
							window.location.href = Admin_url + '/roles';
						}, 3000);
					} else {
						toaster('error', data.message);
					}
				},
				error: function (data) {}
			});
		}
	});

	//Admin Delete
	$(document).on('click', '#admin-delete', function () {
		var admin_id = $(this).data("id");
		var conirmation = confirm("Are you sure to delete the record?");
		if (conirmation == true) {
			$.ajax({
				type: "DELETE",
				url: Admin_url + '/admins/' + admin_id,
				success: function (data) {
					if (data.success == 'yes') {
						toaster('success', data.message);
						//Redirect
						window.setTimeout(function () {
							window.location.href = Admin_url + '/admins';
						}, 3000);
					} else {
						toaster('error', data.message);
					}
				},
				error: function (data) {}
			});
		}
	});

	//User Delete
	$(document).on('click', '#user-delete', function () {
		var user_id = $(this).data("id");
		var conirmation = confirm("Are you sure to delete the record?");
		if (conirmation == true) {
			$.ajax({
				type: "DELETE",
				url: Admin_url + '/users/' + user_id,
				success: function (data) {
					if (data.success == 'yes') {
						toaster('success', data.message);
						//Redirect
						window.setTimeout(function () {
							window.location.href = Admin_url + '/users';
						}, 3000);
					} else {
						toaster('error', data.message);
					}
				},
				error: function (data) {}
			});
		}
	});

	//Match To Live
	$(document).on('click', '#match-to-live', function () {
		var match_id = $(this).data("id");
		var conirmation = confirm("Are you sure to live the metch?");
		if (conirmation == true) {
			$.ajax({
				type: "POST",
				url: Admin_url + '/database/match-to-live/' + match_id,
				success: function (data) {
					if (data.success == 'yes') {
						toaster('success', data.message);
						//Redirect
						window.setTimeout(function () {
							location.reload();
						}, 3000);
					} else {
						toaster('error', data.message);
					}
				},
				error: function (data) {}
			});
		}
	});

	//Match To Upcoming
	$(document).on('click', '#match-to-upcoming', function () {
		var match_id = $(this).data("id");
		var conirmation = confirm("Are you sure to upcoming the metch?");
		if (conirmation == true) {
			$.ajax({
				type: "POST",
				url: Admin_url + '/database/match-to-upcoming/' + match_id,
				success: function (data) {
					if (data.success == 'yes') {
						toaster('success', data.message);
						//Redirect
						window.setTimeout(function () {
							location.reload();
						}, 3000);
					} else {
						toaster('error', data.message);
					}
				},
				error: function (data) {}
			});
		}
	});

	//Question To Live
	$(document).on('click', '#question-to-live', function () {
		var question_id = $(this).data("id");
		var conirmation = confirm("Are you sure to live the question?");
		if (conirmation == true) {
			$.ajax({
				type: "POST",
				url: Admin_url + '/database/question-to-live/' + question_id,
				success: function (data) {
					if (data.success == 'yes') {
						toaster('success', data.message);
						//Redirect
						window.setTimeout(function () {
							location.reload();
						}, 3000);
					} else {
						toaster('error', data.message);
					}
				},
				error: function (data) {}
			});
		}
	});

	//Question To Upcoming
	$(document).on('click', '#question-to-upcoming', function () {
		var question_id = $(this).data("id");
		var conirmation = confirm("Are you sure to upcoming the question?");
		if (conirmation == true) {
			$.ajax({
				type: "POST",
				url: Admin_url + '/database/question-to-upcoming/' + question_id,
				success: function (data) {
					if (data.success == 'yes') {
						toaster('success', data.message);
						//Redirect
						window.setTimeout(function () {
							location.reload();
						}, 3000);
					} else {
						toaster('error', data.message);
					}
				},
				error: function (data) {}
			});
		}
	});

	//Option To Live
	$(document).on('click', '#option-to-live', function () {
		var option_id = $(this).data("id");
		var conirmation = confirm("Are you sure to live the option?");
		if (conirmation == true) {
			$.ajax({
				type: "POST",
				url: Admin_url + '/database/option-to-live/' + option_id,
				success: function (data) {
					if (data.success == 'yes') {
						toaster('success', data.message);
						//Redirect
						window.setTimeout(function () {
							location.reload();
						}, 3000);
					} else {
						toaster('error', data.message);
					}
				},
				error: function (data) {}
			});
		}
	});

	//Option To Upcoming
	$(document).on('click', '#option-to-upcoming', function () {
		var option_id = $(this).data("id");
		var conirmation = confirm("Are you sure to upcoming the option?");
		if (conirmation == true) {
			$.ajax({
				type: "POST",
				url: Admin_url + '/database/option-to-upcoming/' + option_id,
				success: function (data) {
					if (data.success == 'yes') {
						toaster('success', data.message);
						//Redirect
						window.setTimeout(function () {
							location.reload();
						}, 3000);
					} else {
						toaster('error', data.message);
					}
				},
				error: function (data) {}
			});
		}
	});
});