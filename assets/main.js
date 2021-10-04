$(document).ready(function() {
	$("#data").load("show.php");

	function checkIfNull() {
		if ($('#nama').val() == '' || $('#email').val() == '' || $('#nrp').val() == '' || $("input[name='jk']:checked").val() == undefined)
		{
			return true;
		}
		else return false;
	}

	$(document).on('click', '#save', function(e){
		e.preventDefault();
		if (checkIfNull() == true) {
			$('#err-message').show();
		} else {
			var nama = $('#nama').val();
			var nrp = $('#nrp').val();
			var email = $('#email').val();
			var jk = $("input[name='jk']:checked").val();
			$.ajax({
				url: 'save.php',
				type: 'POST',
				data: {
					'save': 1,
					'nama': nama,
					'nrp': nrp,
					'email': email,
					'jk': jk,
				},
				success: function(response){
					$('#nama').val('');
					$('#nrp').val('');
					$('#email').val('');
					$("input[name='jk']").prop('checked', false);
					$('#err-message').hide();
					$('#data').load("show.php");
				}
			});
		}
	});

	var dataId;
	$(document).on('click', '#edit-data', function(e) {
		e.preventDefault();
		$('#err-message').hide();
		dataId = $(this).data("id");
		$('#edit').show();
		$('#cancel').show();
		$('#save').attr('disabled', 'disabled');
		$('#save').hide();
		$.ajax({
			url: 'show.php',
			type: 'GET',
			data: {id: dataId},
			dataType: 'json',
			success: function(response) {
				$('#id').val(response.id);
				$('#nama').val(response.nama);
				$('#nrp').val(response.nrp);
				$('#email').val(response.email);
				$("input[name=jk][value=" + response.jk + "]").prop('checked', true);
			}
		});
	});

	$(document).on('click', '#edit', function(e){
		e.preventDefault();
		if (checkIfNull() == true) {
			$('#err-message').show();
		} else {
			var nama = $('#nama').val();
			var nrp = $('#nrp').val();
			var email = $('#email').val();
			var jk = $("input[name='jk']:checked").val();
			$.ajax({
				url: 'update.php',
				type: 'POST',
				data: {
					'update': 1,
					'id': dataId,
					'nama': nama,
					'nrp': nrp,
					'email': email,
					'jk': jk,
				},
				success: function(response){
					$('#nama').val('');
					$('#nrp').val('');
					$('#email').val('');
					$('#jk').val('');
					$('#save').show();
					$('#edit').hide();
					$('#cancel').hide();
					$('#err-message').hide();
					$('#save').removeAttr('disabled');
					$("input[name='jk']").prop('checked', false);
					$('#data').load("show.php");
				}
			});
		}
	});

	$(document).on('click', '#cancel', function(e) {
		e.preventDefault();
		$('#save').show();
		$('#edit').hide();
		$('#id').val('');
		$('#nama').val('');
		$('#nrp').val('');
		$('#email').val('');
		$('#save').removeAttr('disabled');
		$("input[name='jk']").prop('checked', false);
		$(this).hide();
	});

	var dataId, dataNama;
	$(document).on('click', '#delete-data', function() {
		dataId = $(this).data('id');
		dataNama = $(this).data('nama');
		$('.wrapper').addClass("transparent");
		$('.popup_box').fadeIn();
		$('#label-popup').html("Data: <b>" + dataNama + "</b>");

	});
	$('#cancel-popup').click(function(){
		$('.wrapper').removeClass("transparent");
		$('.popup_box').hide();
	});
	$('#delete-popup').click(function(){
		$('.popup_box').hide();
		$('.wrapper').removeClass("transparent");
		$.get('delete.php?id=' + dataId, function() {
			$('#data').load("show.php");
		});
	});

	$(document).on('click', '.icon', function() {
		$('.search').toggleClass('active');
	});
	$(document).on('keyup', '#search', function() {
		$('#data').html('');
		var key = $(this).val();
		$.get('show.php?key=' + key, function(response) {
			$('#data').html(response);
		});
	});
});