<?php
	include '../function.php';

    $db = conn();
    
    $kueriAgenda = "SELECT * FROM kalender";
	$executeAgenda = mysqli_query($db, $kueriAgenda);
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
						<li><a class="dropdown-item" href="../jadwal">Jadwal Pelajaran</a></li>
		            	<li><a class="dropdown-item" href="../guru">Daftar Nama Guru</a></li>
						<li><a class="dropdown-item" href="#">Kalender Akademik</a></li>
		        	</ul>
	        	</li>

	        	<!-- <li class="nav-item dropdown" style="padding-right: 10px;">
	          		<a class="nav-link dropdown-toggle" style="color: white;font-size: 16px;" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
	            		Media
	          		</a>
		        	<ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
		        		<li><a class="dropdown-item" href="<?= BASEURL;?>media">Profile Video Sekolah</a></li>
		        	</ul>
	        	</li> -->

	        	<li class="nav-item dropdown" style="padding-right: 10px;">
	          		<a class="nav-link dropdown-toggle" style="color: white;font-size: 16px;" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
	            		PPDB
	          		</a>
		        	<ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
		        		<li><a class="dropdown-item" href="../ppdb/">Info PPDB</a></li>
		        	</ul>
	        	</li>

	        	<li class="nav-item" style="padding-right: 10px;">
	          		<a class="nav-link" style="color: white;font-size: 16px;" href="../alumni/">Alumni</a>
	        	</li>

	      	</ul>

    	</div>

  </div>
</nav>


<div class="pt-5 pb-5">
	<h4>
		<center>
		<b>
			Kalender Akademik
		</b>
	</center>
	</h4>
</div>

<div class="container mb-5" style="font-family: Canela Deck Web;">


	<div class="row">
		
		<?php foreach ($executeAgenda as $value): ?>
		<div class="col-sm-4 mb-5">
			<div class="container">
				<div class="row" style="background-color: white;padding: 20px 20px 20px 20px;width: 100%;border-radius: 5px;">
					<div class="" style="color: black;">
						<b><?= htmlspecialchars($value['namaKalender'])?></b>
					</div>
					<br>

					<small>
						<div class="elip pt-3" style="color: black;">
							<table cellpadding="5">
								<tr>
									<td><i class="fas fa-calendar"></i></td>
									<td><?= $value['tanggalKalender']?></td>
								</tr>
							</table>
						</div>
					</small>
				</div>
			</div>
		</div>
		<?php endforeach ?>
		

	</div>
</div>





<!-- Footer -->
<div class="footerr" style="background-color: #2E5680;color: white;">
<div class="container pt-5 pb-5">
    
    <div class="row">
        
        <div class="col-sm-3 mb-3">
                
            <div class="container">
                <h4>Sistem Informasi</h4>
                <hr width="80%">
                <br>
                <a href="" style="color: white;text-decoration: none;font-size: 15px;">Website Utama SMAN 17 Bandung</a><br>
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
    <div class="container"><p><small><b>Hak Cipta </b> <i>fizdev</i> , <b>&copy; SMA Negeri 17 Bandung, 2022</b></small></p>
    </div>
</div>

</div>
<!-- Footer -->












<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>