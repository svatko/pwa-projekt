<?php
header("Content-type: text/css");
?>

<!-- index.php -->
.naslov_kategorije 
{
    display: flex;
    flex-direction: row;
    flex-wrap: wrap;
}

.naslov_kategorije
{
    flex: 100%;
    text-align: center;
}


.pjesme
{
    display: flex;
    flex-direction: row;
    flex-wrap: wrap;
    width: 60%;
    margin: 0 auto;
}

.pjesme article
{
    flex: 33.33%;
}

.pjesme_img
{
    width: 100%;
}

.pjesme_img img
{
    width: 100%;
}


.price
{
    display: flex;
    flex-direction: row;
    flex-wrap: wrap;
    width: 60%;
    margin: 0 auto;
}

.price article
{
    flex: 33.33%;
}

.price_img
{
    width: 100%;
}

.price_img img
{
    width: 100%;
}
<!-- index.php -->


<!-- clanak.php -->
.glavna 
{
    display: flex;
    flex-direction: column;
    flex-wrap: wrap;
}

.title
{
    text-align: center;
    margin: 0px;
    padding: 0px;
    border-top: 30px;
    border-bottom: 30px;
}

.row 
{
    flex: 100%;
}

.row p
{
    margin: 0px;
    border: 0px;
    padding: 0px;
} 

.slika 
{
    flex: 100%;
}

.slika img
{
    width: 100%;
}

.about 
{
    flex: 100%;
}

.sadrzaj
{
    flex: 100%;
}
<!-- clanak.php -->


<!-- kategorija.php -->
.article_kat
{
    display: flex;
    flex-direction: column;
    flex-wrap: wrap;
}

.img
{
    flex: 100%;
}

.img img
{
    width: 100%;
}
<!-- kategorija.php -->