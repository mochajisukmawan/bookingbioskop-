<?php 
include('db.php');
$sql = "Select id, firstname, lastname FROM MyGuest";
$result = $bd->query($sql);
 ?>
 <!DOCTYPE html>
 <html>
 <head>
 	<title>Booking Tiket Bioskop</title>
 	<!-- Meta-Tags -->
 	<meta name="viewport" content="width=device-width, initial-scale=1">
 	<meta charset="utf-8">
 	<meta name="keywords" content="Tayo Travel, Idola">
 	<link rel="stylesheet" type="text/css" href="css/style.css" media="all">
 	<!-- Custom stylesheet -->
 	<!-- fonts -->
 	<link rel="stylesheet" href="//fonts.googleapis.com/css?family=Source+Sans+Pro:200,200i,300,300i,400,400i,600,600i,700,700i,900,900i">
 	<!-- fonts -->
 </head>
 <body>

 	<!-- <h2>Silahkan Cek Kembali Sebelum di Cetak!</h2> -->
 	<div class="container">
 		<form action="cetak_tiket.php" method="post">
 			<div id="printableArea" class="displayerBoxes txt-center" style="overflow-x: auto;">
 				<h1>Booking Tiket Bioskop</h1>
 				<table class="Displaytable sel-table" width="100%">
 					<tr>
 						<th>Tanggal</th>
 						<th>Judul</th>
						<th>studio : </th>
						<th>jam_tayang</th>
 						<th>Nama</th>
 						<th>Jumlah</th>
 						<th>Tempat Duduk</th>
 					</tr>
 					<tr>
 						<td><?php echo $_POST['tanggalDisplay'];?></td>
 						<td><?php echo $_POST['ruteDisplay'];?></td>
						<td><?php echo $_POST['studio'];?></td>
						<td><?php echo $_POST['jam_Tayang'];?></td>
 						<td><?php echo $_POST['nameDisplay'];?></td>
 						<td><?php echo $_POST['NumberDisplay'];?></td>
 						<td><?php echo $_POST['seatsDisplay'];?></td>

 						<?php 
 						$tgl = $_POST['tanggalDisplay'];
 						$rute = $_POST['ruteDisplay'];
 						$nama = $_POST['nameDisplay'];
 						$jumlahkur = $_POST['NumberDisplay'];
 						$tmpduk = $_POST['seatsDisplay'];
						$id_jadwal = $_POST['id_jadwal'];

 						 $month = array(  "january"=>"01","febuary"=>"02","maret"=>"03","april"=>"04","mei"=>"05","juni"=>"06","juli"=>"07","agustus"=>"08","september"=>"09","oktober"=>"10","november"=>"11","desember"=>"12" );

 						$tgls = explode(" ",$tgl);
 						$hari = $tgls[0];
 						$bulan = $tgls[1];
 						$tahun = $tgls[2];

 						$tglx = $tahun.'-'.$month[$bulan].'-'.$hari;

 						$sql = "insert into pemesanan (id_jadwal , tgl, jalur , jml_kursi , tmp_duduk ) value ('$id_jadwal','$tglx','$rute','$jumlahkur','$tmpduk')";

 						$kursi = explode(",", $tmpduk);

 						for($i = 0 ; $i < $jumlahkur ; $i++){
 						
 						$kursisql = "insert into kursi (kursiid,judul) value ('$kursi[$i]','$rute')";

 						$kursiquery = mysqli_query($bd , $kursisql);

 						};



 						$query = mysqli_query($bd , $sql);


 						?>














 					</tr>
 				</table>
 			</div>
 			<button onclick="printDiv()">Print</button>
 		</form>
 	</div>

 	<div class="copy-mss">
 	</div>
 	<script>
 		function printDiv(){
 			var printContents = document.getElementById("printableArea").innerHTML;
 			var originalContents = document.body.innerHTML;

 			document.body.innerHTML = printContents;

 			window.print();

 			document.body.innerHTML = originalContents;
 			console.log("ditekan");
 		}
 	</script>
 
 </body>
 </html>