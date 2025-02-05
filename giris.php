<?php
session_start();


// Veri tabanına bağlanalım...
try {
    $vt = new PDO("mysql:dbname=classroom;host=localhost;charset=utf8","root", "19052623gs");
    $vt->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  } catch (PDOException $e) {
    echo $e->getMessage();
  }
  
// verileri oku
// kullanıcı adını karşılaştıralım
$sql = "select * from uye where kullanici = :kullanici ";
$ifade = $vt->prepare($sql);
$ifade->execute(Array(":kullanici"=>$_POST["kullanici"]));

$kayit = $ifade->fetch(PDO::FETCH_ASSOC);

if ($kayit == false) {
    echo "Kullanıcı adı veya şifre yanlış!";
    header("Refresh:3; url=login.php");
    // Refresh ile belirtilen saniye kadar bekler ve url'e gönderir. 
    // header ("Location: giris.html");
    // Bu kullanım ise beklemeden direkt olarak gönderir
    exit;
}


// şifreyi karşılaştır
$sonuc = password_verify($_POST["sifre"], $kayit["sifre"]);
if ($sonuc == false) {
    // farklıysa uyarı versin ve giriş sayfasına yönlendirsin
    exit("Kullanıcı adı veya şifre yanlışşş!");
    header ("Location: login.php"); 
} 
else {
   echo $kayit["isim"]; echo "<br>";
   echo $kayit["soyisim"]; echo "<br>";
   setcookie("yetki", true, time()+60*30);
   setcookie("isim", $kayit["isim"], time()+60*30);
   setcookie("soyisim", $kayit["soyisim"], time()+60*30);
   setcookie("id", $kayit["id"], time()+60*30);
   echo "Giriş başarılı!";
   header("Refresh:3; url=form.php");
   
  
}

//header("Refresh:1; url=anasayfa.php");
// Veri tabanı bağlantısını yok et
$vt = null;
?>