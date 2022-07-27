<?php include_once("functions.php");?>
<?php
session_start();
if(isset($_POST["btnSimpan"])){
	// var_dump($_POST);
	$db=dbConnect();
	if($db->connect_errno==0){
		// Bersihkan data
		$pesansalah = "";
		$v_id = trim($_POST["idBeritaEksternal"]);
		$v_nama = trim($_POST["namaBeritaEksternal"]);
		$v_isi = trim($_POST["isiBeritaEksternal"]);
		$v_tanggal = trim($_POST["tanggal"]);
		
		if(strlen($v_id) == 0)
		{
			$pesansalah .= "ID Berita tidak boleh kosong.<br>";
		}
		if(strlen($v_nama) == 0)
		{
			$pesansalah .= "Nama Berita tidak boleh kosong.<br>";
		}
		if(strlen($v_isi) == 0)
		{
			$pesansalah .= "Isi berita tidak boleh kosong.<br>";
		}
		if(strlen($v_tanggal) == 0)
		{
			$pesansalah .= "Tanggal tidak boleh kosong.<br>";
		}

		if($pesansalah == "")
		{
			$idBeritaEksternal  	=$db->escape_string($_POST["idBeritaEksternal"]);
			$namaBeritaEksternal	=$db->escape_string($_POST["namaBeritaEksternal"]);
			$isiBeritaEksternal	=$db->escape_string($_POST["isiBeritaEksternal"]);
			$tanggal	   		= date('Y-m-d H:i', strtotime($db->escape_string($_POST["tanggal"])));
			// $fotoBerita	   		=$db->escape_string($_POST["fotoBerita"]);
			$idAdmin 			=$_SESSION["idAdmin"];

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
			if(in_array($ekstensi, $ekstensi_allowed) === true)
			{
				if($ukuran < 3044070)
				{
					move_uploaded_file($file_tmp, 'file/berita_eksternal/'.$namaFileBaru);
					// Susun query insert
					$sql="INSERT INTO berita_eksternal(idBeritaEksternal,namaBeritaEksternal,isiBeritaEksternal,tanggal,fotoBerita,idAdmin)
					VALUES('$idBeritaEksternal','$namaBeritaEksternal','$isiBeritaEksternal','$tanggal','$namaFileBaru','$idAdmin')";
					// Eksekusi query insert
					$res=$db->query($sql);

					if($res){
						if($db->affected_rows>0){ // jika ada penambahan data
							header("Location: admin-beritaeksternal.php?success=1");
						}
					}
					else
						echo "Gagal ".(DEVELOPMENT?" : ".$db->error:"")."<br>";
						// header("Location: admin-beritainternal.php?error=id");
				} 
				else
				echo 'UKURAN FILE TERLALU BESAR';
			}
			else 
				echo 'EKSTENSI FILE YANG DI UPLOAD TIDAK DI PERBOLEHKAN';
		} 
		else 
		{
			$_SESSION["salahinputberitaeksternal"] = $pesansalah;
			header("Location: admin-beritaeksternal.php?error=input");
		}
	}
	else
		echo "Gagal koneksi".(DEVELOPMENT?" : ".$db->connect_error:"")."<br>";
}
?>