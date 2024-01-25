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
		<header class="pb-3 mb-4 border-bottom">
		  <a href="/" class="d-flex align-items-center text-dark text-decoration-none">
			<span class="fs-4 fw-bold">Booking Futsal</span>
		  </a>
		</header>

		<div class="container" style="max-width: 900px;">
		<h1>Jadwal Sewa Lapangan Futsal <button type="button" class="btn btn-primary">Pesan Lapangan</button></h1>
<table class="table table-striped table-hover" id="sortTable" width="100%" cellspacing="0">
              <thead class="thead-dark">
                <tr>
                  <th>Nama Penyewa</th>
                  <th>Waktu Sewa</th>
                </tr>
              </thead>
              <tbody>
                                <tr>
                  <td width="150">
                    Susis PBSI                  </td>
                  <td width="150">
                    Selasa, 11:00 - 13:30                  </td>
                </tr>
                                <tr>
                  <td width="150">
                    Bina R.                  </td>
                  <td width="150">
                    Senin, 14:00 - 16:30                  </td>
                </tr>
                                <tr>
                  <td width="150">
                    Pesona                  </td>
                  <td width="150">
                    Kamis, 08:00 - 10:30                  </td>
                </tr>
                                <tr>
                  <td width="150">
                    Madank                  </td>
                  <td width="150">
                    Senin, 11:00 - 13:30                  </td>
                </tr>
                                <tr>
                  <td width="150">
                    Vortuna                  </td>
                  <td width="150">
                    Senin, 19:00 - 21:30                   </td>
                </tr>
                                <tr>
                  <td width="150">
                    Bina R. Mom                  </td>
                  <td width="150">
                    Sabtu, 08:00 - 10:30                  </td>
                </tr>
                                <tr>
                  <td width="150">
                    Jono PBSI                  </td>
                  <td width="150">
                    Rabu, 11:00 - 13:30                  </td>
                </tr>
                                <tr>
                  <td width="150">
                    Udin PBSI                  </td>
                  <td width="150">
                    Kamis, 11:00 - 13:30                  </td>
                </tr>
                                <tr>
                  <td width="150">
                    Bima                  </td>
                  <td width="150">
                    Selasa, 08:00 - 10:30                  </td>
                </tr>
                                <tr>
                  <td width="150">
                    MEDI                  </td>
                  <td width="150">
                    Jumat, 08:00 - 10:30                  </td>
                </tr>
                                <tr>
                  <td width="150">
                    M.U                  </td>
                  <td width="150">
                    Rabu, 08:00 - 10:30                  </td>
                </tr>
                                <tr>
                  <td width="150">
                    RW                  </td>
                  <td width="150">
                    Senin, 08:00 - 12:30                  </td>
                </tr>
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