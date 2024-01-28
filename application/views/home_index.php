<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Ilham Setia Bhakti">
    <title>Homepage</title>
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Orbitron&family=Roboto:wght@300&display=swap" rel="stylesheet">
    <!-- Bootstrap core CSS -->
	<link href="<?=base_url();?>css/bootstrap.min.css" rel="stylesheet" >
	<link href="<?=base_url();?>css/style.css" rel="stylesheet" >    
  </head>
  <body>
    
	<main>
	  <div class="container py-4">
		<header class="pb-3 text-uppercase mb-4 border-bottom">
		  <a href="/" class="d-flex align-items-center text-dark text-decoration-none">
			<span class="fs-4 fw-bold">Booking Online</span>
		  </a>
		</header>

		<div class="container" style="max-width: 900px;">
		<h1>Jadwal Sewa Lapangan Bulu Tangkis</h1>
<div class="alert alert-warning" role="alert">
  Untuk pemesanan lapangan hubungi 089989XXXX
</div>
<table class="table table-striped table-hover" id="sortTable" width="100%" cellspacing="0">
              <thead class="thead-dark">
                <tr>
                  <th>Nama Penyewa</th>
                  <th>Waktu Sewa</th>
                </tr>
              </thead>
              <tbody>
			  <?php foreach($array_jadwal as $jadwal): ?>
				<tr>
                  <td width="150">
					<?=$jadwal->nama_penyewa;?>                  </td>
                  <td width="150">
                    <?=$jadwal->waktu_sewa;?>                  </td>
                </tr>
				<?php endforeach; ?>
			  </tbody>
            </table>
		</div>

		<footer class="pt-3 mt-4 container text-muted border-top">
			<div class="d-flex justify-content-between">
				<div>&copy; 2024</div>
				<div><a href="<?=site_url('akun')?>">Login Admin</a></div>
			</div>		  
		</footer>
	  </div>
	</main>
	
	<script src="<?=base_url()?>js/script.js"></script> 
	<script>
	const x = document.getElementById("lokasi");

	function getLocation() {
	  if (navigator.geolocation) {
		navigator.geolocation.getCurrentPosition(showPosition);
	  } else { 
		x.innerHTML = "Geolocation is not supported by this browser.";
		alert("BROWSER NOT OK!");
	  }
	}

	function showPosition(position) {
	  console.log("OK");
	  x.value = position.coords.latitude + "," + position.coords.longitude;
	}
	</script>

  </body>
</html>