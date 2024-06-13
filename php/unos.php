<!DOCTYPE html>
<html>
    <head>
        <title>Unos</title>
        <script type="text/javascript" src="jquery-1.11.0.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>
        <script src="../javascript/form-validation.js"></script>
        <link rel="stylesheet" href="../css/form.css">
        <link rel="stylesheet" href="../css/general.css">
        <meta charset="UTF-8">
    </head>

    <body>
        <header>
            <h1>Unos</h1>
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

        <form enctype="multipart/form-data" method="post" name="unos_clanka">
            <div class="form-item">
                <label for="title">Naslov članka</label>
                    <div class="form-field">
                        <input type="text" name="title" class="form-field-textual">
                    </div>
            </div>
            <div class="form-item">
                <label for="about">Kratki sadržaj članka (do 50 znakova)</label>
                    <div class="form-field">
                        <textarea name="about" id="" cols="30" rows="10" class="form-field-textual"></textarea>
                    </div>
            </div>
            <div class="form-item">
                <label for="content">Sadržaj članka</label>
                    <div class="form-field">
                        <textarea name="content" id="" cols="30" rows="10" class="form-field-textual"></textarea>
                    </div>
            </div>
            <div class="form-item">
                <label for="pphoto">Slika: </label>
                    <div class="form-field">
                        <input type="file" accept="image/jpg,image/gif,image/png"
                        class="input-text" name="pphoto"/>
                    </div>
            </div>
            <div class="form-item">
                <label for="category">Kategorija članka</label>
                    <div class="form-field">
                        <select name="category" id="" class="form-field-textual">
                            <option value="" disabled selected>Odabir kategorije</option>
                            <option value="pjesme">Pjesme</option>
                            <option value="price">Priče</option>
                        </select>
                    </div>
            </div>
            <div class="form-item">
                <label>Spremiti u arhivu:
                    <div class="form-field">
                        <input type="checkbox" name="archive">
                    </div>
                </label>
            </div>
            <div class="form-item">
                <button type="reset" value="Poništi" name="reset">Poništi</button>
                <button type="submit" value="Prihvati" name="submit">Prihvati</button>
            </div>
        </form>

        <?php
            // Komentar
            # Komentar
            /*
                Viselinijski komentar
            */

            include 'connect.php';

            $date = date('d.m.Y.');
            $title = $_POST['title'];
            $about = $_POST['about'];
            $content = $_POST['content'];
            $picture = $_FILES['pphoto']['name'];
            $category = $_POST['category'];
            if (isset($_POST['archive']))
            {
                $archive = 1;
            }
            else
            {
                $archive = 0;
            }

            if (mb_strlen($title) && mb_strlen($about) && mb_strlen($content) && mb_strlen($picture) && mb_strlen($category))
            {
                $target_dir = 'img/' . $picture;
                move_uploaded_file($_FILES["pphoto"]["tmp_name"], $target_dir);

                $insert_query = " INSERT INTO npip(datum, naslov, sazetak, tekst, slika, kategorija, arhiva)
                                    VALUES('" . $date . "', '" . $title . "', '" . $about . "', '
                                        " . $content . "', '" . $picture . "', '" . $category . "', " . $archive . ");
                            ";

                $insert_result = mysqli_query($dbc, $insert_query) or die('Error querying database.');
            }
            
            mysqli_close($dbc);
        ?>

        <footer>
            <p>Copyright © VIŠAK d.o.o. Sva prava pridržana.</p>
        </footer>
    </body>
</html>