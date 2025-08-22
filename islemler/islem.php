<?php
include 'baglan.php';

if (isset($_POST['ayarkaydet'])) {  // eğer gele değerler doluysa
    // veri tabanı kayıt işlemi
    $ayarkaydet = $db->prepare("UPDATE ayarlar SET 
                                        site_baslik=:site_baslik, 
                                        site_aciklama=:site_aciklama,
                                        site_sahibi=:site_sahibi ");

    // güvenlik için 
    $ayarkaydet->execute(array(
        'site_baslik' => $_POST['site_baslik'],
        'site_aciklama' => $_POST['site_aciklama'],
        'site_sahibi' => $_POST['site_sahibi']

    ));
 
}

/********************************************************************************/

/*Oturum Açma İşlemi Giriş*/
if (isset($_POST['oturumac'])) {


    $kullanicisor=$db->prepare("SELECT * FROM kullanici WHERE kul_mail=:mail and kul_sifre=:sifre");
    $kullanicisor->execute(array(
      'mail'=> $_POST['kul_mail'],
      'sifre'=> $_POST['kul_sifre']
    ));
     $sonuc=$kullanicisor->rowCount();
     
     if ($sonuc==0) {
        echo "Mail ya da şifreniz yanlış";
     }else{
        echo "Giriş yapıldı";
     }

	
    
}
/*Oturum Açma İşlemi Giriş*/


/*******************************************************************************/

?>

