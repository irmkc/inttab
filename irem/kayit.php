<?php
session_start();
?>
<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kayıt Sayfası</title>
</head>
<body>
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
</body>
</html>