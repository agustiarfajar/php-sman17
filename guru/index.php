<?php
    include '../function.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SMAN 17 Bandung</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
    
<style type="text/css">
	.elip{
		text-overflow: ellipsis;    
		overflow: hidden;
        height: 80px;
        line-height: 25px;
        opacity: 0.6;
        color: black;
	}
</style>

    <!--Navbar-->
<nav class="navbar navbar-expand-lg" style="background-color: #2E5680;">
  <div class="container-fluid">
  	
  	<span class="navbar-brand" href="#"><img src="../assets/logonavbar.png" width="90%"></span>

    	<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
		<i class="fas fa-bars navbar-toggler-icon" style="color: white"></i>
    	</button>

    	<div class="collapse navbar-collapse" id="navbarNavDropdown">
      	
	      	<ul class="navbar-nav ms-auto my-2 my-lg-0 navbar-nav-scroll">


	      		<li class="nav-item" style="padding-right: 10px;">
	          		<a class="nav-link" style="color: white;font-size: 16px;" href="<?= BASEURL;?>">Home</a>
	        	</li>


	        	<li class="nav-item dropdown" style="padding-right: 10px;">
	          		<a class="nav-link dropdown-toggle" style="color: white;font-size: 16px;" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
	            		Profil Sekolah
	          		</a>
		        	<ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
						<li><a class="dropdown-item" href="<?= BASEURL;?>profil">Profil</a></li>
		            	<!-- <li><a class="dropdown-item" href="<?= BASEURL;?>profil">Visi, Misi & Makna Logo</a></li>
		            	<li><a class="dropdown-item" href="<?= BASEURL;?>profil/hymne.php">Hymne Sekolah</a></li>
		            	<li><a class="dropdown-item" href="#">Program Unggulan</a></li>
		            	<li><a class="dropdown-item" href="<?= BASEURL;?>profil">Akreditasi Sekolah</a></li>
		            	<li><a class="dropdown-item" href="#">Komite Sekolah</a></li> -->

		        	</ul>
	        	</li>


	        	<li class="nav-item dropdown" style="padding-right: 10px;">
	          		<a class="nav-link dropdown-toggle" style="color: white;font-size: 16px;" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
	            		Akademik
	          		</a>
		        	<ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
		        		<li><a class="dropdown-item" href="../jadwal/">Jadwal Pelajaran</a></li>
		            	<li><a class="dropdown-item" href="#">Daftar Nama Guru / Karyawan</a></li>
						<li><a class="dropdown-item" href="../kalender-akademik/">Kalender Akademik</a></li>
		        	</ul>
	        	</li>

	        	<li class="nav-item dropdown" style="padding-right: 10px;">
	          		<a class="nav-link dropdown-toggle" style="color: white;font-size: 16px;" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
	            		PPDB
	          		</a>
		        	<ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
		        		<li><a class="dropdown-item" href="../ppdb">Info PPDB</a></li>
		            	<li><a class="dropdown-item" href="#">Website Resmi PPDB</a></li>
		        	</ul>
	        	</li>



	        	<li class="nav-item" style="padding-right: 10px;">
	          		<a class="nav-link" style="color: white;font-size: 16px;" href="../alumni/">Alumni</a>
	        	</li>

	      	</ul>

    	</div>

  </div>
</nav>
<!-- Navbar -->

<div class="pt-5 pb-5">
	<h4>
		<center>
		<b>
			Tabel Guru dan Staff di SMAN 17 Bandung
		</b>
	</center>
	</h4>
</div>


<!-- Jadwal -->

<div class="container">


    <table class="table mt-5">

        <thead>
            <tr>
                <th>No</th>
                <th>ID Guru</th>
                <th>Nama Guru</th>
            </tr>
        </thead>
        
        <?php $no = 1; $conn = conn(); $sql = "SELECT * FROM guru"; $exec = mysqli_query($conn, $sql);?>
        <?php foreach($exec as $resGuru):?>
        <tr>
            <td><?= $no++;?></td>
            <td><?= $resGuru['idGuru']?></td>
            <td><?= $resGuru['namaGuru']?></td>
        </tr>
        <?php endforeach;?>

    </table>


</div>

<!-- Jadwal -->


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>