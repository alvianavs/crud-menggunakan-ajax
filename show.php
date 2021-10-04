<?php 
include 'config.php';

// Mencari data berdasarkan id
if (isset($_GET['id'])) {
	$id = $_GET['id'];
	$qry ="select * from mahasiswa where id=$id";
	$result = mysqli_query($conn, $qry);
	$row = mysqli_fetch_array($result);

	if($row) {
		echo json_encode($row);
	}
	exit();
}



//Pencarian data
if (isset($_GET['key'])) {
	usleep(300000);
	$key = $_GET['key'];
	$query = "select * from mahasiswa where
		nama like '%$key%' or 
		nrp like '%$key%' or 
		email like '%$key%'";
	$result = mysqli_query($conn, $query);
	showData($result);
	exit();
}

//Menampilkan seluruh data
$result = mysqli_query($conn, "select * from mahasiswa");
showData($result);

function showData($result)
{
	$no = 1;
	if (mysqli_num_rows($result) < 1) {
		echo "<tr><td colspan='6'>Tidak ada data</td></tr>";
	} else {
		while ($row = mysqli_fetch_array($result)) { ?>

			<tr>
				<td><?php echo $no++ ?></td>
				<td><?php echo $row['nrp'] ?></td>
				<td><?php echo $row['nama'] ?></td>
				<td><?php echo $row['email'] ?></td>
				<td><?php echo $row['jk'] ?></td>
				<td>
					<a href="#" class="edit-ico" data-id="<?php echo $row['id'] ?>" id="edit-data"><svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
						<path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z" />
						<path fill-rule="evenodd" d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z" clip-rule="evenodd" />
					</svg></a>
					<a href="#" class="delete-ico" data-nama="<?php echo $row['nama'] ?>" data-id="<?php echo $row['id'] ?>" id="delete-data"><svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
						<path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
					</svg></a>
				</td>
			</tr>
			<?php
		}
	}
}

?>