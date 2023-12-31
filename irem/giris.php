<?php
if (isset($_COOKIE["user_id"])) { // giriş yapmışsa
    header("Location: anasayfa.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kayıt Sayfası</title>
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
            text-align: center;
            background-color: var(--color1);
            background-image: url(assets/son.jpg);
            background-size: cover;
            background-repeat: no-repeat;
            padding: 0;
            margin: 0;
            height: 100vh;  /* Ekran yüksekliği kadar ayarla */
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        form {
            position: relative;
            margin: auto auto;
            background-color: var(--color2);
            padding: 20px;
            border-radius: 12px;
            flex-direction: column;
            align-items: center;
            max-width: 400px; /* Max genişlik belirtildi */
            margin-top: 110px;
        }

        input {
            background-color: var(--color1);
            padding: 12px;
            box-sizing: border-box;
            border-radius: 10px;
            margin: 8px;
        }

        label {
            text-align: center;
            margin-bottom: 115px;
        }

        button {
            color: white;
            padding: 10px 10px;
            border: none;
            border-radius: 100px;
            cursor: pointer;
            width: 25%;
            background-color: var(--color4);
        }

        button:hover {
            background-color: var(--color5);
        }

        a {
            text-decoration: none;
            color: var(--color2);
            font-weight: bold;
            font-size: var(--h4);
        }

        img {
            max-width: 250px;
        }

        a:hover {
            color: var(--color1);
        }
    </style>
</head>
<body>
    <main>
        <form method="post" action="giriskontrol.php">
            <img src="assets/logo.png" alt="Logo"> <br>

            <label for="kullanici"> Kullanıcı Adı: </label>
            <input type="text" name="kullanici" id="kullanici">
            <br><br>
          
            <label for="sifre"> Şifre : </label>
            <input type="password" id="sifre" name="sifre">
            <br><br>
            
            <input type="submit" value="Giriş Yap!" style="color: white; padding: 10px 10px; border: none; border-radius: 100px; cursor: pointer; width: 25%; background-color: var(--color4);">
        </form>
    </main>
</body>
</html>
