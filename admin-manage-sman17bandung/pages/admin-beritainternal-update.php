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
		
		$idBeritaInternal  	=$db->escape_string($_POST["idBeritaInternal"]);
		$namaBeritaInternal	=$db->escape_string($_POST["namaBeritaInternal"]);
		$isiBeritaInternal	=$db->escape_string($_POST["isiBeritaInternal"]);
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
					move_uploaded_file($file_tmp, 'file/berita_internal/'.$namaFileBaru);
					$picture = $namaFileBaru;

					$foto = getDataBeritaInternal($idBeritaInternal);
					unlink("file/berita_internal/".$foto["fotoBerita"]);
				} 
				else
				echo 'UKURAN FILE TERLALU BESAR';
			}
			else 
				echo 'EKSTENSI FILE YANG DI UPLOAD TIDAK DI PERBOLEHKAN';
		}

		// Susun query insert
		$sql="UPDATE berita_internal set 
		namaBeritaInternal='$namaBeritaInternal',
		isiBeritaInternal='$isiBeritaInternal',
		tanggal='$tanggal',
		fotoBerita='$picture'
		WHERE idBeritaInternal='$idBeritaInternal'";
		// Eksekusi query insert
		$res=$db->query($sql);

		if($res){
			if($db->affected_rows>0){ // jika ada penambahan data
				header("Location: admin-beritainternal.php?success=1");
			}
		}
		else
			// echo "Gagal ".(DEVELOPMENT?" : ".$db->error:"")."<br>";
			header("Location: admin-beritainternal.php?error=id");
	}
	else
		echo "Gagal koneksi".(DEVELOPMENT?" : ".$db->connect_error:"")."<br>";		
}
else
	header("Location: admin-beritainternal.php?error=proses");	
?>