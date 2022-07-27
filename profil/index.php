<?php  
	include '../function.php';
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
	.elip{
		text-overflow: ellipsis;    
		overflow: hidden;
    height: 80px;
    line-height: 25px;
    opacity: 0.6;
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
		            	<li><a class="dropdown-item" href="#">Info Kuliah</a></li>
		        	</ul>
	        	</li>

	        	
	        	<li class="nav-item dropdown" style="padding-right: 10px;">
	          		<a class="nav-link dropdown-toggle" style="color: white;font-size: 16px;" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
	            		Kesiswaan
	          		</a>
		        	<ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
		        		<li><a class="dropdown-item" href="#">Tata Tertib</a></li>
		            	<li><a class="dropdown-item" href="#">SOP Pakaian Seragam</a></li>
		            	<li><a class="dropdown-item" href="#">Info Osis</a></li>
		            	<li><a class="dropdown-item" href="#">Daftar Ekskul</a></li>
		            	<li><a class="dropdown-item" href="#">Daftar Nama Siswa</a></li>
		        	</ul>
	        	</li>

	        	<li class="nav-item dropdown" style="padding-right: 10px;">
	          		<a class="nav-link dropdown-toggle" style="color: white;font-size: 16px;" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
	            		Fasilitas
	          		</a>
		        	<ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
		        		<li><a class="dropdown-item" href="#">Denah Sekolah</a></li>
		            	<li><a class="dropdown-item" href="#">Daftar Sarpras Sekolah</a></li>
		        	</ul>
	        	</li>

	        	<li class="nav-item dropdown" style="padding-right: 10px;">
	          		<a class="nav-link dropdown-toggle" style="color: white;font-size: 16px;" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
	            		Media
	          		</a>
		        	<ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
		        		<li><a class="dropdown-item" href="<?= BASEURL;?>media">Profile Video Sekolah</a></li>
		            	<li><a class="dropdown-item" href="<?= BASEURL;?>media">Galeri</a></li>
		            	<li><a class="dropdown-item" href="<?= BASEURL;?>media">Streaming Youtube</a></li>
		        	</ul>
	        	</li>

	        	<li class="nav-item dropdown" style="padding-right: 10px;">
	          		<a class="nav-link dropdown-toggle" style="color: white;font-size: 16px;" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
	            		Berita
	          		</a>
		        	<ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
		        		<li><a class="dropdown-item" href="<?= BASEURL;?>berita">Berita Kegiatan</a></li>
		            	<li><a class="dropdown-item" href="#">Prestasi</a></li>
		            	<li><a class="dropdown-item" href="#">Karya Tulis Ilmiah</a></li>
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

<div class="atas" style="margin: 50px 0 50px 0;">	
	<div class="container">
			

			<div id="dataref">

				<div style="margin: 0 0 70px 0;">
					<center>
						<h4><b>Data Referensi</b></h4>	
					</center>
				</div>
			


				<div class="tabelll" style="margin: 40px 0 70px 0;">				
					<div class="row">
						

						<div class="col-sm-6 mb-3">
							
								<table class="table table-striped">
							  	<thead>
							    	<tr>
							    		<th colspan="2"><center>Identitas Sekolah</center></th>
							    	</tr>
							  	</thead>

								  <tbody>
								    <tr>
								      <th scope="row">Nama</th>
								      <td>SMAN 17 Bandung</td>
								    </tr>

								    <tr>
								      <th scope="row">NPSN</th>
								      <td>20219235</td>
								    </tr>

								    <tr>
								      <th scope="row">Alamat</th>
								      <td>Jl. Tujuhbelas Caringin</td>
								    </tr>

								    <tr>
								      <th scope="row">Kode Pos</th>
								      <td>40223</td>
								    </tr>

								    <tr>
								      <th scope="row">Kelurahan</th>
								      <td>Babakan Ciparay</td>
								    </tr>

								    <tr>
								      <th scope="row">Kecamatan</th>
								      <td>Babakan Ciparay</td>
								    </tr>

								    <tr>
								      <th scope="row">Kota</th>
								      <td>Kota Bandung</td>
								    </tr>

								    <tr>
								      <th scope="row">Provinsi</th>
								      <td>Provinsi Jawa Barat</td>
								    </tr>

								    <tr>
								      <th scope="row">Status Sekolah</th>
								      <td>NEGERI</td>
								    </tr>

								    <tr>
								      <th scope="row">Waktu Penyelenggaraan</th>
								      <td>Sehari Penuh / 5 hari</td>
								    </tr>

								    <tr>
								      <th scope="row">Jenjang Pendidikan</th>
								      <td>SMA</td>
								    </tr>

								  
								  </tbody>

							</table>					
							
						</div>

						<div class="col-sm-6 mb-3">
								

								<table class="table table-striped">
							  	<thead>
							    	<tr>
							    		<th colspan="2"><center>Dokumen dan Perijinan</center></th>
							    	</tr>
							  	</thead>

								  <tbody>
								    <tr>
								      <th scope="row">Naungan</th>
								      <td>Kementrian Pendidikan dan Kebudayaan</td>
								    </tr>

								    <tr>
								      <th scope="row">No. SK. Pendirian</th>
								      <td>0558/O/1984</td>
								    </tr>

								    <tr>
								      <th scope="row">Tanggal SK. Operasional</th>
								      <td>16/09/2013</td>
								    </tr>

								    <tr>
								      <th scope="row">File SK Operasional</th>
								      <td>
								      	<a href="http://vervalsp.data.kemdikbud.go.id/verval/dokumen/skoperasional/65552674.pdf" target="kanan" style="text-decoration: none;">
								      		File SK
								      	</a>
								    	</td>
								    </tr>

								    <tr>
								      <th scope="row">Akreditasi</th>
								      <td><b>A</b></td>
								    </tr>

								    <tr>
								      <th scope="row">No. SK. Akreditasi</th>
								      <td>02.00/330/BAP-SM/XI/2017</td>
								    </tr>

								    <tr>
								      <th scope="row">Tanggal SK. Akreditasi</th>
								      <td>20/11/2017</td>
								    </tr>

								    <tr>
								      <th scope="row">No. Sertifikasi ISO</th>
								      <td>Belum Bersertifikat</td>
								    </tr>
												  
								  </tbody>
								</table>					
							
						</div>
					</div>
				</div>
			</div>

	</div>
</div>

<div class="atas" style="background-color: #f2f2f2;">	
	<div class="container">


			<div id="sejarah" style="padding: 0 0 80px 0;">
				
				<div style="margin: 40px 0 0 0;padding: 60px 0 50px 0;">
					<center>
						<h4><b>Sejarah Singkat</b></h4>	
					</center>
				</div>

				<small>
					Sekolah Menengah Atas (SMA) Negeri 17 Bandung mulai dirintis pada tahun 1982 oleh Bapak Drs. Muhammad Yahya Hasyim. Beliau adalah Kepala SMA Negeri 7 Bandung saat itu, dengan wakil Drs. Iskandar Yahya.

					<br>
					<br>

					Hal ini diawali dari gagasan pembentukan sekolah baru, karena banyaknya calon siswa yang ingin masuk ke SMA Negeri 7 Bandung pada tahun 1982, di mana saat itu hanya bisa menerima 10 kelas. Tetapi, calon siswa yang ingin masuk lebih dari jumlah yang ditentukan, sampai dengan 15 kelas. Hal ini juga dikarenakan, minat masyarakat untuk menyekolahkan putra-putrinya saat itu cukup tinggi.

					<br>
					<br>

					Kantor Wilayah Depdikbud Provinsi Jawa Barat mengijinkan SMA Negeri 7 Bandung untuk menerima 11 kelas, yang berarti kelebihan 4 kelas. Kemudian, Bapak Drs. Muhammad Yahya Hasyim selaku Kepala Sekolah SMA Negeri 7 Bandung segera menghadap ke Kanwil Depdikbud Jawa Barat, untuk membicarakan kelebihan kelas tersebut. Kebetulan pada saat itu Kanwil Depdikbud Provinsi Jawa Barat sedang merencanakan pendirian sekolah negeri baru.

					<br>
					<br>

					Berdasarkan hasil musyawarah, maka siswa yang tidak dapat ditampung di SMA Negeri 7 Bandung ditempatkan di sekolah baru yaitu SMA Negeri kelas jauh atau filial SMA Negeri 7 Bandung yang berlokasi di SD Pajagalan. Yang selanjutnya dikenal dengan SMA Negeri 17 Bandung.

					<br>
					<br>

					Tahun 1983, SMA Negeri 17 Bandung menerima siswa kelas satu sebanyak 5 kelas. Kelas ini berlokasi di SD Pajagalan No. 48, sedangkan kelas 2 dipindahkan ke SMA Negeri 7 Bandung di Jalan Lengkong Kecil.

					<br>
					<br>

					Setelah mempunyai kelas 1, 2 dan 3, maka keluarlah Surat Keputusan No.0558/O/1984 yang ditandatangani oleh Menteri Pendidikan dan Kebudayaan RI Prof. Dr. Nugroho Notosusanto, SH., tentang Pendirian Sekolah yang menyatakan bahwa filial SMA Negeri 7 Bandung, resmi menjadi SMA Negeri ke–17 yang ada di Kotamadya Bandung, dengan lokasi sementara di SD Pajagalan dan di SMA Negeri 7 Bandung.

					<br>
					<br>

					Setelah SMA Negeri 17 Bandung diresmikan, maka permasalahan yang dihadapi adalah lulusan angkatan pertama tahun 1984 apakah termasuk lulusan SMA Negeri 7 Bandung atau SMA Negeri 17 Bandung. Berdasarkan hasil musyawarah, maka ditetapkan bahwa angkatan tersebut sebagai lulusan pertama SMA Negeri 17 Bandung.

					<br>
					<br>

					Gedung SMA Negeri 17 Bandung kemudian mulai dibangun pada bulan Agustus hingga Desember 1985. Tanggal 15 Desember 1985 Tata Usaha SMA Negeri 17 menempati bangunan di Jl. Caringin Babakan Ciparay Bandung, dan tanggal 2 Januari 1986 guru dan murid mulai menempati bangunan baru.

					<br>
					<br>

					Saat itu, bangunan SMA Negeri 17 Bandung baru mempunyai 8 ruang kelas, sehingga adanya waktu pembagian shift belajar kelas 3 dan 2 antara masuk pagi dan siang.
					
					<br>
					<br>
					
					Pada bulan Maret 1986, SMA Negeri 17 Bandung menambah tiga bangunan, yang salah satunya untuk ruang keterampilan. Kemudian, tahun 1988 SMA Negeri 17 Bandung berhasil menambah dua bangunan, 1994 bertambah 4 bangunan, dan di tahun 1996 dibangun ruang perpustakaan. Sehingga pada akhir tahun pelajaran 1996/1997 atau awal tahun pelajaran 1997/1998, SMA Negeri 17 Bandung telah memiliki 16 ruang kelas, dengan tambahan bangunan perpustakaan.
				</small>

			</div>


			<div class="maknalogo pb-5">
				<center>
					<b><h4>Makna Lambang SMA Negeri 17 Bandung</h4></b>
					<br>
					<img src="../assets/logo.png" width="20%">
					<br>
					<br>
					<table class="" cellpadding="10">
						<tr>
							<td>1.</td>
							<td>Alas</td>
							<td>: Sebagai tempat sarana menggali ilmu</td>
						</tr>	

						<tr>
							<td>2.</td>
							<td>Sayap Sebelah Kanan</td>
							<td>: Melambangkan keberadaan siswa laki-laki di SMA Negeri 17 Bandung</td>
						</tr>	

						<tr>
							<td>3.</td>
							<td>Sayap Sebelah Kiri</td>
							<td>: Melambangkan keberadaan sisswa perempuan di SMA Negeri 17 Bandung</td>
						</tr>	

						<tr>
							<td>4.</td>
							<td>Obor</td>
							<td>: Melambangkan penerangan (Cahaya Ilmu Pengetahuan)</td>
						</tr>	

						<tr>
							<td>5.</td>
							<td>Dua Buah Titik</td>
							<td>: Melambangkan Proses Belajar Mengajar</td>
						</tr>

						<tr>
							<td>6.</td>
							<td>Angka Tujuh Belas (17)</td>
							<td>: Melambangkan Persatuan yang kokoh seluruh unsur mengelilingi semua unsur</td>
						</tr>

					</table>

				</center>
			</div>



	</div>
</div>

<div class="atas" style="background-color: #2e5680;margin: 0 0 0 0;color: white;">	
	<div class="container">


			<div id="sejarah" style="padding: 0 0 50px 0;">
				
				<div style="margin: 0 0 40px 0;padding: 60px 0 30px 0;">
					<center>
						<h4><b>Visi dan Misi</b></h4>	
					</center>
				</div>

				<center>
					<b>Visi</b>
					
				<br>
				<br>

				<p>
					<small>
						<i>
							"MENJADI SEKOLAH MENENGAH ATAS TERBAIK DI KOTA BANDUNG YANG BERWAWASAN LINGKUNGAN"
						</i>
					</small>
				</p>
				
				
				<br>
				<br>
				

				<table class="table" width="100%" style="color: white;">

					<thead>
			    	<tr>
			    		<th colspan="2"><center>Misi</center></th>
			    	</tr>
			  	</thead>

					<tr>
						<td>1. </td>
						<td>Membangun kultur sekolah yang religius dan berprestasi</td>
					</tr>

					<tr>
						<td>2. </td>
						<td>Meningkatkan kualitas Sumber Daya Manusia</td>
					</tr>

					<tr>
						<td>3. </td>
						<td>Meningkatkan Profesionalisme Pendidik dan Tenaga Kependidikan</td>
					</tr>

					<tr>
						<td>4. </td>
						<td>Memanfaatkan Ilmu Pengetahuan dan Teknologi (IPTEK) dalam Proses Pembelajaran</td>
					</tr>

					<tr>
						<td>5. </td>
						<td>Membentuk Karakter Peserta Didik melalui Nilai Seni dan Budaya</td>
					</tr>

					<tr>
						<td>6. </td>
						<td>Mewujudkan Sekolah Berwawasan Lingkungan</td>
					</tr>
				
				</table>


				</center>


			</div>

	</div>
</div>




<div class="atas">	
	<div class="container">


		<div id="strukturorg">
			

			<div style="margin: 0 0 0 0;padding: 60px 0 30px 0;">
					<center>
						<h4><b>Struktur Organisasi</b></h4>	
					</center>
				</div>

			<img src="assets/strukturorg.png" width="100%">


		</div>

	</div>
</div>

<!-- Footer -->
<div class="container" style="padding: 100px 0 120px 0;">


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