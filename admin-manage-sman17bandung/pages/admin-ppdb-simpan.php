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
		$v_id = trim($_POST["idppdb"]);
		$v_isi = trim($_POST["isippdb"]);
		$v_tahun = trim($_POST["tahun"]);
		$v_namafoto = trim($_POST["namafoto"]);
		$v_tanggal = trim($_POST["tanggalUpload"]);
        $v_waktu = trim($_POST["waktuUpload"]);
		if(strlen($v_id) == 0)
		{
			$pesansalah .= "ID PPDB tidak boleh kosong.<br>";
		}
		if(strlen($v_isi) == 0)
		{
			$pesansalah .= "isi tidak boleh kosong.<br>";
		}
		if(strlen($v_tahun) == 0)
		{
			$pesansalah .= "tahun tidak boleh kosong.<br>";
		}
		if(strlen($v_namafoto) == 0)
		{
			$pesansalah .= "nama foto tidak boleh kosong.<br>";
		}
        if(strlen($v_tanggal) == 0)
		{
			$pesansalah .= "tanggal tidak boleh kosong.<br>";
		}
        if(strlen($v_waktu) == 0)
		{
			$pesansalah .= "waktu tidak boleh kosong.<br>";
		}
		if($pesansalah == "")
		{
			$idppdb  	=$db->escape_string($_POST["idppdb"]);
			$isippdb	=$db->escape_string($_POST["isippdb"]);
			$tahun	=$db->escape_string($_POST["tahun"]);
			// $fotoBerita	   		=$db->escape_string($_POST["fotoBerita"]);
            $namafoto  	=$db->escape_string($_POST["namafoto"]);
            $tanggalUpload  	=$db->escape_string($_POST["tanggalUpload"]);
            $waktuUpload  	=$db->escape_string($_POST["waktuUpload"]);
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
					move_uploaded_file($file_tmp, 'file/ppdb/'.$namaFileBaru);
					// Susun query insert
					$sql="INSERT INTO ppdb(idppdb,isippdb,tahun,foto,namafoto,waktuUpload,tanggalUpload,idAdmin)
					VALUES('$idppdb','$isippdb','$tahun','$namaFileBaru','$namafoto','$waktuUpload','$tanggalUpload','$idAdmin')";
					// Eksekusi query insert
					$res=$db->query($sql);

					if($res){
						if($db->affected_rows>0){ // jika ada penambahan data
							header("Location: admin-ppdb.php?success=1");
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
			header("Location: admin-ppdb.php?error=input");
		}
	}
	else
		echo "Gagal koneksi".(DEVELOPMENT?" : ".$db->connect_error:"")."<br>";
}
else
	header("Location: admin-ppdb.php?error=proses");
?>