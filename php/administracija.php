<!DOCTYPE html>
<html>
    <head>
        <title>Administracija</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="../css/form.css">
        <link rel="stylesheet" href="../css/general.css">
    </head>

    <body>
        <header>
            <h1>Administracija</h1>
            <nav class="navbar main_nav " role="navigation">
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

            $query = "SELECT * FROM npip";
            $result = mysqli_query($dbc, $query);

            while ($row = mysqli_fetch_array($result)) 
            {
                echo '
                        <br>
                        <br>
                     ';
                echo '
                        <form enctype="multipart/form-data" action="" method="POST">
                            <div class="form-item">
                                <label for="title">Naslov članka:</label>
                                <div class="form-field">
                                    <input type="text" name="title" class="form-field-textual"
                                    value="'.$row['naslov'].'">
                                </div>
                            </div>
                            <div class="form-item">
                                <label for="about">Kratki sadržaj članka (do 50
                                znakova):</label>
                                <div class="form-field">
                                    <textarea name="about" id="" cols="30" rows="10" class="form-
                                    field-textual">'.$row['sazetak'].'</textarea>
                                </div>
                            </div>
                            <div class="form-item">
                                <label for="content">Sadržaj članka:</label>
                                <div class="form-field">
                                    <textarea name="content" id="" cols="30" rows="10" class="form-
                                    field-textual">'.$row['tekst'].'</textarea>
                                </div>
                            </div>
                            <div class="form-item">
                                <label for="pphoto">Slika:</label>
                                <div class="form-field">
                                    <input type="file" class="input-text" id="pphoto"
                                    value="'.$row['slika'].'" name="pphoto"/> <br><img src="' . UPLPATH .
                                    $row['slika'] . '" width=100px>
                                    // pokraj gumba za odabir slike pojavljuje se umanjeni prikaz postojeće slike
                                </div>
                            </div>

                            <div class="form-item">
                                <label for="category">Kategorija članka:</label>
                                <div class="form-field">
                                    <select name="category" id="" class="form-field-textual"
                                    value="'.$row['kategorija'].'">
                                        <option value="pjesme">Pjesme</option>
                                        <option value="price">Priče</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-item">
                                <label>Spremiti u arhivu:
                                    <div class="form-field">
                     ';
                                if ($row['arhiva'] == 0) 
                                {
                                    echo '<input type="checkbox" name="archive" id="archive"/> Arhiviraj?';
                                }
                                else 
                                {
                                    echo '<input type="checkbox" name="archive" id="archive" checked/> Arhiviraj?';
                                }
                echo '
                                    </div>
                                </label>
                            </div>
                            </div>
                            <div class="form-item">
                                <input type="hidden" name="id" class="form-field-textual"
                                value="'.$row['id'].'">
                                <button type="reset" value="Poništi">Poništi</button>
                                <button type="submit" name="update" value="Prihvati">Izmjeni</button>
                                <button type="submit" name="delete" value="Izbriši">Izbriši</button>
                            </div>
                        </form>
                     ';
                echo '
                        <br>
                        <br>
                     ';
            }

            if (isset($_POST['delete']))
            {
                $id=$_POST['id'];
                $query = "DELETE FROM npip WHERE id=$id";
                $result = mysqli_query($dbc, $query) or die('Error querying database.');
            }

            if (isset($_POST['update']))
            {
                $picture = $_FILES['pphoto']['name'];
                $title=$_POST['title'];
                $about=$_POST['about'];
                $content=$_POST['content'];
                $category=$_POST['category'];

                if(isset($_POST['archive']))
                {
                    $archive=1;
                }
                else
                {
                    $archive=0;
                }

                $target_dir = 'img/'.$picture;
                move_uploaded_file($_FILES["pphoto"]["tmp_name"], $target_dir);

                $id=$_POST['id'];
                $query = "UPDATE npip SET naslov='$title', sazetak='$about', tekst='$content',
                            slika='$picture', kategorija='$category', arhiva='$archive' WHERE id=$id ";

                $result = mysqli_query($dbc, $query) or die('Error querying database.');
            }

            mysqli_close($dbc);
        ?>

        <footer>
            <p>Copyright © VIŠAK d.o.o. Sva prava pridržana.</p>
        </footer>
    </body>
</html>