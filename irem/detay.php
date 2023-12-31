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
            --color3: #f9be60;    
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
            background-color: var(--color3);
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
            padding: 7px;
            background-color: var(--color2);
        }

        .ustmenu {
            list-style: none;
            display: flex;
            gap: 10px;
            padding: 0;
            margin-left: auto;
        }

        .ustmenu li {
            margin: 0;
            padding: 0;
        }

        .logo-kart {
            background-color: var(--color2);
            margin:0;
            text-align: left; /* Logo sola dayalı */
            padding: 10px; /* Aralık eklemek için padding */
        }

        .logo-kart img {
            max-width: 50%;
            border-radius: 10px;
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

        .materyalresim {
            max-width: 400px;
            max-height: 400px;
        }

        .ortala {
            background-color: var(--color3);
        }

    </style>

</head>

<body>

    <!-- Header -->
    <header>
        <div class="logo-kart">
            <img src="assets/logo.png" alt="Yemek Sitesi Logo">
        </div>

        <ul class="ustmenu">
                <li><a href="anasayfa.php">Ana Sayfa</a></li>
                <li><a href="cikis.php">Çıkış Yap</a></li>
            </ul>
    </header>

    <?php
    // vt ye bağlan
    include "inc/vtyebaglan.inc.php";
    // yukle tablosundan verileri okutacağım
    $sql = "select yukle.*, kullanicilar.ad, kullanicilar.soyad from yukle join kullanicilar on yukle.kimyukledi = kullanicilar.user_id and yukle.user_id = :user_id";
    $ifade = $vt->prepare($sql);
    $ifade->execute([":user_id" => $user_id]);

    $kayit = $ifade->fetch(PDO::FETCH_ASSOC);
    if ($kayit == false) { // Ürün user_idu bulunamadıysa veya kullanıcı rasgele rakam girerse
        header("Location: anasayfa.php");
    }
    echo "<p class='acikmavi'>";
    echo "Yemek:";
    echo htmlentities($kayit["yemek"]);
    echo "</p>";
    echo "<h2 class='ortala'>";

    switch ($kayit["tur"]) { // dosyaturlerine göre gösterelim
        case "image/jpeg":
            echo '<img class="materyalresim" src="';
            echo $kayit["dosyayolu"];
            echo '">';
            break;
        case "application/pdf":
            echo "<object data='" . $kayit["dosyayolu"] . "' type='application/pdf' width='80%' height='400px'></object>";
            break;
        default:
            break;
    }
    // Kim yükledi ismini yazdıralım
    //echo $kayit["kimyukledi"];
    echo "<p>Yükleyen: ";
    echo htmlentities($kayit["ad"]);
    echo " ";
    echo htmlentities($kayit["soyad"]);
    echo "</p>";

    if (isset($_COOKIE["user_id"])) { // giriş yapmış olan
    ?>
        <div class="logo-kart">
            <form action="yorumyap.php" method="post">
                <textarea name="yorum" placeholder="Yorumunuz"></textarea>
                <input type="hidden" name="yapilan" value="<?php echo $user_id; ?>">
                <input type="submit" value="Kaydet!">
            </form>
        </div>

    <?php
    }
    // yorum tablosundan verileri okutacağım
    $sql = "select yorum.*, kullanicilar.ad, kullanicilar.soyad from yorum, kullanicilar where yapilan = :user_id and kullanicilar.user_id = yorum.yapan";
    $ifade = $vt->prepare($sql);
    $ifade->execute([":user_id" => $user_id]);

    while ($kayit = $ifade->fetch(PDO::FETCH_ASSOC)) {
        echo "<div class='logo-kart'>";
        echo "Yorum: ";
        echo htmlentities($kayit["metin"]);
        echo "<br/>";
        echo "Yapan: ";
        echo htmlentities($kayit["ad"]);
        echo " ";
        echo htmlentities($kayit["soyad"]);
        echo "<br/>";
        echo "Yapıldığı zaman : ";
        echo htmlentities($kayit["zaman"]);
        echo "<br><br>";
        echo "</div>";
    }
    ?>
</body>

</html>
