<?php
include_once("koneksi.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, 
    initial-scale=1.0">

    <!-- Bootstrap offline -->

    <link rel="stylesheet" href="assets/css/bootstrap.css">
    <link rel='stylesheet' href='styleku.css'> 

    <!-- Bootstrap Online -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" 
    rel="stylesheet" 
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
    crossorigin="anonymous">   
    
    <title>Form Periksa Pasien</title>   <!--Judul Halaman-->
</head>
<head>
  <meta charset="UTF-8">
    <title>Sistem Informasi Poliklinik</title>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css'>
    <link rel='stylesheet' href='styleku.css'>
	<!-- <link rel="icon" type="image/png" href="images/icons/aplogo.ico"/> -->
</head>						
<div class="container">
<h3>
    Form Periksa Pasien
</h3>
<hr>    
<!--Form Input Data-->

<form class="form" method="POST" action="" name="myForm" onsubmit="return(validate());">
    <!-- Kode php untuk menghubungkan form dengan database -->
    <?php
    $id_pasien = '';
    $id_dokter ='';
    $tgl_periksa = '';
    $catatan = '';
    if (isset($_GET['id'])) {
        $ambil = mysqli_query($koneksi, 
        "SELECT * FROM periksa 
        WHERE id='" . $_GET['id'] . "'");
        while ($row = mysqli_fetch_array($ambil)) {
            $id_pasien = $row['id_pasien'];
            $id_dokter = $row['id_dokter'];
            $tgl_periksa = $row['tgl_periksa'];
            $catatan = $row['catatan'];
        }
    ?>
        <input type="hidden" name="id" value="<?php echo
        $_GET['id'] ?>">
    <?php
    }
    ?>
    <div class="col">
    <label class="fw-bold">
                Nama Pasien
            </label>
    <select class="form-control" name="id_pasien" id="datanama" onchange="changeValue(this.value)">
        <option>-Pilih Nama-</option>
        <?php 

        include 'koneksi.php';

        // mysql_connect("localhost","root","");
        // mysql_select_db("poliklinik"); 

        $result = $koneksi->query("select * from pasien");   
        $jsArray = "var dtPasien = new Array();\n";       
        while ($row = mysqli_fetch_array($result)) {   
          echo '<option value="' . $row['id'] . '">' . $row['datanama'] . '</option>';
          $jsArray .= "dtPasien['" . $row['datanama'] . "'] = {
            datanama:'".addslashes($row['datanama'])."'};\n";   
    }
        ?>
      </select>
    </div>
    <br>
    <div class="col">
    <label class="fw-bold">
                Nama Dokter
            </label>
    <select class="form-control" name="id_dokter" id="nama" onchange="changeValue(this.value)">
        <option>-Pilih Nama-</option>
        <?php 

        include 'koneksi.php';

        // mysql_connect("localhost","root","");
        // mysql_select_db("poliklinik"); 

        $result = $koneksi->query("select * from dokter");   
        $jsArray = "var dtDokter = new Array();\n";       
        while ($row = mysqli_fetch_array($result)) {   
          echo '<option value="' . $row['id'] . '">' . $row['nama'] . '</option>';
          $jsArray .= "dtPasien['" . $row['nama'] . "'] = {
            nama:'".addslashes($row['nama'])."'};\n";   
    }
        ?>
      </select>
    </div>
	<br>
	<label class="fw-bold">
    Obat
</label>
<select class="form-control" name="id_obat">
    <option value="">-Pilih Obat-</option>
    <?php
    $result_obat = mysqli_query($koneksi, "SELECT * FROM obat");
    while ($row_obat = mysqli_fetch_array($result_obat)) {
        echo '<option value="' . $row_obat['id'] . '">' . $row_obat['nama_obat'] . '</option>';
    }
    ?>
</select>
    <br>
        <div class="col">
            <label for="inputTglPeriksa" class="form-label fw-bold">
                Tanggal Periksa
            </label>
            <input type="date" class="form-control" name="tgl_periksa" id="inputTanggal" placeholder="TanggalPeriksa" value="<?php echo $tgl_periksa ?>">
        </div>
    <br>
        <div class="col">
            <label for="inputCatatan" class="form-label fw-bold">
                Catatan
            </label>
            <input type="text" class="form-control" name="catatan" id="inputCatatan" placeholder="Catatan" value="<?php echo $catatan ?>">
        </div>
        <br>
        <div class="col">
            <button type="submit" class="btn btn-primary rounded-pill px-3" name="simpan">Simpan</button>
        </div>
