<?php
setcookie("yetki", false, time()-1);
setcookie("ad","", time()-1);
setcookie("soyad", "", time()-1);
setcookie("user_id", "", time()-1);
echo "Çıkış başarılı!";
header("Refresh:1; url=anasayfa.php");
?>