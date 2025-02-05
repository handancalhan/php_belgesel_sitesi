<?php
try {
    $vt = new PDO("mysql:dbname=classroom;host=localhost;charset=utf8","root","19052623gs");
    $vt->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  } catch (PDOException $e) {
    echo $e->getMessage();
  }
// giriş yapmış mı?
if (!((isset($_COOKIE["yetki"])) and ($_COOKIE["yetki"] == true))) { // Yani giriş yapmadıysa
    echo "Belgesel materyali yüklemek için önce giriş yapmalısınız.<br>";
    header("Refresh:1; url=anasayfa.php");
    echo "<a href='login.php'> Giriş Yap! </a>";
    exit;
}

if (!(isset($_GET["formugordu"]) and ($_GET["formugordu"] == 1))) { // Yani giriş yapmadıysa
    echo "Önce formu doldurun.<br>";
    header("Refresh:10; url=form.php");
    echo "<a href='form.php'> Belgesel Gönder! </a>";   
    exit;
}

// formdan çok büyük bir dosya gönderdiyse
if (empty($_POST)) { // Yani giriş yapmadıysa
    echo "Gönderdiğiniz dosya boyutu çok büyük. Maksimum: 8MB<br>";
    header("Refresh:10; url=form.php");
    echo "<a href='form.php'> Belgesel Gönder! </a>";
    exit;
}

// echo "<p>Form bilgileri</p>";
// var_dump($_POST);
// echo "<p>Dosya bilgileri</p>";
// var_dump($_FILES);


// dosya yüklemiş mi? 
echo "dosya yükleme hata kod: ";
echo $_FILES["dosya"]["error"];
echo "<br>";
if ($_FILES["dosya"]["error"] <> 0) {
    exit("Bu dosya yüklenemedi! Tekrar deneyin!");
}



// dosya boyutunu kontrol et
echo "dosya boyutu: ";
echo $_FILES["dosya"]["size"];
echo "<br>";
if ($_FILES["dosya"]["size"] > 8000000) {
    exit("Bu dosya boyutu çok büyük");
    //Buraya geri dönelim
}

// dosya turunu kontrol et
echo "dosya türü: ";
echo $_FILES["dosya"]["type"];
echo "<br>";

$izinverilendosyaturleri = [
    "image/jpeg",
    "video/mp4",
    "application/pdf"
    
];

if (!in_array($_FILES["dosya"]["type"], $izinverilendosyaturleri)) {
    exit("Sadece resim dosyası ve video dosyası yükleyebilirsiniz!"); 
}


$hedef = "yuklenenler/".time().basename($_FILES["dosya"]['name']);
move_uploaded_file($_FILES["dosya"]['tmp_name'], $hedef );  




$baslik=$_POST['baslik'];
$belgeselaciklama=$_POST['belgeselaciklama'];
$belgeseltur=$_POST['belgeseltur'];



$sql = "INSERT INTO  (baslik, belgeselaciklama, belgeseltur, dosyayolu, kimyukledi) VALUES (:baslik, :belgeselaciklama, :belgeseltur, :dosyayolu, :kimyukledi)";
$ifade = $vt->prepare($sql);
$ifade->execute(Array(":baslik"=>$baslik, ":belgeselaciklama"=>$belgeselaciklama, ":belgeseltur"=>$belgeseltur, ":dosyayolu"=>$hedef, ":kimyukledi"=>$_COOKIE["id"]));
//Bağlantıyı yok edelim...
echo "Belgesel materyali yüklendi!";

?>