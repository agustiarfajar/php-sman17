<?php
    include 'function.php';
    
    $conn = conn();
    $viewBeritaEksternal = viewBeritaEksternal();
    $viewBeritaInternal = viewBeritaInternal();

    // berita
    $arrayBeritaEksternal = array();
	foreach ($viewBeritaEksternal as $saa) {
		$arrayBeritaEksternal[] = $saa;
	}
	//berita

    // berita
    $arrayBeritaInternal = array();
	foreach ($viewBeritaInternal as $sai) {
		$arrayBeritaInternal[] = $sai;
	}
	//berita

	//kalender
	$selectAllKalender = viewKalender();
	$arrayKalender = array();
	foreach ($selectAllKalender as $sak) {
		$arrayKalender[] = $sak;
	}
	//kalender
    


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
  	
  	<span class="navbar-brand" href="#"><img src="assets/logonavbar.png" width="90%"></span>

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
		        		<li><a class="dropdown-item" href="jadwal/">Jadwal Pelajaran</a></li>
		            	<li><a class="dropdown-item" href="guru/">Daftar Nama Guru / Karyawan</a></li>
                        <li><a class="dropdown-item" href="kalender-akademik/">Kalender Akademik</a></li>
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
	          		<a class="nav-link" style="color: white;font-size: 16px;" href="alumni/">Alumni</a>
	        	</li>

	      	</ul>

    	</div>

  </div>
