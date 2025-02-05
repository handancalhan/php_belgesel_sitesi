<?php
$terim = $_GET["terim"];
if (empty($terim)) {
    echo "Lütfen arama terimini girin!";
} 


// boş bırakıldıysa kontrol et...
?>

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
        
             .kayitalani{
        width: 15%;
        border: 1px solid bisque;
        padding: 13px;
        border-radius: 5px;
        background: #e8e7c6;
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
    
       .menu-bar {
        width: 100%;
        background-color: goldenrod;
        height: 65px;
        margin-top: 5px; 
        box-shadow:  2px 2px 10px 4px rgb(34, 33, 33);
        border-radius: 10px;
        
       }

       ul li {
        display: inline-block;
        width: 135px;
        padding-left: 5px;
        padding-right: 7px;
        padding-top: 25px;
        color: white;
        font-family: Arial, Helvetica, sans-serif;
        font-weight: bold;
        font-size: 17px;
       

       }
       ul li :hover {
        background-color:bisque;
        transition: 0.5s;
       }
       h1 {
        text-decoration: underline;
        font-size: 40px;
        margin-top: 10px;
       }
       
       .link {
        color: white;
        text-decoration: none;
      }
      .sayfa {
        text-decoration: underline;
      }

     .ozel {
        margin-left: 25px;
     }
     .ustmenuu {
        color: darkgoldenrod;
     }

    </style>
</head>

<body>
<div class="basliklar">
        <h1>Belgesel Dünyası</h1>
        <h2>Sayfaya Hoşgeldiniz!</h2>
    </div>
    <form class="kayitalani" action="ara.php" method="get">
        <input type="search" name="terim" id="">
        <input type="submit" value="ARA">
    </form>
    
    <div class="menu-bar">
        <ul>
          <li><label class="sayfa">Anasayfa</label></li>
          <li><a class="link" href="belgeseller.php">Belgeseller</a></li>
          <li><a class="link" href="form.php">Belgesel Yükle</a></li>
          <li><label class="ozel">Hakkımızda</label></li>
          <li><label class="ozel">İletişim</label></li>
          <li><label><a class="link" href="login.php">Giriş Yap</a></label></li>
          <li><a class="link" href="cikis.php">Çıkış Yap</a></li>
          <li><a class="link" href="register.php"><label>Kayıt Ol</label></a></li>
          
        </ul>
    </div>
    <?php
    if (isset($_COOKIE["id"])) { // giriş yapmış olan
    ?>
        <ul class="ustmenuu">
            <?php
            echo "Hoşgeldin ";
            echo htmlentities($_COOKIE["isim"]);
            echo " ";
            echo htmlentities($_COOKIE["soyisim"]);
            ?>
            
        </ul>
    <?php
    } else { // giriş yapmadıysa veya çerez sona erdiyse 
    ?>
        <ul class="ustmenuu">
            <li class="ustmenuu"> Hoşgeldin misafir </li>
            
            
        </ul>
    <?php
    } 
    ?>
    

    <?php
    // vt ye bağlan
    include "inc/vtbaglanti.inc.php";
    // dersnotlari tablosundan verileri okutacağım
    
    $sql ="select belgesel.*, uye.isim, uye.soyisim from belgesel join uye on belgesel.kimyukledi = uye.id and baslik like :terim";
    $ifade = $vt->prepare($sql);
    $terim2 = "%".$terim."%";
    $ifade->execute(Array(":terim"=>$terim2));
    echo "<p> Aranan terim : ";
    echo htmlentities($terim). "</p>";
    $satirSayisi =  $ifade->rowCount();
    if ($satirSayisi == 0) { // Hiç sonuç bulunamadıysa
        echo "Aradığınız terim bulunamadı!";
    } else { // Sonuç bulunduysa
        echo "<p> Bulunan kayıt sayısı: ".$satirSayisi;
        echo "</p>";
        while ($kayit = $ifade->fetch(PDO::FETCH_ASSOC)) {
            echo "<p class='acikmavi'>";
            echo "Tür:";
            echo htmlentities($kayit["belgeseltur"]);      
            echo "</p>";     
            echo "<h2 class='ortala'>"; 
            echo htmlentities($kayit["baslik"]);
            echo "</h2>";
            echo "<a href='detay.php?id=";
            echo $kayit["id"];
            echo "'>İncele</a>";
        
        // Kim yükledi ismini yazdıralım
          //echo $kayit["kimyukledi"];
          echo "<p>Yükleyen: ";
          echo htmlentities($kayit["isim"]);
          echo " ";
          echo htmlentities($kayit["soyisim"]);
          echo "</p>";
          echo "<hr>";
                          
        }
    }
    


    ?>


</body>

</html>