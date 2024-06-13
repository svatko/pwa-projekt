<!DOCTYPE html>
<html>
    <head>
        <title>Napisane pjesme i priče</title>
        <link rel="stylesheet" href="../css/general.css">
        <link rel="stylesheet" href="../css/style.php" media="screen">
        <meta charset="UTF-8">
    </head>

    <body>
        <header>
            <h1>Napisane pjesme i priče</h1>
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

        <div class="naslov_kategorije"><h2>Pjesme</h2></div>
        <section class="pjesme">
            <?php
                // Komentar
                # Komentar
                /*
                    Viselinijski komentar
                */

                include 'connect.php';

                $query = "SELECT * FROM npip WHERE arhiva=0 AND kategorija='pjesme' LIMIT 3";
                $result = mysqli_query($dbc, $query) or die('Error querying database.');

                while ($row = mysqli_fetch_array($result)) 
                {
                    echo '<article>';
                    echo '<div class="article">';
                    echo '<a href="clanak.php?id='.$row['id'].'">';
                    echo '<div class="price_img">';
                    echo '<img src="' . UPLPATH . $row['slika'] . '"';
                    echo '</div>';
                    echo '<div class="media_body">';
                    echo '<p class="about">';
                    echo $row['sazetak'];
                    echo '</p>';
                    echo '<h4 class="title">';
                    echo $row['naslov'];
                    echo '</h4>';
                    echo '</div></a></div>';
                    echo '</article>';
                }

                mysqli_close($dbc);
            ?>
        </section>

        <div class="naslov_kategorije"><h2>Priče</h2></div>
        <section class="price">
            <?php
                // Komentar
                # Komentar
                /*
                    Viselinijski komentar
                */
                
                include 'connect.php';

                $query = "SELECT * FROM npip WHERE arhiva=0 AND kategorija='price' LIMIT 3";
                $result = mysqli_query($dbc, $query)or die('Error querying database.');

                while ($row = mysqli_fetch_array($result)) 
                {
                    echo '<article>';
                    echo '<div class="article">';
                    echo '<a href="clanak.php?id='.$row['id'].'">';
                    echo '<div class="price_img">';
                    echo '<img src="' . UPLPATH . $row['slika'] . '"';
                    echo '</div>';
                    echo '<div class="media_body">';
                    echo '<p class="about">';
                    echo $row['sazetak'];
                    echo '</p>';
                    echo '<h4 class="title">';
                    echo $row['naslov'];
                    echo '</h4>';
                    echo '</div></a></div>';
                    echo '</article>';
                }

                mysqli_close($dbc);
            ?>
        </section>

        <footer>
        <p>Copyright © VIŠAK d.o.o. Sva prava pridržana.</p>
        </footer>
    </body>
</html>