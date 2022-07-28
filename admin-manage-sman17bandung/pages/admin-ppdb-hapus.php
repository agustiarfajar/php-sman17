<?php include_once("functions.php");?>
<?php
session_start();
if(!isset($_SESSION["idAdmin"]))
{
	header("Location: ../login.php?error=4");
}
if(isset($_POST["btnHapus"])){
	echo $_POST["idppdb"];
	$db=dbConnect();
	if($db->connect_errno==0){
		// Bersihkan data
		$idppdb	=$db->escape_string($_POST["idppdb"]);
			// Susun query insert
			$foto = getDataPPDB($idppdb);
			unlink("file/ppdb/".$foto["foto"]);

			$sql="DELETE FROM ppdb WHERE idppdb ='$idppdb'";
			// Eksekusi query insert
			$res=$db->query($sql);
			if($res){
				if($db->affected_rows>0){ // jika ada update data
					header("Location: admin-ppdb.php?success=3");
				}
				else
					echo "Gagal".(DEVELOPMENT?" : ".$db->error:"")."<br>";
			}
			else
				header("Location: admin-ppdb.php?error=id");
	}
	else
		echo "Gagal koneksi".(DEVELOPMENT?" : ".$db->connect_error:"")."<br>";
}
else
	header("Location: admin-ppdb.php?error=proses");	
?>