<?php
include 'baglan.php';

// oturum açma işlemleri güvenlik önlemleri
ob_start();
session_start();

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


    $kullanicisor = $db->prepare("SELECT * FROM kullanici WHERE kul_mail=:mail and kul_sifre=:sifre");
    $kullanicisor->execute(array(
        'mail' => $_POST['kul_mail'],
        'sifre' => $_POST['kul_sifre']
    ));
    $sonuc = $kullanicisor->rowCount();

    if ($sonuc == 0) {
        echo "Mail ya da şifreniz yanlış";
    } else {
        header("location:..index.php");
        $_SESSION['kul_mail'] = $_POST['kul_mail'];
    }



}
/*******************************************************************************/
/*Oturum Açma İşlemi Giriş*/



/*Proje ekle İşlemi Giriş*/
/*******************************************************************************/
if (isset($_POST['projeekle'])) { // PROJE EKEL FORMUNDAN GELİYORSAN
    $projeekle = $db-> prepare("INSERT INTO proje SET 
    proje_baslik=:baslik,
    proje_teslim_tarihi=:teslim_tarih,
    proje_aciliyet=:aciliyet,
    proje_durum=:durum,
    proje_detay=:detay");
    $projeekle->execute(array(
        'baslik' => $_POST['proje_baslik'],
        'teslim_tarih' => $_POST['proje_teslim_tarihi'],
        'aciliyet' => $_POST['proje_aciliyet'],
        'durum' => $_POST['proje_durum'],
        'detay' => $_POST['proje_detay']
    ));

    if ($projeekle) {
        header("location:..index.php");
    } else {
        echo "Başarız";
        exit;
    }
}
/*******************************************************************************/
/*Proje ekle İşlemi Giriş*/


/*Proje duzenle İşlemi Giriş*/
/*******************************************************************************/
if (isset($_POST['projeduzenle'])) { // PROJE EKEL FORMUNDAN GELİYORSAN
    $projeduzenle = $db-> prepare("UPDATE proje SET 
    proje_baslik=:baslik,
    proje_teslim_tarihi=:teslim_tarih,
    proje_aciliyet=:aciliyet,
    proje_durum=:durum,
    proje_detay=:detay
    WHERE proje_id=:proje_id"
    );
    $projeduzenle->execute(array(
        'baslik' => $_POST['proje_baslik'],
        'teslim_tarih' => $_POST['proje_teslim_tarihi'],
        'aciliyet' => $_POST['proje_aciliyet'],
        'durum' => $_POST['proje_durum'],
        'detay' => $_POST['proje_detay'],
        'proje_id' => $_POST['proje_id']
    ));

    if ($projeduzenle) {
        header("location:..index.php");
    } else {
        echo "Başarız";
        exit;
    }
}
/*******************************************************************************/
/*Proje duzenle İşlemi Giriş*/


?>