<?php
//var_dump($_GET);
//echo $user_id;

// Direkt user_id olmadan gelirse
if (!isset($_GET["user_id"])) {
    header("Location: anasayfa.php");
    exit;
}
//user_id boş gelirse
if (empty($_GET["user_id"])) {
    header("Location: anasayfa.php");
    exit;
}
// user_id yerine bir metin yazıldıysa
if (!is_numeric($_GET["user_id"])) {
    header("Location: anasayfa.php");
    exit;
}
$user_id = $_GET["user_id"];
?>

<!DOCTYPE html>
<html lang="tr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Yemek Sitesi</title>

<style>
/* renk tanımları */
:root {
    --h1: 40px;
    --h2: 30px;
    --h3: 20px;
    --h4: 15px;
    --h5: 10px;
    --color5: #ed3c44;
    --color4: #f57c38;
    --color3: #271e0f;
    --color2: #fbf9a6;
    --color1: #fafde2;
    --colorwhite: white;
    --colorblack: black;
    --colorgray: gray;
    --colorlightgray: lightgray;
}

body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    text-align: center;
    background-color: var(--color1);
    background-image: url('/assets/son.jpg');
    background-repeat: no-repeat;
    background-size: cover;
    height: 100vh; /* Ekran yüksekliği kadar ayarla */
    display: flex;
    flex-direction: column;
    justify-content: space-between;
} 

header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 10px;
    background-color: var(--color3);
}

.ustmenu {
    list-style: none;
    display: flex;
    gap: 10px;
    padding: 0;
    margin: 0;
}

.ustmenu li {
    margin: 0;
    padding: 0;
}

form {
    position: relative;
    z-index: 3;
    max-width: 300px;
    margin: auto auto;
    background-color: var(--color2);
    background-size: cover;
    padding: 20px;
    border-radius: 12px;
    flex-direction: column;
    display: flex;
    align-items: center;
}

input {
    background-color: var(--color1);
    padding: 10px;
    margin: 8px;
    border-radius: 10px;
    width: 70%;
}

label {
    text-align: left;
    width: 100%;
    margin-bottom: 5px;
}

img {
    max-width: 250px;
}

a {
    background-color: var(--color4);
    color: var(--colorwhite);
    padding: 10px 15px;
    border: none;
    border-radius: 10px;
    cursor: pointer;
    text-decoration: none;
}

a:hover {
    background-color: var(--color5);
    color: var(--color1);
}

h1 {
    color: var(--colorblack);
    font-size: var(--h1);
}

.sifremiUnuttum {
    background-color: var(--color2);
    color: var(--color4);
    text-decoration: underline;
}

.sifremiUnuttum:hover {
    background-color: var(--color2);
    color: #ed3c44;
}
</style>

</head>

<body>

<!-- Header -->
<header>
    <img src="assets/logo.png" alt="Yemek Sitesi Logo" style="max-width: 50%;">
    <?php
    if (isset($_COOKIE["user_id"])) { // giriş yapmış olan
    ?>
        <ul class="ustmenu">
            <li><a href="anasayfa.php">Ana Sayfa</a></li>
            <li><a href="cikis.php">Çıkış Yap</a></li>
        </ul>
    <?php
    } else { // giriş yapmadıysa veya çerez sona erdiyse 
    ?>
        <ul class="ustmenu">
            <li> Hoşgeldin misafir </li>
            <li><a href="anasayfa.php">Ana Sayfa</a></li>
            <li><a href="giris.php">Giriş Yap</a></li>
            <li><a href="kayit.php">Kayıt Ol</a></li>
        </ul>
    <?php
    }
    ?>
</header>

<main>
    <?php
    if (isset($_SESSION["hata"]["mesaj"])) {
        echo "<p style='color: red;'>";
        echo $_SESSION["hata"]["mesaj"];
        echo "</p>";
        unset($_SESSION["hata"]["mesaj"]);
    }
    ?>
    <form method="post" action="kayitkontrol.php">
        <label for="ad"> Ad: </label>
        <input type="text" id="ad" name="ad" value="<?php if (isset($_SESSION["ad"])) echo $_SESSION["ad"]; ?>">
        <?php if (isset($_SESSION["hata"]["alan"]) and $_SESSION["hata"]["alan"] == "ad") {
            echo "*";
            unset($_SESSION["hata"]["alan"]);
        }
        ?>
        <br><br>
        <label for="ad"> Soyad: </label>
        <input type="text" id="ad" name="soyad" value="<?php if (isset($_SESSION["soyad"])) echo $_SESSION["soyad"]; ?>">
        <?php if (isset($_SESSION["hata"]["alan"]) and $_SESSION["hata"]["alan"] == "soyad") {
            echo "*";
            unset($_SESSION["hata"]["alan"]);
        }
        ?>            
        <br><br>            
        <label for="email"> email: </label>
        <input type="email" name="email" id="email" value="<?php if (isset($_SESSION["email"])) echo $_SESSION["email"]; ?>">
        <br><br>
        <label for="kullanici"> Kullanıcı Adı: </label>
        <input type="text" name="kullanici" id="kullanici" value="<?php if (isset($_SESSION["kullanici"])) echo $_SESSION["kullanici"]; ?>">
        <br><br>         
        <label for="sifre"> Şifre : </label>
        <input type="password" id="sifre" name="sifre">
        <br><br>
        <label for="sifre2"> Şifre (tekrar) : </label>
        <input type="password" id="sifre2" name="sifre2">
        <br><br>
        <input type="submit" value="Kaydol!">
    </form>
</main>

</body>

</html>
