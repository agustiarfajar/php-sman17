<<<<<<< HEAD
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
=======
<?php

    session_start();
    if(!isset($_SESSION["idAdmin"]))
    {
        header("Location: ../login.php?error=4");
    }

    include_once("functions.php");



    $idPpdb = $_GET['idppdb'];
    $db = dbConnect();

    if ($idPpdb) {
        
        $sqlFindPpdbbyId = "SELECT * FROM ppdb WHERE idppdb = '$idPpdb'";
        $executeSQLFindPpdb = $db->query($sqlFindPpdbbyId);


        if (!mysqli_num_rows($executeSQLFindPpdb)) {
            echo "
            <script>
                alert('NOT FOUND!!!');
                document.location.href = 'admin-ppdb.php';
            </script>";    
        }else{
            $assocFoto = $executeSQLFindPpdb->fetch_assoc();
            $sqlDeleteJadwalbyId = "DELETE FROM ppdb WHERE idPpdb = '$idPpdb'";
            unlink("file/ppdb/".$assocFoto["foto"]);
            $executeSQLDeleteJadwal = $db->query($sqlDeleteJadwalbyId);

            if ($executeSQLDeleteJadwal) {
                echo "
                <script>
                    document.location.href = 'admin-ppdb.php?success=3';
                </script>";   
            }else{
                echo "
                <script>
                    document.location.href = 'admin-ppdb.php?error=proses';
                </script>"; 
            }

        }

    }else{
        echo "
        <script>
            alert('NOT FOUND!!!');
            document.location.href = 'admin-ppdb.php';
        </script>";
    }





>>>>>>> b323e3965fe19106a9a306aa50a108196f70d2cd
?>