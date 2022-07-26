<?php include_once("functions.php");?>
<?php
session_start();
if(isset($_POST["btnHapus"])){
	echo $_POST["idBeritaInternal"];
	$db=dbConnect();
	if($db->connect_errno==0){
		// Bersihkan data
		$idBeritaInternal	=$db->escape_string($_POST["idBeritaInternal"]);
			// Susun query insert
			$foto = getDataBeritaInternal($idBeritaInternal);
			unlink("file/berita_internal/".$foto["fotoBerita"]);

			$sql="DELETE FROM berita_internal WHERE idBeritaInternal='$idBeritaInternal'";
			// Eksekusi query insert
			$res=$db->query($sql);
			if($res){
				if($db->affected_rows>0){ // jika ada update data
					header("Location: admin-beritainternal.php?success=3");
				}
				else
					echo "Gagal".(DEVELOPMENT?" : ".$db->error:"")."<br>";
			}
			else
				header("Location: admin-beritainternal.php?error=id");
	}
	else
		echo "Gagal koneksi".(DEVELOPMENT?" : ".$db->connect_error:"")."<br>";
}
?>