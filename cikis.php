<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Belgesel Dünyası</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <style>
        body {
            background: #e8e7c6;
            background-size: cover;
            
            
        }
        
      
    

     

        .basliklar {
            text-align: center;
            color: goldenrod;
            font-weight: bold;
            font-size: 18px;
            font-family: 'Roboto', sans-serif;
            box-shadow:  2px 2px 10px 4px rgb(34, 33, 33);
            border-radius: 10px;
            
            
        }
    
       

    
       h1 {
        text-decoration: underline;
        font-size: 40px;
        margin-top: 10px;
       }
       

    </style>
</head>
<body>
    <div class="basliklar">
        <h1>Belgesel Dünyası</h1>
        <h2>Sayfaya Hoşgeldiniz!</h2>
    </div>


<?php
if (!isset($_COOKIE["id"])) { // giriş yapmamış olan
    header("Refresh:3; url=login.php");
    echo "Çıkış yapmak için önce giriş yapın lütfen";
    exit;
}
else {
    setcookie("yetki", false, time()-1);
    setcookie("isim","", time()-1);
    setcookie("soyisim", "", time()-1);
    setcookie("id", "", time()-1);
    echo "Çıkış başarılı!";
    header("Refresh:3; url=anasayfa.php");
}

?>
</body>