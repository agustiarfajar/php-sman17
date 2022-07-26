<?php include_once("functions.php");?>
<?php
session_start();
if(isset($_POST["btnUpdate"])){
	$db=dbConnect();
	if($db->connect_errno==0){
		// Bersihkan data
		if($_POST["jk"])
		{
			$idGuru	=$db->escape_string($_POST["idGuru"]);
			$namaGuru	=$db->escape_string($_POST["namaGuru"]);
			$jk			=$_POST["jk"];
			$noTelp	   	=$db->escape_string($_POST["noTelp"]);
			$alamat	   	=$db->escape_string($_POST["alamat"]);
			$idAdmin 	=$_SESSION["idAdmin"];
			// Susun query insert
			$sql="UPDATE guru set 
						namaGuru='$namaGuru',
						jk='$jk',
						noTelpGuru='$noTelp',
						alamatGuru='$alamat'
						WHERE idGuru='$idGuru'";
			// Eksekusi query insert
			$res=$db->query($sql);
			if($res){
				if($db->affected_rows>0){ // jika ada update data
					header("Location: admin-gurustaff.php?success=2");
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