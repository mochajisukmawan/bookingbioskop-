<?php
// koneksi database
include '../config.php';

// menangkap data yang di kirim dari form
$id = $_POST['id'];
$judul_film = $_POST['judul_film'];
$id_studio = $_POST['id_studio'];
$jam_tayang = $_POST['jam_tayang'];
$jml_kursi = $_POST['jml_kursi'];

// update data ke database
mysqli_query($config,"INSERT INTO tiket (id_jadwal, tanggal, jml_kursi)
						VALUE ('$id_studio', '$jam_tayang', '$jml_kursi')";

// mengalihkan halaman kembali ke index.php
header("location:index.php");

?>
