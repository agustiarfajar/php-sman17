<?php include_once("functions.php");?>
<?php
session_start();
if(!isset($_SESSION["idAdmin"]))
{
	header("Location: ../login.php?error=4");
}
if(isset($_POST["btnHapus"])){
	$db=dbConnect();
	if($db->connect_errno==0){
		// Bersihkan data
		$idGuru	=$db->escape_string($_POST["idGuru"]);
			// Susun query insert
			$sql="DELETE FROM guru WHERE idGuru='$idGuru'";
			// Eksekusi query insert
			$res=$db->query($sql);
			if($res){
				if($db->affected_rows>0){ // jika ada update data
					header("Location: admin-gurustaff.php?success=3");
				}
			}
			else
				header("Location: admin-gurustaff.php?error=id");
	}
	else
		echo "Gagal koneksi".(DEVELOPMENT?" : ".$db->connect_error:"")."<br>";
}
?>