<?php
//session_start();
var_dump($_POST);

// Veri tabanına bağlanalım...
try {
    $vt = new PDO("mysql:dbname=afiyetolsun;host=localhost;charset=utf8","root", "");
    $vt->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  } catch (PDOException $e) {
    echo $e->getMessage();
  }
  
// verileri oku
// kullanıcı adını karşılaştıralım
$sql = "select * from kullanicilar where kullanici = :kullanici ";
$ifade = $vt->prepare($sql);
$ifade->execute(Array(":kullanici"=>$_POST["kullanici"]));

$kayit = $ifade->fetch(PDO::FETCH_ASSOC);

if ($kayit == false) {
    echo "Kullanıcı adı veya şifre yanlış!";
    header("Refresh:3; url=giris.html");
    // Refresh ile belirtilen saniye kadar bekler ve url'e gönderir. 
    // header ("Location: giris.html");
    // Bu kullanım ise beklemeden direkt olarak gönderir
    exit;
} else {
    var_dump($kayit);
}

// kullanici adını karşılaştırsak
if ($_POST["kullanici"] == $kayit["kullanici"]) {
    echo "Kullanıcı adınız güvenli";
} else {
    echo "Yeniden giriniz.";
    exit;
}

// şifreyi karşılaştır
echo $_POST["sifre"];
echo "<br>";
echo $kayit["sifre"];
$sonuc = password_verify($_POST["sifre"], $kayit["sifre"]);
var_dump($sonuc);
if ($sonuc == false) {
    // farklıysa uyarı versin ve giriş sayfasına yönlendirsin
    exit("Kullanıcı adı veya şifre yanlış!");
} 
// aynıysa yetki ver
setcookie("yetki", true, time()+60*30);
setcookie("ad", $kayit["ad"], time()+60*30);
setcookie("soyad", $kayit["soyad"], time()+60*30);
setcookie("user_id", $kayit["user_id"], time()+60*30);
echo "Giriş başarılı!";
header("Refresh:1; url=anasayfa.php");
// Veri tabanı bağlantısını yok et
$vt = null;
?>