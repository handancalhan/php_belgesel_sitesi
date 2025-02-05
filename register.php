<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Kayıt Alanı</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
</head>


<style>
    body{
        background: #544205;
        font-family: 'Roboto', sans-serif;
        font-size: 20px;
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
    h2{
        margin: 5px;
        padding: 5px;
        text-align: center;
    }
    

    
    .basliklar {
            text-align: center;
            color: white;
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
        padding-left: 9px;
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
       .kayit {
        text-decoration: underline;
       }
       .link {
        color: white;
        text-decoration: none;
      }
      .basililink {
        color: white;
      }
      .ozel {
        margin-left: 25px;
     }

</style>
<body>
<div class="basliklar">
        <h1>Belgesel Dünyası</h1>
        <h2>Sayfaya Hoşgeldiniz!</h2>
    </div>
    
    <div class="menu-bar">
        <ul>
          <li><a class="link" href="anasayfa.php">Anasayfa</a></li>
          <li><label>Belgeseller</label></li>
          <li><a class="link" href="form.php">Belgesel Yükle</a></li>
          <li><label class="ozel">Hakkımızda</label></li>
          <li><label class="ozel">İletişim</label></li>
          <li><label><a class="link" href="login.php">Giriş Yap</a></label></li>
          <li><a class="link" href="cikis.php">Çıkış Yap</a></li>
          <li><label class="kayit"><a class="basililink" href="register.php">Kayıt Ol</a></label></li>
        </ul>
    </div>
   
<form action="kayit.php" method="post">
    <div class="kayitalani">
        <h2>Kullanıcı Kayıt Formu</h2>
        <div class="form-input">
            <div>
                <label>Adınız</label>
            </div>
            <input type="text" name="isim" placeholder="Adınızı Giriniz">
        </div>

        <div class="form-input">
            <div>
                <label>Soyadınız</label>
            </div>
            <input type="text" name="soyisim" placeholder="Soyadınızı Giriniz">
        </div>

        <div class="form-input">
            <div>
                <label>Kullanıcı Adınız</label>
            </div>
            <input type="text" name="kullanici" placeholder="Kullanıcı Adınızı Giriniz">
        </div>

        
        <div class="form-input">
            <div>
                <label>Bölümünüz</label>
            </div>
            <input type="text" name="bolum" placeholder="Bölümünüz">
        </div>
        <div class="form-input">
            <div>
                <label>Mail Adresiniz</label>
            </div>
            <input type="text" name="eposta" placeholder="Mail Adresiniz">
        </div>

        <div class="form-input">
            <div>
                <label>Şifreniz</label>
            </div>
            <input type="password" name="sifre" placeholder="Şifreniz">
        </div>

        <div class="form-input">
            <div>
                <label>Şifrenizi Tekrar Girin</label>
            </div>
            <input type="password" name="sifre2" placeholder="Şifrenizi Tekrar Girin">
        </div>

        <div class="buttonalani">
            <button class="giris-button">Kayıt Ol</button>
        </div>

    </div>
</form>

</body>
</html>