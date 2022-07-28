<?php
	include '../function.php';

	$getidBerita = $_GET['idberita'];
	$conn = conn();

	$checkBeritaById = "SELECT * FROM berita_internal WHERE idBeritaInternal = '$getidBerita'";
	$executeBeritaById = mysqli_query($conn, $checkBeritaById);

	$selectAll = mysqli_query($conn, "SELECT * FROM berita_internal");
	$array = array();
	foreach ($selectAll as $row) {
		$array[] = $row;
	}

	date_default_timezone_set("Asia/Jakarta");	
?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>SMAN 17 BANDUNG</title>
	<link rel="icon" href="../assets/logo.png">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>

<style type="text/css">
	body{
		background-color: #F2F2F2;
	}

	.elip{
		text-overflow: ellipsis;    
		overflow: hidden;
    height: 170px;
    line-height: 25px;
    opacity: 0.6;
    color: black;
	}

	.elipp{
		text-overflow: ellipsis;    
		overflow: hidden;
		height: 50px;
    line-height: 25px;
    color: black;
	}

</style>

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
		        		<li><a class="dropdown-item" href="<?= BASEURL;?>profil">Sejarah</a></li>
		            	<li><a class="dropdown-item" href="<?= BASEURL;?>profil">Visi, Misi & Makna Logo</a></li>
		            	<li><a class="dropdown-item" href="<?= BASEURL;?>profil/hymne.php">Hymne Sekolah</a></li>
		            	<li><a class="dropdown-item" href="#">Program Unggulan</a></li>
		            	<li><a class="dropdown-item" href="<?= BASEURL;?>profil">Akreditasi Sekolah</a></li>
		            	<li><a class="dropdown-item" href="#">Komite Sekolah</a></li>

		        	</ul>
	        	</li>

	        	<li class="nav-item dropdown" style="padding-right: 10px;">
	          		<a class="nav-link dropdown-toggle" style="color: white;font-size: 16px;" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
	            		Akademik
	          		</a>
		        	<ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
		        		<li><a class="dropdown-item" href="#">Jadwal Pelajaran</a></li>
		            	<li><a class="dropdown-item" href="#">Daftar Nama Guru / Karyawan</a></li>
		        	</ul>
	        	</li>

	        	<li class="nav-item dropdown" style="padding-right: 10px;">
	          		<a class="nav-link dropdown-toggle" style="color: white;font-size: 16px;" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
	            		PPDB
	          		</a>
		        	<ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
		        		<li><a class="dropdown-item" href="#">Info PPDB</a></li>
		            	<li><a class="dropdown-item" href="#">Website Resmi PPDB</a></li>
		        	</ul>
	        	</li>



	        	<li class="nav-item" style="padding-right: 10px;">
	          		<a class="nav-link" style="color: white;font-size: 16px;" href="#">Alumni</a>
	        	</li>

	      	</ul>

    	</div>

  </div>
</nav>




<div class="container pt-5 mt-2">

	<div class="row">

		<?php foreach ($executeBeritaById as $val): ?>
		<div class="col-sm-8 mb-4">
			<h4><?= $val['namaBeritaInternal']?></h4>

			<small style="color: #00000099;"><?= $val['tanggal']?></small>
			<br>
			<br>
			
			<p>
				<center>
					<img src="../admin-manage-sman17bandung/pages/file/berita_internal/<?= $val['fotoBerita']?>" width="65%">
				</center>
			</p>

			<br>
			<br>
			<?= $val['isiBeritaInternal']?>
		</div>
		<?php endforeach ?>
	</div>
</div>





<div class="footerr" style="background-color: #2E5680;color: white;">
	<div class="container pt-5 pb-5">
		
		<div class="row">
			
			<div class="col-sm-3 mb-3">
				 	
				<div class="container">
					<h4>Sistem Informasi</h4>
					<hr width="80%">
					<br>
					<a href="" style="color: white;text-decoration: none;font-size: 15px;">Website Utama SMAN 17 Bandung</a><br>
					<a href="" style="color: white;text-decoration: none;font-size: 15px;">Digital Library</a><br>
					<a href="" style="color: white;text-decoration: none;font-size: 15px;">Repository</a><br>
					<a href="" style="color: white;text-decoration: none;font-size: 15px;">PPDB</a><br>
				</div>

			</div>

			<div class="col-sm-3 mb-3">
				
				<div class="container">
					<h4>Tautan Akademik</h4>
					<hr width="80%">
					<br>
					<a href="" style="color: white;text-decoration: none;font-size: 15px;">Edubox SMAN 17 Bandung</a>
				</div>

			</div>

			<div class="col-sm-3 mb-3">
				
				<div class="container">
					<h4>Informasi</h4>
					<hr width="80%">
					<br>
					<a href="" style="color: white;text-decoration: none;font-size: 15px;">Galeri</a><br>
					<a href="" style="color: white;text-decoration: none;font-size: 15px;">Data Kemdikbud</a>
				</div>

			</div>


			<div class="col-sm-3 mb-3">
				
				<div class="container">
					<h4>Media Sosial</h4>
					<hr width="80%">
					<br>
					<iframe width="100%" height="80%" src="https://www.youtube.com/embed/HQFvJF9AMh4" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>

					<br>
					<br>

					<a href="https://twitter.com/sman17_bdg"><i class="fab fa-twitter" style="font-size: 40px; color: white;padding-right: 30px;"></i></a>
					<a href="https://www.instagram.com/sman_17_bandung/"><i class="fab fa-instagram" style="font-size: 40px; color: white;padding-right: 30px;"></i></a>
					<a href="https://www.facebook.com/SMANegeri17Bandung/"><i class="fab fa-facebook" style="font-size: 40px; color: white;padding-right: 30px;"></i></a>
				</div>

			</div>

		</div>
	</div>
</div>


<div class="hak" style="padding: 30px 0 10px 0;">
	
	<div class="container">
		<div class="container"><p><small><b>Hak Cipta </b> <i>fiz</i> , <b>&copy; SMA Negeri 17 Bandung, 2022</b></small></p>
		</div>
	</div>

</div>






<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>