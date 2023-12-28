<?php
if (!isset($_COOKIE["user_id"])) { // giriş yapmamış olan
    header("Location: giris.php");
    exit;
}
if (!isset($_POST["yorum"])) { // formu doldurmadıysa
    header("Location: anasayfa.php");
    exit;
}
var_dump($_POST);
// VT ye kayıt yap
// Veri tabanına bağlanalım...
include "inc/vtyebaglan.inc.php";

// Sorgular ve diğer işlemler burada...
$sql = "insert into yorum (yapan, yapilan, metin) values (:yapan, :yapilan, :metin)";
$ifade = $vt->prepare($sql);
$ifade->execute(Array(":yapan"=>$_COOKIE["user_id"], ":yapilan"=>$_POST["yapilan"], ":metin"=>$_POST["yorum"]));
//Bağlantıyı yok edelim...
echo "Kayıt tamamlandı!";
$vt = null;
$sayfa = "detay.php?user_id=".$_POST["yapilan"];
header("Location: $sayfa");
?>