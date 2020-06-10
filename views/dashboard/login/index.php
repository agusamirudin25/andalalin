<body>
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-form validate-form">
					<span class="login100-form-title p-b-48" style="color: #8c8b8b; font-size: 18px;">
						<div class="box-body box-profile" style="margin-top: -1em;">
							<img class="img-responsive" style="width: 60%;" src="http://localhost/andalalin/images/kharisma.png" />
						</div>
					</span>
					<form action="" method="post" onsubmit='return login_process();'>
						<div class="wrap-input100 validate-username" data-validate="Check NIP or NIK">
							<input class="input100 " type="text" name="username" id="username" value="" autocomplete="off" />
							<span class="focus-input100" data-placeholder="NIP or NIK"></span>
						</div>

						<div class="wrap-input100 validate-password" data-validate="Enter password">
							<span class="btn-show-pass">
								<i class="fa fa-eye"></i>
							</span>
							<input class="input100" type="password" name="password" id="password" autocomplete="off" />
							<span class="focus-input100" data-placeholder="Password"></span>
						</div>

						<div class="container-login200-form-btn">
							<div class="wrap-login200-form-btn">
								<div class="login200-form-bgbtn"></div>
								<button class="login200-form-btn" id="login" name="login">
									Login
								</button>
							</div>
						</div>
					</form>
					<div class="container-login300-form-btn">
						<div class="container-login300-form-btn" style="text-align: center;">
							<div class="text-center p-t-115" style="margin-top: -6.5em;">
								<hr style="border-top: 1px solid #8c8b8b; margin-bottom: 0.5em;" />
								<span class="txt1" style="font-size: 16px;">
									ANDALALIN - STMIK KHARISMA
								</span>
							</div>
						</div>
					</div>


				</div>
			</div>
		</div>
	</div>

	<script src="http://localhost/andalalin/assets/login/sweetalert/sweetalert2.all.min.js"></script>
	<script src="http://localhost/andalalin/assets/login/vendor/jquery/jquery-3.2.1.min.js"></script>
	<script src="http://localhost/andalalin/assets/login/js/main.js"></script>


	<script type="text/javascript">
		$('#login').click(function() {
			login_process();
		});
		$("#username").keyup(function(event) {
			$("#username").val($('#username').val().replace(/['"]/g, ''));
			if (event.keyCode == 13) {
				login_process();
			}
		});
		$("#password").keyup(function(event) {
			$("#password").val($('#password').val().replace(/['"]/g, ''));
			if (event.keyCode == 13) {
				login_process();
			}
		});

		function login_process() {
			var username = $('#username').val();
			var password = $('#password').val();
			if (username.length == 0) {
				$('.validate-username').addClass('alert-validate');
				return false;
			}
			if (password.length == 0) {
				$('.validate-password').addClass('alert-validate');
				return false;
			}
			// var string = "username=" + username + "&password=" + password;
			// $.ajax({
			// 	type: 'POST',
			// 	url: "class/koneksi.php",
			// 	data: string,
			// 	cache: false,
			// 	dataType: "json",
			// 	success: function(data) {
			// 		if (data.login_status == 1) {
			// 			success_alert(data.title, data.msg);
			// 		} else {
			// 			error_alert(data.title, data.msg);
			// 		}
			// 	}
			// })
		}
	</script>

	<script>
		function success_alert(title, msg) {
			Swal.fire({
				icon: 'success',
				title: title,
				text: msg,
				timer: 1500,
				footer: 'Andalalin',
				showCancelButton: false,
				showConfirmButton: false
			}).then(function() {
				window.location = "http://localhost/andalalin/index.php?page=dashboard";
			})
		}

		function error_alert(title, msg) {
			Swal.fire({
				icon: 'error',
				title: title,
				text: msg,
				footer: 'Andalalin',
			})
		}
	</script>

</body>

<?php
$al = '';
if (isset($_POST['login'])) {
	$koneksi = new koneksi();
	$koneksi = $koneksi->conn;
	$querylogin = $koneksi->query("SELECT * from pengguna WHERE nip = '$_POST[username]'");
	if ($querylogin->num_rows > 0) {
		$dataUser = $querylogin->fetch_assoc();
		if (md5($_POST['password']) == $dataUser['katasandi']) {
			$_SESSION['nip'] = $dataUser['nip'];
			$_SESSION['nama'] = $dataUser['nama'];
			$_SESSION['jabatan'] = $dataUser['jabatan'];
			$_SESSION['level'] = $dataUser['level'];  ?>
			<script>
				success_alert('Berhasil', 'NIK atau NIP ditemukan!')
			</script>
		<?php
			// $koneksi->Login($dataUser['id_user'], $dataUser['nama_user'], $dataUser['level']);
		} else { ?>
			<script>
				error_alert('Gagal', 'NIK atau NIP tidak ditemukan!')
			</script>
		<?php
		}
	} else { ?>
		<script>
			error_alert('Gagal', 'NIK atau NIP tidak ditemukan!')
		</script>
<?php
	}
}
?>