<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    if ((isset($_COOKIE["yetki"])) and ($_COOKIE["yetki"] == true)) { // Yani giriş yaptıysa 
    ?>
    <form action="yuklekontrol.php?formugordu=1" method="post" enctype="multipart/form-data">
        <label for="yemek"> Yemeğinizi seçiniz: </label>
        <select name="yemek" id="yemek">
            <option value="corba">Çorba</option>
            <option value="anayemek">Ana Yemek</option>
            <option value="salata">Salata</option>
            <option value="tatlı">Tatlı</option>
            <option value="aperitif">Aperitif</option>
        </select>
        
        <?PHP
        if (!isset($_POST["ad"])) exit("İsim girilmesi gerekiyor!");
        $ad = trim($_POST["ad"]);
        if  (mb_strlen($ad) < 2) exit("İsim en az 2 karakter olmalıdır!");
        ?>
        <br><br>

        <label for="dosya"> Yüklemek istediğiniz dosyayı seçiniz:</label>
        <input type="file" id="dosya" name="dosya"><br><br>
        <p><input type="submit" value="Yükle"></p>

    </form>

        <?php
    } else {
        echo "Dosya paylaşmak için önce giriş yapmalısınız.<br>";
        echo "<a href='giris.html'> Giriş Yap! </a>";
    } 
    
    ?>

</body>
</html>