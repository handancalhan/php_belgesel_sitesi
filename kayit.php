<?php

if (!isset($_POST["isim"])) exit("İsim girilmesi gerekiyor!");
$isim = trim($_POST["isim"]);
if  (mb_strlen($isim) < 2) exit("İsim en az 2 karakter olmalıdır!");

if (!isset($_POST["soyisim"])) exit("Soyisim girilmesi gerekiyor!");
$soyisim = trim($_POST["soyisim"]);
if  (mb_strlen($soyisim) < 2) exit("Soyisim en az 2 karakter olmalıdır!");

if (!isset($_POST["kullanici"])) exit("Kullanıcı adı girilmesi gerekiyor!");
$kullanici = trim($_POST["kullanici"]);
if  (mb_strlen($kullanici) < 2) exit("Kullanıcı adı en az 2 karakter olmalıdır!");

if (!isset($_POST["bolum"])) exit("Bölüm girilmesi gerekiyor!");
$bolum = trim($_POST["bolum"]);
if  (mb_strlen($bolum) < 3) exit("Bölüm en az 3 karakter olmalıdır!");

if (!isset($_POST["eposta"])) exit("Eposta girilmesi gerekiyor!");
$eposta = trim($_POST["eposta"]);
if  (mb_strlen($eposta) < 3) exit("Eposta en az 3 karakter olmalıdır!");
if (!filter_var($_POST["eposta"], FILTER_VALIDATE_EMAIL)) exit("Lütfen geçerli bir eposta giriniz");

if (!isset($_POST["sifre"])) exit("Şifre girilmelidir!");
if (!isset($_POST["sifre2"])) exit("Lütfen şifreyi tekrar giriniz!");
$sifre = trim($_POST["sifre"]);
$sifre2 = trim($_POST["sifre2"]);
if (mb_strlen($sifre) < 8) exit("Şifre en az 8 karakter olmalıdır!");
if ($_POST["sifre"] != $_POST["sifre2"]) exit("Şifreler aynı olmalı!");
$sifre = password_hash($_POST["sifre"], PASSWORD_DEFAULT);



try {
  $vt = new PDO("mysql:dbname=classroom;host=localhost;charset=utf8","root", "19052623gs");
  $vt->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
  echo $e->getMessage();
}

$sql ="SELECT * from uye where kullanici=:kullanici";
$ifade = $vt->prepare($sql);
$kontrol = $kullanici;
$ifade->execute(array(
    'kullanici' => $kontrol
));

$kayit = $ifade->fetch(PDO::FETCH_ASSOC);
if ($kayit) {
    
    exit("Bu kullanıcı adı daha önce alınmıştır"); 
}
else {
$sql = "INSERT into uye (isim, soyisim, kullanici, eposta, bolum, sifre) values (:isim, :soyisim, :kullanici, :eposta, :bolum, :sifre)";
$ifade = $vt->prepare($sql);
$ifade->execute(Array(":isim"=>$isim, ":soyisim"=>$soyisim, ":kullanici"=>$kullanici, ":bolum"=>$bolum, ":eposta"=>$eposta, ":sifre"=>$sifre));
//Bağlantıyı yok edelim...
$vt = null;

echo "Kayıt oluşturuldu";
}


  



?>