<?php
var_dump($_POST);
// Kontroller
// İsim Boş geçilmesin
if (!isset($_POST["ad"])) exit("İsim girilmesi gerekiyor!");
$ad = trim($_POST["ad"]);
if  (mb_strlen($ad) < 2) exit("İsim en az 2 karakter olmalıdır!");
// Soyad boş geçilmesin
if (!isset($_POST["soyad"])) exit("Soyad girilmesi gerekiyor!");
$soyad = trim($_POST["soyad"]);
if  (mb_strlen($soyad) < 2) exit("Soyad en az 2 karakter olmalıdır!");
// Bütün alanların karakter uzunluğunu kontrol et...

// Şifre kontrolü
if (!isset($_POST["sifre"])) exit("Şifre girilmelidir!");
if (!isset($_POST["sifre2"])) exit("Lütfen şifreyi tekrar giriniz!");
//Şifre boyutu kontrolü yapın...

// Şifreler  aynı mı
if ($_POST["sifre"] != $_POST["sifre2"]) exit("Şifreler aynı olmalı!");




//Şifreyi şifreleyelim

$sifre = password_hash($_POST["sifre"], PASSWORD_DEFAULT);

//eposta Kontrolü
// boş mu uzunluğu yeterli mi siz bakın
// biçimi doğrumu ya da beraber bakalım
if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) exit("Lütfen geçerli bir email giriniz");



// Kullanıcı adı mevcut mu?
//Sonra yapalım...

// VT ye kayıt yap
// Veri tabanına bağlanalım...
try {
  $vt = new PDO("mysql:dbname=afiyetolsun;host=localhost;charset=utf8","root", "");
  $vt->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
  echo $e->getMessage();
}



// Sorgular ve diğer işlemler burada...
$sql = "insert into kullanicilar (ad, soyad, email, kullanici, sifre) values (:ad, :soyad, :email, :kullanici, :sifre)";
$ifade = $vt->prepare($sql);
$ifade->execute(Array(":ad"=>$ad, ":soyad"=>$soyad, ":email"=>$_POST["email"], ":kullanici"=>$_POST["kullanici"], ":sifre"=>$sifre));
//Bağlantıyı yok edelim...
echo "Kayıt tamamlandı!";
header("Refresh:1; url=giris.php");

$vt = null;
?>











?>