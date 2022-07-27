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
		
		$idppdb =$db->escape_string($_POST["idppdb"]);
			$isippdb =$db->escape_string($_POST["isippdb"]);
			$tahun =$db->escape_string($_POST["tahun"]);
            $namafoto =$db->escape_string($_POST["namafoto"]);
            $tanggalUpload =$db->escape_string($_POST["tanggalUpload"]);
            $waktuUpload =$db->escape_string($_POST["waktuUpload"]);
			$idAdmin =$_SESSION["idAdmin"];
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
					move_uploaded_file($file_tmp, 'file/ppdb/'.$namaFileBaru);
					$picture = $namaFileBaru;

					$foto = getDataPPDB($idppdb);
					unlink("file/ppdb/".$foto["foto"]);
				} 
				else
				echo 'UKURAN FILE TERLALU BESAR';
			}
			else 
				echo 'EKSTENSI FILE YANG DI UPLOAD TIDAK DI PERBOLEHKAN';
		}

		// Susun query 
		$sql="UPDATE ppdb set 
		isippdb='$isippdb',
		tahun='$tahun',
		foto='$picture',
        namaFoto='$namafoto',
        tanggalUpload='$tanggalUpload',
        waktuUpload='$waktuUpload',
		WHERE idppdb='$idppdb'";
		// Eksekusi query 
		$res=$db->query($sql);

		if($res){
			if($db->affected_rows>0){ // jika ada penambahan data
				header("Location: admin-ppdb.php?success=2");
			}
		}
		else
			// echo "Gagal ".(DEVELOPMENT?" : ".$db->error:"")."<br>";
			header("Location: admin-ppdb.php?error=id");
	}
	else
		echo "Gagal koneksi".(DEVELOPMENT?" : ".$db->connect_error:"")."<br>";		
}
else
	header("Location: admin-ppdb.php?error=proses");	
?>