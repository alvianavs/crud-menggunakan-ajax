<?php 
if (isset($_POST['update'])) {
	include 'config.php';
	$id = $_POST['id'];
	$nama = $_POST['nama'];
	$nrp = $_POST['nrp'];
	$email = $_POST['email'];
	$jk = $_POST['jk'];
	$query = "update mahasiswa set nama='$nama', nrp='$nrp', email='$email', jk='$jk' where id=$id";
	$result = mysqli_query($conn, $query);
	if (!$result) echo "Error: ". mysqli_error($conn);
}


?>