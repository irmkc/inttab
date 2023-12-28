<?php
if (isset($_COOKIE["user_id"])) { // giriş yapmışsa
    header("Location: anasayfa.php");
    exit;
}
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
        <form method="post" action="giriskontrol.php">
            <label for="kullanici"> Kullanıcı Adı: </label>
            <input type="text" name="kullanici" id="kullanici">
            <br><br>
          
            <label for="sifre"> Şifre : </label>
            <input type="password" id="sifre" name="sifre">
            <br><br>
            <input type="submit" value="Giriş Yap!">
    </form>
</body>
</html>