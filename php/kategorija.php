<!DOCTYPE html>
<html>
    <head>
        <title>Kategorija</title>
        <link rel="stylesheet" href="../css/general.css">
        <link rel="stylesheet" href="../css/style.php" media="screen">
        <meta charset="UTF-8">
    </head>

    <body>
        <header>
            <h1>Kategorija</h1>
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

            $kategorija=$_GET['id'];
            $query = "SELECT * FROM npip WHERE arhiva = 0 AND kategorija='$kategorija'";
            $result = mysqli_query($dbc, $query) or die('Error querying database.');

            while($row = mysqli_fetch_array($result)) 
            {
                echo '<article>';
                echo '<div class="article_kat">';
                echo '<a href="clanak.php?id='.$row['id'].'">';
                echo '<div class="img">';
                echo '<img src="' . UPLPATH . $row['slika'] . '"';
                echo '</div>';
                echo '<div class="media_body">';
                echo '<h4 class="title">';
                echo $row['naslov'];
                echo '</h4>';
                echo '</div></a></div>';
                echo '</article>';
            }

            mysqli_close($dbc);
        ?>

        <footer>
            <p>Copyright © VIŠAK d.o.o. Sva prava pridržana.</p>
        </footer>
    </body>
</html>