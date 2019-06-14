<?php
include '../config.php';

// mengaktifkan session
session_start();

// cek apakah user telah login, jika belum login maka di alihkan ke halaman login
if($_SESSION['status'] !="login"){
	header("location:../index.php");
}

// menampilkan pesan selamat datang
// echo "Hai, selamat datang ". $_SESSION['username'];

?>
<!DOCTYPE html>
<html>
<head>
	<title>BIOSKOP DINUS</title>
	<!-- <link rel="stylesheet" type="text/css" href="../style.css"> -->
</head>
<body>

	<h2>Input Pesanan Film</h2>
	<br/>
	<a href="index.php">KEMBALI</a>
	<br/>
	<br/>
	<?php
	include '../config.php';
	$jf = $_GET['judul_film'];
  $result = mysqli_query($bd, "SELECT * FROM film a LEFT JOIN jadwal b ON a.id_film = b.id_film where judul_film = '$jf';");
      while ($d = mysqli_fetch_array($result))
      {
  ?>
		<form method="post" action="input.php">
			<table>
				<tr>
					<td>Film</td>
					<td>
						<input type="text" name="judul_film" value="<?php echo $d['judul_film']; ?>">
					</td>
				</tr>
				<tr>
					<td>Studio</td>
					<td><input type="number" name="id_studio" value="<?php echo $d['id_studio']; ?>"></td>
				</tr>
				<tr>
					<td>Jam Tayang</td>
					<td><input type="text" name="jam_tayang" value="<?php echo $d['jam_tayang']; ?>"></td>
				</tr>
				<!-- <tr>
					<td>Jumlah Kursi Tersedia</td>
					<td><input type="text" name="jml_kursi" value="<?php echo $d['jml_kursi']; ?>"></td>
				</tr> -->
				<tr>
					<td>Jumlah Tiket Yang Dipesan</td>
					<td><input type="text" name="jml_kursi" value=""></td>
				</tr>
				<tr>
					<td></td>
					<td><input type="submit" value="SIMPAN"></td>
				</tr>
			</table>
		</form>
<?php
  }
?>
</body>
</html>
