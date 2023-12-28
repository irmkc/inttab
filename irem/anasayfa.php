<!DOCTYPE html>
<html lang="tr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Yemek Sitesi</title>
    <link rel="stylesheet" href="stil/MainScreen.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        /* Typography */
        body {
            font-family: 'Rubik', sans-serif;
            font-size: 16px;
            line-height: 1.6;
        }

        h1 {
            font-size: var(--h1);
        }

        h2 {
            font-size: var(--h2);
        }

        h3 {
            font-size: var(--h3);
        }

        h4 {
            font-size: var(--h4);
        }

        h5 {
            font-size: var(--h5);
        }

        /* Page Layout */
        body {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        main {
            flex-grow: 1;
        }

        /* Header Styling */
        header {
            background-color: var(--color5);
            padding: 10px;
            border-radius: 5px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        header div {
            display: flex;
            align-items: center;
        }

        header img {
            max-width: 100%;
        }

        header span {
            margin-left: 10px;
            font-weight: bold;
        }

        header a {
            text-decoration: none;
            color: var(--color1);
            font-weight: bold;
            margin: 0 10px;
            transition: color 0.3s ease;
        }

        header a:hover {
            color: var(--color3);
        }

        /* Menu Styling */
        .ustmenu {
            list-style: none;
            display: flex;
            justify-content: center;
            padding: 10px;
            background-color: var(--color4);
            border-radius: 5px;
            margin: 20px;
        }

        .ustmenu a {
            text-decoration: none;
            color: var(--color1);
            font-weight: bold;
            margin: 0 10px;
            transition: color 0.3s ease;
        }

        .ustmenu a:hover {
            color: var(--color3);
        }

        /* Form Styling */
        form {
            display: flex;
            align-items: center;
            justify-content: center;
            margin-top: 20px;
        }

        form input[type="search"] {
            padding: 10px;
            font-size: 16px;
            border: 1px solid var(--colorgray);
            border-radius: 5px;
        }

        form input[type="submit"] {
            padding: 10px 15px;
            font-size: 16px;
            background-color: var(--color4);
            color: var(--color1);
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease, color 0.3s ease;
        }

        form input[type="submit"]:hover {
            background-color: var(--color3);
            color: var(--colorwhite);
        }

        /* Content Styling */
        .acikmavi {
            background-color: var(--color2);
            border: 1px solid var(--colorgray);
            border-radius: 10px;
            padding: 20px;
            margin: 20px;
            transition: background-color 0.3s ease;
        }

        .acikmavi:hover {
            background-color: var(--color3);
        }

        .ortala {
            text-align: center;
            margin-top: 0;
        }

        .ortala a {
            text-decoration: none;
            color: var(--color4);
            font-weight: bold;
            transition: color 0.3s ease;
        }

        .ortala a:hover {
            color: var(--color5);
        }

        /* Footer Styling */
        footer {
            background-color: var(--color4);
            padding: 10px;
            border-radius: 5px;
            text-align: center;
            margin-top: 20px;
        }

    </style>
</head>

<body>
    <!-- Header -->
    <header>
        <div>
            <img src="assets/logo.png" alt="Yemek Sitesi Logo" style="max-width: 100%;">
        </div>
        <nav>
            <a href="#">Anasayfa</a>
            <a href="#">Hakkımızda</a>
            <a href="#">İletişim</a>
        </nav>
    </header>

    <!-- Menu -->
    <?php
    if (isset($_COOKIE["user_id"])) { // giriş yapmış olan
    ?>
        <ul class="ustmenu">
            <li><a href="yukle.php">Yemek Fotoğrafı Yükle</a></li>
            <li><a href="cikis.php">Çıkış Yap</a></li>
        </ul>
    <?php
    } else { // giriş yapmadıysa veya çerez sona erdiyse 
    ?>
        <ul class="ustmenu">
            <li><a href="giris.php">Giriş Yap</a></li>
            <li><a href="kayit.php">Kayıt Ol</a></li>
        </ul>
    <?php
    }
    ?>

    <!-- Search Form -->
    <form action="ara.php" method="get">
        <input type="search" name="terim" id="">
        <input type="submit" value="ARA">
    </form>

    <!-- Content -->
    <?php
    // vt ye bağlan
    include "inc/vtyebaglan.inc.php";

    // yukle tablosundan verileri okutacağım
    $sql = "SELECT yukle.*, kullanicilar.ad, kullanicilar.soyad FROM yukle JOIN kullanicilar ON yukle.kimyukledi = kullanicilar.user_id";
    $ifade = $vt->prepare($sql);
    $ifade->execute();

    while ($kayit = $ifade->fetch(PDO::FETCH_ASSOC)) {
        echo "<div class='acikmavi'>";
        echo "<p>yemek: " . htmlentities($kayit["yemek"]) . "</p>";
        echo "<h2 class='ortala'>";
        echo "<a href='detay.php?user_id=" . $kayit["user_id"] . "'>İncele</a>";
        echo "</h2>";
        echo "<p>Yükleyen: " . htmlentities($kayit["ad"]) . " " . htmlentities($kayit["soyad"]) . "</p>";
        echo "<hr>";
        echo "</div>";
    }
    ?>

    <!-- Footer -->
    <footer>
        &copy; 2023 Yemek Sitesi - Tüm Hakları Saklıdır.
    </footer>
</body>

</html>
