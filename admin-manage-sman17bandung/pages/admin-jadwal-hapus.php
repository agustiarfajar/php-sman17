<?php

    session_start();
    if(!isset($_SESSION["idAdmin"]))
    {
        header("Location: ../login.php?error=4");
    }

    include_once("functions.php");



    $idJadwal = $_GET['idJadwal'];
    $db = dbConnect();

    if ($idJadwal) {
        
        $sqlFindJadwalbyId = "SELECT * FROM jadwal WHERE idJadwal = '$idJadwal'";
        $executeSQLFindJadwal = $db->query($sqlFindJadwalbyId);

        if (!mysqli_num_rows($executeSQLFindJadwal)) {
            echo "
            <script>
                alert('NOT FOUND!!!');
                document.location.href = 'admin-jadwal.php';
            </script>";    
        }else{

            $sqlDeleteJadwalbyId = "DELETE FROM jadwal WHERE idJadwal = '$idJadwal'";
            $executeSQLDeleteJadwal = $db->query($sqlDeleteJadwalbyId);

            if ($executeSQLDeleteJadwal) {
                echo "
                <script>
                    document.location.href = 'admin-jadwal.php?success=3';
                </script>";   
            }else{
                echo "
                <script>
                    document.location.href = 'admin-jadwal.php?error=proses';
                </script>"; 
            }

        }

    }else{
        echo "
        <script>
            alert('NOT FOUND!!!');
            document.location.href = 'admin-jadwal.php';
        </script>";
    }





?>