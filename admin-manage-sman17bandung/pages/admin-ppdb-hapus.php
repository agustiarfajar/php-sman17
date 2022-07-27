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





?>