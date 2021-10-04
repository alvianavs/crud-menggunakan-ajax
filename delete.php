<?php
include 'config.php';

if (isset($_GET['id']))
{
	$id = $_GET['id'];
	$query = "delete from mahasiswa where id = $id";
	$result = mysqli_query($conn, $query);
	if (!$result) echo "Error: ". mysqli_error($conn);
}
?>