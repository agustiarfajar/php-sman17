<?php include_once("functions.php");?>
<?php
session_start();
if(!isset($_SESSION["idAdmin"]))
{
	header("Location: ../login.php?error=4");
}
if(isset($_POST["btnSimpan"])){
	// var_dump($_POST);
	$db=dbConnect();
	if($db->connect_errno==0){
		// Bersihkan data
		$pesansalah = "";
		$v_id = trim($_POST["idBeritaInternal"]);
		$v_nama = trim($_POST["namaBeritaInternal"]);
		$v_isi = trim($_POST["isiBeritaInternal"]);
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
			$idBeritaInternal  	=$db->escape_string($_POST["idBeritaInternal"]);
			$namaBeritaInternal	=$db->escape_string($_POST["namaBeritaInternal"]);
			$isiBeritaInternal	=$db->escape_string($_POST["isiBeritaInternal"]);
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
					move_uploaded_file($file_tmp, 'file/berita_internal/'.$namaFileBaru);
					// Susun query insert
					$sql="INSERT INTO berita_internal(idBeritaInternal,namaBeritaInternal,isiBeritaInternal,tanggal,fotoBerita,idAdmin)
					VALUES('$idBeritaInternal','$namaBeritaInternal','$isiBeritaInternal','$tanggal','$namaFileBaru','$idAdmin')";
					// Eksekusi query insert
					$res=$db->query($sql);

					if($res){
						if($db->affected_rows>0){ // jika ada penambahan data
							header("Location: admin-beritainternal.php?success=1");
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
			$_SESSION["salahinputberitainternal"] = $pesansalah;
			header("Location: admin-beritainternal.php?error=input");
		}
	}
	else
		echo "Gagal koneksi".(DEVELOPMENT?" : ".$db->connect_error:"")."<br>";
}
?>