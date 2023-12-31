<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="kayit.css">
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
        <p>
        <label for="yemekadi">Yemeğinizin Adı: </label>
        <textarea type="text" name="yemekadi"></textarea>
        <p>
        <label for="malzemeler">Kullanılacak Malzemeler: </label>
        <textarea type="text" name="malzemeler"></textarea>
        <p>
        <label for="yemektarifi">Yemek Tarifi: </label>
        <textarea type="text" name="yemektarifi"></textarea>
        <br><br>

        <label for="dosya"> Yüklemek istediğiniz dosyayı seçiniz:</label>
        <input type="file" id="dosya" name="dosya"><br><br>
        <p><input type="submit" value="Yükle"></p>

    </form>

        <?PHP
        if (!isset($_POST["yemekadi"])) exit("Yemek adı girilmesi gerekiyor!");
        $ad = trim($_POST["yemekadi"]);
        if  (mb_strlen($yemekadi) < 2) exit("Yemeğinizin adı en az 4 karakter olmalıdır!");
        ?>
        
        <?php
    } else {
        echo "Dosya paylaşmak için önce giriş yapmalısınız.<br>";
        echo "<a href='giris.html'> Giriş Yap! </a>";
    } 
    
    ?>

</body>
</html>