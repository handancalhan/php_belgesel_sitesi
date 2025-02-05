<?php
if (!isset($_COOKIE["id"])) { // giriş yapmamış olan
    echo "Yorum yapmak için önce giriş yapın lütfen";
    header("Location: login.php");
    
    
}
elseif (!isset($_POST["metin"])) { // formu doldurmadıysa
    header("Location: anasayfa.php");
    exit;
}
else {
    var_dump($_POST);
    // VT ye kayıt yap
    // Veri tabanına bağlanalım...
    include "inc/vtbaglanti.inc.php";
    
    // Sorgular ve diğer işlemler burada...
    $sql = "insert into yorum (yapan, yapilan, metin) values (:yapan, :yapilan, :metin)";
    $ifade = $vt->prepare($sql);
    $ifade->execute(Array(":yapan"=>$_COOKIE["id"], ":yapilan"=>$_POST["yapilan"], ":metin"=>$_POST["metin"]));
    //Bağlantıyı yok edelim...
    echo "Kayıt tamamlandı!";
    $vt = null;
    $sayfa = "detay.php?id=".$_POST["yapilan"];
    header("Location: $sayfa");
}

?>