</br>
</form>
<!-- Table-->
<table class="table table-hover">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Pasien</th>
            <th scope="col">Dokter</th>
            <th scope="col">Tanggal Periksa</th>
            <th scope="col">Catatan</th>
			<th scope="col">Biaya Periksa</th>
            <th scope="col">Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php
       $result = mysqli_query($koneksi, "SELECT periksa.*, pasien.datanama AS nama_pasien, dokter.nama AS nama_dokter FROM periksa 
                                     LEFT JOIN pasien ON periksa.id_pasien = pasien.id
                                     LEFT JOIN dokter ON periksa.id_dokter = dokter.id
                                     ORDER BY periksa.id_pasien");

        $no = 1;
        foreach ($result as $data){
        ?>
            <tr>
                <th scope="row"><?php echo $no++ ?></th>
                <td><?php echo htmlspecialchars($data['nama_pasien']) ?></td>
				<td><?php echo htmlspecialchars($data['nama_dokter']) ?></td>
                <td><?php echo htmlspecialchars($data['tgl_periksa']) ?></td>
                <td><?php echo htmlspecialchars($data['catatan']) ?></td>
				<td><?php echo htmlspecialchars($data['biaya_periksa']) ?></td>
                <td>
                    <a class="btn btn-info rounded-pill px-3" 
                    href="periksa.php?id=<?php echo $data['id'] ?>">Ubah
                    </a>
                    <a class="btn btn-danger rounded-pill px-3" 
                    href="periksa.php?id=<?php echo $data['id'] ?>&aksi=hapus">Hapus
                    </a>
                </td>
            </tr>
        <?php
        }
        ?>
    </tbody>
</table>
<?php
if (isset($_POST['simpan'])) {
    // Check if 'id_obat' is set in the $_POST array
    if (isset($_POST['id_obat'])) {
        // Mendapatkan harga obat berdasarkan id yang dipilih
        $id_obat = $_POST['id_obat'];
        $query_obat = mysqli_query($koneksi, "SELECT harga FROM obat WHERE id = '$id_obat'");
        $data_obat = mysqli_fetch_assoc($query_obat);
        $harga_obat = $data_obat['harga'];

        // Menghitung biaya periksa dengan menambahkan harga obat
        $biaya_periksa = 150000 + $harga_obat;
    } else {
        // Handle the case where 'id_obat' is not set (you might want to display an error message)
        // For now, set $biaya_periksa to a default value or handle it accordingly
        $biaya_periksa = 150000; // You can adjust this value based on your logic
    }

    // Insert data into periksa table
    if (isset($_POST['id'])) {
       $ubah = mysqli_query($koneksi, "UPDATE periksa SET 
                                    id_pasien = '" . $_POST['id_pasien'] . "',
                                    id_dokter = '" . $_POST['id_dokter'] . "',
                                    tgl_periksa = '" . $_POST['tgl_periksa'] . "',
                                    catatan = '" . $_POST['catatan'] . "',
                                    biaya_periksa = '$biaya_periksa'
                                    WHERE
                                    id = '" . $_POST['id'] . "'");
        $id_periksa = $_POST['id'];
    } else {
        $tambah = mysqli_query($koneksi, "INSERT INTO periksa (id_pasien, id_dokter, tgl_periksa, catatan, biaya_periksa) 
                                        VALUES ( 
                                            '" . $_POST['id_pasien'] . "',
                                            '" . $_POST['id_dokter'] . "',
                                            '" . $_POST['tgl_periksa'] . "',
                                            '" . $_POST['catatan'] . "',
                                            '$biaya_periksa'
                                            )");
        $id_periksa = mysqli_insert_id($koneksi);
    }

    // Insert data into detail_periksa table
    $insert_detail = mysqli_query($koneksi, "INSERT INTO detail_periksa (id_periksa, id_obat) 
                                            VALUES ('$id_periksa', '$id_obat')");

    echo "<script> 
            document.location='periksa.php';
            </script>";
}
?>

<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>
<script src='https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js'></script>

      <script id="rendered-js" >
/* Please ❤ this if you like it! */


(function ($) {"use strict";

  $(function () {
    var header = $(".start-style");
    $(window).scroll(function () {
      var scroll = $(window).scrollTop();

      if (scroll >= 10) {
        header.removeClass('start-style').addClass("scroll-on");
      } else {
        header.removeClass("scroll-on").addClass('start-style');
      }
    });
  });

  //Animation

  $(document).ready(function () {
    $('body.hero-anime').removeClass('hero-anime');
  });

  //Menu On Hover

  $('body').on('mouseenter mouseleave', '.nav-item', function (e) {
    if ($(window).width() > 750) {
      var _d = $(e.target).closest('.nav-item');_d.addClass('show');
      setTimeout(function () {
        _d[_d.is(':hover') ? 'addClass' : 'removeClass']('show');
      }, 1);
    }
  });

  //Switch light/dark

//   $("#switch").on('click', function () {
//     if ($("body").hasClass("dark")) {
//       $("body").removeClass("dark");
//       $("#switch").removeClass("switched");
//     } else
//     {
//       $("body").addClass("dark");
//       $("#switch").addClass("switched");
//     }
//   });

})(jQuery);
//# sourceURL=pen.js
    </script>
</body>
</html>