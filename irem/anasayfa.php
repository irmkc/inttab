<!DOCTYPE html>
<html lang="tr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Yemek Sitesi</title>
    <link rel="stylesheet" href="stil/MainScreen.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

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
        header nav a {
            font-size: 18px;
        }

        header a:hover {
            color: var(--color3);
        }

        /* Menu Styling */

        /* Form Styling */
        form {
            display: flex;
            align-items: center;
            justify-content: center;
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
            background-color: var(--color4);
            color: var(--color1);
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease, color 0.3s ease;
            margin-left: 10px;

        }

        form input[type="submit"]:hover {
            background-color: var(--color3);
            color: var(--colorwhite);
        }


        /* Content Styling */
        .acikmavi {
            display: flex;
            justify-content: space-between; 
            align-items: center; 
            background-color: var(--color2);
            border: 1px solid var(--colorgray);
            border-radius: 10px;
            padding: 30px;
            margin: 10px 150px;
            transition: background-color 0.3s ease;
        }

        .acikmavi:hover {
            background-color: var(--color3);
        }

        .acikmavi .ortala {
            text-align: right; 
            flex-grow: 1; 
        }

        .acikmavi p {
            margin-left: 50px; 
        }

        .acikmavi h2 {
            margin-right: 20px; 
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
            display: block; 
            margin-bottom: 10px; 
        }

        .ortala a:hover {
            color: var(--color5);
        }

        .acikmavi h2 {
            margin-right: 20px; 
        }

        /* Footer Styling */
        footer {
            background-color: var(--color4);
            padding: 10px;
            border-radius: 5px;
            text-align: center;
            margin-top: 20px;
        }

        /* Giriş Yap ve Kayıt Ol Butonları */
        .giris-kayit-btn {
            display: inline-block;
            padding: 7px 14px;
            margin: 7px;
            text-decoration: none;
            color: var(--colorwhite);
            background-color: var(--color1);
            border: none;
            border-radius: 5px;
            font-weight: bold;
            transition: background-color 0.3s ease, color 0.3s ease;
        }

        .giris-kayit-btn:hover {
            background-color: var(--color1);
            color: var(--colorwhite);
        }

        /* Çıkış Yap Butonu */
        .cikis-btn {
            display: inline-block;
            padding: 7px 14px;
            margin: 7px;
            text-decoration: none;
            color: var(--colorwhite);
            background-color: var(--color2);
            border: none;
            border-radius: 5px;
            font-weight: bold;
            transition: background-color 0.3s ease, color 0.3s ease;
        }

        .cikis-btn:hover {
            background-color: var(--color3);
            color: var(--colorwhite);
        }

        /* Yemek Fotoğrafı Yükle Butonu */
        .yukle-btn {
            display: inline-block;
            padding: 10px 20px;
            margin: 10px;
            text-decoration: none;
            color: var(--colorwhite);
            background-color: var(--color4);
            border: none;
            border-radius: 5px;
            font-weight: bold;
            transition: background-color 0.3s ease, color 0.3s ease;
        }

        .yukle-btn:hover {
            background-color: var(--color3);
            color: var(--colorwhite);
        }

        .materyalresim{
            margin-right: 70%;
            width: 15%;
            height: 15%;
        }

    </style>
</head>

