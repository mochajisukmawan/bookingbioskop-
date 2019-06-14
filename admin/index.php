<?php
include '../config.php';

// mengaktifkan session
session_start();

// cek apakah user telah login, jika belum login maka di alihkan ke halaman login
if($_SESSION['status'] !="login"){
    header("location:../index.php");
}

// menampilkan pesan selamat datang
echo "Hai, selamat datang ". $_SESSION['username'];

?>

<?php
include('db.php');
?>
<!DOCTYPE html>
<html lang="zxx">

<head>
    <a href="logout.php">LOGOUT</a>


    <title>Booking Tiket Bioskop	</title>
    <!-- Meta-Tags -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
    <meta name="keywords" content="Tayo Travel, Idola">

    <script>
        addEventListener("load", function () {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        }
    </script>

    <style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
</style>
    <!-- //Meta-Tags -->
    <!-- Index-Page-CSS -->

    <link rel="stylesheet" type="text/css" href="table/datatables.min.css"/>
 
    
    <!-- //Custom-Stylesheet-Links -->
    <!--fonts -->
    <link href="//fonts.googleapis.com/css?family=Source+Sans+Pro:200,200i,300,300i,400,400i,600,600i,700,700i,900,900i" rel="stylesheet">

        <script src="js/jquery-2.2.3.min.js"></script>
    <script type="text/javascript" src="table/datatables.min.js"></script>
              <script>
                $(document).ready( function () {
                    $('#table').DataTable();
                } );
            </script>
    <!-- //fonts -->
</head>




<body onload="onLoaderFunc()">
    <h1>Booking Tiket Bioskop</h1>
    <div class="content">

        <div class="sel-reg">
            <div id="jadwal"> 

                <table id="table" class="display">
                    <thead>
                        <tr>
                            <th>Judul Film</th>
                            <th>Studio</th>
							<th>Jam Tayang</th>

                            <th>action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $result = mysqli_query($bd, "select film.*,jadwal.*,studio.*,jam_tayang.* from jadwal 
							left join film on jadwal.id_film = film.id_film 
							left join studio on jadwal.id_studio = studio.id_studio
							left join jam_tayang on jadwal.id_jam_tayang = jam_tayang.id_jam_tayang
							
							");
                            while ($row = mysqli_fetch_array($result)) {?>
                                <tr>
                                    <td nama="judul_film<?= $row['id_jadwal']?>" id="<?= $row['judul_film']?>" ><?= $row['judul_film']?></td>
                                    <td nama="nama_studio<?= $row['id_jadwal']?>" id="<?= $row['nama_studio']?>" ><?= $row['nama_studio']?></td>
									<td nama="waktu_jam_tayang<?= $row['id_jadwal']?>" id="<?= $row['waktu_jam_tayang']?>"><?= $row['waktu_jam_tayang']?></td>
									
                                    <td><button class="button1" id="<?= $row['id_jadwal']?>" >Pesan</button></td>
                                </tr>

                                    <script>

                                        $( ".button1").click(function() {
                                            var judul = $(this).attr('id');
                                            $(this).attr("onclick","pesan('"+judul+"')")
                                        });
                                  
                                    </script>
                            <?php   } ?>
                    </tbody>

                </table>
            </div>

                <script type="text/javascript">
                    
        function pesan(id){
		
			var id_pesan = id;
			var nama = $("[nama='judul_film"+id+"']").attr('id');
			var judul_film = $("[nama='nama_studio"+id+"']").attr('id');
			var waktu_jam_tayang = $("[nama='waktu_jam_tayang"+id+"']").attr('id');
			
			$("#id_jadwal").attr("value",''+id_pesan+'');
            $("#judul").attr("value",''+nama+'');
			$("#studio , #studio1").attr("value",''+judul_film+'');
			$("#jam_tayang , #jam_Tayang1").attr("value",''+waktu_jam_tayang+'');
			
            $("#jadwal").css("display","none");
            $(".seatStructure *").prop("disabled",true);
            $(".inputForm *").prop("disabled",false);
            $(".inputForm").css("display","block");
            $(".seatStructure").css("display","none");
            $(".displayerBoxes").css("display","none");

        }

                </script>
            <!-- input fields -->

  



            <div class="inputForm">
                <div class="mr_movmain">
                    <div class="movits-right">
                        <label>
                            Judul
                            <span>*</span>
                        </label>
                        <input name="judul" type="text" id="judul" required/>
                        
                    
                    </div>
                </div>
				
				<div class="mr_movmain">
                    <div class="movits-right">
                        <label>
                            Studio
                            <span>*</span>
                        </label>
                        <input name="studio" type="text" id="studio" required/>
                        
                    
                    </div>
                </div>
				<div class="mr_movmain">
                    <div class="movits-right">
                        <label>
                            Jam tayang
                            <span>*</span>
                        </label>
                        <input name="jam_tayang" type="text" id="jam_tayang" required/>
                        
                    
                    </div>
                </div>

                <div class="mr_movmain">
                    <div class="movits-right">
                        <label>
                            Tanggal
                            <span>*</span>
                        </label>
                        <input name="tglBerangkat" type="date" id="TanggalBerangkat" required/>
						
                    
                    </div>
                </div>

                <div class="mr_movmain">
                    <div class="movits-left">
                        <label> Nama
                            <span>*</span>
                        </label>
                        <input name="namaPenumpang" type="text" id="Username" required>
                    </div>
                    <div class="movits-right">
                        <label> Jumlah Kursi
                            <span>*</span>
                        </label>
                        <input name="jmlKursi" type="number" id="Numseats" required min="1">
                    </div>
                </div>
                <button onclick="takeData()"> > Start Selecting</button>
            </div>
            <!-- //input fields -->
            <!-- seat availabilty list -->

            <!-- seat availabilty list -->
            <!-- seat layout -->
            
            <div class="seatStructure txt-center" style="overflow-x:auto;">
                <ul class="seat_sel">
                    <li class="smallBox greenBox">Kursi yang Dipilih</li>

                    <li class="smallBox redBox">Kursi yang Telah Dipesan</li>

                    <li class="smallBox emptyBox">Kursi Tersedia</li>
                </ul>
                
                <table id="seatsBlock">
                    <p id="notification"></p>
                    <tr>
                        <td></td>
                        <td>1</td>
                        <td>2</td>
                        
                        <td></td>
                        <td>3</td>
                        <td>4</td>
                        
                    </tr>
                    <tr>
                        <td>A</td>
                        <td>
                            <input name="pilihKursi[]" type="checkbox" class="seats" value="A1">
                        </td>
                        <td>
                            <input name="pilihKursi[]" type="checkbox" class="seats" value="A2">
                        </td>
                        
                        <td class="seatGap"></td>
                        <td>
                            <input name="pilihKursi[]" type="checkbox" class="seats" value="A3">
                        </td>
                        <td>
                            <input name="pilihKursi[]" type="checkbox" class="seats" value="A4">
                        </td>
                        
                    </tr>

                    <tr>
                        <td>B</td>
                        <td>
                            <input name="pilihKursi[]" type="checkbox" class="seats" value="B1">
                        </td>
                        <td>
                            <input name="pilihKursi[]" type="checkbox" class="seats" value="B2">
                        </td>
                        
                        <td></td>
                        <td>
                            <input name="pilihKursi[]" type="checkbox" class="seats" value="B3">
                        </td>
                        <td>
                            <input name="pilihKursi[]" type="checkbox" class="seats" value="B4">
                        </td>
                        
                    </tr>

                    <tr class="seatVGap"></td>

                    <tr>
                        <td>C</td>
                        <td>
                            <input name="pilihKursi[]" type="checkbox" class="seats" value="C1">
                        </td>
                        <td>
                            <input name="pilihKursi[]" type="checkbox" class="seats" value="C2">
                        </td>
                        
                        <td></td>
                        <td>
                            <input name="pilihKursi[]" type="checkbox" class="seats" value="C3">
                        </td>
                        <td>
                            <input name="pilihKursi[]" type="checkbox" class="seats" value="C4">
                        </td>
                        
                    </tr>

                    <tr>
                        <td>D</td>
                        <td>
                            <input name="pilihKursi[]" type="checkbox" class="seats" value="D1">
                        </td>
                        <td>
                            <input name="pilihKursi[]" type="checkbox" class="seats" value="D2">
                        </td>
                        
                        <td></td>
                        <td>
                            <input name="pilihKursi[]" type="checkbox" class="seats" value="D3">
                        </td>
                        <td>
                            <input name="pilihKursi[]" type="checkbox" class="seats" value="D4">
                        </td>
                        
                    </tr>

                    <tr>
                        <td>E</td>
                        <td>
                            <input name="pilihKursi[]" type="checkbox" class="seats" value="E1">
                        </td>
                        <td>
                            <input name="pilihKursi[]" type="checkbox" class="seats" value="E2">
                        </td>
                        
                        <td></td>
                        <td>
                            <input name="pilihKursi[]" type="checkbox" class="seats" value="E3">
                        </td>
                        <td>
                            <input name="pilihKursi[]" type="checkbox" class="seats" value="E4">
                        </td>
                        
                    </tr>

                    

                    
                </table>

                <br>
                <button onclick="onLoaderFunc()">Kembali < </button>
                <button name="submit" value="Submit" onclick="updateTextArea()"> > Confirm</button>
            </div>
            <!-- //seat layout -->
            <!-- details after booking displayed here -->
            <form method="post" action="cetak_tiket.php"> 
            <div class="displayerBoxes txt-center" style="overflow-x:auto;">
                <table class="Displaytable sel-table" width="100%">
                    <tr>
                        <th>Tanggal</th>
                        <th>Judul</th>
						<th>Studio</th>
						<th>Jam Tayang</th>
                        <th>Nama</th>
                    </tr>
                    <tr>
						<td>
						<input type="hidden" name="id_jadwal" id="id_jadwal">
						</td>
                        <td id="createdate">
                            <textarea id="tanggalDisplay" onclick="tanggal()" name="tanggalDisplay"></textarea>
                        </td>
                        <td>
                            <textarea id="ruteDisplay" name="ruteDisplay"></textarea>
                        </td>
						<td>
                            <input id="studio1" name="studio">
                        </td>
						<td>
                            <input id="jam_Tayang1" name="jam_Tayang">
                        </td>
                        <td>
                            <textarea id="nameDisplay" name="nameDisplay"></textarea>
                        </td>
                    </tr>
<?php 
$result2 = mysqli_query($bd, "select * from kursi");

while ($row2 = mysqli_fetch_array($result2)) {?>
<script>
    $(document).ready( function () {
        $("[value='<?=$row2['kursiid']?>']").css("display","none");
    } );
</script>



<?php }


?>








<script>
    
function tanggal(){

    $("#tanggalDisplay").remove();
    $("#createdate").append('<input type="date" name="tanggalDisplay" >');

}

</script>

                    <tr>
                        <th>Jumlah</th>
                        <th>Tempat Duduk</th>
                    </tr>
                    <tr>
                        <td>
                            <textarea id="NumberDisplay" name="NumberDisplay"></textarea>
                        </td>
                        <td>
                            <textarea id="seatsDisplay" name="seatsDisplay"></textarea>
                        </td>
                    </tr>
                </table>
                <button onclick="takeData()">Kembali < </button>

                <button type="submit"> > Print</button>
            <!-- <input type="submit" value="Print"> -->
            </form>
            </div>
            <!-- //details after booking displayed here -->
        </div>
                        
    </div>
                        <!-- </form> -->
    <div class="copy-mss">
        <p>© Bikini Bottom Bus, 2019</p>
    </div>
    <!-- js -->

    <!-- //js -->
    <!-- script for seat selection -->
    <script>
        /* ******************************************** */
        /* Koding di sini */
        /* ******************************************** */
        function onLoaderFunc(){
            $("#table").css("display","block");
            $(".seatStructure *").prop("disabled",true);
            $(".inputForm *").prop("disabled",false);
            $(".inputForm").css("display","none");
            $(".seatStructure").css("display","none");
            $(".displayerBoxes").css("display","none");
        }

        function takeData(){
            if (($("#Username").val().length == 0) || ($("#Numseats").val().length == 0)){
                alert("Silahkan Masukan Data Penumpang dan Jumlah Kursi");
            }else{
                $(".inputForm *").prop("disabled",true);
                $(".displayerBoxes").css("display","none");
                $(".inputForm").css("display","none");
                $(".seatStructure *").prop("disabled",false);
                $(".seatStructure").css("display","block");


                document.getElementById("notification").innerHTML = 
                    "<b style='margin-bottom:0px; background:#ff9800; letter-spacing:1px;'>Pilih Kursi Dapat Dilakukan!</b>";
            }
        }

        function updateTextArea(){

            if ($("input:checked").length == ($("#Numseats").val())) {

                $(".displayerBoxes").css("display","block");
                $(".seatStructure *").prop("disabled",true);
                $(".seatStructure").css("display","none");


                var allTanggalVals = [];
                //var allRuteVals = [];
                var allNameVals = [];
                var allNumberVals = [];
                var allSeatVals = [];
                var month_string = ["january","febuary","maret","april","mei","juni","juli","agustus","september","oktober","november","desember"  ];

                var date = new Date($('#TanggalBerangkat').val());
                    day = date.getDate();
                    month = date.getMonth() + 1;
                    year = date.getFullYear();

                    var dates = day+" "+month_string[month - 1]+" "+year;
                $('#RuteBerangkat').click(function(){
                    var value = $("#select_option option:selected").val();
                    //To display the selected value we used <p id="result"> tag in HTML file
                    $('#result').append(value);
                });
                var judul = $("#judul").val();
                allNameVals.push($("#Username").val());
                allNumberVals.push($("#Numseats").val());
                $('#seatsBlock :checked').each(function(){
                    allSeatVals.push($(this).val());
                });
                //menampilkan data
                $('#tanggalDisplay').val([dates]);
                $('#ruteDisplay').val(judul);
                $('#nameDisplay').val(allNameVals);
                $('#NumberDisplay').val(allNumberVals);
                $('#seatsDisplay').val(allSeatVals);

            }else{
                alert("Please Select"+($("#Numseats").val())+ " seats");
            }
        }

        function myFunction(){
            alert($("input:checked").length);
        }

        $(":checkbox").click(function(){
            if($("input:checked").length == ($("#Numseats").val())){
                $(":checkbox").prop('disabled',true);
                $(":checked").prop('disabled',false);
            }else{
                $(":checkbox").prop('disabled',false);
            }
        });

    </script>
    <!-- //script for seat selection -->

</body>

</html>