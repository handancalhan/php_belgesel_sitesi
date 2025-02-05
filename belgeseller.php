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
            background-color: #544205;
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
       .materyalresim {
        max-width: 20%;
        height: auto;

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
    .deneme {
       color: bisque;
       font-size: 20px;
    }
    .acikmavi {
        color: wheat;
    }

    </style>
</head>
<body>
    <div class="basliklar">
        <h1>Belgesel Dünyası</h1>
        <h2>Sayfaya Hoşgeldiniz!</h2>
    </div>
    
    <div class="menu-bar">
        <ul>
          <li><a class="link" href="anasayfa.php">Anasayfa</a></li>
          <li><a  class="link" href="belgeseller.php" >Belgeseller</a></li>
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
        <ul>
            <?php
            echo "Hoşgeldin ";
            echo htmlentities($_COOKIE["isim"]);
            echo " ";
            echo htmlentities($_COOKIE["soyisim"]);
            ?>
            <li><p style='color: white; font-size: 25px;'><a href="form.php">Belgesel Materyali Yükle</a></p></li>
            <li><a href="cikis.php">Çıkış Yap</a></li>
        </ul>
    <?php
    } else { // giriş yapmadıysa veya çerez sona erdiyse 
        
    ?>
      <div class="deneme">
        <ul>
            <li class="deneme"> Hoşgeldin Misafir</li>
            <li><a class="deneme" href="login.php">Giriş Yap</a></li>
            <li><a class="deneme" href="register.php">Kayıt Ol</a></li>
        </ul>
      </div>
    </br>
    <hr>
    </br>
    
    <h1 class="acikmavi">Belgeseller</h1>
    <?php
    } 
    // vt ye bağlan
    include "inc/vtbaglanti.inc.php";
    // dersnotlari tablosundan verileri okutacağım
    $sql ="select belgesel.*, uye.isim, uye.soyisim from belgesel join uye on belgesel.kimyukledi = uye.id";
    $ifade = $vt->prepare($sql);
    $ifade->execute();
    
    while ($kayit = $ifade->fetch(PDO::FETCH_ASSOC)) {    
        echo "<h2 class='acikmavi'>"; 
        echo "Belgesel Adı: ";
        echo htmlentities($kayit["baslik"]);
        echo "</h2>";
        echo "<p class='acikmavi'>";
        echo "Belgesel Açıklaması: ";
        echo htmlentities($kayit["belgeselaciklama"]);
        echo "</p>"; 
        if (pathinfo($kayit["dosyayolu"], PATHINFO_EXTENSION) == '') {
            echo "<video width='320' height='240' controls>";
            echo "<source src='{$kayit["dosyayolu"]}' type='video/mp4'>";
            echo "Tarayıcınız video etiketini desteklemiyor.";
            echo "</video>";
        }
        elseif (pathinfo($kayit["dosyayolu"], PATHINFO_EXTENSION) == 'mp4') {
            echo "<video width='320' height='240' controls>";
            echo "<source src='{$kayit["dosyayolu"]}' type='video/mp4'>";
            echo "Tarayıcınız video etiketini desteklemiyor.";
            echo "</video>"; 
        }

        else {
            echo '<img class="materyalresim" src="' . $kayit["dosyayolu"] . '" alt="Resim">';
        }
        // case "application/pdf":
        //     echo "<object data='". $kayit["dosyayolu"]."' type='application/pdf' width='80%' height='400px'></object>";
        //     break
        ?>
      
        
   
        <div>
        <form action="yorumyap.php" method="post">
        <textarea name="metin" placeholder="Yorumunuz"></textarea>
        <input type="hidden" name="yapilan" value="<?php echo $kayit["id"] ?>">
        <input type="submit" value="Kaydet!">
    </form>
    </div>
    <?php 
   
        

    switch ($kayit["dosyayolu"]) { // dosyaturlerine göre gösterelim
        case "jpg":
            echo '<img class="materyalresim" src="' . $kayit["dosyayolu"] . '" alt="Resim">';
        
            echo '">';
            break;                    
        case "mp4":
           
            break;
        case 2:
            echo "i equals 2";
            break;
    }
    // Kim yükledi ismini yazdıralım
      //echo $kayit["kimyukledi"];
      echo "<p class='acikmavi'>"; 
      echo "Yükleyen: ";
      echo htmlentities($kayit["isim"]);
      echo " ";
      echo htmlentities($kayit["soyisim"]);
      
      echo "<hr>";
                      
    }


    ?>
    
</body>
</html>