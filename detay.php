<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
          .materyalresim {
        max-width: 20%;       
        height: auto;

    }
    .ustmenu {
        text-align: left;      
    }
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

    </style>
</head>

    
</body>
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
//var_dump($_GET);
//echo $kod;


// Direkt kod olmadan gelirse
if (!isset($_GET["id"])) {
    header("Location: anasayfa.php");
    exit;
}
//Kod boş gelirse
if (empty($_GET["id"])) {
    header("Location: anasayfa.php");
    exit;
}
// Kod yerine bir metin yazıldıysa
if (!is_numeric($_GET["id"])) {
    header("Location: anasayfa.php");
    exit;
}
$id = $_GET["id"];
?>


    <?php
    if (isset($_COOKIE["id"])) { // giriş yapmış olan
    ?>
        <ul class="ustmenu">
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
        <ul class="ustmenu">
        <?php
        echo "Hoşgeldin Misafir";
        ?>
          
        </ul>
    <?php
    } 
    // vt ye bağlan
    include "inc/vtbaglanti.inc.php";
    // dersnotlari tablosundan verileri okutacağım
    $sql ="select belgesel.*, uye.isim, uye.soyisim from belgesel join uye on belgesel.kimyukledi = uye.id and belgesel.id = :id";
    $ifade = $vt->prepare($sql);
    $ifade->execute([":id" => $id]);
    
        $kayit = $ifade->fetch(PDO::FETCH_ASSOC);
        if ($kayit == false) { // Ürün kodu bulunamadıysa veya kullanıcı rasgele rakam girerse
            header("Location: anasayfa.php");
        }
        echo "<p class='acikmavi'>";
        echo "Tür:";
        echo htmlentities($kayit["belgeseltur"]);
        echo "</p>";     
        echo "<h2 class='ortala'>"; 
        echo htmlentities($kayit["baslik"]);
        echo "</h2>";
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

      switch ($kayit["belgeseltur"]) { // dosyaturlerine göre gösterelim
        case "image/jpeg":
            echo '<img class="materyalresim" src="';
            echo $kayit["dosyayolu"];
            echo '">';
            break;
        case "application/pdf":
            echo "<object data='". $kayit["dosyayolu"]."' type='application/pdf' width='80%' height='400px'></object>";
            break;
        default:
            break;
    }
    // Kim yükledi ismini yazdıralım
      //echo $kayit["kimyukledi"];
      echo "<p>Yükleyen: ";
      echo htmlentities($kayit["isim"]);
      echo " ";
      echo htmlentities($kayit["soyisim"]);
      echo "</p>";
      echo "<hr>";
      if (isset($_COOKIE["id"])) { // giriş yapmış olan
    ?>
     <form action="yorumyap.php" method="post">
        <textarea name="metin" placeholder="Yorumunuz"></textarea>
        <input type="hidden" name="yapilan" value="<?php echo $kayit["id"]; ?>">
        <input type="submit" value="Kaydet!">
    </form>
   

    <?php
      }
    // dersnotlari tablosundan verileri okutacağım
    $sql ="select yorum.*, uye.isim, uye.soyisim from yorum, uye where yapilan = :id and uye.id = yorum.yapan";
    $ifade = $vt->prepare($sql);
    $ifade->execute([":id" => $id]);
    
    while ($kayit = $ifade->fetch(PDO::FETCH_ASSOC)) {   
        echo "Yorum: ";
        echo htmlentities($kayit["metin"]);
        echo "<br/>";  
        echo "Yapan: ";      
        echo htmlentities($kayit["isim"]);
        echo " ";
        echo htmlentities($kayit["soyisim"]);
        echo "<br/>";
        echo "<hr>";
        // echo "Yapıldığı zaman : ";
        // echo htmlentities($kayit["zaman"]);
        // echo "<br><br>";                
    }
    ?>
</body>

</html>