<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Latihan Ajax</title>
	<link rel=stylesheet href="assets/main.css">
</head>
<body>
	<div class="popup_box">
		<h2>Apakan anda yakin ingin menghapusnya?</h2>
		<label id="label-popup"></label>
		<div style="margin-top: 25px;">
			<div class="float-r">
				<a href="#" class="btn btn-cancel" id="cancel-popup">Cancel</a>
				<a href="#" class="btn btn-delete" id="delete-popup">Delete</a>
			</div>
		</div>
	</div>
	<div class="wrapper">
		<h1>CRUD Data Mahasiswa</h1>

		<div class="row">
			<div class="form">
				<form class="form-box">
					<h2>Form mahasiswa</h2>
					<div class="form-control">
						<input type="text" name="nama" id="nama" required>
						<span>Nama</span>
					</div>
					<div class="form-control">
						<input type="text" name="nrp" id="nrp" required>
						<span>NRP</span>
					</div>
					<div class="form-control">
						<input type="text" name="email" id="email" required>	
						<span>Email</span>
					</div>
					<div class="input-radio">
						<span>Jenis kelamin</span><br>
						<div class="male">
							<input type="radio" id="male" name="jk" value="L">
							<label>Laki- laki</label>
						</div>
						<div class="female">
							<input type="radio" id="female" name="jk" value="P">
							<label>Perempuan</label>
						</div>
					</div>
					<div class="form-control">
						<small class="err-message" id="err-message">*Periksa kembali inputan anda</small>
						<div class="float-r">
							<button type="button" class="btn btn-cancel" id="cancel" style="display: none;">Cancel</button>
							<button type="submit" class="btn btn-save" id="save">Save</button>
							<button type="submit" class="btn btn-save" id="edit" style="display: none;">Update</button>
						</div>
					</div>
				</form>
			</div>
			<div class="table">
				<div class="search">
					<span class="icon"><svg xmlns="http://www.w3.org/2000/svg" style="width: 30px; height: 30px;" viewBox="0 0 20 20" fill="currentColor">
						<path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" />
					</svg></span>
					<div class="input">
						<input type="text" name="search" placeholder="Search" id="search">
					</div>
				</div>
				<div class="table-box">
					<table>
						<thead>
							<tr>
								<th>No</th>
								<th>NRP</th>
								<th>Nama</th>
								<th>Email</th>
								<th>Gender</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody id="data">
							
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
	<script type="text/javascript" src="assets/main.js"></script>
</body>
</html>