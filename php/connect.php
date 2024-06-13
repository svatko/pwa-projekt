<?php
    // Komentar
    # Komentar
    /*
        Viselinijski komentar
    */

    header('Content-Type: text/html; charset=utf-8');

    $servername = "localhost:3307";
    $username = "root";
    $password = "";

    // Create connection
    $dbc = mysqli_connect($servername, $username, $password) or die('Error
                            connecting to MySQL server.' . mysqli_connect_error());
    mysqli_set_charset($dbc, "utf8");

    // Check connection
    if ($dbc) 
    {
        echo "<div hidden>Connected successfully</div>";
    }

    $initial_query = ' 
                        SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
                        SET AUTOCOMMIT = 0;
                        START TRANSACTION;
                        SET time_zone = "+00:00";
                        
                        CREATE DATABASE IF NOT EXISTS `aplikacija_npip` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
                        USE `aplikacija_npip`;

                        CREATE TABLE IF NOT EXISTS `npip` (
                        `id` int(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
                        `datum` varchar(32) CHARACTER SET utf8 COLLATE utf8_croatian_ci NOT NULL,
                        `naslov` varchar(64) CHARACTER SET latin2 COLLATE latin2_croatian_ci NOT NULL,
                        `sazetak` text CHARACTER SET latin2 COLLATE latin2_croatian_ci NOT NULL,
                        `tekst` text CHARACTER SET latin2 COLLATE latin2_croatian_ci NOT NULL,
                        `slika` varchar(64) CHARACTER SET latin2 COLLATE latin2_croatian_ci NOT NULL,
                        `kategorija` varchar(64) CHARACTER SET latin2 COLLATE latin2_croatian_ci NOT NULL,
                        `arhiva` boolean NOT NULL
                        ) ENGINE=InnoDB DEFAULT CHARSET=utf8;

                        CREATE TABLE IF NOT EXISTS `korisnik` (
                        `id` int(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
                        `ime` varchar(32) CHARACTER SET utf8 COLLATE utf8_croatian_ci NOT NULL,
                        `prezime` varchar(32) CHARACTER SET utf8 COLLATE utf8_croatian_ci NOT NULL,
                        `korisnicko_ime` varchar(32) CHARACTER SET utf8 COLLATE utf8_croatian_ci NOT NULL UNIQUE,
                        `lozinka` varchar(255) CHARACTER SET utf8 COLLATE utf8_croatian_ci NOT NULL,
                        `razina` boolean NOT NULL
                        ) ENGINE=InnoDB DEFAULT CHARSET=utf8;
                        
                        COMMIT;  
                        SET AUTOCOMMIT = 1;
                     ';

    mysqli_multi_query($dbc, $initial_query) or 
    die('Error querying database.');
    do 
    {
        if ($initial_result = mysqli_store_result($dbc)) 
        {
            while ($row = mysqli_fetch_row($initial_result)) {}
        }
        
        if (mysqli_more_results($dbc)) {}
    }
    while (mysqli_next_result($dbc));

    error_reporting(0);

    define('UPLPATH', 'img/');
?>