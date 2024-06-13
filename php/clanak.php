<!DOCTYPE html>
<html>
    <head>
        <title>Članak</title>
        <link rel="stylesheet" href="../css/general.css">
        <link rel="stylesheet" href="../css/style.php" media="screen">
        <meta charset="UTF-8">
    </head>

    <body>
        <header>
            <h1>Članak</h1>
            <nav class="navbar main_nav" role="navigation">
                <ul class="main nav navbar-nav">
                    <li>
                        <a href="index.php" class="">Početna</a>
                    </li>
                    <li>
                        <a href="kategorija.php?id=pjesme" class="">Pjesme</a>
                    </li>
                    <li>
                        <a href="kategorija.php?id=price" class="">Priče</a>
                    </li>
                    <li>
                        <a href="administracija.php" class="">Administracija</a>
                    </li>
                </ul>
            </nav>
        </header>

        <?php
            // Komentar
            # Komentar
            /*
                Viselinijski komentar
            */

            include 'connect.php';

            $id = $_GET['id'];
            $query = "SELECT * FROM npip WHERE id = $id";
            $result = mysqli_query($dbc, $query) or die('Error querying database.');

            while ($row = mysqli_fetch_array($result)) 
            {
                echo        '<section role="main" class="glavna">';
                echo            '<div class="row">';
                echo                '<h1 class="title">';
                echo                    $row['naslov'];
                echo                '</h1>';
                echo            '</div>';
                echo            '<section class="slika">';
                echo                '<img src="' . UPLPATH . $row['slika'] . '">';
                echo            '</section>';
                echo            '<p>OBJAVLJENO: ';
                echo                "<span>" . $row['datum'] . "</span>";
                echo            '</p>';
                echo            '<section class="about">';
                echo                '<p>';
                echo                    "<i>" . $row['sazetak'] . "</i>";
                echo                '</p>';
                echo            '</section>';
                echo            '<section class="sadrzaj">';
                echo                '<p>';
                echo                    $row['tekst'];
                echo                '</p>';
                echo            '</section>';
                echo        '</section>';
            }

            mysqli_close($dbc);
        ?>

        <footer>
        <p>Copyright © VIŠAK d.o.o. Sva prava pridržana.</p>
        </footer>
    </body>
</html>