<?php include_once("functions.php");?>
<?php
session_start();
if(!isset($_SESSION["idAdmin"]))
{
	header("Location: ../login.php?error=4");
}
if(isset($_POST["btnUpdate"])){
	$db=dbConnect();
	if($db->connect_errno==0){
		$pesansalah = "";
		$v_idGuru = trim($_POST["idGuru"]);
		$v_nama = trim($_POST["namaGuru"]);
		$v_jk = strtoupper($_POST["jk"]);
		$v_noTelp = trim($_POST["noTelpGuru"]);
		$v_alamat = trim($_POST["alamatGuru"]);
		
		if(strlen($v_idGuru) == 0)
		{
			$pesansalah .= "ID Guru tidak boleh kosong.<br>";
		}
		if(strlen($v_nama) == 0)
		{
			$pesansalah .= "Nama Guru tidak boleh kosong.<br>";
		}
		if(strlen($v_noTelp) == 0)
		{
			$pesansalah .= "No.Telp tidak boleh kosong.<br>";
		}
		if(strlen($v_alamat) == 0)
		{
			$pesansalah .= "Alamat tidak boleh kosong.<br>";
		}
		if(!is_numeric((int) $v_no_telp)) {
			$pesansalah .= "Masukan no telepon harus berupa angka.<br>";
		}
		if(($v_jk != "L") && ($v_jk != "P"))
		{
			$pesansalah .= "Jenis kelamin hanya boleh laki-laki atau perempuan.<br>";
		}

		if($pesansalah == "")
		{
			if($_POST["jk"])
			{
				$idGuru	=$db->escape_string($_POST["idGuru"]);
				$namaGuru	=$db->escape_string($_POST["namaGuru"]);
				$jk			=$_POST["jk"];
				$noTelp	   	=$db->escape_string($_POST["noTelpGuru"]);
				$alamat	   	=$db->escape_string($_POST["alamatGuru"]);
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
		} else 
		{
			$_SESSION["salahinputguru"] = $pesansalah;
			header("Location: admin-gurustaff.php?error=input");
		}
	}
	else
		echo "Gagal koneksi".(DEVELOPMENT?" : ".$db->connect_error:"")."<br>";
}
?>