<?php include_once("functions.php");?>
<?php
session_start();
if(isset($_POST["btnSimpan"])){
	$db=dbConnect();
	if($db->connect_errno==0){
		// Bersihkan data
		if($_POST["jk"])
		{
			$idGuru  	=$db->escape_string($_POST["idGuru"]);
			$namaGuru	=$db->escape_string($_POST["namaGuru"]);
			$jk			=$db->escape_string($_POST["jk"]);
			$noTelp	   	=$db->escape_string($_POST["noTelp"]);
			$alamat	   	=$db->escape_string($_POST["alamat"]);
			$idAdmin 	=$_SESSION["idAdmin"];
			// Susun query insert
			$sql="INSERT INTO guru(idGuru,namaGuru,jk,noTelp,alamat,idAdmin)
				VALUES('$idGuru','$namaGuru','$jk','$noTelp','$alamat','$idAdmin')";
			// Eksekusi query insert
			$res=$db->query($sql);
			if($res){
				if($db->affected_rows>0){ // jika ada penambahan data
					header("Location: admin-gurustaff.php?success=1");
				}
			}
			else
				header("Location: admin-gurustaff.php?error=id");
		}
	}
	else
		echo "Gagal koneksi".(DEVELOPMENT?" : ".$db->connect_error:"")."<br>";
}
?>