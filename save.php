<?php 
if (isset($_POST['save'])) {
	include 'config.php';
	$nama = $_POST['nama'];
	$nrp = $_POST['nrp'];
	$email = $_POST['email'];
	$jk = $_POST['jk'];
	$query = "insert into mahasiswa (nama, nrp, email, jk) values ('$nama', '$nrp', '$email', '$jk')";
	$result = mysqli_query($conn, $query);
	if (!$result) echo "Error: ". mysqli_error($conn);
}

?>