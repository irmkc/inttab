<?php
$terim = $_GET["terim"];


// boş bırakıldıysa kontrol et...
?>

<!DOCTYPE html>
<html lang="tr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="loginPage">
</head>

<body>
    <?php
    if (isset($_COOKIE["user_id"])) { // giriş yapmış olan
    ?>
        <ul class="ustmenu">
            <?php
            echo "Hoşgeldin ";
            echo htmlentities($_COOKIE["ad"]);
            echo " ";
            echo htmlentities($_COOKIE["soyad"]);
            ?>
            <li><a href="anasayfa.php">Ana Sayfa</a></li>
            <li><a href="yukle.php">Yemek Fotoğrafı Yükle</a></li>
            <li><a href="cikis.php">Çıkış Yap</a></li>
        </ul>
    <?php
    } else { // giriş yapmadıysa veya çerez sona erdiyse 
    ?>
        <ul class="ustmenu">
            <li> Hoşgeldin misafir </li>
            <li><a href="anasayfa.php">Ana Sayfa</a></li>
            <li><a href="giris.php
            ">Giriş Yap</a></li>
            <li><a href="kayit.php">Kayıt Ol</a></li>
        </ul>
    <?php
    } 
    ?>
    <form action="ara.php" method="get">
        <input type="search" name="terim" id="">
        <input type="submit" value="ARA">
    </form>

    <?php
    // vt ye bağlan
    include "inc/vtyebaglan.inc.php";
    // yukle tablosundan verileri okutacağım
    
    $sql ="select yukle.*, kullanicilar.ad, kullanicilar.soyad from yukle join kullanicilar on yukle.kimyukledi = kullanicilar.user_id like :terim";
    $ifade = $vt->prepare($sql);
    $terim2 = "%".$terim."%";
    $ifade->execute(Array(":terim"=>$terim2));
    echo "<p> Aranan terim : ";
    echo htmlentities($terim). "</p>";
    $satirSayisi =  $ifade->rowCount();
    if ($satirSayisi == 0) { // Hiç sonuç bulunamadıysa
        echo "Aradığınız terim bulunamadı!";
    } else { // Sonuç bulunduysa
        echo "<p> Bulunan kayıt sayısı: ".$satirSayisi;
        echo "</p>";
        while ($kayit = $ifade->fetch(PDO::FETCH_ASSOC)) {
            echo "<p class='acikmavi'>";
            echo "yemek:";
            echo htmlentities($kayit["yemek"]);
            echo "</p>";     
            echo "<h2 class='ortala'>"; 
            echo htmlentities($kayit["baslik"]);
            echo "</h2>";
            echo "<br/>";
            echo "<a href='detay.php?user_id=";
            echo $kayit["user_id"];
            echo "'>İncele</a>";
        
        // Kim yükledi ismini yazdıralım
          //echo $kayit["kimyukledi"];
          echo "<p>Yükleyen: ";
          echo htmlentities($kayit["ad"]);
          echo " ";
          echo htmlentities($kayit["soyad"]);
          echo "</p>";
          echo "<hr>";
                          
        }
    }



    ?>


</body>

</html>