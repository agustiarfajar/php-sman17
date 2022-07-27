<?php include_once("functions.php");?>
<?php
session_start();
if(!isset($_SESSION["idAdmin"]))
{
	header("Location: ../login.php?error=4");
}
if(isset($_POST["btnUpdate"])){
	// var_dump($_POST);
	$db=dbConnect();
	if($db->connect_errno==0){
		
		$idBeritaEksternal  	=$db->escape_string($_POST["idBeritaEksternal"]);
		$namaBeritaEksternal	=$db->escape_string($_POST["namaBeritaEksternal"]);
		$isiBeritaEksternal	=$db->escape_string($_POST["isiBeritaEksternal"]);
		$tanggal	   		= date('Y-m-d H:i', strtotime($db->escape_string($_POST["tanggal"])));
		$idAdmin 			=$_SESSION["idAdmin"];
		$gambarLama = $_POST['gambarLama'];

		// GAMBAR
		$ekstensi_allowed = array('png','jpg');
		$nama = $_FILES['file']['name'];
		$x = explode('.', $nama);
		$ekstensi = strtolower(end($x));
		$ukuran = $_FILES['file']['size'];
		$file_tmp = $_FILES['file']['tmp_name'];
		$namaFileBaru = uniqid();
		$namaFileBaru .= '.';
		$namaFileBaru .= $ekstensi;

		$proses_gambar = $_FILES['file']['error'];
		// var_dump($proses_gambar);
		// exit();
		if($proses_gambar === 4)
		{
			$picture = $gambarLama;
		}
		else 
		{
			if(in_array($ekstensi, $ekstensi_allowed) === true)
			{
				if($ukuran < 3044070)
				{
					move_uploaded_file($file_tmp, 'file/berita_eksternal/'.$namaFileBaru);
					$picture = $namaFileBaru;

					$foto = getDataBeritaEksternal($idBeritaEksternal);
					unlink("file/berita_eksternal/".$foto["fotoBerita"]);
				} 
				else
				echo 'UKURAN FILE TERLALU BESAR';
			}
			else 
				echo 'EKSTENSI FILE YANG DI UPLOAD TIDAK DI PERBOLEHKAN';
		}

		// Susun query insert
		$sql="UPDATE berita_eksternal set 
		namaBeritaEksternal='$namaBeritaEksternal',
		isiBeritaEksternal='$isiBeritaEksternal',
		tanggal='$tanggal',
		fotoBerita='$picture'
		WHERE idBeritaEksternal='$idBeritaEksternal'";
		// Eksekusi query insert
		$res=$db->query($sql);

		if($res){
			if($db->affected_rows>0){ // jika ada penambahan data
				header("Location: admin-beritaeksternal.php?success=1");
			}
		}
		else
			// echo "Gagal ".(DEVELOPMENT?" : ".$db->error:"")."<br>";
			header("Location: admin-beritaeksternal.php?error=id");
	}
	else
		echo "Gagal koneksi".(DEVELOPMENT?" : ".$db->connect_error:"")."<br>";		
}
else
	header("Location: admin-beritaeksternal.php?error=proses");	
?>