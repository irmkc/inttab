<?php
// giriş yapmış mı?
if (!((isset($_COOKIE["yetki"])) and ($_COOKIE["yetki"] == true))) { // Yani giriş yapmadıysa
    echo "Yemek fotoğrafı yüklemek için önce giriş yapmalısınız.<br>";
    header("Refresh:1; url=anasayfa.php");
    echo "<a href='giris.html'> Giriş Yap! </a>";
    exit;
}

var_dump($_POST);

// direkt buranın url'ini yazdıysa
if (!(isset($_GET["formugordu"]) and ($_GET["formugordu"] == 1))) { // Yani giriş yapmadıysa
    echo "Önce formu doldurun.<br>";
    header("Refresh:10; url=yukle.php");
    echo "<a href='yukle.php'> Yemek Fotoğrafı Gönder! </a>";
    exit;
}

// formdan çok büyük bir dosya gönderdiyse
if (empty($_POST)) { // Yani giriş yapmadıysa
    echo "Gönderdiğiniz dosya boyutu çok büyük. Maksimum: 2MB<br>";
    header("Refresh:10; url=yukle.php");
    echo "<a href='yukle.php'> Yemek Fotoğrafı Gönder! </a>";
    exit;
}

echo "<p>Form bilgileri</p>";
var_dump($_POST);
echo "<p>Dosya bilgileri</p>";
var_dump($_FILES);

// dosya yüklemiş mi?
echo "dosya yükleme hata kod: ";
echo $_FILES["dosya"]["error"];
echo "<br>";
if ($_FILES["dosya"]["error"] <> 0) {
    exit("Bu dosya yüklenemedi! Tekrar deneyin!");
}

// dosya boyutunu kontrol et
echo "dosya boyutu: ";
echo $_FILES["dosya"]["size"];
echo "<br>";
if ($_FILES["dosya"]["size"] > 2000000) {
    exit("Bu dosya boyutu çok büyük");
}

// dosya turunu kontrol et
echo "dosya türü: ";
echo $_FILES["dosya"]["type"];
echo "<br>";

$izinverilendosyaturleri = [
    "image/jpeg",
    "application/pdf"
];

if (!in_array($_FILES["dosya"]["type"], $izinverilendosyaturleri)) {
    exit("Sadece resim dosyası ve pdf dosyası yükleyebilirsiniz!");
}

// aynı dosya var mı?
// dosyayı taşıyalım
$hedef = "yuklenenler/" . time() . basename($_FILES["dosya"]['name']);
move_uploaded_file($_FILES["dosya"]['tmp_name'], $hedef);

// başlık girilmiş mi vs. kontrolleri
// yemek kontrolleri

// dosyayı vtye kaydet
// Veri tabanına bağlanalım...
include "inc/vtyebaglan.inc.php";

// Sorgular ve diğer işlemler burada...
$sql = "insert into yukle (yemek, dosyayolu, tur, kimyukledi) values (:yemek, :dosyayolu, :tur, :kimyukledi)";
$ifade = $vt->prepare($sql);
$ifade->execute(Array(":yemek" => $_POST["yemek"], ":dosyayolu" => $hedef, ":tur" => $_FILES["dosya"]["type"], ":kimyukledi" => $_COOKIE["user_id"]));

// Bağlantıyı yok edelim...
echo "yemek fotoğrafı yüklendi!";
$vt = null;
header("Refresh:2; url=anasayfa.php");
?>