</nav>

    <!--Navbar-->


    <!-- Carousel -->
    <div class="container mt-5 mb-5">
	    <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
		
		<div class="carousel-inner">

    		<div class="carousel-item active">
      			<img src="assets/head1.jpg" width="100%" class="d-block w-100">
    		</div>
    
    		<div class="carousel-item">
		    	<img src="assets/head2.jpg" width="100%" class="d-block w-100">
		    </div>
		    
		    <div class="carousel-item">
		    	<img src="assets/head3.jpg" width="100%" class="d-block w-100">
		    </div>
  		
  		</div>

  		<button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
		    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
		    <span class="visually-hidden">Previous</span>
  		</button>
	  	
	  	<button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
	    	<span class="carousel-control-next-icon" aria-hidden="true"></span>
	    	<span class="visually-hidden">Next</span>
	  	</button>
	
        </div>
    </div>

    <!-- Carousel -->


    <!-- Berita Eksternal -->
    <div class="container mt-5 mb-5">
		
        <div class="mt-5 mb-5">
            <h2><b>Berita Eksternal</b></h2>
        </div>
        <div class="row">

                <div class="col-sm-4 mb-5">
                    <div class="card" style="border: none;background-color: #f2f2f2;">
                        <div class="card-body">
                            <a href="berita/detailBeritaEksternal.php?idberita=<?= $arrayBeritaEksternal[0]['idBeritaEksternal']?>" style="text-decoration: none;">                 
                                <div class="gambar">
                                    <center>
                                        <img src="admin-manage-sman17bandung/pages/file/berita_eksternal/<?= $arrayBeritaEksternal[0]['fotoBerita']?>" width="300px">
                                    </center>
                                </div>
                                <div class="isi mt-2">
                                        <p>
                                            <div style="text-overflow: ellipsis;width: 18em;white-space: nowrap;overflow: hidden;color: black;">
                                                <b><?= $arrayBeritaEksternal[0]['namaBeritaEksternal']?></b>
                                            </div>

                                            <small><i class="fas fa-calendar-alt"></i> <?= $arrayBeritaEksternal[0]['tanggal']?></small>

                                            <div class="elip">
                                                <small>
                                                    <?= $arrayBeritaEksternal[0]['isiBeritaEksternal']?>
                                                </small>
                                            </div>						
                                        </p>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>


                <div class="col-sm-4 mb-5">
                    <div class="card" style="border: none;background-color: #f2f2f2;">
                        <div class="card-body">
                            <a href="berita/detailBeritaEksternal.php?idberita=<?= $arrayBeritaEksternal[1]['idBeritaEksternal']?>" style="text-decoration: none;">
                            
                                <div class="gambar">
                                    <center>
                                        <img src="admin-manage-sman17bandung/pages/file/berita_eksternal/<?= $arrayBeritaEksternal[1]['fotoBerita']?>" width="300px">
                                    </center>
                                </div>
                                <div class="isi mt-2">
                                        <p>
                                            <div style="text-overflow: ellipsis;width: 18em;white-space: nowrap;overflow: hidden;color: black;">
                                                <b><?= $arrayBeritaEksternal[1]['namaBeritaEksternal']?></b>
                                            </div>

                                            <small><i class="fas fa-calendar-alt"></i> <?= $arrayBeritaEksternal[1]['tanggal']?></small>

                                            <div class="elip">
                                                <small>
                                                    <?= $arrayBeritaEksternal[1]['isiBeritaEksternal']?>
                                                </small>
                                            </div>						
                                        </p>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-sm-4 mb-5">
                    <div class="card" style="border: none;background-color: #f2f2f2;">
                        <div class="card-body">
                            <a href="berita/detailBeritaEksternal.php?idberita=<?= $arrayBeritaEksternal[2]['idBeritaEksternal']?>" style="text-decoration: none;">
                            
                                <div class="gambar">
                                    <center>
                                        <img src="admin-manage-sman17bandung/pages/file/berita_eksternal/<?= $arrayBeritaEksternal[2]['fotoBerita']?>" width="300px">
                                    </center>
                                </div>
                                <div class="isi mt-2">
                                        <p>
                                            <div style="text-overflow: ellipsis;width: 18em;white-space: nowrap;overflow: hidden;color: black;">
                                                <b><?= $arrayBeritaEksternal[2]['namaBeritaEksternal']?></b>
                                            </div>

                                            <small><i class="fas fa-calendar-alt"></i> <?= $arrayBeritaEksternal[2]['tanggal']?></small>

                                            <div class="elip">
                                                <small>
                                                    <?= $arrayBeritaEksternal[2]['isiBeritaEksternal']?>
                                                </small>
                                            </div>						
                                        </p>
                                </div>
                            </a>
                        </div>
                    </div>
               </div>	
            </div>
            <a href="berita/beritaEksternal.php" class="" style="text-decoration: none;color: black;">
                <b>
                    Berita Eksternal Lainnya > 
                </b>
            </a>

    </div>
    <!-- Berita Eksternal -->


    <!-- Profile -->
    <div class="tengah mt-5" style="background-color: #2E5680;color: white;">
	
        <div class="container pt-3 pb-5">
            <div class="mt-5 mb-2 pb-3">
                <center><h1>Profil Sekolah</h1></center>
            </div>

            <div class="pb-3">
                <center>
                    <p>
                        Sekolah Menengah Atas (SMA) Negeri 17 Bandung mulai dirintis pada tahun 1982 oleh Bapak Drs. Muhammad Yahya Hasyim. Beliau adalah Kepala SMA Negeri 7 Bandung saat itu, dengan wakil Drs. Iskandar Yahya.

                        Hal ini diawali dari gagasan pembentukan sekolah baru, karena banyaknya calon siswa yang ingin masuk ke SMA Negeri 7 Bandung pada tahun 1982, di mana saat itu hanya bisa menerima 10 kelas. Tetapi, calon siswa yang ingin masuk lebih dari jumlah yang ditentukan, sampai dengan 15 kelas. Hal ini juga dikarenakan, minat masyarakat untuk menyekolahkan putra-putrinya saat itu cukup tinggi. 
                    </p>
                    <br>
                    <a href="profil/index.php" class="btn bg-light">Read More</a>
                </center> 
            </div>

        </div>
    </div>
    <!-- Profile -->


    <!-- Kalender dan Agenda -->
    <div class="pt-5" style="background-color: #f2f2f2;">
        <div class="container pt-3 pb-3">
            <div class="row">
                
                <div class="col-sm-7 mb-3">
                    

                    <div class="container">
                        <h2><b>Berita Internal</b></h2>
                    </div>
                    

                    <div class="container agenda-isi mt-5 mb-3">
                        <div class="row" style="background-color: white;padding: 30px 20px 20px 20px;width: 100%;border-radius: 5px;">
                            <h5 style="color: black;">
                            <div style="text-overflow: ellipsis;width: 18em;white-space: nowrap;overflow: hidden;color: black;">
                                <b><?= $arrayBeritaInternal[0]['namaBeritaInternal']?></b>
                            </div>
                            </h5>
                            
                            <div class="mt-3 mb-3">
                            <img src="admin-manage-sman17bandung/pages/file/berita_internal/<?= $arrayBeritaInternal[0]['fotoBerita']?>" width="100%">
                            </div>

                            <div style="text-overflow: ellipsis;width: 18em;white-space: nowrap;overflow: hidden;color: black;">
                                <?= $arrayBeritaInternal[0]['isiBeritaInternal']?>
                            </div>

                            <p style="color: black;">
                                <small>
                                    <i class="fas fa-calendar"></i> <?= $arrayBeritaInternal[0]['tanggal'];?>
                                    <br>
                                </small>		
                            </p>
                        </div>
                    </div>


                    <div class="container agenda-isi mt-5 mb-3">
                        <div class="row" style="background-color: white;padding: 30px 20px 20px 20px;width: 100%;border-radius: 5px;">
                            <h5 style="color: black;">
                            <div style="text-overflow: ellipsis;width: 18em;white-space: nowrap;overflow: hidden;color: black;">
                                <b><?= $arrayBeritaInternal[1]['namaBeritaInternal']?></b>
                            </div>
                            </h5>
                            
                            <div class="mt-3 mb-3">
                            <img src="admin-manage-sman17bandung/pages/file/berita_internal/<?= $arrayBeritaInternal[1]['fotoBerita']?>" width="100%">
                            </div>
                        
                            <p style="color: black;">
                                <small>
                                    <i class="fas fa-calendar"></i> <?= $arrayBeritaInternal[1]['tanggal'];?>
                                    <br>
                                </small>		
                            </p>
                        </div>
                    </div>

                <p class="pt-5">
                    <b>
                        <a href="<?= BASEURL?>berita/beritaInternal.php" class="container" style="text-decoration: none;color: black;">
                            Berita Internal Lainnya > 
                        </a>
                    </b>
                </p>	

                </div>

                <div class="col-sm-5 mb-3">

                    
                <div class="container">
                    <h2><b>Kalender Akademik</b></h2>
                </div>
                    

                    <div class="container agenda-isi mt-5 mb-3">


                        <div class="row" style="background-color: white;padding: 20px 20px 20px 20px;width: 100%;border-radius: 5px;">
                            <small>
                                <b><?= $arrayKalender[0]['namaKalender']?></b>
                                <br>
                                <i class="fas fa-calendar"></i> &nbsp; <?= $arrayKalender[0]['tanggalKalender']?>
                            </small>
                        </div>

                    </div>


                    <div class="container agenda-isi mt-5 mb-3">


                        <div class="row" style="background-color: white;padding: 20px 20px 20px 20px;width: 100%;border-radius: 5px;">
                            <small>
                                <b><?= $arrayKalender[1]['namaKalender']?></b>
                                <br>
                                <i class="fas fa-calendar"></i> &nbsp; <?= $arrayKalender[0]['tanggalKalender']?>
                            </small>
                        </div>

                    </div>

                    <div class="container agenda-isi mt-5 mb-3">


                        <div class="row" style="background-color: white;padding: 20px 20px 20px 20px;width: 100%;border-radius: 5px;">
                            <small>
                                <b><?= $arrayKalender[2]['namaKalender']?></b>
                                <br>
                                <i class="fas fa-calendar"></i> &nbsp; <?= $arrayKalender[0]['tanggalKalender']?>
                            </small>
                        </div>

                    </div>

                    <div class="container agenda-isi mt-5 mb-3">


                        <div class="row" style="background-color: white;padding: 20px 20px 20px 20px;width: 100%;border-radius: 5px;">
                            <small>
                                <b><?= $arrayKalender[3]['namaKalender']?></b>
                                <br>
                                <i class="fas fa-calendar"></i> &nbsp; <?= $arrayKalender[0]['tanggalKalender']?>
                            </small>
                        </div>

                    </div>




                    <p class="pt-5">
                        <b>
                            <a href="<?= BASEURL?>kalender-akademik" class="container align-self-end" style="text-decoration: none;color: black;">
                                Selengkapnya > 
                            </a>
                        </b>
                    </p>



                
                </div>


            </div>
        </div>
    </div>
    <!-- Kalender dan Agenda -->


    <!-- Footer -->
    <div class="container" style="padding: 300px 0 120px 0;">


        <div class="row">


            <div class="col-sm-6 mb-3" style="">
                    
                    <div class="container">
                        <h3><b>Informasi Kontak</b></h3>
                        <br>
                        <br>
                        <h5><b>SMA Negeri 17 Bandung</b></h5>
                        <p>
                            Jl. Caringin, Babakan Ciparay, Kec. Babakan <br>
                            Ciparay, Kota Bandung, 
                            Jawa Barat 40223
                        </p>
                        <p>Telepon  &nbsp;&nbsp;&nbsp;   (022) 6078486</p>
                    </div>

            </div>


            <div class="col-sm-5 mb-3">
                <div class="container">

                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3960.5653505505693!2d107.57302381406838!3d-6.942433994984151!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68e8b9df393941%3A0x1a9ea0f5e6091fae!2sSMA%20Negeri%2017%20Kota%20Bandung!5e0!3m2!1sid!2sid!4v1641357785386!5m2!1sid!2sid" width="100%" height="350px" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                </div>
            </div>
        
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
                        <a href="#" style="color: white;text-decoration: none;font-size: 15px;">Website Utama SMAN 17 Bandung</a><br>
                        <a href="ppdb/" style="color: white;text-decoration: none;font-size: 15px;">PPDB</a><br>
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