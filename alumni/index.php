<?php  
	include '../function.php';


	$years = range(2015, strftime("%Y", time()));
    $conn = conn();
	if (isset($_POST['postData'])) {
		$idAlumni = random_int('3', '999');
		$namaLengkap = mysqli_real_escape_string($conn, $_POST['namaLengkap']);
		$tahunLulus = mysqli_real_escape_string($conn, $_POST['tahunLulus']);
		$jurusansma = mysqli_real_escape_string($conn, $_POST['jurusansma']);
		$email = mysqli_real_escape_string($conn, $_POST['email']);
		$alamatRumah = mysqli_real_escape_string($conn, $_POST['alamatRumahAlumni']);
		$noTelpAlumni = mysqli_real_escape_string($conn, $_POST['noTelpAlumni']);
		$pendidikanTerakhir = mysqli_real_escape_string($conn, $_POST['pendidikanTerakhir']);
		$pekerjaanAlumni = mysqli_real_escape_string($conn, $_POST['pekerjaanAlumni']);
		$universitasAlumni = mysqli_real_escape_string($conn, $_POST['universitasAlumni']);
		$jenjang = mysqli_real_escape_string($conn, $_POST['jenjang']);
		$fakultas = mysqli_real_escape_string($conn, $_POST['fakultas']);
		$jurusan = mysqli_real_escape_string($conn, $_POST['jurusan']);
		$saranAlumni = mysqli_real_escape_string($conn, $_POST['saranAlumni']);


		$kueriAlumni = "INSERT INTO alumni (idAlumni, namaLengkap, tahunLulus, jurusansma, email, alamatRumah, noTelpAlumni, pendidikanTerakhir, pekerjaanAlumni, universitasAlumni, jenjang, fakultas, jurusan, saranAlumni) VALUES ('$idAlumni','$namaLengkap','$tahunLulus','$jurusansma','$email','$alamatRumah','$noTelpAlumni','$pendidikanTerakhir','$pekerjaanAlumni','$universitasAlumni','$jenjang','$fakultas','$jurusan','$saranAlumni')";
		$executeAlumni = mysqli_query($conn, $kueriAlumni);
	
		if ($executeAlumni) {
			echo "<script>alert('Sukses :: Data Sukses diupload')</script>";
		}else{
			echo "<script>alert('Gagal :: Data Gagal diupload')</script>";
		}
	}



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
		            	<li><a class="dropdown-item" href="../guru/">Daftar Nama Guru</a></li>
						<li><a class="dropdown-item" href="../kalender-akademik/">Kalender Akademik</a></li>
		        	</ul>
	        	</li>

	        	<li class="nav-item dropdown" style="padding-right: 10px;">
	          		<a class="nav-link dropdown-toggle" style="color: white;font-size: 16px;" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
	            		PPDB
	          		</a>
		        	<ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
		        		<li><a class="dropdown-item" href="../ppdb/">Info PPDB</a></li>
		        	</ul>
	        	</li>



	        	<li class="nav-item" style="padding-right: 10px;">
	          		<a class="nav-link" style="color: white;font-size: 16px;" href="#">Alumni</a>
	        	</li>

	      	</ul>

    	</div>

  </div>
</nav>



<div class="pt-5 pb-5" style="background-color: #f2f2f2;">
	<div class="container">
		<h4><b>Form Data Alumni</b></h4>
		<hr>

		<p>Mohon diisi sesuai kebenarannya. Informasi yang Anda kirim hanya untuk keperluan pendataan di sekolah dan tidak akan di publikasikan</p>

		<br>

		<form action="" method="POST">
			
			<div class="mt-5">
				<b>Nama Lengkap</b>
				<input type="text" class="form-control" name="namaLengkap" placeholder="Nama Lengkap">
			</div>

			<div class="row">

				<div class="col-sm-4">
					<div class="mt-5">
						<b>Tahun Lulus</b>
						<select class="form-select" name="tahunLulus">
							<?php foreach ($years as $year): ?>
								<option value="<?= $year;?>"><?= $year;?></option>
							<?php endforeach; ?>
						</select>
					</div>
				</div>

				<div class="col-sm-4">
					<div class="mt-5">
						<b>Jurusan</b>
						<select class="form-select" name="jurusansma">
							<option value="IPA">IPA</option>
							<option value="IPS">IPS</option>
						</select>
					</div>
				</div>


				<div class="col-sm-4">
					<div class="mt-5">
						<b>Email</b>
						<input type="text" class="form-control" name="email" placeholder="Email">
					</div>
				</div>

			</div>

			<div class="mt-5">
				<b>Alamat Rumah</b>
				<textarea class="form-control" name="alamatRumahAlumni" placeholder="Alamat Rumah" rows="6"></textarea>
			</div>

			<div class="mt-5">
				<b>No Telp</b>
				<input type="text" class="form-control" name="noTelpAlumni" placeholder="No Telp">
			</div>

			<div class="mt-5">
				<b>Pendidikan Terakhir</b>
				<select class="form-select" name="pendidikanTerakhir">
					<option value="Bekerja">Bekerja</option>
					<option value="Kuliah">Kuliah</option>
				</select>
			</div>

			<div class="mt-5">
				<b>Pekerjaan</b>
				<input type="text" class="form-control" name="pekerjaanAlumni" placeholder="Pekerjaan">
				<small><i>*contoh : PT. Google Indonesia - Programmer, bila belum (-)</i></small>
			</div>

			<div class="mt-5">
				<b>Universitas<small> (bila belum (-) )</small></b>
				<input type="text" class="form-control" name="universitasAlumni" placeholder="Universitas">
				<small><i>*bila belum (-)</i></small>
			</div>

			<div class="row">

				<div class="col-sm-4">
					<div class="mt-5">
						<b>Jenjang</b>
						<select name="jenjang" class="form-select">
							<option value="D1">D1</option>
							<option value="D2">D2</option>
							<option value="D3">D3</option>
							<option value="D4">D4</option>
							<option value="S1">S1</option>
							<option value="S2">S2</option>
							<option value="S3">S3</option>
						</select>
					</div>
				</div>

				<div class="col-sm-4">
					<div class="mt-5">
						<b>Fakultas</b>
						<input type="text" class="form-control" name="fakultas" placeholder="Fakultas Teknik dan Ilmu Komputer">
					</div>
				</div>

				<div class="col-sm-4">
					<div class="mt-5">
						<b>Jurusan</b>
						<input type="text" class="form-control" name="jurusan" placeholder="Teknik Informatika">
					</div>
				</div>

			</div>

			<div class="mt-5">
				<b>Saran / Masukan untuk SMAN 17 Bandung</b>
				<textarea class="form-control" name="saranAlumni" placeholder="Berikan Saran Terbaik Anda untuk SMAN 17 Bandung" rows="6"></textarea>
			</div>

			<div class="mt-5 mb-5">
				<button class="btn btn-dark" name="postData" type="Submit">Submit</button>	
			</div>
		</form>




	</div>
</div>





<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>