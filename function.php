<?php

    $domain = $_SERVER['HTTP_HOST'];


    define('BASEURL', "http://$domain/projects/sman17/");

    // connection
    function conn(){
        $conn = mysqli_connect("localhost","root","","sman17");
        if (!$conn) {
            die("Gagal Konek");
        }
        return $conn;
    }
    // connection

    function viewBeritaEksternal(){
        $conn = conn();
        $sql = "SELECT * FROM berita_eksternal";
        $execute = $conn->query($sql);

        // if (!mysqli_num_rows($execute)) {
        //     echo "Data Tidak ditemukan";
        // }

        return $execute;
    }


    function viewBeritaInternal(){
        $conn = conn();
        $sql = "SELECT * FROM berita_internal";
        $execute = $conn->query($sql);

        // if (!mysqli_num_rows($execute)) {
        //     echo "Data Tidak ditemukan";
        // }

        return $execute;
    }


    function viewKalender(){
        $conn = conn();
        $sql = "SELECT * FROM kalender";
        $execute = $conn->query($sql);
        
        // if (!mysqli_num_rows($execute)) {
        //     echo "Data Tidak ditemukan";
        // }

        return $execute;
    }


?>