<body>
    <!-- Header -->
    <header>
        <div>
            <img src="assets/logo.png" alt="Yemek Sitesi Logo" style="max-width: 100%;">
        </div>

        <nav>
            <a href="#">Anasayfa</a>
            <a href="#" onclick="showAbout()">Hakkımızda</a>
            <a href="#" onclick="showBizeUlasinModal()">İletişim</a>
        </nav>
        
        <!-- Search Form -->
        <form action="ara.php" method="get">
            <input type="search" name="terim" id="">
            <input type="submit" value="ARA">
        </form>

       

        <!-- Giriş Yap, Kayıt Ol ve Çıkış Yap Butonları -->
        <div class="ortala">
            <a href="giris.php" class="giris-kayit-btn">Giriş Yap</a>
            <a href="kayit.php" class="giris-kayit-btn">Kayıt Ol</a>
            <?php
            if (isset($_COOKIE["user_id"])) { // giriş yapmış olan
            ?>
                <a href="cikis.php" class="cikis-btn">Çıkış Yap</a>
            <?php
            }
            ?>
        </div>

    </header>

    <!-- Yemek Fotoğrafı Yükle Butonu -->
    <div style="text-align: center; margin-top: 10px;">
        <a href="yukle.php" class="yukle-btn">Yemek Fotoğrafı Yükle</a>
    </div>

    <!-- Content -->
    <?php
    // vt ye bağlan
    include "inc/vtyebaglan.inc.php";

    // yukle tablosundan verileri okutacağım
    $sql = "SELECT yukle.*, kullanicilar.ad, kullanicilar.soyad FROM yukle JOIN kullanicilar ON yukle.kimyukledi = kullanicilar.user_id";
    $ifade = $vt->prepare($sql);
    $ifade->execute();

    while ($kayit = $ifade->fetch(PDO::FETCH_ASSOC)) {
        echo "<div class='acikmavi'>";
        echo "<p>yemek: " . htmlentities($kayit["yemek"]) . "</p>";
        echo "<h2 class='ortala'>";
        echo "Yemek Adı: ". htmlentities($kayit["yemekadi"]);
        "<br>";
        switch ($kayit["tur"]) { // dosyaturlerine göre gösterelim
            case "image/jpeg":
                echo '<img class="materyalresim" src="';
                echo $kayit["dosyayolu"];
                echo '">';
                break;
            case "application/pdf":
                echo "<object data='" . $kayit["dosyayolu"] . "' type='application/pdf' width='auto' height='80px'></object>";
                break;
            default:
                break;
        }
        echo "<a href='detay.php?user_id=" . $kayit["user_id"] . "'>İncele</a>";
        echo "</h2>";
        echo "<p>Yükleyen: " . htmlentities($kayit["ad"]) . " " . htmlentities($kayit["soyad"]) . "</p>";
        echo "</div>";
    }
    ?>

    <!-- Footer -->
    <footer>
        &copy; 2023 Afiyet Olsun - Tüm Hakları Saklıdır.
    </footer>
    <div id="aboutModal" class="modal">

        <div class="modal-content">
            <span class="close" onclick="closeModal()">&times;</span>
            <h3>HAKKIMIZDA</h3>
            <p> Afiyet Olsun, lezzetin ve keyifli sofraların buluşma noktasıdır. Damakları şenlendiren, gözlere ve
                midelere şölen yaşatan bu yemek tarifi platformu, gastronomi tutkunları için bir cennettir. Türk
                mutfağının zengin mirasıyla dünya mutfaklarının enfes lezzetlerini bir araya getiren Afiyet Olsun, her
                damak zevkine hitap etmek için burada! <br>

                Sitemizde her gün yepyeni tarifler, pratik mutfak ipuçları ve lezzetli önerilerle dolu bir dünya sizi
                bekliyor. Özenle seçilmiş tariflerimizle, sevdiklerinize unutulmaz sofralar hazırlayacaksınız. Afiyet
                Olsun, yemek yapmayı seven herkesin kendine özel bir mutfak arkadaşıdır.<br>

                Sağlıklı yaşamı ve beslenmeyi ön planda tutanlar için özel kategorilerimizde hafif, sağlıklı ve
                besleyici tarifler bulunmaktadır. Glütensiz, vegan, vejetaryen gibi özel beslenme tercihlerine uygun
                seçeneklerle herkes için bir şeyler var. Lezzetin sınırlarını zorlamak, yeni tatlar keşfetmek isteyenler
                için ise dünya mutfağından seçme tarifler sunuyoruz.<br>

                "Afiyet Olsun" ailesi olarak, sizlere sadece yemek tarifleri sunmanın ötesinde bir deneyim vaat
                ediyoruz. Mutfakta geçirdiğiniz her anın keyifli, eğlenceli ve öğretici olması için buradayız.
                Tariflerimizi deneyerek, kendi yaratıcılığınızı keşfetmeniz için ilham kaynağı olmayı hedefliyoruz.<br>

                Yemek tutkunlarıyla birlikte büyüyen, paylaşılan lezzetin önemine inanan Afiyet Olsun, sofralarınıza
                neşe ve lezzet katmak için burada. Hep birlikte, güzel anıları ve muhteşem lezzetleri paylaşarak, yemek
                masalarını daha keyifli hale getirelim."
            <h4>Afiyet olsun!</h4>
            </p>
        </div>
    </div>

        <div id="BizeUlasinModal" class="modalBizeUlasin">

        <div class="modal-content">
            <span class="close" onclick="closeBizeUlasinModal()">&times;</span>
            <h3>BİZE ULAŞIN</h3>
            <p>TEL: 0555 555 55 55 
                <br>
                <br>
                ADRES: İstanbul
                <br>
                <br>
                E-POSTA:
            <h4>Afiyet olsun!</h4>
            </p>
        </div>
    </div>



    <script>
        document.addEventListener('keydown', function (event) {
            if (event.key === 'Escape') {
                closeshowAbout();
                closeBizeUlasinModal();
            }
        });
        function showAbout() {
            var modal = document.getElementById('aboutModal');
            modal.style.display = 'block';
        }
        function closeshowAbout() {
            var modal = document.getElementById('aboutModal');
            modal.style.display = 'none';
        }
        function showBizeUlasinModal() {
            var modal = document.getElementById('BizeUlasinModal');
            modal.style.display = 'block';
        }
        function closeBizeUlasinModal() {
            var modal = document.getElementById('BizeUlasinModal');
            modal.style.display = 'none';
        }
    </script>

</body>

</html>
