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
    <title>Document</title>

    <style>
        /* Eski CSS Kodları */

        /* ... Diğer stiller ... */

        /* Yeni CSS Kodları */

        /* Reset CSS */
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
            justify-content: space-between;
            padding: 10px;
            background-color: var(--color5);
            border-radius: 5px;
            margin: 20px;
        }

        .ustmenu li {
            margin: 15px;
        }

        .ustmenu a {
            text-decoration: none;
            color: var(--color1);
            font-weight: bold;
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
            background-color: var(--color5);
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
            background-color: var(--color5);
            padding: 10px;
            border-radius: 5px;
            text-align: center;
            margin-top: 20px;
        }

        /* ... Diğer stiller ... */
    </style>

</head>

<body>
    <?php
    if (isset($_COOKIE["user_id"])) { // giriş yapmış olan
    ?>
        <ul class="ustmenu">
            
            <li><a href="anasayfa.php">Ana Sayfa</a></li>
            
        </ul>
    <?php
    } else { // giriş yapmadıysa veya çerez sona erdiyse 
    ?>
        
    <?php
    } 
    // vt ye bağlan
    include "inc/vtyebaglan.inc.php";
    // yukle tablosundan verileri okutacağım
    $sql ="select yukle.*, kullanicilar.ad, kullanicilar.soyad from yukle join kullanicilar on yukle.kimyukledi = kullanicilar.user_id and yukle.user_id = :user_id";
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
            echo "<object data='". $kayit["dosyayolu"]."' type='application/pdf' width='80%' height='400px'></object>";
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
      echo "<hr>";
      if (isset($_COOKIE["user_id"])) { // giriş yapmış olan
    ?>
    <form action="yorumyap.php" method="post">
        <textarea name="yorum" placeholder="Yorumunuz"></textarea>
        <input type="hidden" name="yapilan" value="<?php echo $user_id; ?>">
        <input type="submit" value="Kaydet!">
    </form>

    <?php
      }
    // dersnotlari tablosundan verileri okutacağım
    $sql ="select yorum.*, kullanicilar.ad, kullanicilar.soyad from yorum, kullanicilar where yapilan = :user_id and kullanicilar.user_id = yorum.yapan";
    $ifade = $vt->prepare($sql);
    $ifade->execute([":user_id" => $user_id]);
    
    while ($kayit = $ifade->fetch(PDO::FETCH_ASSOC)) {   
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
    }
    ?>
</body>

</html>