<?php
include'koneksi.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, 
    initial-scale=1.0">

    <!-- Bootstrap offline -->

    <link rel="stylesheet" href="assets/css/bootstrap.css"> 

    <!-- Bootstrap Online -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" 
    rel="stylesheet" 
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
    crossorigin="anonymous">   
    
    <title>To Do List</title>   <!--Judul Halaman-->
</head>

<body class="p-5">
    <h3>
    To Do List
    <small class="text-muted">
        Catat semua hal yang akan kamu kerjakan disini.
    </small>
	</h3>

<form class="row" method = "POST" action="" name="myForm"">
    <div class="row">
        <div class ="col">
            <label for="inputisi" class="visually-hidden">Kegiatan</label>
            <input type="text" class="form-control" name="isi" id="inputIsi" placeholder="Kegiatan" value="<?php echo $isi ?>">
        </div>
        <div class="col">
        <label for="inputTanggalAwal" class="form-label fw-bold"> Tanggal Awal</label>
            <input type="date" class="form-control" name="tgl_awal" id="inputTanggalAwal" placeholder="Tanggal Awal" value="<?php echo $tgl_awal ?>">
        </div>
        <div class="col mb-2">
            <label for="inputTanggalAkhir" class="form-label fw-bold">Tanggal Akhir</label>
            <input type="date" class="form-control" name="tgl_akhir" id="inputTanggalAkhir" placeholder="Tanggal Akhir" value="<?php echo $tgl_akhir ?>">
        </div>
        <div class="col">
            <button type="submit" class="btn btn-primary rounded-pill px-3" name="simpan">Simpan</button>
    </div>
</form>
<table class="table table-hover">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Kegiatan</th>
            <th scope="col">Awal</th>
            <th scope="col">Akhir</th>
            <th scope="col">Status</th>
            <th scope="col">Aksi</th>
        </tr>
    </thead>
</table>

<button type='button' class='btn btn-primary px-3'>Primary</button>
<button type='button' class='btn btn-secondary'>Secondary</button>
<button type='button' class='btn btn-success'>Success</button>
<button type='button' class='btn btn-danger'>Danger</button>
<button type='button' class='btn btn-warning'>Warning</button>
<button type='button' class='btn btn-info'>Info</button>
<button type='button' class='btn btn-light'>Light</button>
<button type='button' class='btn btn-dark'>Dark</button>
<button type='button' class='btn btn-link'>Link</button>

</body>