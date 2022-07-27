<?php

    session_start();
    if(!isset($_SESSION["idAdmin"]))
    {
        header("Location: ../login.php?error=4");
    }

    include_once("functions.php");



    $idKalender = $_GET['idKalender'];
    $db = dbConnect();

    if ($idKalender) {
        
        $sqlFindKalenderbyId = "SELECT * FROM kalender WHERE idKalender = '$idKalender'";
        $executeSQLFindKalender = $db->query($sqlFindKalenderbyId);

        if (!mysqli_num_rows($executeSQLFindKalender)) {
            echo "
            <script>
                alert('NOT FOUND!!!');
                document.location.href = 'admin-kalenderakademik.php';
            </script>";    
        }else{

            $sqlDeleteKalenderbyId = "DELETE FROM kalender WHERE idKalender = '$idKalender'";
            $executeSQLDeleteKalender = $db->query($sqlDeleteKalenderbyId);

            if ($executeSQLDeleteKalender) {
                echo "
                <script>
                    document.location.href = 'admin-kalenderakademik.php?success=3';
                </script>";   
            }else{
                echo "
                <script>
                    document.location.href = 'admin-kalenderakademik.php?error=proses';
                </script>"; 
            }

        }

    }else{
        echo "
        <script>
            alert('NOT FOUND!!!');
            document.location.href = 'admin-kalenderakademik.php';
        </script>";
    }





?>