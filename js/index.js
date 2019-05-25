$(document).ready(function() {
 var example = $('#example').DataTable();


 $("#addMemberModalBtn").on('click', function(){
 	//reset form
 	$("#createMemberForm")[0].reset();

 	//submir form
	$("#createMemberForm").unbind('submit').bind('submit', function(){
		var form = $(this);
		console.log('Cek');
		//validasi
		var username = $("#username").val();
		var password = $("#password").val();
		var kpassword = $("#kpassword").val();
		var nama = $("#nama").val();
		var email = $("#email").val();
		var nohp = $("#nohp").val();
		var alamat = $("#alamat").val();
		var instansi = $("#instansi").val();
		var active = $("#active").val();

		if ($username == "") {
			$("#username").closest('.form-group').addClass('has-error');
			$("#username").after('<p class="text-danger">Username Harus Diisi</p>')
		} else {
			$("#username").closest('.form-group').removeClass('has-error');
			$("#username").closest('.form-group').addClass('has-success');
			$(".text-danger").remove();
		}

		if ($password == "") {
			$("#password").closest('.form-group').addClass('has-error');
			$("#password").after('<p class="text-danger">Password Harus Diisi</p>')
		} else {
			$("#password").closest('.form-group').removeClass('has-error');
			$("#password").closest('.form-group').addClass('has-success');
			$(".text-danger").remove();
		}

		if ($kpassword == "") {
			$("#kpassword").closest('.form-group').addClass('has-error');
			$("#kpassword").after('<p class="text-danger">Konfirmasi password Harus Diisi</p>')
		} else {
			$("#kpassword").closest('.form-group').removeClass('has-error');
			$("#kpassword").closest('.form-group').addClass('has-success');
			$(".text-danger").remove();
		}
		if ($nama == "") {
			$("#nama").closest('.form-group').addClass('has-error');
			$("#nama").after('<p class="text-danger">nama Harus Diisi</p>')
		} else {
			$("#nama").closest('.form-group').removeClass('has-error');
			$("#nama").closest('.form-group').addClass('has-success');
			$(".text-danger").remove();
		}

		if ($email == "") {
			$("#email").closest('.form-group').addClass('has-error');
			$("#email").after('<p class="text-danger">email Harus Diisi</p>')
		} else {
			$("#email").closest('.form-group').removeClass('has-error');
			$("#email").closest('.form-group').addClass('has-success');
			$(".text-danger").remove();
		}

		if ($nohp == "") {
			$("#nohp").closest('.form-group').addClass('has-error');
			$("#nohp").after('<p class="text-danger">nohp Harus Diisi</p>')
		} else {
			$("#nohp").closest('.form-group').removeClass('has-error');
			$("#nohp").closest('.form-group').addClass('has-success');
			$(".text-danger").remove();
		}

		if ($alamat == "") {
			$("#alamat").closest('.form-group').addClass('has-error');
			$("#alamat").after('<p class="text-danger">alamat Harus Diisi</p>')
		} else {
			$("#alamat").closest('.form-group').removeClass('has-error');
			$("#alamat").closest('.form-group').addClass('has-success');
			$(".text-danger").remove();
		}

		if ($instansi == "") {
			$("#instansi").closest('.form-group').addClass('has-error');
			$("#instansi").after('<p class="text-danger">instansi Harus Diisi</p>')
		} else {
			$("#instansi").closest('.form-group').removeClass('has-error');
			$("#instansi").closest('.form-group').addClass('has-success');
			$(".text-danger").remove();
		}

		if ($active == "") {
			$("#active").closest('.form-group').addClass('has-error');
			$("#active").after('<p class="text-danger">active Harus Diisi</p>')
		} else {
			$("#active").closest('.form-group').removeClass('has-error');
			$("#active").closest('.form-group').addClass('has-success');
			$(".text-danger").remove();
		}

		if (username && password && kpassword && nama && email && nohp && alamat && instansi && active) {
			alert('ready to submit!');
		}

		return false;

	});
 });

});