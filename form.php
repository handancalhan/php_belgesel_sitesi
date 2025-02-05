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
        .formalani{
        width: 28%;
        margin: 0 auto;
        margin-top: 30px;
        border: 1px solid bisque;
        padding: 25px;
        border-radius: 10px;
        background: #e8e7c6;
    }
      
        .kayitalani{
        width: 28%;
        margin: 0 auto;
        margin-top: 10px;
        border: 1px solid bisque;
        padding: 25px;
        border-radius: 10px;
        background: #e8e7c6;
    }

    input{
        width: 90%;
        margin: 10px auto;
        height: 30px;
        border: 1px solid rgba(0, 0, 0, 0.44);
        border-radius: 8px;
    }
    input:hover{
        border: 1px solid rgba(28, 189, 255, 0.44);
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
     .giris-button{
        width: 92%;
        height: 40px;
        background: #9b7b0a;
        color: white;
        border: none;
        cursor: pointer;
        border-radius: 10px;
    }
    .giris-button:hover{
        background: #544205;

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
          <li><label class="sayfa">Anasayfa</label></li>
          <li><label>Belgeseller</label></li>
          <li><a class="link" href="form.php">Belgesel Yükle</a></li>
          <li><label class="ozel">Hakkımızda</label></li>
          <li><label class="ozel">İletişim</label></li>
          <li><label><a class="link" href="login.php">Giriş Yap</a></label></li>
          <li><a class="link" href="cikis.php">Çıkış Yap</a></li>
          <li><a class="link" href="register.php"><label>Kayıt Ol</label></a></li>
        </ul>
    </div>
    
   


    <?php
    if ((isset($_COOKIE["yetki"])) and ($_COOKIE["yetki"] == true)) { // Yani giriş yaptıysa 
    ?>
    <form action="formkontrol.php?formugordu=1" method="post" enctype="multipart/form-data">
    <div class="kayitalani">
        <h2>Belgesel Yükle</h2>
        <div class="form-input">
            <div>
                <label>Belgesel Adı</label>
            </div>
            <input type="text" name="baslik" id="baslik" placeholder="Belgesel Adını Giriniz">
        </div>

        <div class="form-input">
            <div>
                <label>Belgesel Açıklama</label>
            </div>
            <textarea name="belgeselaciklama" id="belgeselaciklama" placeholder="Belgesel Açıklaması Giriniz"></textarea>
        </div>

        <div class="form-input">
            <div>
                <label>Belgesel Türünü Seçiniz</label>
            </div>
            <select name="belgeseltur" id="belgeseltur">
            <option value="İnsan">İnsan</option>
            <option value="Doğa">Doğa</option>
            <option value="Bilim">Bilim</option>
            <option value="Suç">Suç</option>
        </select> <br><br>
        </div>
        <label for="dosya"> Yüklemek istediğiniz belgesel dosyasını seçiniz:</label>
        <input type="file" id="dosya" name="dosya"><br><br>
        
        <div class="buttonalani">
            <button class="giris-button">Belgesel Yükle</button>
        </div>
    </form>
        <?php
    } else {
        echo "<p style='color: white; font-size: 25px;'>Dosya paylaşmak için önce giriş yapmalısınız.<br></p>"; 
        echo "<a href='login.php'><p style='color: white; font-size: 25px; '> Giriş Yap! </p></a>";
    } ?>
    

</body>

</html>