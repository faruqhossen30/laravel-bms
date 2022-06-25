<script>
$(document).ready(function () {
	// Url
	var m_url = "{{ url('tib-admin/matchs') }}";

	// Match List
	$(".loader").hide();
	$("#auto-load").load("{{ url('tib-admin/matchs') }}");
	$("#upcoming-match-load").load("{{ url('tib-admin/upcoming-matchs') }}");

	setInterval(function () {
		$("#auto-load").load("{{ url('tib-admin/matchs') }}")
	}, 10000);

	setInterval(function () {
		$("#upcoming-match-load").load("{{ url('tib-admin/upcoming-matchs') }}")
	}, 10000);

	$('#refresh').click(function () {
		$("#auto-load").hide();
		$("#upcoming-match-load").hide();
		$(".loader").show();
		setTimeout(function () {
			$(".loader").hide();
		}, 10000);
		setTimeout(function () {
			$("#auto-load").show();
		}, 10000);
		setTimeout(function () {
			$("#upcoming-match-load").show();
		}, 10000);
	});

	// Hidden match
	setInterval(function () {
		$("#hiddenLiveMatch").load("{{ url('tib-admin/hidden-live-matchs') }}")
	}, 10000);

	setInterval(function () {
		$("#hiddenUpcomingMatch").load("{{ url('tib-admin/hidden-upcoming-matchs') }}")
	}, 10000);

	//Hidden to list
	$(document).on('click', '.to-panel', function () {
		var data_id = $(this).data("id");
		$.ajaxSetup({
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}
		});
		$.ajax({
			type: "PUT",
			url: m_url + '/add-to-panel/' + data_id,
			success: function (data) {},
			error: function (data) {
				console.log('Error:', data);
			}
		});
	});

	// Hide from Panel
	$(document).on('click', '.hide-from-panel', function () {
		var data_id = $(this).data("id");
		$.ajaxSetup({
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}
		});
		$.ajax({
			type: "PUT",
			url: m_url + '/hide-from-panel/' + data_id,
			success: function (data) {},
			error: function (data) {
				console.log('Error:', data);
			}
		});
	});

	// Area Hide

	$(document).on('click', '.area-hide', function () {
		var data_id = $(this).data("id");
		$.ajaxSetup({
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}
		});
		$.ajax({
			type: "PUT",
			url: m_url + '/area-hide/' + data_id,
			success: function (data) {},
			error: function (data) {
				console.log('Error:', data);
			}
		});
	});

	// Area Show

	$(document).on('click', '.area-show', function () {
		var data_id = $(this).data("id");
		$.ajaxSetup({
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}
		});
		$.ajax({
			type: "PUT",
			url: m_url + '/area-show/' + data_id,
			success: function (data) {},
			error: function (data) {
				console.log('Error:', data);
			}
		});
	});

	//Action Modal

	$(document).on('click', '#action_modal', function () {
		var data_id = $(this).data("id");
		$('.edit-match').val(data_id);
		$('.close-match').val(data_id);
		$('.add-question').val(data_id);
		$('#ActionModal').modal('show');

	});

	//Add Match
	$('#btn_add').click(function () {
		$('#btn-save').val("add");
		$('#DataForm').trigger("reset");
		$('#ModalTitle').html("Add New Match");
		$('#btn-save').val("add");
		$('#DataModal').modal('show');
	});

	//Edit Match
	$(document).on('click', '.edit-match', function () {
		var data_id = $(this).val();
		$.get(m_url + '/' + data_id, function (data) {
			$('#DataForm').trigger("reset");
			$('#ModalTitle').html("Edit Match");
			$('#data_id').val(data_id);
			$('#team_one').val(data.team_one);
			$('#team_two').val(data.team_two);
			$('#date').val(data.date);
			$('#time').val(data.time);
			$('#bet_statement').val(data.bet_statement);
			$('#match_type').val(data.match_type);
			$('#status').val(data.status);
			$('#btn-save').val("update");
			$('#ActionModal').modal('hide');
			$('#DataModal').modal('show')
		})
	});

	//Close Match
	$(document).on('click', '.close-match', function () {
		var data_id = $(this).val();
		$('#ActionModal').modal('hide');
		$.ajaxSetup({
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}
		});
		$.ajax({
			type: "PUT",
			url: m_url + '/close-match/' + data_id,
			success: function (data) {},
			error: function (data) {
				console.log('Error:', data);
			}
		});
	});

	//Add Question

	$(document).on('click', '.add-question', function () {
		var data_id = $(this).val();
		$.get(m_url + '/' + data_id, function (data) {
			$('#QuestionForm').trigger("reset");
			$('.modal-title').html("Add Question");
			$('#match_id').val(data_id);
			$('#ActionModal').modal('hide');
			$('.match-title').html(data.team_one + ' vs ' + data.team_two);
			$('#save-question').val('add');
			$('#QuestionModal').modal('show');
		})

	});

	// Hide Match Question

	$(document).on('click', '.hide-match-question', function () {
		var data_id = $(this).data("id");
		$.ajaxSetup({
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}
		});
		$.ajax({
			type: "PUT",
			url: m_url + '/hide-match-question/' + data_id,
			success: function (data) {},
			error: function (data) {
				console.log('Error:', data);
			}
		});
	});

	// Show Match Question

	$(document).on('click', '.show-match-question', function () {
		var data_id = $(this).data("id");
		$.ajaxSetup({
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}
		});
		$.ajax({
			type: "PUT",
			url: m_url + '/show-match-question/' + data_id,
			success: function (data) {},
			error: function (data) {
				console.log('Error:', data);
			}
		});
	});

	//Match Limit
	$(document).on('click', '.match-limit', function () {
		var data_id = $(this).data("id");
		$.get(m_url + '/' + data_id, function (data) {
			$('#MatchLimitForm').trigger("reset");
			$('#data_id').val(data_id);
			$('.match-title').html(data.team_one + ' vs ' + data.team_two);
			$('#bet_limit').val(data.bet_limit);
			$('#match-limit-btn').val("update");
			$('#MatchLimitModal').modal('show')
		})
	});

	$("#match-limit-btn").click(function () {
		$.ajaxSetup({
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}
		});
		var formData = {
			bet_limit: $('#bet_limit').val(),
		}
		//used to determine the http verb to use [add=POST], [update=PUT]
		var state = $('#match-limit-btn').val();
		var type = "POST"; //for creating new resource
		var data_id = $('#data_id').val();
		var my_url = m_url;
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
				$('#MatchLimitForm').trigger("reset");
				$('#MatchLimitModal').modal('hide')
			},
			error: function (data) {
				console.log('Error:', data);
			}
		});
	});

	// Match Hide
	$(document).on('click', '.match-hide', function () {
		var data_id = $(this).data("id");
		$.ajaxSetup({
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}
		});
		$.ajax({
			type: "PUT",
			url: m_url + '/hide/' + data_id,
			success: function (data) {},
			error: function (data) {
				console.log('Error:', data);
			}
		});
	});

	// Match Show
	$(document).on('click', '.match-show', function () {
		var data_id = $(this).data("id");
		$.ajaxSetup({
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}
		});
		$.ajax({
			type: "PUT",
			url: m_url + '/show/' + data_id,
			success: function (data) {},
			error: function (data) {
				console.log('Error:', data);
			}
		});
	});

	// Match Active
	$(document).on('click', '.match-active', function () {
		var data_id = $(this).data("id");
		$.ajaxSetup({
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}
		});
		$.ajax({
			type: "PUT",
			url: m_url + '/active/' + data_id,
			success: function (data) {},
			error: function (data) {
				console.log('Error:', data);
			}
		});
	});

	// Match Show
	$(document).on('click', '.match-deactive', function () {
		var data_id = $(this).data("id");
		$.ajaxSetup({
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}
		});
		$.ajax({
			type: "PUT",
			url: m_url + '/deactive/' + data_id,
			success: function (data) {},
			error: function (data) {
				console.log('Error:', data);
			}
		});
	});


	// Add or Update Match

	$("#btn-save").click(function () {
		$.ajaxSetup({
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}
		});
		var formData = {
			team_one: $('#team_one').val(),
			team_two: $('#team_two').val(),
			date: $('#date').val(),
			bet_statement: $('#bet_statement').val(),
			time: $('#time').val(),
			match_type: $('#match_type').val(),
			auto_question: $('#auto_question').val(),
			status: $('#status').val()
		}
		//used to determine the http verb to use [add=POST], [update=PUT]
		var state = $('#btn-save').val();
		var type = "POST"; //for creating new resource
		var data_id = $('#data_id').val();
		var my_url = m_url;
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
				$('#DataForm').trigger("reset");
				if (state == "update") {
					$('#DataModal').modal('hide')
				}
			},
			error: function (data) {
				console.log('Error:', data);
			}
		});
	});

	//To Live
	$(document).on('click', '.to-live', function () {
		var data_id = $(this).data("id");
		$.ajaxSetup({
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}
		});
		$.ajax({
			type: "PUT",
			url: m_url + '/to-live/' + data_id,
			success: function (data) {},
			error: function (data) {
				console.log('Error:', data);
			}
		});
	});

});
</script>