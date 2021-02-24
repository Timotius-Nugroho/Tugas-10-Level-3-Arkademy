
<?php
//koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "arkademy");


function ambil() {
	global $conn;

	$query = "SELECT * FROM produk";
	$result = mysqli_query($conn, $query);
	$rows = [];
	while ( $row = mysqli_fetch_assoc($result) ) {
		$rows[] = $row;
	}
	return $rows;
}


function ambil_2($nama) {
	global $conn;

	$query = "SELECT * FROM produk WHERE nama_produk='$nama'";
	$result = mysqli_query($conn, $query);
	$rows = [];
	while ( $row = mysqli_fetch_assoc($result) ) {
		$rows[] = $row;
	}
	return $rows;
}

function tambah($data) {
	global $conn;

	$nama_produk = htmlspecialchars($data["nama_produk"]);
	$keterangan = htmlspecialchars($data["keterangan"]);
	$harga = htmlspecialchars($data["harga"]);
	//$harga = intval($harga);
	$jumlah = htmlspecialchars($data["jumlah"]);
	//$jumlah = floatval($jumlah);

	$query = "INSERT INTO produk VALUES ('$nama_produk', '$keterangan', $harga, $jumlah)";
	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);
}


function hapus($nama) {
	global $conn;

	$query = "DELETE FROM produk WHERE nama_produk='$nama'";
	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);

}


function ubah($data, $nama) {
	global $conn;

	$nama_produk = htmlspecialchars($data["nama_produk"]);
	$keterangan = htmlspecialchars($data["keterangan"]);
	$harga = htmlspecialchars($data["harga"]);
	$jumlah = htmlspecialchars($data["jumlah"]);

	$query = "UPDATE produk SET
				nama_produk = '$nama_produk',
				keterangan = '$keterangan',
				harga = $harga,
				jumlah = $jumlah WHERE nama_produk='$nama'";

	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);
}


function cari($keyword) {
	global $conn;

	$query = "SELECT * FROM produk WHERE
				nama_produk LIKE '%$keyword%'
				";
	$result = mysqli_query($conn, $query);
	$rows = [];
	while ( $row = mysqli_fetch_assoc($result) ) {
		$rows[] = $row;
	}
	return $rows;	
}

?>