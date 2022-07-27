<?php include_once("functions.php");?>
<?php
session_start();
if(isset($_POST["btnHapus"])){
	echo $_POST["idBeritaEksternal"];
	$db=dbConnect();
	if($db->connect_errno==0){
		// Bersihkan data
		$idBeritaEksternal	=$db->escape_string($_POST["idBeritaEksternal"]);
			// Susun query insert
			$foto = getDataBeritaEksternal($idBeritaEksternal);
			unlink("file/berita_eksternal/".$foto["fotoBerita"]);

			$sql="DELETE FROM berita_eksternal WHERE idBeritaEksternal='$idBeritaEksternal'";
			// Eksekusi query insert
			$res=$db->query($sql);
			if($res){
				if($db->affected_rows>0){ // jika ada update data
					header("Location: admin-beritaeksternal.php?success=3");
				}
				else
					echo "Gagal".(DEVELOPMENT?" : ".$db->error:"")."<br>";
			}
			else
				header("Location: admin-beritaeksternal.php?error=id");
	}
	else
		echo "Gagal koneksi".(DEVELOPMENT?" : ".$db->connect_error:"")."<br>";
}
?>